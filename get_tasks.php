<?php
require 'db.php';
// Запрос на выборку данныз из БД
// ORDER BY - сортировка по указанному полю
// ASC - сортировка по возрастанию(стоит по умолчанию)
$query = "SELECT * FROM tasks ORDER BY task_date ASC, task_time ASC";


$result = mysqli_query($connection, $query); // т. к. SELECT, то вернётся при успешном выполнении ссылка на результат запроса

// mysqli_fetch_assoc() - выбирает одну строку из набора результатов и возвращает её в виде ассоциативного массива
// при каждом вызове этой функции будет возвращать следующую строку из набора результатов или null, если строк больше нет
$tasks = [];
while ($row = mysqli_fetch_assoc($result)) {
    // Добавление каждой выбранной задачи в массив tasks
    $tasks[] = $row;
}

// Преобразование массива в формат JSON и вывод на экран
echo json_encode($tasks);
// Закрыть соединение с БД
mysqli_close($connection);
