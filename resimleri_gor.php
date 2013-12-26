 <?php include("deneme1.php") ?>
<?php 
require_once('Connections/varitabanibaglantim.php'); 

if(isset($_GET['uid'])){
	$picture=mysql_real_escape_string($_GET['uid']);
	if(ctype_alnum($picture)){
	$check=mysql_query("SELECT * FROM photos WHERE uid='$picture'");
	if(mysql_num_rows($check)===1){
		$get=mysql_fetch_assoc($check);
		$uid=$get['uid'];
		$username=$get['username'];
	}
	else
	{
		//echo "<meta http-equiv=\"refresh\" content=\"0; url=http://localhost:81/SocialNet/anasayfa.php\">";
	    //exit();
	}
	}
	

}  
?>
<h3 align="right">
<a href="albumleri_gor.php?u=<?php
$picture1=mysql_real_escape_string($_GET['uid']);
	$check1=mysql_query("SELECT * FROM albums WHERE uid='$picture1'");
		$get1=mysql_fetch_assoc($check1);
		$username1=$get1['created_by'];
		echo $username1;
 ?>" name="geri_gitme" id="geri_gitme">Geri Git <img src="img/ikonlar/arrow_left_32.png" /></a><br />
&nbsp;
<?php 
if($kullanici==$username1)
{
?>
<a href="resim_yukle.php?uid=<?php echo $picture; ?>"><img src="img/ikonlar/add_16.png" width="32" height="22" /><input type="button" name="resim_yukle" id="resim_yukle" value="Resim Yukle" /></a></h3>
<?php
}
?>
<h2>Bu Albumdeki Resimler:</h2>
<hr />
<table>
<tr>
<?php
$get_photos = mysql_query("SELECT * FROM photos WHERE uid='$picture' && removed='hayir'");
$numrows = mysql_num_rows($get_photos);
while($row = mysql_fetch_assoc($get_photos)) {
	$id = $row['id'];
    $uid = $row['uid'];
	$username = $row['username'];
	$date_posted=$row['date_posted'];
	$description=$row['description'];
	$image_url=$row['image_url'];
	$img_id=$row['img_id'];
	
	$md5_image = md5($image_url);
	
	if(isset($_POST['remove_photo_' . $md5_image . ''])) {
		$remove_photo = mysql_query("UPDATE photos SET removed='evet' WHERE uid='$uid' && img_id='$img_id'");
		header("Location: resimleri_gor.php?uid=$uid");
	}
	
	echo "
	<td>
	<div class='albums'>
	<img src='$image_url' height='170' width='170'><br><br>
	$description
	</div>
	<center>
	<form method='post' action='./resimleri_gor.php?uid=$uid'>
	<input type='submit' name='remove_photo_$md5_image' value='Albumden Cıkar'>
	<input type='image' src='img/ikonlar/close_16.png' height='18' width='22' name='remove_photo_$md5_image' value='Albumu Cıkar' />
	</form>
	</center>
	</td>
	";
}
?>
</tr>
</table> 



