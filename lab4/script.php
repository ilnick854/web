<?php
// Конфигурация подключения к базе данных
$servername = "MySQL-8.2";
$username = "root";
$password = "";
$dbname = "shop_db";

// Создаем подключение
$conn = new mysqli($servername, $username, $password, $dbname);

// Проверка подключения
if ($conn->connect_error) {
    die("Ошибка подключения: " . $conn->connect_error);
}

// Функция для получения товаров
function getProducts($conn) {
    $sql = "SELECT * FROM products";
    $result = $conn->query($sql);

    if (!$result) {
        die("Ошибка запроса: " . $conn->error);
    }

    $products = [];
    while ($row = $result->fetch_assoc()) {
        $products[] = $row;
    }

    return $products;
}

// Обработка формы обратной связи
function handleFeedback($conn) {
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['name'], $_POST['email'], $_POST['message'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $message = $_POST['message'];

        if (empty($name) || empty($email) || empty($message)) {
            echo "Пожалуйста, заполните все поля.";
            return;
        }

        $query = "INSERT INTO feedbacks (name, email, message) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($query);

        if ($stmt === false) {
            echo "Ошибка в подготовке запроса: " . $conn->error;
            return;
        }

        $stmt->bind_param("sss", $name, $email, $message);

        if ($stmt->execute()) {
            echo "Спасибо за ваше сообщение!";
        } else {
            echo "Ошибка при отправке сообщения: " . $stmt->error;
        }

        $stmt->close();
    }
}

// Если на странице `feedback.php`, вызываем обработку формы
if (basename($_SERVER['PHP_SELF']) == 'feedback.php') {
    handleFeedback($conn);
}
?>
