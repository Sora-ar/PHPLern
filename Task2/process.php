<?php
// Перевірка завантаження файлу
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_FILES['file'])) {
        $file = $_FILES['file'];

        $uploadDir = 'uploads/';

        $fileName = $file['name'];
        $fileTmpName = $file['tmp_name'];
        $fileSize = $file['size'];
        $fileError = $file['error'];

        $allowedExtensions = ['png', 'jpg', 'jpeg'];
        $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

        // 2 МБ - максимум
        $maxFileSize = 2 * 1024 * 1024;

        // Помилка при завантаженні
        if ($fileError === UPLOAD_ERR_OK) {

            // Перевірка на розширення
            if (in_array($fileExtension, $allowedExtensions)) {

                // Перевірка еа розмір
                if ($fileSize <= $maxFileSize) {
                    if (is_uploaded_file($fileTmpName)) {

                        // Генерація номого імені файлу, якщо вже до цього був такий
                        $newFileName = $fileName;
                        $uploadPath = $uploadDir . $newFileName;

                        $count = 1;
                        while (file_exists($uploadPath)) {
                            $newFileName = pathinfo($fileName, PATHINFO_FILENAME) . "_" . date('YmdHis') . "($count)." . $fileExtension;
                            $uploadPath = $uploadDir . $newFileName;
                            $count++;
                        }

                        // Переміщення файлу у папку uploads
                        if (move_uploaded_file($fileTmpName, $uploadPath)) {
                            $fileSizeKB = round($fileSize / 1024, 2);
                            echo "Файл успішно завантажено:<br>";
                            echo "Ім'я файлу: " . htmlspecialchars($newFileName) . "<br>";
                            echo "Тип файлу: " . htmlspecialchars($file['type']) . "<br>";
                            echo "Розмір файлу: " . $fileSizeKB . " КБ<br>";
                            echo "<a href='" . htmlspecialchars($uploadPath) . "' download>Завантажити файл назад</a>";
                        } else {
                            echo "Помилка при збереженні файлу.";
                        }

                    } else {
                        echo "Файл не був завантажений належним чином.";
                    }

                } else {
                    echo "Файл перевищує допустимий розмір 2 МБ.";
                }

            } else {
                echo "Дозволені лише файли з розширеннями: png, jpg, jpeg.";
            }

        } else {
            echo "Сталася помилка під час завантаження файлу.";
        }

    } else {
        echo "Файл не завантажено.";
    }
}