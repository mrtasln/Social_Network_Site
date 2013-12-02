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
      <a href="index.php">Anasayfa</a>
      <a href="#"><?php  echo $_SESSION['MM_Username'] ?>'in Profili</a>
      <a href="hesap_secenekleri1.php">Hesap Secenekleri</a>
      <a href="#">Cikis Yap</a>
  
    </div>
</div>
</div>
<p><br />
  <br />
  <br />
  <br />
</p>
<form id="form2" name="form2" method="post" action="<?php echo $editFormAction; ?>">
  
  <p>&nbsp;</p>
  <p>SIFRENI DEGISTIR</p>
<p>&nbsp;</p>
  <p>
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
  <p>
    <input type="hidden" name="MM_update" value="form2" />
  </p>
</form>
<p>&nbsp; </p>
</body>
</html>