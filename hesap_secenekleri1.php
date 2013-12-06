<?php require_once('Connections/varitabanibaglantim.php'); ?>
<?php
//initialize the session
if (!isset($_SESSION)) {
  session_start();
}

// ** Logout the current user. **
$logoutAction = $_SERVER['PHP_SELF']."?doLogout=true";
if ((isset($_SERVER['QUERY_STRING'])) && ($_SERVER['QUERY_STRING'] != "")){
  $logoutAction .="&". htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_GET['doLogout'])) &&($_GET['doLogout']=="true")){
  //to fully log out a visitor we need to clear the session varialbles
  $_SESSION['MM_Username'] = NULL;
  $_SESSION['MM_UserGroup'] = NULL;
  $_SESSION['PrevUrl'] = NULL;
  unset($_SESSION['MM_Username']);
  unset($_SESSION['MM_UserGroup']);
  unset($_SESSION['PrevUrl']);
	
  $logoutGoTo = "index1.php";
  if ($logoutGoTo) {
    header("Location: $logoutGoTo");
    exit;
  }
}
?>
<?php
if (!isset($_SESSION)) {
  session_start();
}
$MM_authorizedUsers = "";
$MM_donotCheckaccess = "true";

function isAuthorized($strUsers, $strGroups, $UserName, $UserGroup) { 
  $isValid = False; 

  if (!empty($UserName)) { 
    $arrUsers = Explode(",", $strUsers); 
    $arrGroups = Explode(",", $strGroups); 
    if (in_array($UserName, $arrUsers)) { 
      $isValid = true; 
    } 
    if (in_array($UserGroup, $arrGroups)) { 
      $isValid = true; 
    } 
    if (($strUsers == "") && true) { 
      $isValid = true; 
    } 
  } 
  return $isValid; 
  $MM_restrictGoTo = "hata.php";
if (!((isset($_SESSION['MM_Username'])) && (isAuthorized("",$MM_authorizedUsers, $_SESSION['MM_Username'], $_SESSION['MM_UserGroup'])))) {   
  $MM_qsChar = "?";
  $MM_referrer = $_SERVER['PHP_SELF'];
  if (strpos($MM_restrictGoTo, "?")) $MM_qsChar = "&";
  if (isset($_SERVER['QUERY_STRING']) && strlen($_SERVER['QUERY_STRING']) > 0) 
  $MM_referrer .= "?" . $_SERVER['QUERY_STRING'];
  $MM_restrictGoTo = $MM_restrictGoTo. $MM_qsChar . "accesscheck=" . urlencode($MM_referrer);
  header("Location: ". $MM_restrictGoTo); 
  exit;
}
}
?>
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
$submit=@$_POST['degistir'];
$adi=strip_tags(@$_POST['kullaniciAdi']);
$n_em=strip_tags(@$_POST['new_psw']);
$n_em2=strip_tags(@$_POST['new_psw_re']);
$pswd=strip_tags(@$_POST['old_psw']);

