<?php
	include('conn.php');
		
	$id=$_GET['id'];
	$codigo=$_GET['codigo'];
	$path = 'assets/images/'.$codigo.'/';

	mysqli_query($conn,"delete from product where id='$id'");

	
	deleteDirectory($path);
	function deleteDirectory($dir) {
		if(!$dh = @opendir($dir)) return;
		while (false !== ($current = readdir($dh))) {
			if($current != '.' && $current != '..') {
				echo 'Se ha borrado el archivo '.$dir.'/'.$current.'<br/>';
				if (!@unlink($dir.'/'.$current)) 
					deleteDirectory($dir.'/'.$current);
			}       
		}
		closedir($dh);
		echo 'Se ha borrado el directorio '.$dir.'<br/>';
		@rmdir($dir);
	}


	header('location:index.php');

?>