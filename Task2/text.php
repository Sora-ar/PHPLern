<?php
$logFile = 'log.txt';

// Перевірка на присутність даних
if (isset($_POST['logMessage'])) {
    $message = htmlspecialchars($_POST['logMessage']);
    $messageToLog = "Запис: " . $message . " | Дата і час: " . date('Y-m-d H:i:s') . "\n";

    file_put_contents($logFile, $messageToLog, FILE_APPEND);

    echo "Текст успішно записано в log.txt.<br>";
}

// Читання даних
echo "<h3>Вміст log.txt:</h3>";
if (file_exists($logFile)) {
    $logContents = file_get_contents($logFile);
    echo nl2br(htmlspecialchars($logContents));
} else {
    echo "Файл не знайдено.";
}
