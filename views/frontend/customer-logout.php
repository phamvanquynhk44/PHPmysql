<?php
session_start();
unset($_SESSION['logincustomer']);
header("location:index.php?option=custumer&f=login");