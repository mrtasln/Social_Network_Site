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
     <img alt="imlec" src="img/Z.png">
   </div>
   <div class="search_box">
        <form method="GET" action="search.php" id="search">
        <input name="q" type="text" size="60" placeholder="search . . ." />
        </form>
    </div>
     
    <div id="menu">
    </div>
</div>
</div>
<p><br />
  <br />
</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p><br />
  <br />
</p>
<table width="100%" class="homepageTable">
        <tr>
          <td width="1%" valign="top">&nbsp;</td>
             <td width="99%" valign="top">
             <a href="anasayfa.php">
           <h1 id="x">Sitemize Hoş Geldiniz</h1>
           <h1 id="x">Guzel vakitler gecirmenizi temenni ederiz </h1>
           <?php echo "<meta http-equiv=\"refresh\" content=\"1; url=http://localhost:81/SocialNet/anasayfa.php\">"; ?>
           </a>             
           </td>
        </tr>
        <tr>
          <td valign="top">&nbsp;</td>
          <td valign="top">&nbsp;</td>
        </tr>
</table>
</body>
</html> 