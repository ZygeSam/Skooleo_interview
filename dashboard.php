<?php 
session_start();
echo "Welcome ". ucwords($_SESSION['user']);