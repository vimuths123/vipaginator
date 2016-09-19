<?php

$postdata = file_get_contents("php://input");
$request = json_decode($postdata);

//echo $request->startpoint;
//echo ' - ';
//echo $request->perpage;



$con = mysqli_connect("localhost", "root", "", "vipagination");
// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$sql = "SELECT * from users LIMIT $request->startpoint, $request->perpage";
$result=mysqli_query($con,$sql);

echo json_encode(mysqli_fetch_all($result,MYSQLI_ASSOC));