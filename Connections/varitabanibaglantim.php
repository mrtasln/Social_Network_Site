<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_varitabanibaglantim = "localhost";
$database_varitabanibaglantim = "sosyal_veritabani";
$username_varitabanibaglantim = "root";
$password_varitabanibaglantim = "";
$varitabanibaglantim = mysql_pconnect($hostname_varitabanibaglantim, $username_varitabanibaglantim, $password_varitabanibaglantim) or trigger_error(mysql_error(),E_USER_ERROR); 
?>