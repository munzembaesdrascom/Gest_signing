<?php
session_start();
if (empty($_SESSION['MatriAgent'])) {
    header('location: login.php');
} else {
    header('location: forms-layouts.php?' . $_SESSION['MatriAgent']);
    echo $_SESSION['MatriAgent'];
}