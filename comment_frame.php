<?php
session_start();
if(isset($_SESSION['MM_Username'])){
	$kullanici = $_SESSION['MM_Username'];
}
else {
	$kullanici="";
}
?>
<style>
* {
	font-size: 12px;
	font-family: Arial, Helvetica, sans-serif;
}
hr {
	background-color: #DCE5EE;
	height: 1px;
	border: 0px;
	
}
</style>

<?php require_once('Connections/varitabanibaglantim.php'); ?>
<?php
$getid = $_GET['id'];
?>
<script language="javascript">
function toggle<?php echo $getid; ?>() {
	var ele = document.getElementById("toggleComment<?php echo $getid; ?>");
	var text = document.getElementById("displayComment<?php echo $getid; ?>");
	if(ele.style.display == "block") {
		ele.style.display = "none";
	}
	else
	{
		ele.style.display = "block";
	}
}

</script>

<?php
if(isset($_POST['postComment' . $getid . ''])) {
	$post_body = $_POST['post_body'];
	$posted_to = "Aslan";
$insertPost = mysql_query("INSERT INTO post_comments VALUES ('','$post_body','$kullanici','$posted_to','0','$getid')");
echo "<script>alert('Yorum Yapildi')</script>";
}
?>

<a href="javascript:;" onclick="javascript:toggle<?php echo $getid; ?>()"><div style='float: right; display: inline;'><img src="img/ikonlar/comment.png" height="18" width="26" />Yorum yap</div></a>
<div id='toggleComment<?php echo $getid; ?>' style="display: none;">
<form action="comment_frame.php?id=<?php echo $getid; ?>" method="post" name="postComment<?php echo $getid; ?>">
Yorum Yazacaksaniz Assagi Giriniz : <br />
<textarea rols="50" cols="50" style="height: 90px;" name="post_body"></textarea>
<input type="submit" name="postComment<?php echo $getid; ?>" value="Yorum Yap" />
</form>
</div>
<?php

$get_comments = mysql_query("SELECT * FROM post_comments WHERE post_id='$getid' ORDER BY id DESC");
$count = mysql_num_rows($get_comments);
if($count != 0) {
while ($comment = mysql_fetch_assoc($get_comments)) {
										   
$comment_body=$comment['post_body'];
$posted_to=$comment['posted_to'];
$posted_by=$comment['posted_by'];
$removed=$comment['post_removed'];

$user1=$_SESSION['MM_Username'];
$sorgu = mysql_query("SELECT * FROM uyeler WHERE kullanici_adi='$posted_by'");
$get=mysql_fetch_assoc($sorgu);
$isim1=$get['isim'];
$soyisim1=$get['soyisim'];

echo "<b>$isim1 $soyisim1 yorum yaptı: </b><br />".$comment_body."<hr /><br>";	
}
}
else
{
	echo "<center><br><br>Sergilenecek yorum yok</center>";
}

?>