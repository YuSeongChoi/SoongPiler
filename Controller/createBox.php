<?php
  header("Content-type: image/png");
  $size = $_GET['size'];
  $channel = $_GET['channel'];
  $im = imagecreatetruecolor($size, $size);
  $gray=imagecolorallocate($im, 0, 255, 0);
  $red=imagecolorallocate($im, 255, 0, 0);
  $point=array(0, 0, 0, $size, $size, $size, $size, 0);
  imagepolygon($im, $point, 4, $red);
  $px=(imagesx($im) - 7.5 * strlen($string)) / 2;
  imagestring($im, 4, 0, 9, $size, $gray);
  imagepng($im);
  imagedestroy($im);
?>
