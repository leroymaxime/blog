<?php
require('../../application/database.php');

$req = $db->prepare('SELECT * FROM articles WHERE id = ?');
        $req->execute([$_GET['id']]);
        $post = $req->fetch();
?>

<form action="confirm_edit.php" method="post">
        <input type="text" name="id" value="<?php echo htmlspecialchars($post['id']); ?>" style="display:none;">
        <label>Titre de l'article : </label>
        <input name="title" type="textarea" rows="3" style="width:80%; height:50px;" value="<?= $post['title'];?>">
        <br />
        <label>Introduction : </label>
        <textarea name="introduction" type="textarea" rows="3" style="width:80%; height:200px;" value="Votre message"><?= $post['introduction'];?></textarea>
        <br/>
        <label>Contenu de l'article : </label>
        <textarea name="content" type="textarea" rows="3" style="width:80%; height:200px;" value="Votre message"><?= $post['content'];?></textarea>
        <br/>
        <button type="sumit" name="confirm_comment">Envoyer</button>
      </form>