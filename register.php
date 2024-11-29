<?php
// 確保資料庫連線已經設置好
require_once("../pj_connect.php"); // 你的資料庫連線檔案

// 處理表單提交
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $account = trim($_POST["account"]);
    $password = trim($_POST["password"]);
    $confirm_password = trim($_POST["confirm_password"]);

    // 基本驗證
    if (empty($account) || empty($password) || empty($confirm_password)) {
        $error_message = "所有欄位都是必填的。";
    } elseif ($password !== $confirm_password) {
        $error_message = "密碼與確認密碼不匹配。";
    } else {
        // 使用 md5 加密密碼
        $hashedPassword = md5($password);

        // 檢查帳號是否已存在
        $sql = "SELECT * FROM users WHERE account = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $account);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $error_message = "帳號已存在，請選擇其他帳號。";
        } else {
            // 將用戶資訊存入資料庫
            $sql = "INSERT INTO users (account, password) VALUES (?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ss", $account, $hashedPassword);
            if ($stmt->execute()) {
                $success_message = "註冊成功，請登入。";
                header("location: back_login.php");
            } else {
                $error_message = "註冊失敗，請稍後再試。";
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>註冊帳號</title>

    <?php include("./css.php") ?>

</head>

<body class="bg-info-subtle">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">註冊帳號！</h1>
                            </div>
                            <?php if (isset($error_message)) : ?>
                                <div style="color: red;"><?php echo $error_message; ?></div>
                            <?php elseif (isset($success_message)) : ?>
                                <div style="color: green;"><?php echo $success_message; ?></div>
                            <?php endif; ?>
                            <form action="register.php" method="POST" class="user">
                                <div class="form-group ">
                                    <input type="text" class="form-control form-control-user" id="exampleLastName"
                                        placeholder="姓名 Name">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" name="account"
                                        id="exampleInputAccount" aria-describedby="accountHelp"
                                        placeholder="帳號 Account">
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" id="exampleInputEmail"
                                        placeholder="電子郵件 Email">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-user" name="password"
                                        id="exampleInputPassword" placeholder="密碼 Password" required>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-user" name="confirm_password"  id="confirm_password" placeholder="確認密碼 confirm password" required>
                                </div>
                                <button class="btn btn-info btn-user btn-block" type="submit">註冊</button>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="back_login.php">已經有帳號了嗎? 登入！</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <?php include("./js.php") ?>

</body>

</html>