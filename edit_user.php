<?php
require_once("../pj_connect.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = isset($_POST['user_id']) ? intval($_POST['user_id']) : 0;
    $level_id = isset($_POST['level_id']) ? intval($_POST['level_id']) : 0;

    if ($user_id > 0 && $level_id > 0) {
        $sql = "UPDATE users SET level_id = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);

        if ($stmt) {
            $stmt->bind_param("ii", $level_id, $user_id);
            if ($stmt->execute()) {
                header('Location: userlist.php?message=update_success');
                exit();
            } else {
                echo "更新失敗：" . $stmt->error;
            }
            $stmt->close();
        } else {
            echo "預備語句錯誤：" . $conn->error;
        }
    } else {
        echo "無效的用戶 ID 或等級 ID。";
    }
}

// 關閉資料庫連線
$conn->close();
?>