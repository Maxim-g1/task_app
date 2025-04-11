<?php

$host = "localhost";
$username = "root";
$password = "mysql";
$database = "tasks_app";

// Установить соединение с БД
$connection = new mysqli($host, $username, $password, $database);

// Проверка соединения
if ($connection->connect_error) {
    die("Ошибка подключения " . $connection->connect_error);
}

// id int A_I
// task varchar(255)
// task_date date
// task_time time
// priority enum(low,medium,high)