<?php 
require_once('Connections/varitabanibaglantim.php'); 
?>

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

if(isset($_SESSION['MM_Username'])){
	$kullanici = $_SESSION['MM_Username'];
}
else {
	$kullanici="";
}

$get_unread_query = mysql_query("SELECT opened FROM pvt_messages WHERE user_to='$kullanici' && opened='hayir'");
$get_uread = mysql_fetch_assoc($get_unread_query);
$unread_numrows = mysql_num_rows($get_unread_query);
if($unread_numrows != 0)
{
$unread_numrows = "(".$unread_numrows.")";
}
else
{
$unread_numrows = "";	
}

$MM_authorizedUsers = "";
$MM_donotCheckaccess = "true";

// *** Restrict Access To Page: Grant or deny access to this page
function isAuthorized($strUsers, $strGroups, $UserName, $UserGroup) { 
  // For security, start by assuming the visitor is NOT authorized. 
  $isValid = False; 

  // When a visitor has logged into this site, the Session variable MM_Username set equal to their username. 
  // Therefore, we know that a user is NOT logged in if that Session variable is blank. 
  if (!empty($UserName)) { 
    // Besides being logged in, you may restrict access to only certain users based on an ID established when they login. 
    // Parse the strings into arrays. 
    $arrUsers = Explode(",", $strUsers); 
    $arrGroups = Explode(",", $strGroups); 
    if (in_array($UserName, $arrUsers)) { 
      $isValid = true; 
    } 
    // Or, you may restrict access to only certain users based on their username. 
    if (in_array($UserGroup, $arrGroups)) { 
      $isValid = true; 
    } 
    if (($strUsers == "") && true) { 
      $isValid = true; 
    } 
  } 
  return $isValid; 
}

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
        <a id="istekler" href="friend_requests.php">&nbsp;&nbsp;&nbsp;&nbsp;<img src="img/ikonlar/users_32.png" height="15" width="26" />Arkadaslik Istekleri</a>
        </form>
    </div>
    <div id="menu">
    
      <a href="anasayfa.php"><img src="img/ikonlar/home.png" height="15" width="26" />AnaSayfa</a>
      <a href="profile.php?u=<?php echo $_SESSION['MM_Username'] ?>"><img src="img/ikonlar/user_blue_32.png" height="15" width="26" /><?php
	  $user=$_SESSION['MM_Username'];
	  $sorgu = mysql_query("SELECT * FROM uyeler WHERE kullanici_adi='$user'");
		$get=mysql_fetch_assoc($sorgu);
		$isim=$get['isim'];
		$soyisim=$get['soyisim'];
	    echo $isim; echo " "; echo $soyisim; ?>'in Profili</a>
      <a href="hesap_secenekleri1.php"><img src="img/ikonlar/Settings.png" height="15" width="26" />Hesap Secenekleri</a>
      <a href="mesajlarim.php"><img src="img/ikonlar/mesaj1.png" height="15" width="26" />Mesajlarım <?php echo $unread_numrows; ?></a>
      <a href="durtme_sayfasi.php">Durtmelerim</a>
      <a href="<?php echo $logoutAction ?>"><img src="img/ikonlar/user_close_32.png" height="15" width="26" />Cikis Yap</a>
    </div>
</div>
</div>
<br />
<br />
<br />
<br />
