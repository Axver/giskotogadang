<?php
	$username='postgres';
	$password='toor';
	$url='localhost';
	$port=5432;
	$dbname='kotogadang';
	
	$conn = pg_connect("host=".$url." port=".$port." dbname=".$dbname." user=".$username." password=".$password) or die("Gagal");
	if ($conn)
	{
		// echo "Koneksi Sukses";
	}
	else
	{
		echo "Koneksi Gagal";
	}
	
	
?>
