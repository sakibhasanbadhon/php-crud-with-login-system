<?php 
include "lib/database.php";

$db = new database();


if (isset($_GET['deleteId'])) {

	$id = $_GET['deleteId'];

	$read = "SELECT * FROM post WHERE id='$id' ";
	$x = $db->read($read);
	if ($x) {
		$a = $x->fetch_assoc();
		$img_data  = $a['img'];
		$unlink = unlink("public/img/$img_data");
		if ($unlink) {
        $qr = "DELETE FROM post WHERE id='$id'";
        $res = $db->delete($qr);
        if ($res) {
            echo "<script> alert('Succesfull deleted') </script>";

            echo "<script> window.location='index.php'; </script>";
        }

		}

	}
}



 ?>