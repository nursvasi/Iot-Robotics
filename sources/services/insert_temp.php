<?php
/**
 * insert.php
 *
 * @category   Ajax executed php script
 * @package    None

 * @deprecated None
 */


include("connect.php");
$_temp=$_GET['temp'];

$temp=$_temp;
$ipAddress = $_SERVER['REMOTE_ADDR'];

$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}

mysqli_query($conn, "SET NAMES utf8");
$basari_sayac = 0;


$sql = "INSERT INTO iot_temp (sicaklik, zaman, ipaddr) VALUES ('$temp',NOW(),'$ipAddress')";

if (mysqli_query($conn, $sql)) {
	$basari_sayac++;
} else {
	echo "Hata Oluştu: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
//echo $basari_sayac;
echo $sql;
