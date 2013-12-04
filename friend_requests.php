<?php 
include("deneme1.php") 
?>
<?php 
require_once('Connections/varitabanibaglantim.php'); 
?>
<?php  
if(isset($_SESSION['MM_Username'])){
	$kullanici = $_SESSION['MM_Username'];
}
else {
	$kullanici="";
}
$friendRequests = mysql_query("SELECT * FROM friend_requests WHERE user_to='$kullanici'");
$numrows = mysql_num_rows($friendRequests);
if($numrows == 0) {
	echo "Arkadaslik Istegin Yok";
}
else
{
	while($get_row = mysql_fetch_assoc($friendRequests)) {
		$id = $get_row['id'];
		$user_to = $get_row['user_to'];
		$user_from = $get_row['user_from'];
		
		echo '' . $user_from . ' arkadas olmak istiyor';
	}
}
?>
<?php
if(isset($_POST['acceptrequest'.$user_from])) {
	$get_friend_check = mysql_query("SELECT arkadas_dizisi FROM uyeler WHERE kullanici_adi='$kullanici'");
	$get_friend_row = mysql_fetch_assoc($get_friend_check);
	$friend_array = $get_friend_row['arkadas_dizisi'];
	$friendArray_explode = explode(",",$friend_array);
	$friendArray_count = count('$friendArray_explode');
	
	$get_friend_check_friend = mysql_query("SELECT arkadas_dizisi FROM uyeler WHERE kullanici_adi='$user_from'");
	$get_friend_row_friend = mysql_fetch_assoc($get_friend_check_friend);
	$friend_array_friend = $get_friend_row_friend['arkadas_dizisi'];
	$friendArray_explode_friend = explode(",",$friend_array_friend);
	$friendArray_count_friend = count($friendArray_explode_friend);
	
	if($friend_array == "") {
		$friendArray_count = count(NULL);
	}
	if($friend_array_friend == "") {
		$friendArray_count_friend = count(NULL);
	}
	if($friendArray_count == NULL) {
		$add_friend_query = mysql_query("UPDATE uyeler SET arkadas_dizisi=CONCAT(arkadas_dizisi,'$user_from') WHERE kullanici_adi='$kullanici'");
	}
	if($friendArray_count_friend == NULL) {
		$add_friend_query = mysql_query("UPDATE uyeler SET arkadas_dizisi=CONCAT(arkadas_dizisi,'$user_to') WHERE kullanici_adi='$user_from'");
	}
	if($friendArray_count_friend >= 1) {
		$add_friend_query = mysql_query("UPDATE uyeler SET arkadas_dizisi=CONCAT(arkadas_dizisi,',$user_from') WHERE kullanici_adi='$kullanici'");
	}
	if($friendArray_count_friend >= 1) {
	$add_friend_query = mysql_query("UPDATE uyeler SET arkadas_dizisi=CONCAT(arkadas_dizisi,',$user_to') WHERE kullanici_adi='$user_from'");
	}
	echo "Sen simdi arkadasisin";
	
}
?>
<form action="friend_requests.php" method="post">
<input type="submit" name="acceptrequest<?php echo $user_from; ?>" value="Istegi KabulEt" />
<input type="submit" name="ignorerequest<?php echo $user_from; ?>" value="Istegi Reddet" 
/>
</form>