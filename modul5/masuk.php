<?php
$nopol=$_POST['nopol'];
$jenis=$_POST['jenis'];
$date=gmdate('Y-m-d');
$time=gmdate('H:i:s');
echo "date= ".$date;

$conn=mysql_connect("localhost","root","") or die("koneksi gagal");
mysql_select_db("modul5", $conn);
$q1="SELECT count(idMASUK) FROM modul5.masuk;";
$hsl=mysql_query("SELECT max(idMASUK) FROM modul5.masuk;",$conn)or die(mysql_error() . ''.$q1);
$arr=mysql_fetch_array($hsl);
$id=($arr['max(idMASUK)']+1);
echo "id= ".$id." ";

$query="INSERT INTO modul5.masuk (idMASUK,NO_POL,TGL_MASUK,JAM_MASUK,STAT,JENIS) VALUES(".$id.", '".$nopol."', '".$date."', '".$time."', 'IN', '".$jenis."');";

$result=mysql_query($query,$conn)or die(mysql_error() . ''.$query);



?>