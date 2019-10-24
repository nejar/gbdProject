<?php

session_start();

// destroy user session
unset($_SESSION['user']);
session_destroy();

header('Location: login.php');

