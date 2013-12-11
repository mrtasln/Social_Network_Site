<?php include("deneme1.php") ?>
<?php require_once('Connections/varitabanibaglantim.php'); ?>

<?php
if(isset($_SESSION['MM_Username'])){
	$kullanici = $_SESSION['MM_Username'];
}
else {
	$kullanici="";
}

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
		echo "<meta http-equiv=\"refresh\" content=\"0; url=http://localhost:81/SocialNet/index.php\">";
	    exit();
	}
	}
}

/*$post = @$_POST['post'];
	if($post != "") {
		$date_added = date("Y-m-d");
		$added_by= $kullanici_adi;
		$user_posted_to = "test123";
		
		$sqlCommand = "INSERT INTO posts VALUES('','$post','$date_added','$added_by','$user_posted_to')";
		$query=mysql_query($sqlCommand) or die (mysql_error());
	*/

	
	$check_pic=mysql_query("SELECT profil_resmi FROM uyeler WHERE kullanici_adi='$kullanici_adi'");
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

if(isset($_POST['sendmsg'])) {
header("Location: send_msg.php?u=$kullanici_adi");	
}

$errorMsg = "";
if(isset($_POST['addfriend'])) {
	$friend_request = $_POST['addfriend'];
	
	$user_to = $kullanici;
	$user_from = $kullanici_adi;
	
	if($user_to == $kullanici_adi) {
		$errorMsg="<br />Sen Kendine Arkadaslik Istegi Gonderemezsin<br />";
	}
	else
	{
	     $create_request = mysql_query("INSERT INTO friend_requests VALUES ('','$user_to','$user_from')");	
		 $errorMsg = "<br />Senin Arkadaslik Istegin Gonderildi<br />";
	}
}
else
{
	
}
?>
</div>
<img src="<?php echo $profil_pic; ?>" height="250" width="200" alt="<?php echo $kullanici_adi; ?>'in Profili" title="<?php echo $kullanici_adi; ?>'in Profili" />
<br />
<form action="profile.php?u=<?php  echo $kullanici_adi; ?>" method="post">
<?php
$friendArray = "";
$countFriends = "";
$friendsArray12 = "";
$addAsFriend = "";
$selectFriendsQuery = mysql_query("SELECT arkadas_dizisi FROM uyeler WHERE kullanici_adi='$kullanici_adi'");
$friendRow = mysql_fetch_assoc($selectFriendsQuery);
$friendArray = $friendRow['arkadas_dizisi'];
if($friendArray != "") {
	$friendArray = explode(",",$friendArray);
	$countFriends = count($friendArray);
	$friendsArray12 = array_slice($friendArray, 0, 12);
$i = 0;
if(in_array($kullanici,$friendArray)) {
	$addAsFriend = '<input type="submit" name="removefriend" value="Arkadas Cikar">';
}
else
{
	$addAsFriend = '<input type="submit" name="addfriend" value="Arkadas Ekle">';
}
echo $addAsFriend;
}
else
{
	$addAsFriend = '<input type="submit" name="addfriend" value="Arkadas Ekle">';
	echo $addAsFriend;
}
if(@$_POST['removefriend']) {
	  $add_friend_check = mysql_query("SELECT arkadas_dizisi FROM uyeler WHERE kullanici_adi='$kullanici'");
	  $get_friend_row = mysql_fetch_assoc($add_friend_check);
	  $friend_array = $get_friend_row['arkadas_dizisi'];
	  $friend_array_explode = explode(",",$friend_array);
	  $friend_array_count = count($friend_array_explode); 
	  
	  $add_friend_check_username = mysql_query("SELECT arkadas_dizisi FROM uyeler WHERE kullanici_adi='$kullanici_adi'");
	  $get_friend_row_username = mysql_fetch_assoc($add_friend_check_username);
	  $friend_array_username = $get_friend_row_username['arkadas_dizisi'];
	  $friend_array_explode_username = explode(",",$friend_array_username);
	  $friend_array_count_username = count($friend_array_explode_username); 
	  
	  $usernameComma = ",".$kullanici_adi;
	  $usernameComma2 = $kullanici_adi.",";
	  
	  $userComma = ",".$kullanici;
	  $userComma2 = $kullanici.",";
	  
	  if(strstr($friend_array,$usernameComma)) {
		  $friend1 = str_replace("$usernameComma","",$friend_array);
	  }
	  else
	  if(strstr($friend_array,$usernameComma2)) {
		  $friend1 = str_replace("$usernameComma2","",$friend_array);
	  }
	  else
	  if(strstr($friend_array,$kullanici_adi)) {
		  $friend1 = str_replace("$kullanici_adi","",$friend_array);
	  }
	  
	  if(strstr($friend_array,$userComma)) {
		  $friend2 = str_replace("$userComma","",$friend_array);
	  }
	  else
	  if(strstr($friend_array,$userComma2)) {
		  $friend2 = str_replace("$userComma2","",$friend_array);
	  }
	  else
	  if(strstr($friend_array,$kullanici)) {
		  $friend2 = str_replace("$kullanici","",$friend_array);
	  }
	  
	  $friend2 = "";
	  
	  $removeFriendQuery = mysql_query("UPDATE uyeler SET arkadas_dizisi='$friend1' WHERE kullanici_adi='$kullanici'");
	  $removeFriendQuery_username = mysql_query("UPDATE uyeler SET arkadas_dizisi='$friend2' WHERE kullanici_adi='$kullanici_adi'");
	  echo "Arkadas Cikarildi...";
	  header("Location: profile.php?u=$kullanici_adi");
		
}
	
?>
<?php
echo $errorMsg;
?>
<input type="submit" name="sendmsg" value="Mesaj Gonder" />
</form>
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
<?php
if($countFriends != 0){
	foreach($friendsArray12 as $key => $value) {
		$i++;
		$getFriendQuery = mysql_query("SELECT * FROM uyeler WHERE kullanici_adi='$value' LIMIT 1");
		$getFriendRow = mysql_fetch_assoc($getFriendQuery);
		$friendUsername = $getFriendRow['kullanici_adi'];
		$friendProfilePic = $getFriendRow['profil_resmi'];
		
		if($friendProfilePic == "") {
			echo "<a href='profile.php?u=$friendUsername'><img src='img/images.jpg' alt=\"$friendUsername'in Profili\" title=\"$friendUsername'in Profili\" height='50' width='40' style='padding-right: 6px;'></a>";
		}
		else
		{
			echo "<a href='profile.php?u=$friendUsername'><img src='userdata/profile_pics/$friendProfilePic' alt=\"$friendUsername'in Profili\" title=\"$friendUsername'in Profili\" height='50' width='40' style='padding-right: 6px;'></a>";
		}
	}
	
}
else
echo $kullanici_adi."henuz arkadasa sahip degil";
?>
</div>

