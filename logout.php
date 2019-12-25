<?php
    session_start();
    $_SESSION['username'] = $row['username'];
    $_SESSION['id'] = $row['id'];
    unset($_SESSION['username']);
    unset($_SESSION['id']);
    session_destroy();
    header("Location: index.php");
?>

