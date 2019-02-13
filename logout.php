<?php
session_start();
//die(var_dump($_SESSION));

$_SESSION = array();
session_destroy();

header("Location: login");