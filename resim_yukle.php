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


if(isset($_POST['uploadpic'])) {
	if(((@$_FILES["profilepic"]["type"]=="image/jpeg") || (@$_FILES["profilepic"]["type"]=="image/png") || (@$_FILES["profilepic"]["type"]=="image/gif"))&&($_FILES["profilepic"]["size"] < 1048576))
{
	$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
	$rand_dir_name = substr(str_shuffle($chars), 0, 15);
	mkdir("userdata/user_photos/$rand_dir_name");
	
	if(file_exists("userdata/user_photos/$rand_dir_name/".@$_FILES["profilepic"]["name"]))
	{
	echo @$_FILES["profilepic"]["name"]." Already exists";
	}
	else
	{
		$get_photos = mysql_query("SELECT * FROM photos WHERE uid='$picture' && removed='hayir'");
        $numrows = mysql_num_rows($get_photos);
        while($row = mysql_fetch_assoc($get_photos)) {
        $uid = $row['uid'];
		}
		
		
		move_uploaded_file(@$_FILES["profilepic"]["tmp_name"],"userdata/user_photos/$rand_dir_name/".$_FILES["profilepic"]["name"]);
		//echo "Yüklendi ve Suraya depolandi:  userdata/profile_pics/$rand_dir_name/".@$_FILES["profilepic"]["name"];
		$profile_pic_name = @$_FILES["profilepic"]["name"];
		$description=strip_tags(@$_POST['description']);
		$img_id_before_md5 = "$rand_dir_name/$profile_pic_name";
		$img_id = md5($img_id_before_md5);
		$date = date("Y-m-d");
		$query = mysql_query("INSERT INTO photos VALUES ('','$picture','$kullanici','$date','$description','http://localhost:81/SocialNet/userdata/user_photos/$rand_dir_name/$profile_pic_name','hayir','$img_id')");
		
		header("Location: resimleri_gor.php?uid=$picture");
	}
}
}
?>
<h3 align="right"><a href="resimleri_gor.php?uid=<?php
$get_photos = mysql_query("SELECT * FROM photos WHERE uid='$picture' && removed='hayir'");
        $numrows = mysql_num_rows($get_photos);
        while($row = mysql_fetch_assoc($get_photos)) {
        $uid = $row['uid'];
		}
 //echo $uid;
 echo $picture; ?>" name="geri_gitme" id="geri_gitme">Geri Git <img src="img/ikonlar/arrow_left_32.png" /></a></h3>
<h2>RESIMLERINI YUKLE :</h2>
<hr />
<form action="" method="post" enctype="multipart/form-data">
<input type="file" name="profilepic" id="profilpic" /><p />
<input type="text" name="description" id="description" value="Acıklama" />
<input type="submit" name="uploadpic" id="uploadpic" value="Resmi Ekle">
</form>