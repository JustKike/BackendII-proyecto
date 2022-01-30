<?php
    require_once "conn.php";
    if(isset($_GET['image_id'])) {
        $sql = "SELECT imgType, imgData FROM product WHERE id=" . $_GET['image_id'];
		$result = mysqli_query($conn, $sql) or die("<b>Error:</b> Problem on Retrieving Image BLOB<br/>" . mysqli_error($conn));
		$row = mysqli_fetch_array($result);
		header("Content-type: " . $row["imgType"]);
        echo $row["imgData"];
	}
	mysqli_close($conn);
?>