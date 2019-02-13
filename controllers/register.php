<?php
session_start();
echo $_SESSION['error'];

require 'views/register.view.php';