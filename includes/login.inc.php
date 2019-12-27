<?php

require_once ('google.inc.php');

if (isset($_POST['login-submit'])) {
    require 'dbh.inc.php';

    $mailuid=mysqli_real_escape_string($conn,$_POST['mailuid']);
    $pwd=mysqli_real_escape_string($conn,$_POST['pwd']);

    if (empty($mailuid) || empty($pwd)) {
        header("Location: ../index.php?error=emptyfields");
        exit();
    }
    else {
        $sql="select * from users where username=? or user_email=?;";
        $stmt=mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../index.php?error=sqlerror");
            exit();
        }
        else {
            mysqli_stmt_bind_param($stmt, "ss", $mailuid, $mailuid);
            mysqli_stmt_execute($stmt);
            $result=mysqli_stmt_get_result($stmt);

            if ($row=mysqli_fetch_assoc($result )) {
                $pwdCheck=password_verify($pwd, $row['user_pwd']);
                if ($pwdCheck==false) {
                    header("Location: ../index.php?error=wrongpwd");
                    exit();
                }
                elseif ($pwdCheck==true) {
                    session_start();
                    $_SESSION['user_id']=$row['user_id'];
                    $_SESSION['username']=$row['username'];

                    header("Location: $auth_url");
                    exit();
                }
                else {
                    header("Location: ../index.php?error=wrongpwd");
                    exit();
                }
            }
            else {
                header("Location: ../index.php?error=nouser");
                exit();
            }
        }
    }
}
else {
    header("Location: ../index.php");
    exit();
}