<?php

$ipaper_height = '980'; // default iPaper height
$ipaper_width = '685'; // default iPaper width

// Since 1.1
function scribd_shortcode_handler($atts, $content = NULL) {
	global $ipaper_height, $ipaper_width;
	// Initialize variables before extract()
	$id = '';
	$key = '';
	$height = 0;
	$width = 0;
	extract ( shortcode_atts ( array ('id' => 'empty', 'key' => 'empty', 'height' => $ipaper_height, 'width' => $ipaper_width ), $atts ) );

	return "<div id=\"ipaper$id\" class=\"simpler-ipaper-embed\"></div>\n" . '<script type="text/javascript">' . "\n" . "iPaper_embed('$id', '$key', '$height', '$width');\n</script>";
}
add_shortcode ( 'scribd', 'scribd_shortcode_handler' );

function ipaper_head() {
	echo <<<JAVASCRIPT
<script type="text/javascript" src="http://www.scribd.com/javascripts/view.js"></script>
<script type="text/javascript">
//<![CDATA[
function iPaper_embed(id, accesskey, height, width) {
  var scribd_doc = scribd.Document.getDoc(id, accesskey);
  scribd_doc.addParam('height', height);
  scribd_doc.addParam('width', width);
  scribd_doc.write('ipaper'+id);
  }
//]]>
</script>
JAVASCRIPT;
}

?>