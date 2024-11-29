<?php
require_once("../pj_connect.php");

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_POST["account"])) {
    exit("請循正常管道進入此頁");
}

$account = $_POST["account"];
$password = $_POST["password"];
$password = ($password);

if (empty($account)) {
    $_SESSION["error"]["message"] = "請輸入帳號";
    header("location: back_login.php");
    exit;
}
if (empty($password)) {
    $_SESSION["error"]["message"] = "請輸入密碼";
    header("location: back_login.php");
    exit;
}

$sql = "SELECT * FROM users WHERE account = '$account' AND password = '$password'";
$result = $conn->query($sql);
$userCount = $result->num_rows;

if ($userCount == 0) {
    if (!isset($_SESSION["error"]["times"])) {
        $_SESSION["error"]["times"] = 1;
    } else {
        $error_times = $_SESSION["error"]["times"];
        $error_times++;
        $_SESSION["error"]["times"] = $error_times;
    }

    $_SESSION["error"]["message"] = "使用者帳號或密碼錯誤";
    header("location: back_login.php");
    exit;
}

$user = $result->fetch_assoc();
$_SESSION["user"] = $user;

// 檢查使用者是否為 manager
if ($user["manager"] != 1) {
    $_SESSION["error"]["message"] = "您無權限進入此頁面";
    header("location: back_login.php");
    exit;
}

unset($_SESSION["error"]["times"]);
$conn->close();

header("location: index.php");