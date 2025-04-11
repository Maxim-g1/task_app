// Функция deleteTask принимает идентификатор задачи для удаления
function deleteTask(taskId) {
    if (confirm("Вы точно хотите удалить задачу?")) {
        // Если confirm вернула true то удалить задачу
        fetch(`deleteTask.php?id=${taskId}`)// отправляеться get запрос где в id записывается id задачи, которую хотят удалить
            .then(() => {
                window.location.reload();// Перезагрузка страницы
            })
            .catch((error) => {
                alert("Удаление невозможно")
            })
    }
}


// Функция загрузки задач из сервера и загрузка их на страницу
function loadTasks() {
    // функция fetch возвращает promis к которому применяется метод then, при его выполнении в переменной response будет ответ от сервера
    fetch('get_tasks.php').
        then((response) => {
            //Преобразуем ответ в JSON
            return response.json();

        })
        .then((data) => {
            const tasklist = document.getElementById("taskList");
            // очистка списка задач перед обновлением
            tasklist.innerHTML = '';
            data.forEach((task) => {
                // создание нового элемента списка
                const listItem = document.createElement('li');
                // записываем в элемент списка задачу
                listItem.innerHTML = `
                 Дата: ${task.task_date} <br>
                 Время: ${task.task_time} <br>
                 Задача: ${task.task} <br>
                 Приоритет: ${task.priority}<br><br> `

                // Добавить кнопку удаления задачи
                listItem.innerHTML += `<button onclick='deleteTask(${task.id})'>Удалить</button> `
                // добавляю элемент списка в списрк задач
                tasklist.appendChild(listItem);

            });
        })
    //метод then используют, чтобы выполнить код после успешного выполнения ассинхронной операции 
    // метод then вернёт promise результатом которого уже будет массив объектов(строк из БД)
}
loadTasks();
// загрузка задач при загрузке страницы