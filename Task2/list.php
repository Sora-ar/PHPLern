<?php
$uploadDir = 'uploads/';

// Список файлів у папці uploads
$files = array_diff(scandir($uploadDir), array('..', '.'));

echo "<h3>Список завантажених файлів:</h3>";
if (empty($files)) {
    echo "Файлів не знайдено.";
} else {
    echo "<ul>";
    foreach ($files as $file) {
        echo "<li><a href='" . htmlspecialchars($uploadDir . $file) . "' download>" . htmlspecialchars($file) . "</a></li>";
    }
    echo "</ul>";
}
