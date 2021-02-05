<html>
<head>
<title>Sweetwater Test</title>
</head>
<body>

<?php
include "db_connection.php";
$conn = OpenCon();

function printTable($result){
  if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
      echo "id: " . $row["orderid"]. ", comment: " . $row["comments"]. "<br>";
    }
  } else {
    echo "0 results";
  }
}

$sql="SELECT * FROM sweetwater_test WHERE comments LIKE '%candy%';";
$result = mysqli_query($conn, $sql);
echo "Candy:<br>";
printTable($result);
echo "<br>";

$sql="SELECT * FROM sweetwater_test WHERE comments LIKE '%call%';";
$result = mysqli_query($conn, $sql);
echo "Call:<br>";
printTable($result);
echo "<br>";

$sql="SELECT * FROM sweetwater_test WHERE comments LIKE '%refer%';";
$result = mysqli_query($conn, $sql);
echo "Refer:<br>";
printTable($result);
echo "<br>";

$sql="SELECT * FROM sweetwater_test WHERE comments LIKE '%signature%';";
$result = mysqli_query($conn, $sql);
echo "Signature:<br>";
printTable($result);
echo "<br>";

$sql="SELECT * FROM sweetwater_test 
      WHERE comments NOT LIKE '%candy%' 
      AND comments NOT LIKE '%call%' 
      AND comments NOT LIKE '%refer%' 
      AND comments NOT LIKE '%signature%';";
$result = mysqli_query($conn, $sql);
echo "Other:<br>";
printTable($result);
echo "<br>";

CloseCon($conn);
?>

</body>
</html>