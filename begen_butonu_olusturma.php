<?php
include ("deneme1.php");
?>
<h2>Senin Begen Butonunu Olusur</h2><hr />
<br />
<form action="begen_butonu_olusturma.php" method="post">
<input type="text" name="like_button_url" value="Senin Sayfanin Url sini Giriniz ..." size="50" onclick="value=''" />
<input type="submit" name="create" value="Olustur" />
</form>
<?php
if(isset($_POST['like_button_url'])) {
	$like_button_url = strip_tags(@$_POST['like_button_url']);
	$kullanici_adi = $kullanici;
	$date = date("Y-m-d");
	$uid = rand(748748748, 9999999999999999999999999999999999999999999999999999999999999999999999999999999999999);
	$uid = md5($uid);
	$like_button_url2 = strstr($like_button_url, 'http://');
		$b_check = mysql_query("SELECT page_url FROM like_buttons WHERE page_url='$like_button_url'");
		$numrows_check = mysql_num_rows($b_check);
		if($numrows_check >= 1) {
		echo "<script>alert('Bu sayfa zaten veritabaninda kayitlidir')</script>";
	}

	else
	{
		if($like_button_url2) {
		$create_button = mysql_query("INSERT INTO like_buttons VALUES ('','$kullanici_adi','$like_button_url','$date','$uid')");
		$insert_like = mysql_query("INSERT INTO likes VALUES('','$kullanici_adi','-1','$uid')");

		echo "
		<div style='width: 400px; height: 250px; border: 1px; solid #CCCCCC;'>
		&lt;iframe src='http://localhost:81/SocialNet/like_islemleri.php?uid=$uid' style='border: 0px; height: 35px; width: 145px;'&gt;
		
		&lt;/iframe&gt;
		</div>
		";
		}
		else
		{
		
		$like_button_url = "http://".$like_button_url;
		$create_button = mysql_query("INSERT INTO like_buttons VALUES ('','$kullanici_adi','$like_button_url','$date','$uid')");
		$insert_like = mysql_query("INSERT INTO likes VALUES('','$kullanici_adi','-1','$uid')");
		echo "
		<div style='width: 400px; height: 250px; border: 1px; solid #CCCCCC;'>
		&lt;iframe src='http://localhost:81/SocialNet/like_islemleri.php?uid=$uid' style='border: 0px; height: 35px; width: 145px;'&gt;
		
		&lt;/iframe&gt;
		</div>
		";
	}
	}

}
?>