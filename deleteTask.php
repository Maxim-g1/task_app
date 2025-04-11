<?php
require 'db.php';

if (isset($_GET['id'])) {
    // Экранируем, чтобы обезопасить
    $id = mysqli_real_escape_string($connection, $_GET['id']);
    // Создаём запрос
    $query = "DELETE FROM tasks WHERE id='$id'";
    // Выполняем запрос
    $result = mysqli_query($connection, $query);
    if ($result) {
        // Успешное удаление
    } else {
        // Ошибка при выполнении удаления
    }
}
mysqli_close($connection);
