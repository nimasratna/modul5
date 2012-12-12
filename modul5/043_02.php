<html>
<head>
	<title>Koneksi Database MySQL</title>
</head>
<body>
	<h1>Koneksi database dengan mysql_fetch_array</h1>
	<?php
		$conn=mysql_connect("localhost","root","") or die("koneksi gagal");
		mysql_select_db("lat", $conn);
		$query="SELECT * FROM MEMBER";
$result = mysql_query($query) or die(mysql_error() . ''.$query);

echo "<table border='1'>
<tr>
<th>Firstname</th>
<th>age</th>
</tr>";

while($row = mysql_fetch_array($result))
  {
  echo "<tr>";
  echo "<td>" . $row['NAME'] . "</td>";
  echo "<td>" . $row['AGE'] . "</td>";
  echo "</tr>";
  }
echo "</table>";
	?>
</body>

</html>