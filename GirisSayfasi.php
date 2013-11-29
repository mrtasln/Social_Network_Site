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
             <td width="55%" valign="top">
             <h2>Hemen Bize Katılın    </h2>
             <img src="img/indir.jpg" width="500" /></td>
             <td width="45%" valign="top">
           <p>&nbsp;</p>
           <p>&nbsp;</p>
           <p>&nbsp;</p>
           <form id="form1" name="form1" method="POST" action="<?php echo $loginFormAction; ?>">
           <p>&nbsp;</p>
           <p>&nbsp;</p>
           <p>&nbsp;</p>
           <table id="tt" width="400" align="center" cellpadding="0" cellspacing="0">
       <tr>
                 <td width="199" valign="middle"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Kullanıcı Adı:</p></td>
                 <td width="200" align="center"><label for="user"></label>
                   <input name="user" type="text" id="user" /></td>
             </tr>
               <tr>
                 <td align="right"  valign="middle">Şifre:</td>
                 <td align="center"><label for="password"></label>
                   <input type="text" name="password" id="password" /></td>
               </tr>
               <tr>
                 <td align="center" bgcolor="#00FFFF">&nbsp;</td>
                 <td align="left"><input type="submit" name="button" id="button" value="Giriş" /></td>
               </tr>
     </table>
             
             
           </form>
           <p>&nbsp;</p>
           <p>&nbsp;</p>
           <p>&nbsp;</p>
           <p>&nbsp;</p>
           <p>&nbsp;</p>
           <p>&nbsp;</p>
           <p>&nbsp;</p>
           <p>&nbsp;</p>
           <p>&nbsp;</p></td>
        </tr>
        <tr>
          <td valign="top">&nbsp;</td>
          <td valign="top">&nbsp;</td>
        </tr>
</table>
</body>
</html> 