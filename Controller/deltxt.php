<?php
  $file=fopen("param.txt", "r");
  $arr=[];
  while(!feof($file)){
    $str = fgets($file, 999);
    #$str = trim($str);
    #$arr = explode(" ", $str);
    array_push($arr, $str);
  }
  fclose($file);

  $file = fopen("param.txt", "w");
  $idx = 0;
  while($idx < count($arr) - 2){
    fwrite($file, $arr[$idx]);
    $idx = $idx + 1;
  }
  fclose($file);
  Header("Location:python.php");
?>
