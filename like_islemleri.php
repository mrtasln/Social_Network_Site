<link rel="stylesheet" type="text/css" href="./css/main.css">
<?php
session_start();
if(isset($_SESSION['MM_Username'])){
	$kullanici = $_SESSION['MM_Username'];
}
else {
	$kullanici="";
}
  
require_once('Connections/varitabanibaglantim.php');
$id = "";
$total_likes = 0;
if(isset($_GET['uid'])){
	$uid=mysql_real_escape_string($_GET['uid']);
	if(ctype_alnum($uid)){
$get_likes = mysql_query("SELECT * FROM likes WHERE uid='$uid'");
if(mysql_num_rows($get_likes)===1){
		$get=mysql_fetch_assoc($get_likes);
		$uid=$get['uid'];
		$total_likes=$get['total_likes'];
		$total_likes = $total_likes + 1;
		$remove_likes = $total_likes - 2;
	}
	else
	{
		die("Hata ...");
	}
if(isset($_POST['likebutton_'])) {
$like = mysql_query("UPDATE likes SET total_likes='$total_likes' WHERE uid='$uid'");
$user_likes = mysql_query("INSERT INTO user_likes VALUES ('','$kullanici','$uid')");
header("Location: like_islemleri.php?uid=$uid");
}
if(isset($_POST['unlikebutton_'])) {
$like = mysql_query("UPDATE likes SET total_likes='$remove_likes' WHERE uid='$uid'");
$remove_user = mysql_query("DELETE FROM user_likes WHERE username='$kullanici' AND uid='$uid'");
header("Location: like_islemleri.php?uid=$uid");
}
	}
}

if($kullanici!=$uid)
{
$check_for_likes = mysql_query("SELECT * FROM user_likes WHERE username='$kullanici' AND uid='$uid'");
$numrows_likes = mysql_num_rows($check_for_likes);
if($numrows_likes >=1) {
	echo '
	<form action="like_islemleri.php?uid=' . $uid . '" method="post">
    <input type="submit" name="unlikebutton_' . $id . '" value="Begenme">
    <div style="display: inline;">
    ' . $total_likes . ' begeni
    </div>
    </form>
	';
}
else if ($numrows_likes == 0) {
echo '
<form action="like_islemleri.php?uid=' . $uid . '" method="post">
<input type="submit" name="likebutton_' . $id . '" value="Begen">
<div style="display: inline;">
' . $total_likes . ' begeni
</div>
</form>
';
}
}
else
{
	echo '
<form action="like_islemleri.php?uid=' . $uid . '" method="post">
<div style="display: inline;">
<h2>' . $total_likes . ' begeni</h1>
</div>
</form>
';
}
?>