<?php
$route = "C:\Bitnami\wampstack-7.3.18-0\apache2\htdocs\Controller/photos/";
mkdir("C:\Bitnami\wampstack-7.3.18-0\apache2\htdocs\Controller/photos/");

$data = $_POST['photo'];
list($type, $data) = explode(';', $data);
list(, $data)      = explode(',', $data);
$data = base64_decode($data);
$class = $_POST['class'];
$count = $_POST['count_value'];

if(!$class){ #class에 아무런 입력도 없이 캡쳐 시 exception return 관리 해줘야 한다
  throw new exception('no class value');
}

$save_route = $route.$class."/";
if(!is_dir($save_route)){
  mkdir($save_route);
}

file_put_contents($save_route.$class."_".time()."_".$count.'.png', $data);
die;
?>
