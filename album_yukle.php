 <?php include("deneme1.php") ?>
<?php 
require_once('Connections/varitabanibaglantim.php');

if(isset($_GET['u'])){
	$kullanici_adi=mysql_real_escape_string($_GET['u']);
	if(ctype_alnum($kullanici_adi)){
	$check=mysql_query("SELECT * FROM albums WHERE created_by='$kullanici_adi'");
	if(mysql_num_rows($check)===1){
		$get=mysql_fetch_assoc($check);
		$username=$get['created_by'];
	}
	else
	{
		//echo "<meta http-equiv=\"refresh\" content=\"0; url=http://localhost:81/SocialNet/anasayfa.php\">";
	    //exit();
	}
	}
	

}  


if(isset($_POST['uploadpic'])) {
	if(((@$_FILES["profilepic"]["type"]=="image/jpeg") || (@$_FILES["profilepic"]["type"]=="image/png") || (@$_FILES["profilepic"]["type"]=="image/gif"))&&($_FILES["profilepic"]["size"] < 1048576))
{
	$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
	$rand_dir_name = substr(str_shuffle($chars), 0, 15);
	mkdir("userdata/user_albums/$rand_dir_name");
	
	if(file_exists("userdata/user_albums/$rand_dir_name/".@$_FILES["profilepic"]["name"]))
	{
	echo @$_FILES["profilepic"]["name"]." Already exists";
	}
	else
	{
		
		move_uploaded_file(@$_FILES["profilepic"]["tmp_name"],"userdata/user_albums/$rand_dir_name/".$_FILES["profilepic"]["name"]);
		//echo "Yüklendi ve Suraya depolandi:  userdata/profile_pics/$rand_dir_name/".@$_FILES["profilepic"]["name"];
		$profile_pic_name = @$_FILES["profilepic"]["name"];
		$description=strip_tags(@$_POST['description']);
		$uid=strip_tags(@$_POST['uid']);
		$img_id_before_md5 = "$rand_dir_name/$profile_pic_name";
		$img_id = md5($img_id_before_md5);
		$date = date("Y-m-d");
		$query = mysql_query("INSERT INTO albums VALUES ('','$description','','$kullanici_adi','$date','$uid','hayir','http://localhost:81/SocialNet/userdata/user_albums/$rand_dir_name/$profile_pic_name')");
		
		header("Location: albumleri_gor.php?u=$kullanici_adi");
	}
}
}
?>
<h3 align="right"><a href="albumleri_gor.php?u=<?php echo $kullanici_adi;
 ?>" name="geri_gitme" id="geri_gitme">Geri Git <img src="img/ikonlar/arrow_left_32.png" /></a></h3>
<h2>RESIMLERINI YUKLE :</h2>
<hr />
<form action="" method="post" enctype="multipart/form-data">
<input type="file" name="profilepic" id="profilpic" /><p />
<input type="text" name="description" id="description" value="Acıklama" /><p />
<input type="text" name="uid" id="uid" value="Albumun Kisa Adi" />
<input type="submit" name="uploadpic" id="uploadpic" value="Resmi Ekle">
</form>