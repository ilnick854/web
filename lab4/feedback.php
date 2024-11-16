<?php
// Подключаем файл script.php для обработки формы и подключения к базе данных
include('script.php');
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Обратная связь</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
    <style>
        /* Стили для увеличения формы обратной связи */
        .feedback-form-container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f8f9fa;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .feedback-form-container h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .feedback-form-container input,
        .feedback-form-container textarea {
            width: 100%;
            padding: 12px;
            font-size: 1.1em;
            margin-bottom: 15px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        .feedback-form-container textarea {
            height: 150px;
            resize: vertical;
        }

        .feedback-form-container button {
            width: 100%;
            padding: 12px;
            font-size: 1.2em;
            font-weight: bold;
            color: #fff;
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .feedback-form-container button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <!-- Шапка -->
    <header>
        <div class="header-top">
            <div class="shop-title">Интернет-магазин по продаже видеокарт</div>
        </div>
        <div class="header-bottom">
            <div class="logo">
                <img src="images/logo.png" alt="Логотип">
            </div>
            <nav class="menu">
                <button>Каталог</button>
                <button>Оплата</button>
                <button>Контакты</button>
                <button>Новости</button>
            </nav>
        </div>
    </header>

    <!-- Основное содержимое -->
    <main class="main-content">
        <section class="feedback-form-container">
            <h2>Форма обратной связи</h2>
            <form action="feedback.php" method="POST">
                <div>
                    <label for="name">Имя:</label>
                    <input type="text" name="name" id="name" required>
                </div>
                <div>
                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email" required>
                </div>
                <div>
                    <label for="message">Сообщение:</label>
                    <textarea name="message" id="message" required></textarea>
                </div>
                <button type="submit">Отправить</button>
            </form>
        </section>
    </main>

    <!-- Подвал -->
    <footer>
        <div class="footer-content">
            <p>&copy; 2024 Магазин. Все права защищены.</p>
            <nav class="footer-menu">
                <a href="about.php">О компании</a>
                <a href="index.php">Главная</a>
                <a href="catalog.php">Каталог</a>
            </nav>
        </div>
    </footer>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="script.js"></script>
</body>
</html>
