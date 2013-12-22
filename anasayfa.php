<?php
include ("deneme1.php");
?>
<div class="newsFeed" id="newsFeed">
<h2>Haberler</h2>
</div>
<br /><br />
<?php

$getposts=mysql_query("SELECT * FROM posts WHERE user_posted_to='$kullanici' ORDER BY id DESC LIMIT 10") or die(mysql_error());
while($row = mysql_fetch_assoc($getposts)) {
	                                       $id=$row['id'];
										   $body=$row['body'];
										   $date_added=$row['date_added'];
										   $added_by=$row['added_by'];
										   $user_posted_to=$row['user_posted_to'];
										   
										   $get_user_info=mysql_query("SELECT * FROM uyeler WHERE kullanici_adi='$added_by'"); 
										   $get_info=mysql_fetch_assoc($get_user_info);
										   $profilpic_info=$get_info['profil_resmi'];

										   ?>
										   <script language="javascript">
function toggle<?php echo $id; ?>() {
	var ele = document.getElementById("toggleComment<?php echo $id; ?>");
	var text = document.getElementById("displayComment<?php echo $id; ?>");
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
										   
										   $user1=$_SESSION['MM_Username'];
	                                       $sorgu = mysql_query("SELECT * FROM uyeler WHERE kullanici_adi='$added_by'");
		                                   $get=mysql_fetch_assoc($sorgu);
		                                   $isim1=$get['isim'];
		                                   $soyisim1=$get['soyisim'];
										   
										   
										   echo "
										   <div class='newsFeedPost'>
										   <div class='newsFeedPostOptions'>
										   <a href='#' onclick='javascript:toggle$id()'><h1><img src='img/ikonlar/arrow_down.png' height='15' width='26' />Yorumlari Goster</h1></a>
										   </div>
										   <div style='float: left;'>
										   <img src='userdata/profile_pics/$profilpic_info' height='60'>
										   </div>
										   <div class='posted_by'>
										   <a href='profile.php?u=$added_by'>Yayinlayan Kisi: $isim1 $soyisim1</a><br />Tarih: $date_added <br /></div> 
										   <br /><br />
										   <div style='max-width: 600px;'>
										   $body<br /><br /><br /><br />
										   </div>
										   <div id='toggleComment$id' style='display: none;'>
										   <br />
										   <iframe src='./comment_frame.php?id=$id' frameborder='0' style='max-height: 150px; width: 100%; min-height: 10px;'></iframe>
										   </div>
										   <hr />
										   </div>
										   ";
}
	
?> 