if($submit) 
{
if($n_em==$n_em2)
{
	$u_check=mysql_query("SELECT u.sifre1 FROM uyeler u,giris g WHERE g.kullanici_adi=u.kullanici_adi AND g.sifre=u.sifre1 AND u.sifre1='$pswd'");
		$check=mysql_num_rows($u_check);
		
		if($check!=0)
		{
	if($n_em&&$n_em2&&$pswd)
	{
		             if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form2")) 
					 {
                                 $updateSQL = sprintf("UPDATE uyeler SET sifre1=%s WHERE kullanici_adi=%s",
                                 GetSQLValueString($_POST['new_psw'], "text"),
                                 GetSQLValueString($_POST['kullaniciAdi'], "text"));
                                 
                                 mysql_select_db($database_varitabanibaglantim, $varitabanibaglantim);
                                 $Result1 = mysql_query($updateSQL, $varitabanibaglantim) or die(mysql_error());
								 
								 $updateSQL = sprintf("UPDATE giris SET sifre=%s WHERE kullanici_adi=%s",
                                 GetSQLValueString($_POST['new_psw'], "text"),
                                 GetSQLValueString($_POST['kullaniciAdi'], "text"));
                                 
                                 mysql_select_db($database_varitabanibaglantim, $varitabanibaglantim);
                                 $Result1 = mysql_query($updateSQL, $varitabanibaglantim) or die(mysql_error());

                                 $updateGoTo = "index.php";
                                 if (isset($_SERVER['QUERY_STRING'])) 
								 {
                                          $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
                                          $updateGoTo .= $_SERVER['QUERY_STRING'];
                                 }
                                 header(sprintf("Location: %s", $updateGoTo));
					 }
					 
	     }
		 else
		 {
			echo "Tum Alanlari Doldurunuz"; 
		 }
      }
	  else
	  {
		  echo "Kullanici Adiyla Sifre uyusmuyor.Tekrar giriniz "; 
		  
	  }
}
else
{
	echo "Yeni sifrenin tekrarini yazarken hata oldu";
	
}
}

mysql_select_db($database_varitabanibaglantim, $varitabanibaglantim);
$query_Recordset1 = "SELECT * FROM uyeler";
$Recordset1 = mysql_query($query_Recordset1, $varitabanibaglantim) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?>
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
$editFormAction1 = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction1 .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}


$degistir=@$_POST['degistir3'];
$ad=strip_tags(@$_POST['isim']);
$soyad=strip_tags(@$_POST['soyisim']);
$em=strip_tags(@$_POST['email']);
$bio=strip_tags(@$_POST['biyografi']);
$kul_ad=strip_tags(@$_POST['kullaniciadi']);


if($degistir) 
{
	

	if($ad&&$soyad&&$bio&&$em)
	{
		             if ((isset($_POST["MM_update1"])) && ($_POST["MM_update1"] == "form3")) 
					 {
                                 $update1SQL = sprintf("UPDATE uyeler SET isim=%s,soyisim=%s,email1=%s,biyografi=%s WHERE kullanici_adi=%s",
                                 GetSQLValueString($_POST['isim'], "text"),
								 GetSQLValueString($_POST['soyisim'], "text"),
								 GetSQLValueString($_POST['email'], "text"),
								 GetSQLValueString($_POST['biyografi'], "text"),
                                 GetSQLValueString($_POST['kullaniciadi'], "text"));
                                 
                                 mysql_select_db($database_varitabanibaglantim, $varitabanibaglantim);
                                 $Result1 = mysql_query($update1SQL, $varitabanibaglantim) or die(mysql_error());
								 
                                 header("Location: profile.php?u=$kul_ad");
								 
					 }
					 
	     }
		 else
		 {
			echo "Tum Alanlari Doldurunuz"; 
		 }

}
mysql_select_db($database_varitabanibaglantim, $varitabanibaglantim);
$query_Recordset1 = "SELECT * FROM uyeler";
$Recordset1 = mysql_query($query_Recordset1, $varitabanibaglantim) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);


?>
<?php 
$degistir1=@$_POST['degistir4'];
$profil=strip_tags(@$_POST['profilpic']);
$kullanici=strip_tags(@$_POST['kullaniciAdi']);


