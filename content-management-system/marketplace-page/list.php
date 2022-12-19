<?php
session_start();
if (isset($_SESSION['admin'])) {
    include './list-admin.php';
} else {
    include './list-no-admin.php';
}
