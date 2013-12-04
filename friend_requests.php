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