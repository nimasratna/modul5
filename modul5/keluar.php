<?php
$nopol=$_POST['nopol'];
$date=gmdate('Y-m-d');
$time=gmdate('H:i:s');
echo "date= ".$date;

$conn=mysql_connect("localhost","root","") or die("koneksi gagal");
mysql_select_db("modul5", $conn);
$q1="SELECT idMASUK FROM modul5.masuk WHERE NO_POL= '".$nopol."' AND STAT = 'IN';";
$hsl=mysql_query($q1,$conn)or die(mysql_error() . ''.$q1);
$arr=mysql_fetch_array($hsl);
$id=($arr['idMASUK']);

$q2="SELECT max(idKELUAR) FROM KELUAR;";
$hsl2=mysql_query($q2,$conn)or die(mysql_error() . ''.$q2);
$arr2=mysql_fetch_array($hsl2);
$id2=($arr['max(idKELUAR)']+1);

$query="INSERT INTO modul5.keluar (idKELUAR,NO_POL,TGL_KELUAR,WAKTU_KELUAR,idMASUK) VALUES(".$id2.", '".$nopol."', '".$date."', '".$time."', ".$id.");";
$result=mysql_query($query,$conn)or die(mysql_error() . ''.$query);

$query2="UPDATE masuk set STAT='OUT' WHERE idMASUK=".$id.";";
$result2=mysql_query($query2,$conn)or die(mysql_error() . ''.$query2);

$query3="SELECT JAM_MASUK FROM modul5.masuk WHERE idMASUK=".$.id";";
$hsl3=mysql_query($query3,$conn)or die(mysql_error() . ''.$query3);
$arr3=mysql_fetch_array($hsl3);
$jammsk=($arr['JAM_MASUK']);

$query4="SELECT WAKTU_KELUAR FROM modul5.keluar WHERE idKELUAR=".$.id2";";
$hsl4=mysql_query($query4,$conn)or die(mysql_error() . ''.$query4);
$arr4=mysql_fetch_array($hsl4);
$jamkeluar=($arr['WAKTU_KELUAR']);

$query5="SELECT hour(JAM_MASUK) FROM modul5.masuk WHERE idMASUK=".$id.";";
$hsl5=mysql_query($query5,$conn)or die(mysql_error() . ''.$query5);
$arr5=mysql_fetch_array($hsl5);
$jamawal=($arr['hour(JAM_MASUK)']);

$query6="SELECT minute(JAM_MASUK) FROM modul5.masuk WHERE idMASUK=".$id.";";
$hsl6=mysql_query($query6,$conn)or die(mysql_error() . ''.$query6);
$arr6=mysql_fetch_array($hsl6);
$menitawal=($arr['minute(JAM_MASUK)']);

$query7="SELECT second(JAM_MASUK) FROM modul5.masuk WHERE idMASUK=".$id.";";
$hsl7=mysql_query($query7,$conn)or die(mysql_error() . ''.$query7);
$arr7=mysql_fetch_array($hsl7);
$detikawal=($arr['second(JAM_MASUK)']);

$query8="SELECT hour(WAKTU_KELUAR) FROM modul5.keluar WHERE idKELUAR=".$id2.";";
$hsl8=mysql_query($query8,$conn)or die(mysql_error() . ''.$query8);
$arr8=mysql_fetch_array($hsl8);
$jamahir=($arr['hour(WAKTU_KELUAR)']);

$query9="SELECT minute(WAKTU_KELUAR) FROM modul5.keluar WHERE idKELUAR=".$id2.";";
$hsl9=mysql_query($query9,$conn)or die(mysql_error() . ''.$query9);
$arr9=mysql_fetch_array($hsl9);
$menitahir=($arr['minute(WAKTU_KELUAR)']);

$query10="SELECT second(WAKTU_KELUAR) FROM modul5.keluar WHERE idKELUAR=".$id2.";";
$hsl10=mysql_query($query10,$conn)or die(mysql_error() . ''.$query10);
$arr10=mysql_fetch_array($hsl10);
$detikahir=($arr['second(WAKTU_KELUAR)']);

$jam=$jamahir-$jamawal;
$menit=$menitahir-$menitawal;
$detik=$detikahir-$detikawal;


if($jam<12){
echo "biaya= 1000";
}
else{
echo "biaya=2000";
}

?>