$check_pic=mysql_query("SELECT profil_resmi FROM uyeler WHERE kullanici_adi='$kullanici'");
	$get_pic_row=mysql_fetch_assoc($check_pic);
	$profile_pic_db=$get_pic_row['profil_resmi'];
	if($profile_pic_db == ""){
		$profil_pic="img/images1.jpg";
	}
	else
	{
	$profil_pic="userdata/profile_pics/".$profile_pic_db;	
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
      <a href="index.php">AnaSayfa</a>
      <a href="profile.php?u=<?php  echo $_SESSION['MM_Username'] ?>"><?php  echo $_SESSION['MM_Username'] ?>'in Profili</a>
      <a href="hesap_secenekleri1.php">Hesap Secenekleri</a>
      <a href="<?php echo $logoutAction ?>">Cikis Yap</a>
    </div>
</div>
</div>
<p><br />
  <br />
</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p><br />
</p>
<form action="<?php echo $editFormAction2; ?>" name="form4" id="form4" method="post" enctype="multipart/form-data" >
  <h1><strong>Profil Resmini Sec </strong></h1>
  <p><img src="<?php echo $profil_pic; ?>" width="70" />
  <input type="hidden"  name="kullaniciAdi" id="kullaniciAdi" value="<?php  echo $_SESSION['MM_Username'] ?>" />
  <input type="file" name="profilepic" id="profilpic" /><br />
  <input type="submit" name="degistir4" id="degistir4" value="Resmi Guncelle">
  <input type="hidden" name="MM_update2" value="form4" />
</p>
</form>
<table width="100%" cellspacing="0" cellpadding="0">
  <tr>
    <td width="55%">
    <p>&nbsp;</p>
  <p>SIFRENI DEGISTIRME</p>
<p>&nbsp;</p>
  <p>
  <form id="form2" name="form2" method="post" action="<?php echo $editFormAction; ?>">
    <label for="kullaniciAdi"></label>
    <input type="text" name="kullaniciAdi" id="kullaniciAdi" value="<?php  echo $_SESSION['MM_Username'] ?>" />
  </p>
      <p>
        <input type="password" name="old_psw" id="old_psw" placeholder="Eski Sifre" />
      </p>
<p>
        <label for="new_psw"></label>
        <input type="password" name="new_psw" id="new_psw" placeholder="Yeni Sifre" />
  </p>
<p>
        <label for="new_psw_re"></label>
        <input type="password" name="new_psw_re" id="new_psw_re" placeholder="Yeni Sifre(Tekrar)" />
  </p>
<p>
        <input type="submit" name="degistir" id="degistir" value="Guncelle" />
  </p>
  <input type="hidden" name="MM_update" value="form2" />
  </form>
  <p></td>
    <td width="45%">
    <p>&nbsp;</p>
    <p id="bilgiler"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
    <p>HESAP BİLGİLERİNİ DEGİSTİRME</p>
    <p>&nbsp;</p>
    <p>
    <form id="form3" name="form3" method="post" action="<?php echo $editFormAction1; ?>">
    <p>
        <label for="kullaniciadi"></label>
    <input type="text" name="kullaniciadi" id="kullaniciadi" value="<?php  echo $_SESSION['MM_Username'] ?>" />
        </p>
      <p>
        <label for="isim"></label>
        <input type="text" name="isim" id="isim" placeholder="İsim" value="<?php echo htmlentities($row_Recordset1['isim'], ENT_COMPAT, 'utf-8'); ?>" size="32" />
      </p>
      <p>
        <label for="soyisim"></label>
      <input type="text" name="soyisim" id="soyisim" placeholder="Soyisim" value="<?php echo htmlentities($row_Recordset1['soyisim'], ENT_COMPAT, 'utf-8'); ?>" size="32" />
</p>

    <p>
    <input type="text" name="email" id="email" placeholder="Email" value="<?php echo htmlentities($row_Recordset1['email1'], ENT_COMPAT, 'utf-8'); ?>" size="32" />
    </p>
    <p>
    </p>
    <p>
      <textarea name="biyografi" id="biyografi" rows="7" cols="60" placeholder="Senin Hakkında Bilgerini Gir"></textarea>
    </p>
    <p>
      <input type="submit" name="degistir3" id="degistir3" value="Guncelle" />
    </p>
    <input type="hidden" name="MM_update1" value="form3" />
<p>&nbsp;</p>
</form>
    </td>
  </tr>

</table>

</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
