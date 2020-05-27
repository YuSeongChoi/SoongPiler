<?php
header("Content-type: image/png");
$size = $_GET['size'];
$channel = $_GET['channel'];
$option = $_GET['option'];
$alpha = 1;
$beta = 2;
$textsize = 200;
$first_poligon = array(
            0,  $size/$beta,  // Point 1 (x, y) ---->  0,20
            0,  $size/$beta + $size, // Point 2 (x, y) ---->  50,50
            $channel * $alpha,  $size/$beta + $size,  // Point 1 (x, y) ---->  0,20
            $channel * $alpha,  $size/$beta,  // Point 4 (x, y) ---->  0,60
            );
$second_poligon = array(
            0,  $size/$beta,  // Point 1 (x, y) ---->  0,33
            $channel * $alpha,  $size/$beta, // Point 2 (x, y) ---->  50,0
            $size / $beta + $alpha * $channel, 0,    // Point 3 (x, y) ---->  100,20
            $size / $beta, 0,  // Point 4 (x, y) ---->  50,50
            );
$third_poligon = array(
            $size / $beta + $alpha * $channel, 0,  // Point 1 (x, y) ---->  100,20
            $channel * $alpha,  $size/$beta, // Point 2 (x, y) ---->  50,50
            $channel * $alpha,  $size/$beta + $size,    // Point 3 (x, y) ---->  50,100
            $size / $beta + $alpha * $channel, $size,  // Point 4 (x, y) ---->  100,60
            );
$im = imagecreatetruecolor($size/$beta + $channel * $alpha, $size/$beta + $size + $textsize);
$white = imagecolorallocate($im, 255, 255, 255);
imagefilledrectangle($im, 0, 0, $size/$beta + $channel * $alpha, $size/$beta + $size + $textsize, $white);
$conv2Dcolor1 = imagecolorallocate($im, 107, 142, 200);
$conv2Dcolor2 = imagecolorallocate($im, 73, 114, 184);
$conv2Dcolor3 = imagecolorallocate($im, 48, 83, 146);

$Maxcolor1 = imagecolorallocate($im, 246, 202, 173);
$Maxcolor2 = imagecolorallocate($im, 244, 189, 152);
$Maxcolor3 = imagecolorallocate($im, 223, 177, 147);

$orange = imagecolorallocate($im, 60, 87, 156);

$str1 = "conv2D";
$str2 = "MaxPool";

$string1 = "channel=".$channel;
$string2 = "size=".$size;

if($option == 1){
  imagefilledpolygon($im, $first_poligon, 4, $conv2Dcolor2);
  imagefilledpolygon($im, $second_poligon, 4, $conv2Dcolor1);
  imagefilledpolygon($im, $third_poligon, 4, $conv2Dcolor3);
  $px = (imagesx($im) - 7.5 * strlen($str1)) / 2;
  imagestring($im, 4, $px,  $size/$beta + $size, $str1, $orange);
  $px = (imagesx($im) - 7.5 * strlen($string1)) / 2;
  imagestring($im, 4, $px,  $size/$beta + $size + 15, $string1, $orange);
  $px = (imagesx($im) - 7.5 * strlen($string2)) / 2;
  imagestring($im, 4, $px,  $size/$beta + $size + 30, $string2, $orange);
}
else{
  imagefilledpolygon($im, $first_poligon, 4, $Maxcolor2);
  imagefilledpolygon($im, $second_poligon, 4, $Maxcolor1);
  imagefilledpolygon($im, $third_poligon, 4, $Maxcolor3);
  $px = (imagesx($im) - 7.5 * strlen($str2)) / 2;
  imagestring($im, 4, $px,  $size/$beta + $size, $str2, $orange);
  $px = (imagesx($im) - 7.5 * strlen($string1)) / 2;
  imagestring($im, 4, $px,  $size/$beta + $size + 15, $string1, $orange);
  $px = (imagesx($im) - 7.5 * strlen($string2)) / 2;
  imagestring($im, 4, $px,  $size/$beta + $size + 30, $string2, $orange);
}



imagepng($im);
imagedestroy($im);
?>
