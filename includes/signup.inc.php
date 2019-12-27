<?php

if (isset($_POST['signup-submit'])) {
    require 'dbh.inc.php';

    $first=mysqli_real_escape_string($conn,$_POST['first']);
    $last=mysqli_real_escape_string($conn,$_POST['last']);
    $email=mysqli_real_escape_string($conn,$_POST['email']);
    $bday=mysqli_real_escape_string($conn,$_POST['bday']);
    $date=date('Y-m-d');

    if (empty($first) || empty($last) || empty($email) || empty($bday)) {
        header("Location: ../contact.php?error=emptyfields&first=".$first."&last=".$last."&email=".$email);
        exit();
    }
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: ../contact.php?error=invalidemail&first=".$first."&last=".$last);
        exit();
    }
    elseif ($bday > $date) {
        header("Location: ../contact.php?error=invalidbday&first=".$first."&last=".$last);
        exit();
    }
    else {
        $sql="select email from vips where email=?;";
        $stmt=mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../contact.php?error=sqlerror");
            exit();
        }
        else {
            mysqli_stmt_bind_param($stmt, "s", $email);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck=mysqli_stmt_num_rows($stmt);
            if ($resultCheck>0) {
                header("Location: ../contact.php?error=usertaken&first=".$first."&last=".$last);
                exit();
            }
            else {
                $sql="insert into vips (vip_first,vip_last,email,bday) values (?,?,?,?);";
                $stmt=mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header("Location: ../contact.php?error=sqlerror");
                    exit();
                }
                else {
                    mysqli_stmt_bind_param($stmt, "ssss", $first, $last, $email, $bday);
                    mysqli_stmt_execute($stmt);

                    header("Location: ../contact.php?signup=success");
                    exit();
                }
            }
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
else {
    header("Location: ../contact.php");
    exit();
}
