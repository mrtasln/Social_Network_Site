<?php include("deneme1.php") ?>
<?php 
require_once('Connections/varitabanibaglantim.php'); 

if($kullanici) {
	if(isset($_POST['no'])) {
	header("Location: hesap_secenekleri1.php");	
	}
	if(isset($_POST['yes'])) {
	$close_account = mysql_query("UPDATE uyeler SET closed='evet' WHERE kullanici_adi='$kullanici'");	
	echo "Senin Hesabin Kapatildi";
	session_destroy();
	}
}
else
{
die ("Bu sayfayi gormek icin kayit olmalisiniz!");	
}

?>

<br />
<center>
<form action="hesap_kapatma.php" method="post" name="hesapkapatma" id="hesapkapatma">
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p><span>Sen Hesabını Kapatmak Istedigine Emin misin ?</span><br />
    <input type="submit" name="no" value="Hayır, Geri Al" />
    <input type="submit" name="yes" value="Eminim" />
  </p>
</form>
</center>