<?php

$postdata = file_get_contents("php://input");
$request = json_decode($postdata);

$con = mysqli_connect("localhost", "root", "", "vipagination");
// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}



$result = mysqli_query($con, "SELECT * from users WHERE firstname LIKE '".$request->otherdata->search."%'");
echo mysqli_num_rows($result);

mysqli_close($con);
