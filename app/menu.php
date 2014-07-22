<?php
add_action('admin_menu', 'my_consultation_menu');

function my_consultation_menu() {
	add_menu_page('Διαβουλεύσεις', 'Διαβούλευση', 'administrator', 'new-consultation-handle', 'new_consultation');
	add_submenu_page( 'new-consultation-handle', 'Επεξεργασία', 'Επεξεργασία', 'administrator', 'edit-consultation-handle', 'edit_consultation');
	//add_submenu_page( 'new-consultation-handle', 'Εργαλεία', 'Εργαλεία', 'administrator', 'tools-consultation-handle', 'tools_consultation');
	add_submenu_page( 'new-consultation-handle', 'Ρυθμίσεις', 'Ρυθμίσεις', 'administrator', 'options-consultation-handle', 'options_consultation');
}

function new_consultation() {
	require_once(TEMPLATEPATH . '/app/new.php');
}

function edit_consultation() {
	require_once(TEMPLATEPATH . '/app/edit.php');
}
/*
function tools_consultation() {
	require_once(TEMPLATEPATH . '/app/tools.php');
}
*/

function options_consultation() {
	require_once(TEMPLATEPATH . '/app/options.php');
}

?>