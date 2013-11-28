<?php require_once('Connections/varitabanibaglantim.php'); ?>

<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}
$submit=@$_POST['submit'];
$em=strip_tags(@$_POST['email']);
$em2=strip_tags(@$_POST['email2']);
$pswd=strip_tags(@$_POST['password']);
$pswd2=strip_tags(@$_POST['password2']);
$fn=strip_tags(@$_POST['fname']);
$ln=strip_tags(@$_POST['lname']);
$un=strip_tags(@$_POST['username']);


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/main.css" rel="stylesheet" type="text/css">
<title>Sosyal Paylasim Sitesi</title>
</head>
<body>
<div class="headerMenu">
 <div id="wrapper">
   <div class="logo">
     <img src="img/Z.png">
   </div>
   <div class="search_box">
        <form method="GET" action="search.php" id="search">
        <input name="q" type="text" size="60" placeholder="search . . ." />
        </form>
    </div>
     
    <div id="menu">
      <a href="index1.php">AnaSayfa</a>
      <a href="hakkimizda.php">Hakkinda</a>
      <a href="KayitOl2.php">Kayit Ol</a>
      <a href="GirisSayfasi.php">Giris Yap</a>
    </div>
</div>
</div>
<br />
<br />
<br />
<br />
<table width="100%" class="homepageTable">
        <tr>
          <td width="1%" valign="top">&nbsp;</td>
             <td width="99%" valign="top"><p>&nbsp;</p>
           <form action="#" method="post">
             
           </form>
           <form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
             <p>&nbsp;</p>
             <p>&nbsp;</p>
             <table align="center">
               <tr valign="baseline">
                 <td nowrap="nowrap" align="right">Isim:</td>
                 <td><input type="text" name="fname" value="" size="32" /></td>
               </tr>
               <tr valign="baseline">
                 <td nowrap="nowrap" align="right">Soyisim:</td>
                 <td><input type="text" name="lname" value="" size="32" /></td>
               </tr>
               <tr valign="baseline">
                 <td nowrap="nowrap" align="right">Kullanıcı Adı:</td>
                 <td><input type="text" name="username" value="" size="32" /></td>
               </tr>
               <tr valign="baseline">
                 <td nowrap="nowrap" align="right">Email1:</td>
                 <td><input type="text" name="email" value="" size="32" /></td>
               </tr>
               <tr valign="baseline">
                 <td nowrap="nowrap" align="right">Email2:</td>
                 <td><input type="text" name="email2" value="" size="32" /></td>
               </tr>
               <tr valign="baseline">
                 <td nowrap="nowrap" align="right">Sifre1:</td>
                 <td><input type="text" name="password" value="" size="32" /></td>
               </tr>
               <tr valign="baseline">
                 <td nowrap="nowrap" align="right">Sifre2:</td>
                 <td><input type="text" name="password2" value="" size="32" /></td>
               </tr>
               <tr valign="baseline">
                 <td nowrap="nowrap" align="right">&nbsp;</td>
                 <td><input type="submit" name="submit" value="Kayıt Ol" /></td>
               </tr>
             </table>
             <input type="hidden" name="MM_insert" value="form1" />
           </form>
           <p>&nbsp;</p></td>
        </tr>
        <tr>
          <td valign="top">&nbsp;</td>
          <td valign="top">&nbsp;</td>
        </tr>
</table>
</body>
</html> 