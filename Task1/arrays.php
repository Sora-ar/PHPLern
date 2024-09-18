<?php
$students_info = array(
    0 => array(
        "first_name" => "Jon",
        "last_name" => "Doe",
        "age" => "26",
        "specialization" => "Computer Since"),
    1 => array(
        "first_name" => "Bob",
        "last_name" => "Nill",
        "age" => "20",
        "specialization" => "Computer Since"));
echo $students_info[0]["first_name"] . " " . $students_info[0]["last_name"] . "\n";
echo $students_info[0]["age"] . " years old \n";
echo $students_info[0]["specialization"] . "\n\n";

$students_info[0]["average_grade"] = 88;
$students_info[1]["average_grade"] = 92;

echo "Average grade: " . $students_info[0]["average_grade"] . "\n";
echo "Average grade: " . $students_info[1]["average_grade"] . "\n\n";