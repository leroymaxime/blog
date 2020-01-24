<?php

require('../../application/database.php');

$delete = $db->prepare('UPDATE articles SET title = :title, introduction = :introduction, content = :content WHERE id = :id');
$delete->execute([
  'title'=> nl2br(htmlspecialchars($_POST['title'])),
  'introduction' => nl2br(htmlspecialchars($_POST['introduction'])),
  'content' => nl2br(htmlspecialchars($_POST['content'])),
  'id' => $_POST['id']
]);

header('Location:index.php');