<html>
<head>
<title>Sweetwater Test</title>
</head>
<body>

<?php
//connect to database
//connection parameters are in another file that I didn't upload
include "db_connection.php";
$conn = OpenCon();

//helper function that prints data from a select statement
function printTable($result,$val){
  if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
      echo "id: " . $row["orderid"] . " " . $val . ": " . $row[$val] . "<br>";
    }
  } else {
    echo "0 results";
  }
}

//CANDY
$sql="SELECT * FROM sweetwater_test WHERE comments LIKE '%candy%';";
$result = mysqli_query($conn, $sql);
echo "<strong>Candy:</strong><br>";
printTable($result, "comments");
echo "<br>";

//CALL
$sql="SELECT * FROM sweetwater_test WHERE comments LIKE '%call%';";
$result = mysqli_query($conn, $sql);
echo "<strong>Call:</strong><br>";
printTable($result, "comments");
echo "<br>";

//REFER
$sql="SELECT * FROM sweetwater_test WHERE comments LIKE '%refer%';";
$result = mysqli_query($conn, $sql);
echo "<strong>Refer:</strong><br>";
printTable($result, "comments");
echo "<br>";

//SIGNATURE
$sql="SELECT * FROM sweetwater_test WHERE comments LIKE '%signature%';";
$result = mysqli_query($conn, $sql);
echo "<strong>Signature:</strong><br>";
printTable($result, "comments");
echo "<br>";

//OTHERS
$sql="SELECT * FROM sweetwater_test 
      WHERE comments NOT LIKE '%candy%' 
      AND comments NOT LIKE '%call%' 
      AND comments NOT LIKE '%refer%' 
      AND comments NOT LIKE '%signature%';";
$result = mysqli_query($conn, $sql);
echo "<strong>Other:</strong><br>";
printTable($result, "comments");
echo "<br>";

//DATE PARSE
//finds comments with an Expected Shipping Date, converts the given date into a form that can be put into the sql column
$sql="UPDATE sweetwater_test
      SET shipdate_expected = 
        CONVERT(DATE_FORMAT(SUBSTRING(comments, LOCATE('Expected Ship Date',comments)+20, 8),'%d/%y/%m'), datetime)
      WHERE comments LIKE '%Expected Ship Date%'";
$result = mysqli_query($conn, $sql);

$sql="SELECT * FROM sweetwater_test WHERE shipdate_expected NOT LIKE '1000-01-01 00:00:00'";
$result = mysqli_query($conn, $sql);
echo "<strong>Date Parse:</strong><br>";
printTable($result, "shipdate_expected");
echo "<br>";

CloseCon($conn);
?>

</body>
</html>