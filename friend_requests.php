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
	$user_from = "";
}
else
{
	while($get_row = mysql_fetch_assoc($friendRequests)) {
		$id = $get_row['id'];
		$user_to = $get_row['user_to'];
		$user_from = $get_row['user_from'];
		
		echo '' . $user_from . ' arkadas olmak istiyor'.'<br />';
		

?>

<?php
if(isset($_POST['acceptrequest'.$user_from])) {
	$get_friend_check = mysql_query("SELECT arkadas_dizisi FROM uyeler WHERE kullanici_adi='$kullanici'");
	$get_friend_row = mysql_fetch_assoc($get_friend_check);
	$friend_array = $get_friend_row['arkadas_dizisi'];
	$friendArray_explode = explode(",",$friend_array);
	$friendArray_count = count('$friendArray_explode');
	
	$add_friend_check_username = mysql_query("SELECT arkadas_dizisi FROM uyeler WHERE kullanici_adi='$user_from'");
	$get_friend_row_username = mysql_fetch_assoc($add_friend_check_username);
	$friend_array_username = $get_friend_row_username['arkadas_dizisi'];
	$friendArray_explode_username = explode(",",$friend_array_username);
	$friendArray_count_username = count($friendArray_explode_username);
	echo $friendArray_count_username." Number for friend ($user_from)<br />";
	echo $friendArray_count." Number for logged in User ($kullanici)<br />";
	
	if($friend_array == "") {
		$friendArray_count = count(NULL);
	}
	if($friend_array_username == "") {
		$friendArray_count_friend = count(NULL);
	}
	if($friendArray_count == NULL) {
		$add_friend_query = mysql_query("UPDATE uyeler SET arkadas_dizisi=CONCAT(arkadas_dizisi,'$user_from') WHERE kullanici_adi='$kullanici'");
	}
	if($friendArray_count_username == NULL) {
		$add_friend_query = mysql_query("UPDATE uyeler SET arkadas_dizisi=CONCAT(arkadas_dizisi,'$user_to') WHERE kullanici_adi='$user_from'");
	}
	if($friendArray_count >= 1) {
		$add_friend_query = mysql_query("UPDATE uyeler SET arkadas_dizisi=CONCAT(arkadas_dizisi,',$user_from') WHERE kullanici_adi='$kullanici'");
	}
	if($friendArray_count_username >= 1) {
	$add_friend_query = mysql_query("UPDATE uyeler SET arkadas_dizisi=CONCAT(arkadas_dizisi,',$user_to') WHERE kullanici_adi='$user_from'");
	}
	$delete_requests = mysql_query("DELETE FROM friend_requests WHERE user_to='$user_to'&&user_from='$user_from'");
	echo "Arkadaslik Istegi Kabul Edildi";
	header("Location: friend_requests.php");

}
if(isset($_POST['ignorerequest'.$user_from])) {
	$delete_requests = mysql_query("DELETE FROM friend_requests WHERE user_to='$user_to'&&user_from='$user_from'");
	echo "Arkadaslik Istegi reddedildi";
	header("Location: friend_requests.php");
}
?>

<form action="friend_requests.php" method="post">
<input type="submit" name="acceptrequest<?php echo $user_from; ?>" value="Istegi KabulEt" />
<input type="submit" name="ignorerequest<?php echo $user_from; ?>" value="Istegi Reddet" />
</form>
<?php 
	}
}
?>