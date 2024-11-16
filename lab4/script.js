// script.js

document.addEventListener("DOMContentLoaded", function() {
    // Инициализация поиска товаров
    initializeSearch();

    // Инициализация других функций
    setupFeedbackForm();
});

// Функция для настройки поля поиска на странице каталога
function initializeSearch() {
    const searchInput = document.getElementById("searchInput");
    if (!searchInput) return; // Проверяем, что поле поиска существует

    const items = document.querySelectorAll(".product-item");

    // Добавляем обработчик события ввода текста
    searchInput.addEventListener("input", function() {
        const filter = searchInput.value.toLowerCase();

        items.forEach(item => {
            const name = item.querySelector(".product-name").textContent.toLowerCase();

            // Отображаем или скрываем товар в зависимости от результата поиска
            if (name.includes(filter)) {
                item.style.display = "";
            } else {
                item.style.display = "none";
            }
        });
    });
}

// Функция для обработки отправки формы обратной связи
function setupFeedbackForm() {
    const feedbackForm = document.querySelector("form[action='feedback.php']");
    if (!feedbackForm) return; // Проверяем, что форма обратной связи существует

    feedbackForm.addEventListener("submit", function(event) {
        event.preventDefault();

        const formData = new FormData(feedbackForm);

        // Отправка данных формы на сервер с помощью fetch
        fetch("feedback.php", {
            method: "POST",
            body: formData
        })
        .then(response => response.text())
        .then(data => {
            alert(data); // Отображаем ответ от сервера (например, "Спасибо за ваше сообщение!")
            feedbackForm.reset(); // Очищаем форму после отправки
        })
        .catch(error => {
            console.error("Ошибка отправки формы:", error);
            alert("Произошла ошибка при отправке формы.");
        });
    });
}
