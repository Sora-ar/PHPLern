<?php
if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    header('Location: redirect_page.php');
    exit();
}
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Інформація про сервер</title>
    </head>
    <body>
    <h1>Інформація про сервер та запит</h1>
    <p>IP-адреса клієнта: <?= $_SERVER['REMOTE_ADDR']; ?></p>
    <p>Назва та версія браузера: <?= $_SERVER['HTTP_USER_AGENT']; ?></p>
    <p>Назва скрипта: <?= $_SERVER['PHP_SELF']; ?></p>
    <p>Метод запиту: <?= $_SERVER['REQUEST_METHOD']; ?></p>
    <p>Шлях до файлу на сервері: <?= $_SERVER['SCRIPT_FILENAME']; ?></p>
    </body>
    </html>
<?php
