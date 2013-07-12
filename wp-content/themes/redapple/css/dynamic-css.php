<?php
   header("Content-type: text/css; charset: UTF-8");
   //default colors
    $body_color = '#eae7db'; //tan
    $wrapper_color = '#fff'; //white
    $text_color = '#464646'; //gray
    $primary_color = '#5daa92'; //turquoise
    $nav_link_color = '#eae7db'; //tan
    $heading_background = '#000';
    $heading_accent = '#386658';
?>
a{
	color:<?php echo $primary_color; ?>;
}
body{
	color:<?php echo $text_color; ?>;
	background-color:<?php echo $body_color; ?>;
}
header a{
  color:<?php echo $nav_link_color; ?>
}

