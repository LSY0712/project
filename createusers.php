<?php
require_once("../pj_connect.php");

$now=date('Y-m-d H:i:s');

$sql="INSERT INTO users (name, phone, email, account, password, birthday, address, created_at) 
VALUES 
";

if ($conn->query($sql) === TRUE) {
    $last_id=$conn->insert_id;
    echo "新資料輸入成功, ID 為 $last_id";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();