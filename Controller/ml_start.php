<?php
  $python_route = "C:\Users\hyunseok\AppData\Local\Programs\Python\Python38\python.exe ";
  $obj_route = "C:\Bitnami\wampstack-7.3.18-0\apache2\htdocs";
  $data = $_POST['memo'];
  $output = exec($python_route."C:\Bitnami\wampstack-7.3.18-0\apache2\htdocs/classify.py");
  $main_output = exec($python_route."C:\Bitnami\wampstack-7.3.18-0\apache2\htdocs/training.py");
 ?>
