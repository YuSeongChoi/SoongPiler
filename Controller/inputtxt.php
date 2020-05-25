<?php
  $file = fopen("param.txt", "a");

  if(!$file) die("cannot open the file");

  $x = $_POST["kind"];
  $y = $_POST["var1"];
  $w = $_POST["var2"];

  $array = array($x, $y, $w, $h, "\n");
  $string = implode(" ", $array);
  fwrite($file, $string);

  fclose($file);
  Header("Location:python.php");
?>
