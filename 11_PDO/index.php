<?php

$pdo = new PDO('mysql:host=127.0.0.1;dbname=codeeasy_course;port=3306', 'root', 'root');

$statement = $pdo->query('SELECT * FROM products');
$products = $statement->fetchAll(PDO::FETCH_OBJ);
