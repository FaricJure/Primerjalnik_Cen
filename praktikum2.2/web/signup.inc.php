<?php

if (isset($_POST['signup-submit'])) {

    require 'dbh.inc.php';

    $username = $_POST['uid'];
    $email = $_POST['mail'];
    $password = $_POST['pwd'];
    $passwordRepeat = $_POST['pwd-repeat'];

    if (empty($username) || empty($email) || empty($password) || empty($passwordRepeat)) {
        header("Location: signup.php?error=emptyfields&uid=" . $username . "&mail=" . $email);
        //exit();
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        header("Location: signup.php?error=invalidmailuid=");
        exit();
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: signup.php?error=invalidmail&uid=" . $username);
        exit();
    } elseif (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        header("Location: signup.php?error=invaliduid&mail=" . $email);
        exit();
    } elseif ($password !== $passwordRepeat) {
        header("Location: signup.php?error=passwordcheck&uid=" . $username . "&mail=" . $email);
        exit();

    } else {
        $sql = "SELECT uid FROM user WHERE uid=?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$username]);
        $stmt->fetch();
        if (!$stmt) {
            header("Location: signup.php?error-sqlerror");
            exit();
        } else {
            $stmt->rowCount();
            if ($resultCheck > 0) {
                header("Location: signup.php?error-usertaken&mail=" . $email);
                exit();
            } else {
                $sql = "INSERT INTO user (uid, pwd, email) VALUES (?, ?, ?)";
                $stmt = $conn->prepare($sql);
                if (!$stmt) {
                    header("Location: signup.php?error-createuser");
                    exit();
                } else {
                    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
                    $stmt->execute([$username, $hashedPwd, $email]);
                    header("Location: signup.php?signup=success");
                    exit();
                }
            }
        }

    }
}
else {
    header("Location: signup.php");
}