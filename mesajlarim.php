<?php require_once('Connections/varitabanibaglantim.php'); ?>
<?php 
include("deneme1.php");
?>
<h2>Okunmamis Mesajlarim:</h2><p />
<?php
if(isset($_SESSION['MM_Username'])){
	$kullanici = $_SESSION['MM_Username'];
}
else {
	$kullanici="";
}

$grab_messages=mysql_query("SELECT * FROM pvt_messages WHERE user_to='$kullanici' && opened='hayir' && deleted='hayir'");
$numrows = mysql_numrows($grab_messages);
if($numrows != 0) {
while($get_msg=mysql_fetch_assoc($grab_messages)) {
	$id = $get_msg['id'];
	$user_from = $get_msg['user_from'];
	$user_to = $get_msg['user_to'];
	$msg_title = $get_msg['msg_title'];
	$msg_body = $get_msg['msg_body'];
	$date = $get_msg['date'];
	$opened = $get_msg['opened'];
	$deleted = $get_msg['deleted'];
	?>
    <script language="javascript">
function toggle<?php echo $id; ?>() {
	var ele = document.getElementById("toggleText<?php echo $id; ?>");
	var text = document.getElementById("displayText<?php echo $id; ?>");
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
	
	if(strlen($msg_title)> 50) {
	$msg_title = substr($msg_title, 0, 50)." ....";
	}
	else
	$msg_title = $msg_title;
	
	if(strlen($msg_body)> 150) {
	$msg_body = substr($msg_body, 0, 150)." ....";
	}
	else
	$msg_body = $msg_body;
	
	if(@$_POST['setopened_' . $id . '']) {
	$setopened_query = mysql_query("UPDATE pvt_messages SET opened='evet' WHERE id='$id'");
	header("Location: mesajlarim.php");
	}
	
	  $sorgu = mysql_query("SELECT * FROM uyeler WHERE kullanici_adi='$user_from'");
		$get=mysql_fetch_assoc($sorgu);
		$isim1=$get['isim'];
		$soyisim1=$get['soyisim'];
	
	echo "
	<form method='post' action='mesajlarim.php' name='$msg_title'>
	<b><a href='profile.php?u=$user_from'>$isim1 $soyisim1 </a></b>
	<input type='button' name='openmsg' value='$msg_title' onclick='javascript:toggle$id()'>
	<input type='submit' name='setopened_$id' value='Ben bunu okudum'>
	<input type='image' name='setopened_$id' value='Ben bunu okudum' src='img/ikonlar/yes.gif' height='22' width='26' />
	</form>
<div id='toggleText$id' style='display: none;'>
<h1>Gonderilme Tarih : $date</h1>
$msg_body
</div>
<hr /><br />
";
}
}
else
{
echo "Sen Okumak İcin Bir Mesaj a Sahip Degilsin";	
}
	
?>
<h2>Okunmus Mesajlarim:</h2><p />
<?php
if(isset($_SESSION['MM_Username'])){
	$kullanici = $_SESSION['MM_Username'];
}
else {
	$kullanici="";
}

$grab_messages=mysql_query("SELECT * FROM pvt_messages WHERE user_to='$kullanici' && opened='evet' && deleted='hayir'");
$numrows_read = mysql_numrows($grab_messages);
if($numrows_read != 0) {
while($get_msg=mysql_fetch_assoc($grab_messages)) {
	$id = $get_msg['id'];
	$user_from = $get_msg['user_from'];
	$user_to = $get_msg['user_to'];
	$msg_title = $get_msg['msg_title'];
	$msg_body = $get_msg['msg_body'];
	$date = $get_msg['date'];
	$opened = $get_msg['opened'];
	$deleted = $get_msg['deleted'];
	?>
    <script language="javascript">
function toggle<?php echo $id; ?>() {
	var ele = document.getElementById("toggleText<?php echo $id; ?>");
	var text = document.getElementById("displayText<?php echo $id; ?>");
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
	
	if(strlen($msg_body)> 150) {
	$msg_body = substr($msg_body, 0, 150)." ....";
	}
	else
	$msg_body = $msg_body;
	
	if(@$_POST['delete_' . $id . '']) {
	$delete_msg_query = mysql_query("UPDATE pvt_messages SET deleted='evet' WHERE id='$id'");
	header("Location: mesajlarim.php");
	}
	if(@$_POST['reply_' . $id . '']) {
		header("Location: mesaj_cevapla.php?u=$user_from");
		
	}
	
	$sorgu = mysql_query("SELECT * FROM uyeler WHERE kullanici_adi='$user_from'");
	$get=mysql_fetch_assoc($sorgu);
	$isim1=$get['isim'];
	$soyisim1=$get['soyisim'];
	
	echo "
	<form method='post' action='mesajlarim.php' name='$msg_title'>
	<b><a href='profile.php?u=$user_from'>$isim1 $soyisim1</a></b>
	<input type='button' name='openmsg' value='$msg_title' onclick='javascript:toggle$id()'>
	<input type='submit' name='delete_$id' value=\"Sil\" title='Mesaji Sil'>
	<input type='submit' name='reply_$id' value='Cevapla'>
	</form>
<div id='toggleText$id' style='display: none;'>
<h1>Gonderilme Tarih : $date</h1>
$msg_body
</div>
<hr /><br />
	";
}
}
else
{
echo "Sen Okumak İcin Bir Mesaj a Sahip Degilsin";	
}
?>
	