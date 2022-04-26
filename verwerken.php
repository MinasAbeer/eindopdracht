<?php

try {
    $pdo = new PDO('mysql:host=localhost;dbname=vis', 'root', '');
} catch (PDOException $e) { 
    print "Error! " . $e->getMessage() . "<br>";
    die();
}

$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$title = $_POST['title'];
$path = $_POST['path'];
$category = $_POST['category'];

try { 
    $pdo->query("INSERT INTO $category (title, path) VALUES ('$title', '$path')");
    header("Location: index.php");
} catch (PDOException $e) { 
    echo "Error: " . $e->getMessage() . "<br>";
    die();
}