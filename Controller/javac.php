<?php
// javc를 통해 class파일 생성
$exec = "javac Solution.java";
shell_exec($exec);
// echo $exec;

// java를 통해 생성된 class 파일 실행
$output = shell_exec("java Solution");
echo $output;
 ?>
