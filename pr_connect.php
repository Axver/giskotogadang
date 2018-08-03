<?php
	$username='postgres';
	$password='root';
	$url='localhost';
	$port=5432;
	$dbname='kotogadang2';
	
	$conn = pg_connect("host=".$url." port=".$port." dbname=".$dbname." user=".$username." password=".$password) or die("Gagal");
	if (!$conn) {
        echo "Koneksi Gagal";
    }
	else {
        // echo "Koneksi Sukses";
    }
	
	
?>
