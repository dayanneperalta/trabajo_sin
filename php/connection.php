<?php

$mysql_user = getenv("PHP_MYSQL_USER");
$mysql_password = getenv("PHP_MYSQL_PASSWORD");
$mysql_host = getenv("PHP_MYSQL_HOST");
$mysql_db = getenv("PHP_MYSQL_DB");

$conn = mysqli_connect($mysql_host, $mysql_user, $mysql_password, $mysql_db);
