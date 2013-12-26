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

if($submit) 
{
if($em==$em2)
{
	$u_check=mysql_query("SELECT kullanici_adi FROM uyeler WHERE kullanici_adi='$un'");
		$check=mysql_num_rows($u_check);
		if($check==0)
		{
	if($fn&&$ln&&$un&&$em&&$em2&&$pswd&&$pswd2)
	{
	       if($pswd==$pswd2)
	       {
                     if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) 
					 {
                     $insertSQL = sprintf("INSERT INTO uyeler (isim, soyisim, kullanici_adi, email1, sifre1) VALUES (%s, %s, %s, %s, %d)",
                       GetSQLValueString($_POST['fname'], "text"),
                       GetSQLValueString($_POST['lname'], "text"),
                       GetSQLValueString($_POST['username'], "text"),
                       GetSQLValueString($_POST['email'], "text"),
                       GetSQLValueString($_POST['password'], "int"));

                       mysql_select_db($database_varitabanibaglantim, $varitabanibaglantim);
                       $Result1 = mysql_query($insertSQL, $varitabanibaglantim) or die(mysql_error());
					   

					   $insertSQL = sprintf("INSERT INTO giris (id, kullanici_adi, sifre, yetki) VALUES (NULL, %s, %s, NULL)",
                       GetSQLValueString($_POST['username'], "text"),
                       GetSQLValueString($_POST['password'], "text"));

                       mysql_select_db($database_varitabanibaglantim, $varitabanibaglantim);
                       $Result1 = mysql_query($insertSQL, $varitabanibaglantim) or die(mysql_error());
                        
						$insertGoTo = "KayitOl2.php";
                                   if (isset($_SERVER['QUERY_STRING'])) 
								   {
                                    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
                                    $insertGoTo .= $_SERVER['QUERY_STRING'];
                                   }
                        header(sprintf("Location: %s", $insertGoTo));
                       }
	         }
	         else
	         { 
			 echo "<script>alert('Sifreler uyusmadi')</script>";
	         }
	     }
		 else
		 {
			echo "<script>alert('Tum Alanlari Doldurunuz')</script>";
		 }
      }
	  else
	  {
		  echo "<script>alert('Boyle bir Kullanici Adi Zaten Var ')</script>";
	  }
}
else
{
	echo "<script>alert('Email ler uyusmadi ')</script>";
}
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/main.css" rel="stylesheet" type="text/css">
<title>Sosyal Paylasim Sitesi</title>
<link rel="shortcut icon" href="http://localhost:81/SocialNet/img/Z.png" />
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
      <a href="index1.php"><img src="img/ikonlar/home.png" height="15" width="26" />AnaSayfa</a>&nbsp;&nbsp;
      <a href="KayitOl2.php"><img src="img/ikonlar/address.png" height="15" width="26" />Kayit Ol</a>&nbsp;&nbsp;
      <a href="GirisSayfasi.php"><img src="img/ikonlar/Login.png" height="15" width="26" />Giris Yap</a>&nbsp;&nbsp;
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
                 <td><input type="text" name="email2" size="32" /></td>
               </tr>
               <tr valign="baseline">
                 <td nowrap="nowrap" align="right">Sifre1:</td>
                 <td><input type="password" name="password" size="32" /></td>
               </tr>
               <tr valign="baseline">
                 <td nowrap="nowrap" align="right">Sifre2:</td>
                 <td><input type="password" name="password2" value="" size="32" /></td>
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