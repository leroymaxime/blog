<?php
require('../../application/database.php');

$delete = $db->prepare('DELETE FROM articles WHERE id = ?');
$delete->execute([$_GET['id']]);
header('Location:index.php');
?>