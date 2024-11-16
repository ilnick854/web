<?php
// Параметры подключения к базе данных
$host = 'MySQL-8.2';         // Имя хоста
$dbname = 'video_cards_store';    // Имя базы данных
$username = 'root';  // Имя пользователя базы данных
$password = '';  // Пароль

// Устанавливаем соединение с базой данных
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Получаем данные из POST-запроса
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Подготавливаем SQL-запрос для вставки данных в таблицу feedback
    $stmt = $pdo->prepare("INSERT INTO feedback (name, email, message, created_at) VALUES (:name, :email, :message, NOW())");

    // Привязываем параметры и выполняем запрос
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':message', $message);
    $stmt->execute();

    // Формируем ответ
    $response = ['message' => 'Спасибо за ваше сообщение! Мы свяжемся с вами в ближайшее время.'];
} catch (PDOException $e) {
    // Обработка ошибки и формирование сообщения об ошибке
    $response = ['message' => 'Произошла ошибка при отправке сообщения. Попробуйте еще раз.'];
}

// Возвращаем JSON-ответ
header('Content-Type: application/json');
echo json_encode($response);
?>

