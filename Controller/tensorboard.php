<?php
$board_route = "C:\Users\gkrtj\AppData\Local\Programs\Python\Python37\Scripts\\tensorboard.exe --logdir=";
$file_route = "C:\Bitnami\wampstack-7.3.17-0\apache2\htdocs\Controller\logs\\";
$output = shell_exec($board_route.$file_route);
?>
