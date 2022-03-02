<?php
include('path.php');

session_start();

unset($_SESSION['id']);
unset($_SESSION['login']);
unset($_SESSION['doctor']);

header('location: ' . BASE_URL);