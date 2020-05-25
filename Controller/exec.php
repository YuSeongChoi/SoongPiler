<?php
  $python_route = "C:\Users\gkrtj\AppData\Local\Programs\Python\Python37\python.exe ";
  $file_route = "C:\Bitnami\wampstack-7.3.17-0\apache2\htdocs\main.py";
  $output = shell_exec($python_route.$file_route);
  echo $output;
 ?>
