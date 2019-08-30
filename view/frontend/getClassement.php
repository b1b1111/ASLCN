<?php
$q = intval($_GET['r']);

$con = mysqli_connect('localhost','aslcn','root','');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"aslcn");
$sql="SELECT * FROM team WHERE id = '".$r."'";
$result = mysqli_query($con,$sql);

echo "<table>
<tr>
<th>Nom</th>
<th>Points</th>
<th>Rank</th>
</tr>";
while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['teamName'] . "</td>";
    echo "<td>" . $row['teamPoint'] . "</td>";
    echo "<td>" . $row['rank'] . "</td>";
    echo "</tr>";
}
echo "</table>";
mysqli_close($con);
?>