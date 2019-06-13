<?php

if (isset($_POST['login-submit'])) {
    require 'dbh.inc.php';

    $mailuid = $_POST['mailuid'];
    $password = $_POST['pwd'];

    if (empty($mailuid) || empty($password)) {
        header("Location:login.php?error=emptyfields");
        exit();
    } else {
        $sql = "SELECT * FROM user WHERE uid=?;";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$mailuid]);
        if($stmt != false) {
            if ($row = $stmt->fetch()) {
                $pwdCheck = password_verify($password, $row['pwd']);
                if ($pwdCheck == false) {
                    header("Location: login.php?error=wrongpwd");
                    exit();
                } elseif ($pwdCheck == true) {
                    session_start();
                    $_SESSION['id'] = $row['id'];
                    $_SESSION['uid'] = $row['uid'];
                    $_SESSION['isadmin'] = $row['admin'];
                    $_SESSION['active']=$row['active'];
                    if($row['active']==0){
                        session_destroy();
                    }

                    # 1 hour
                    setcookie("ip_addr", $_SERVER['REMOTE_ADDR'], time()+3600);

                    header("Location:index.php?login=success");
                    exit();

                } else {
                    header("Location: login.php?error=wrongpwd");
                    exit();
                }

            } else {
                header("Location: login.php?error=nouser");
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