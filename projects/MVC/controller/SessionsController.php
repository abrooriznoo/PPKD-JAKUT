<?php
session_start();
include '../../connection/connect.php';

// global $conn;
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = sha1($_POST['password']);

    $query = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email' AND password = '$password'");
    $rows = mysqli_fetch_assoc($query);

    if (mysqli_num_rows($query) > 0) {
        $_SESSION['email'] = $email;
        $_SESSION['fullname'] = $rows['name'];
        $_SESSION['photos'] = $rows['photo'];
        header("Location: ../../index.php?login=success");
        exit;
    } else {
        header("Location: ../session/login.php?login=error");
        exit;
    }
}

function logout()
{
    session_unset();
    session_destroy();
    header("Location: index.php?logout=success");
    exit;
}

// if (isset($_POST['logout'])) {
//     session_unset();
//     session_destroy();
//     header("Location: ../../index.php?logout=success");
//     exit;
// }
