<?php
require_once 'app/init.php';

if(isset($_POST['name'])) {
  $name = trim($_POST['name']);

  if(!empty($name)) {
    $addedQuery = $conn->prepare("
      INSERT INTO items (name, user, done, created)
      VALUES (:name, :user, 0, NOW())
    ");

    $addedQuery->execute([
      'name' => htmlspecialchars($name),
      'user' => $_SESSION['user_id']
    ]);
  }
}

header('Location: index.php');