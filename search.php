<?php
include ("deneme1.php");
?>
<?php
$arama=mysql_real_escape_string($_GET['q']);
?>

<div class="newsFeed" id="newsFeed" align="center">
<h2>
<img src="img/ikonlar/Users.png" align="middle" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;UYELER</h2>
</div>
<br /><br />
<?php

$getposts=mysql_query("SELECT * FROM uyeler WHERE isim LIKE '$arama%' || soyisim LIKE '$arama%' ") or die(mysql_error());
while($row = mysql_fetch_assoc($getposts)) {
	                                       $kullanici_adi=$row['kullanici_adi'];
										   $isim=$row['isim'];
										   $soyisim=$row['soyisim'];
										   $profil_resmi=$row['profil_resmi'];

										   ?>
										   
										   <?php
										   
										   echo "
										   <div class='newsFeedPost'>
										   <div style='float: left;'><br />
										   <a href='profile.php?u=$kullanici_adi'><img src='userdata/profile_pics/$profil_resmi' height='60'></a>
										   </div>
										   <div class='posted_by'><br /><br /><br />
										   <a href='profile.php?u=$kullanici_adi'>&nbsp;$isim $soyisim</a><br />  <br /></div> 
										   <br /><br />
										   <div style='max-width: 600px;'>
										   <br /><br /><br /><br />
										   </div>
										   
										   <hr />
										   </div>
										   ";
}
	
?> 
