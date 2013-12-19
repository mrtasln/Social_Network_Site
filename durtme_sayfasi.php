<?php include("deneme1.php") ?>
<?php require_once('Connections/varitabanibaglantim.php'); ?>

<?php

$check_for_pokes = mysql_query("SELECT * FROM pokes WHERE user_to='$kullanici'");
$poke = mysql_fetch_assoc($check_for_pokes);
$poke_num = mysql_num_rows($check_for_pokes);
	$user_to = $poke['user_to'];
	$user_from = $poke['user_from'];
	
	if(@$_POST['poke_' . $user_from . '']) {
		$delete_poke = mysql_query("DELETE FROM pokes WHERE user_from='$user_from' &&user_to='$user_to'");
		$create_new_poke = mysql_query("INSERT INTO pokes VALUES('','$kullanici','$user_from')");
		header("Location: durtme_sayfasi.php");
	echo "Sen $user_from i durttun";
    }
	if($poke_num == 0) {
		echo "Hicbir Durtme Yok";
	}
	else
	{
	echo "
	<form action='durtme_sayfasi.php' method='post'>
	Sen $user_from tarafindan dürtüldün&nbsp;
	<input type='submit' name='poke_$user_from' value='Geri Durt'>
	</form>
	"."<br />";
	}

?>