// Ждём загрузки всего содержимого страницы
document.addEventListener("DOMContentLoaded", function() {
    // Находим форму на странице заказа
    const orderForm = document.querySelector(".order-form");

    if (orderForm) {
        orderForm.addEventListener("submit", function(event) {
            event.preventDefault(); // Отключаем переход на другую страницу

            const phone = document.getElementById("phone").value.trim();
            const address = document.getElementById("address").value.trim();

            if (!phone || !address) {
                alert("Пожалуйста, заполните все обязательные поля.");
                return;
            }

            const phonePattern = /^\+?\d{10,15}$/;
            if (!phonePattern.test(phone)) {
                alert("Пожалуйста, введите корректный номер телефона.");
                return;
            }

            console.log("Телефон:", phone);
            console.log("Адрес:", address);

            showModal("Данные формы успешно обработаны и отправлены.");
        });
    }

    // Модальное окно Bootstrap для сообщения об успешной отправке формы
    function showModal(message) {
        const modalHTML = `
            <div class="modal fade" id="feedbackModal" tabindex="-1" aria-labelledby="feedbackModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="feedbackModalLabel">Информация</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            ${message}
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                        </div>
                    </div>
                </div>
            </div>
        `;
        
        document.body.insertAdjacentHTML('beforeend', modalHTML);

        const feedbackModal = new bootstrap.Modal(document.getElementById('feedbackModal'), {});
        feedbackModal.show();

        document.getElementById('feedbackModal').addEventListener('hidden.bs.modal', function () {
            document.getElementById('feedbackModal').remove();
        });
    }

    // Фильтр на странице каталога
    const searchInput = document.getElementById("searchInput");
    const productItems = document.querySelectorAll(".product-item");

    if (searchInput) {
        searchInput.addEventListener("input", function() {
            const searchText = searchInput.value.toLowerCase();

            productItems.forEach(item => {
                const productName = item.querySelector(".product-name").textContent.toLowerCase();
                item.style.display = productName.includes(searchText) ? "" : "none";
            });
        });
    }
});

// Ждём загрузки всего содержимого страницы
document.addEventListener("DOMContentLoaded", function() {
    // Находим форму на странице заказа
    const orderForm = document.querySelector(".order-form");
    const feedbackForm = document.querySelector(".feedback-form");

    if (orderForm) {
        orderForm.addEventListener("submit", function(event) {
            event.preventDefault(); // Отключаем переход на другую страницу

            const phone = document.getElementById("phone").value.trim();
            const address = document.getElementById("address").value.trim();

            if (!phone || !address) {
                alert("Пожалуйста, заполните все обязательные поля.");
                return;
            }

            const phonePattern = /^\+?\d{10,15}$/;
            if (!phonePattern.test(phone)) {
                alert("Пожалуйста, введите корректный номер телефона.");
                return;
            }

            console.log("Телефон:", phone);
            console.log("Адрес:", address);

            showModal("Данные формы успешно обработаны и отправлены.");
        });
    }

    // Обработка формы обратной связи
    if (feedbackForm) {
        feedbackForm.addEventListener("submit", function(event) {
            event.preventDefault();

            const name = document.getElementById("name").value.trim();
            const email = document.getElementById("email").value.trim();
            const message = document.getElementById("message").value.trim();

            if (!name || !email || !message) {
                alert("Пожалуйста, заполните все обязательные поля.");
                return;
            }

            console.log("Имя:", name);
            console.log("Email:", email);
            console.log("Сообщение:", message);

            showModal("Спасибо за ваше сообщение! Мы свяжемся с вами в ближайшее время.");
        });
    }

    // Модальное окно Bootstrap для сообщения об успешной отправке формы
    function showModal(message) {
        const modalHTML = `
            <div class="modal fade" id="feedbackModal" tabindex="-1" aria-labelledby="feedbackModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="feedbackModalLabel">Информация</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            ${message}
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                        </div>
                    </div>
                </div>
            </div>
        `;
        
        document.body.insertAdjacentHTML('beforeend', modalHTML);

        const feedbackModal = new bootstrap.Modal(document.getElementById('feedbackModal'), {});
        feedbackModal.show();

        document.getElementById('feedbackModal').addEventListener('hidden.bs.modal', function () {
            document.getElementById('feedbackModal').remove();
        });
    }
});
