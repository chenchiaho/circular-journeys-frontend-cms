<?php
session_start(); # 啟用 session 功能

unset($_SESSION['admin']); // 刪掉陣列裡的元素

header('Location: index_.php'); // redirect 轉向到別的頁面
