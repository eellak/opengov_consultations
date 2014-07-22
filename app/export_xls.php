<?php
	function get_comments_xls($filename,$cons){
		
		require_once (TEMPLATEPATH . '/app/PHPExcel.php');
		global $wpdb;
		
		$sql =
			"SELECT post_title,comment_ID,comment_author, comment_date_gmt, comment_content
			FROM $wpdb->comments
				LEFT OUTER JOIN $wpdb->posts ON ($wpdb->comments.comment_post_ID = $wpdb->posts.ID)
				INNER JOIN $wpdb->term_relationships as r1 ON ($wpdb->posts.ID = r1.object_id)
				INNER JOIN $wpdb->term_taxonomy as t1 ON (r1.term_taxonomy_id = t1.term_taxonomy_id)
			WHERE comment_approved = '1'
				AND comment_type = ''
				AND post_password = ''
				AND t1.taxonomy = 'category'
				AND t1.term_id = ".$cons."
			order by comment_date_gmt";
			
		$qr = $wpdb->get_results($sql, ARRAY_N);
			
		// Create new PHPExcel object
		$objPHPExcel = new PHPExcel();

		// Set properties
		$objPHPExcel->getProperties()->setCreator("OpenGov.gr")
									 ->setLastModifiedBy("OpenGov Admin")
									 ->setTitle("Αρχείο Εξαγωγής Σχολίων")
									 ->setSubject("Αρχείο Εξαγωγής Σχολίων")
									 ->setDescription("Αρχείο Εξαγωγής Σχολίων - OpenGov.gr")
									 ->setKeywords("opengov, σχόλια")
									 ->setCategory("Αρχείο Σχολίων");


		// Add some data // Headers
		$objPHPExcel->setActiveSheetIndex(0)
					->setCellValue('A1', 'Άρθρο')
					->setCellValue('B1', 'Κωδικός Σχολίου')
					->setCellValue('C1', 'Σχολιαστής')
					->setCellValue('D1', 'Ημερομηνία Υποβολής')
					->setCellValue('E1', 'Σχόλιο');

		
		$row = 2;
		/*
		foreach ($qr as $qrow) 
		{
			// Add some data // Datas
			$objPHPExcel->setActiveSheetIndex(0)
					->setCellValue('A'.$row, $qrow->post_title )
					->setCellValue('B'.$row, $qrow->comment_ID)
					->setCellValue('C'.$row, $qrow->comment_author )
					->setCellValue('D'.$row, $qrow->comment_date_gmt)
					->setCellValue('E'.$row, $qrow->ck_rating_up)
					->setCellValue('F'.$row, $qrow->ck_rating_down )
					->setCellValue('G'.$row, $qrow->comment_content);
			$row++;
		} */
		$objPHPExcel->getActiveSheet()->fromArray($qr,NULL,'A2');
		/*
		Debug
		$objPHPExcel->setActiveSheetIndex(0)
					->setCellValue('A'.$row, count($qr) )
					->setCellValue('B'.$row, $sql );
		*/
		

		// Rename sheet
		$objPHPExcel->getActiveSheet()->setTitle('Σχόλια Διαβούλευσης');


		// Set active sheet index to the first sheet, so Excel opens this as the first sheet
		$objPHPExcel->setActiveSheetIndex(0);


		// Redirect output to a client’s web browser (Excel5)
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="'.$filename.'.xls"');
		header('Cache-Control: max-age=0');

		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
		$objWriter->save('php://output');
		$objPHPExcel->disconnectWorksheets();
		unset($objPHPExcel);

		exit;
	}
?>