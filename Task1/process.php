<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $first_name = isset($_POST['first_name']) ? trim($_POST['first_name']) : '';
        $last_name = isset($_POST['last_name']) ? trim($_POST['last_name']) : '';
        // trim() - for delete " "
        if (empty($first_name) || empty($last_name)) {
            echo "Fill in all fields.";
        } else {
            if (!preg_match("/^[a-zA-Zа-яА-ЯёЁіІїЇєЄ']+$/u", $first_name) ||
                !preg_match("/^[a-zA-Zа-яА-ЯёЁіІїЇєЄ']+$/u", $last_name)) {
                echo "First and last name must contain only letters.";
            } else {
                // htmlspecialchars() - for safety HTML-code
                echo "Hello, " . htmlspecialchars($first_name) . " " . htmlspecialchars($last_name) . "!";
            }
        }
    } else {
        echo "Invalid form submission method.";
    }
