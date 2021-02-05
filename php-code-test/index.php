<html>
<head>
<title>Sweetwater Test</title>
</head>
<body>

<?php
include "db_connection.php";

$conn = OpenCon();

$sql="SELECT * FROM sweetwater_test;";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  while($row = mysqli_fetch_assoc($result)) {
    echo "id: " . $row["orderid"]. ", comment: " . $row["comments"]. "<br>";
  }
} else {
  echo "0 results";
}

CloseCon($conn);
?>

</body>
</html>