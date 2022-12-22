<?php
session_start();
if (isset($_SESSION['admin'])) {
    include './order-list-admin.php';
} else {
    include './order-list-no-admin.php';
}
