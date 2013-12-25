 <?php include("deneme1.php") ?>
<?php 
require_once('Connections/varitabanibaglantim.php'); 

if(isset($_GET['u'])){
	$kullanici_adi=mysql_real_escape_string($_GET['u']);
	if(ctype_alnum($kullanici_adi)){
	$check=mysql_query("SELECT kullanici_adi,isim FROM uyeler WHERE kullanici_adi='$kullanici_adi'");
	if(mysql_num_rows($check)===1){
		$get=mysql_fetch_assoc($check);
		$kullanici_adi=$get['kullanici_adi'];
		$isim=$get['isim'];
	}
	else
	{
		//echo "<meta http-equiv=\"refresh\" content=\"0; url=http://localhost:81/SocialNet/anasayfa.php\">";
	    //exit();
	}
	}
	
}

?>
<h3 align="right"><a href="profile.php?u=<?php echo $kullanici_adi; ?>" name="geri_gitme" id="geri_gitme">Geri Git <img src="img/ikonlar/arrow_left_32.png" /></a><br />
&nbsp;
<?php
if($kullanici==$kullanici_adi)
{
	?>
<a href="album_yukle.php?u=<?php echo $kullanici_adi; ?>"><img src="img/ikonlar/Add.png" width="32" height="22" />
<input type="button" name="resim_yukle" id="resim_yukle" value="Album Olustur" /></a></h3>
<?php
}
?>
<h2><?php
	  $user=mysql_real_escape_string($_GET['u']);
	  $sorgu = mysql_query("SELECT * FROM uyeler WHERE kullanici_adi='$user'");
		$get=mysql_fetch_assoc($sorgu);
		$isim=$get['isim'];
		$soyisim=$get['soyisim'];
	    echo $isim." ".$soyisim." Tarafindan Olusturulan"; ?> Albumler:</h2><hr />
<table>
<tr>
<?php
$get_albums = mysql_query("SELECT * FROM albums WHERE created_by='$kullanici_adi' && removed='hayir'");
$numrows = mysql_num_rows($get_albums);
while($row = mysql_fetch_assoc($get_albums)) {
	$id = $row['id'];
	$album_title = $row['album_title'];
	$album_description = $row['album_description'];
	$created_by = $row['created_by'];
	$date = $row['date_created'];
	$uid = $row['uid'];
	$album_url = $row['album_url'];
	
	$md5_album = md5($album_url);
	
	if(isset($_POST['remove_album_' . $md5_album . ''])) {
	$remove_album = mysql_query("UPDATE albums SET removed='evet' WHERE uid='$uid'");
	header("Location: albumleri_gor.php?u=$kullanici");
	}
	
	
	echo "
	<td>
	<div class='albums'>
	<a href='resimleri_gor.php?uid=$uid'>
	<img src='$album_url' height='170' width='170'><br><br>
	$album_title<br /><br />
	</a>
	<center>
	<form method='post' action='./albumleri_gor.php?u=$kullanici'>
	<input type='submit' name='remove_album_$md5_album' value='Albumu Sil' />
	<input type='image' src='img/ikonlar/close_16.png' height='18' width='22' name='remove_album_$md5_album' value='Albumu Sil' />
	</form>
	</center>
	</div>
	</td>
	";
}
?>
</tr>
</table>
