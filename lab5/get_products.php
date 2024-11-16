<?php
// Параметры подключения к базе данных
$host = 'MySQL-8.2';
$dbname = 'video_cards_store';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Получение данных о продуктах
    $stmt = $pdo->query("SELECT id, name, price, image FROM products");
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Возвращаем данные в формате JSON
    header('Content-Type: application/json');
    echo json_encode($products);
} catch (PDOException $e) {
    echo json_encode(['error' => 'Произошла ошибка при получении данных.']);
}
?>
