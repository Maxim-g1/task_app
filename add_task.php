<?php

require 'db.php';


// isset() - проверяет инициализирована ли переменная (то есть объявлена и не равна NULL)
if (
    isset($_POST['task']) && !empty($_POST['task']) &&
    isset($_POST['task_date']) && !empty($_POST['task_date']) &&
    isset($_POST['task_time']) && !empty($_POST['task_time']) &&
    isset($_POST['priority']) && !empty($_POST['priority'])
) {



    // mysqli_real_escape_string -  экранирует специальные символы в строке для использования в SQL-выражении
    $task = mysqli_real_escape_string($connection, $_POST['task']);
    $task_date = mysqli_real_escape_string($connection, $_POST['task_date']);
    $task_time = mysqli_real_escape_string($connection, $_POST['task_time']);
    $priority = mysqli_real_escape_string($connection, $_POST['priority']);

    // Создание запроса
    $query = "INSERT INTO tasks(task, task_date, task_time, priority) VALUES ('$task', '$task_date', '$task_time', '$priority')";
    // Выполнение запроса

    $result = mysqli_query($connection, $query);
    if ($result) {
        header("Location: index.php");
        // Если запрос выполнен успешно
    } else {
        echo 'Ошибка при выполнении задачи';
    }
}
// Закрытие соединения БД
mysqli_close($connection);
