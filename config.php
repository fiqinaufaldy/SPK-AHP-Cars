<?php
	error_reporting(E_ALL ^ E_NOTICE);  

	// connection
	$host = 'localhost';
	$username = 'root';
	$password = '';
	$database = 'spk_cars';

	$koneksi = mysqli_connect($host,$username,$password);

	if (!$koneksi)
	{
		echo "Tidak dapat terkoneksi dengan server";
		exit();
	}

	if(!mysqli_select_db($koneksi, $database))
	{
		echo "Tidak dapat menemukan ";
		exit();
	}
?>