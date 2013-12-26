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
	$check=mysql_query("SELECT kullanici_adi FROM uyeler WHERE kullanici_adi='$kullanici_adi'");
	if(mysql_num_rows($check)===1){
		$get=mysql_fetch_assoc($check);
		$kullanici_adi=$get['kullanici_adi'];
		if($kullanici_adi != $kullanici) {
			if(isset($_POST['submit'])) {
				$msg_title = strip_tags(@$_POST['msg_title']);
				$msg_body = strip_tags(@$_POST['msg_body']);
				$date = date("Y-m-d");
				$opened = "hayir";	
				$deleted= "hayir";
				
				if($msg_title == "Buraya Mesaji Giriniz ...") {
					echo "Senin Mesajina Bir Baslik Ekle";
				}
				else
				if(strlen($msg_title) < 3) {
					echo "Senin Mesajinin Basliginin Uzunlugu 3 karakterden daha az olamaz";
				}
				else
				if($msg_body == "Gondermek Istedigin Mesaji Giriniz") {
				echo "Lutfen Mesaj Yaziniz";	
				}
				else
				if(strlen($msg_body) < 3) {
					echo "Senin mesajin 3 karakter den daha az olamaz";
				}
				else
				{
				$send_msg = mysql_query("INSERT INTO pvt_messages VALUES('','$kullanici','$kullanici_adi','$msg_title','$msg_body','$date','$opened','$deleted')");
				echo "Senin Mesajin Gonderildi";
				}
			}
			$sorgu = mysql_query("SELECT * FROM uyeler WHERE kullanici_adi='$kullanici_adi'");
		$get=mysql_fetch_assoc($sorgu);
		$isim1=$get['isim'];
		$soyisim1=$get['soyisim'];
		echo "
		<form action='send_msg.php?u=$kullanici_adi' method='post'>
		<h2>Mesaj Icerigi : ($isim1 $soyisim1)</h2>
		<p /><input type='text' name='msg_title' size='30' onClick=\"value=''\" value='Mesajinin Basligini Giriniz ...'><p />
		<textarea cols='80' rows='18' name='msg_body'>Gondermek Istedigin Mesaji Giriniz</textarea><p />
		<input type='submit' name='submit' value='Mesaj Gonder'>
		</form>
		";
		}
		else
		{
		header("Location: $kullanici");
		}
	}	}
}

?>
