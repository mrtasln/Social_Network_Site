<?php require_once('Connections/varitabanibaglantim.php'); ?>
<?php include("deneme1.php"); ?>
<h2>Okunmamis Mesajlarim:</h2><p />
<?php

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
	}
}
}
else
{
echo "Sen Okumak İcin Bir Mesaj a Sahip Degilsin";	
}
?>