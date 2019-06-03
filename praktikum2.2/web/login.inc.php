<?php

if (isset($_POST['login-submit'])) {
    require 'dbh.inc.php';

    $mailuid = $_POST['mailuid'];
    $password = $_POST['pwd'];

    if (empty($mailuid) || empty($password)) {
        header("Location:comments.php?error=emptyfields");
        exit();
    } else {
        $sql = "SELECT * FROM user WHERE uid=?;";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$mailuid]);
        if($stmt != false) {
            if ($row = $stmt->fetch()) {
                $pwdCheck = password_verify($password, $row['pwd']);
                if ($pwdCheck == false) {
                    header("Location: comments.php?error=wrongpwd");
                    exit();
                } elseif ($pwdCheck == true) {
                    session_start();
                    $_SESSION['id'] = $row['id'];
                    $_SESSION['uid'] = $row['uid'];
                    $_SESSION['isadmin'] = $row['admin'];

                    # 1 hour
                    setcookie("ip_addr", $_SERVER['REMOTE_ADDR'], time()+3600);

                    header("Location:index.php?login=success");
                    exit();

                } else {
                    header("Location: index.php?error=wrongpwd");
                    exit();
                }

            } else {
                header("Location: index.php?error=nouser");
                exit();
            }
        } else {
            header("Location: index.php?error=sqlError");
        }

    }

} else {
    //header("Location:index.php");
    exit();
}