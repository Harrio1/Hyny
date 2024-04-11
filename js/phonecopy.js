// Получаем все элементы с классом "phoneNumber"
var phoneNumbers = document.querySelectorAll(".phoneNumber");

// Добавляем обработчик события ко всем найденным элементам
phoneNumbers.forEach(function(phoneNumberElement) {
    phoneNumberElement.addEventListener("click", function() {
        var phoneNumber = this.textContent.trim();

        // Создаем временный элемент input
        var tempInput = document.createElement("input");
        // Задаем значение временного элемента
        tempInput.value = phoneNumber;
        // Добавляем временный элемент на страницу
        document.body.appendChild(tempInput);
        // Выделяем содержимое временного элемента
        tempInput.select();
        // Копируем содержимое временного элемента в буфер обмена
        document.execCommand("copy");
        // Удаляем временный элемент
        document.body.removeChild(tempInput);

        // Создаем элемент уведомления
        var copyNotification = document.getElementById("copyNotification");
        copyNotification.textContent = "Номер скопирован в буфер обмена.";
        // Показываем уведомление
        copyNotification.style.display = "block";
        // Скрываем уведомление через 2 секунды
        setTimeout(function() {
            copyNotification.style.display = "none";
        }, 2000);
    });
});
