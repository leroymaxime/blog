<?php ob_start(); ?>
    <p><a href="index.php">Retour aux articles</a></p>
    <h1><?= htmlspecialchars($post['title']); ?></h1>
    <em>Posté le : <?= htmlspecialchars($post['created_at']); ?></em><br />
      <em><?= htmlspecialchars($post['introduction']); ?></em>
      <p><?= htmlspecialchars($post['content']); ?></p>

      <br />
      <h2>Commentaires</h2>
      <?php
        while ($comment = $comments->fetch()) {
          if($comment['approuved'] == 0) {

          } else {
      ?>
      <p><div class="card">
        <div class="card-header">
        <h5 class="card-title"><?= htmlspecialchars($comment['pseudo']); ?></h5>
        </div>
        <div class="card-body">
          <p class="card-text"><?= htmlspecialchars($comment['content']); ?></p>
        </div>
        <div class="card-footer text-muted">
          <?= htmlspecialchars($comment['created_at']); ?>
        </div>
      </div></p>
      <?php } }?>
         
        <h2>Publier un commentaire</h2>
        <form action="index.php?action=addComment&amp;id=<?= $post['id'] ?>" method="post">
          <div class="form-group row">
            <label for="pseudo" class="col-sm-2 col-form-label">Pseudo</label>
            <div class="col-sm-10">
              <input type="text" id="pseudo" name="pseudo" class="form-control" >
            </div>
          </div>
          <div class="form-group row">
            <label for="comment" class="col-sm-2 col-form-label">Votre commentaire</label>
            <div class="col-sm-10">
              <textarea id="comment" name="comment" class="form-control" rows="3"></textarea>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-sm-10">
              <button type="submit" class="btn btn-primary">Envoyer</button>
            </div>
          </div>
        </form>
       <?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>