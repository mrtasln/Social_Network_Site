<?php include("deneme1.php") ?>
<?php require_once('Connections/varitabanibaglantim.php'); ?>

<div id="status"></div>
<div class="postForm">
<form action="profile.php?u=<?php  echo $_SESSION['MM_Username'] ?>" method="post">
<textarea id="post" name="post" rows="5" cols="251"></textarea>
<input type="submit" name="send" value="Post" style="background-color:#DCE5EE; float:right; border: 1px solid #666; color:#666; height:73px; width:65px;" />
</form>
</div>
<div class="profilePosts">
<?php 
/*$getposts=mysql_query("SELECT * FROM posts WHERE user_posted_to='$kullanici_adi' ORDER BY");
while($row = mysql_fetch_assoc($getposts)) {
	                                       $id=$row['id'];
										   $body=$row['body'];
										   $date_added=$row['date_added'];
										   $added_by=$row['user_posted_to'];
										   
										   echo "
										   <div class='posted_by'><a href='$added_by'
										   ";
}
	*/									    
?>
</div>
<img src="<?php echo $profil_pic; ?>" height="250" width="200" alt="<?php echo $kullanici_adi; ?>'in Profili" title="<?php echo $kullanici_adi; ?>'in Profili" />
<br />
<div class="textHeader"><?php echo $kullanici_adi; ?>'in Profili</div>
<div class="profileLeftSideContent">
<?php
$about_query=mysql_query("SELECT biyografi FROM uyeler WHERE kullanici_adi='$kullanici_adi'");
$get_result=mysql_fetch_assoc($about_query);
$about_the_user=$get_result['biyografi'];

echo $about_the_user;
?>
</div>
<div class="textHeader"><?php echo $kullanici_adi; ?>'in Arkadaslari</div>
<div class="profileLeftSideContent">
<img src="#" height="50" width="40"/>&nbsp;&nbsp;
<img src="#" height="50" width="40"/>&nbsp;&nbsp;
<img src="#" height="50" width="40"/>&nbsp;&nbsp;
<img src="#" height="50" width="40"/>&nbsp;&nbsp;
<img src="#" height="50" width="40"/>&nbsp;&nbsp;
<img src="#" height="50" width="40"/>&nbsp;&nbsp;
<img src="#" height="50" width="40"/>&nbsp;&nbsp;
<img src="#" height="50" width="40"/>&nbsp;&nbsp;
</div>