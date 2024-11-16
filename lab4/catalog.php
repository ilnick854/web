<?php
include('script.php'); // Подключаем файл с функциями работы с БД

// Получаем товары
$products = getProducts($conn);
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Каталог - Интернет-магазин видеокарт</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<!-- Подключаем шапку -->
<?php include('header.php'); ?>

<main class="main-content">
    <h2>Каталог видеокарт</h2>
    
    <!-- Поле поиска -->
    <input type="text" id="searchInput" class="search-input" placeholder="Поиск видеокарт..." />

    <div class="product-list">
        <?php foreach ($products as $product): ?>
            <div class="product-item">
                <img src="images/<?= htmlspecialchars($product['image']) ?>" alt="<?= htmlspecialchars($product['name']) ?>">
                <p class="product-name"><?= htmlspecialchars($product['name']) ?></p>
                <p class="product-price"><?= htmlspecialchars($product['price']) ?> ₽</p>
            </div>
        <?php endforeach; ?>
    </div>
</main>

<!-- Подключаем подвал -->
<?php include('footer.php'); ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="script.js"></script> <!-- Подключаем script.js внизу -->
</body>
</html>
