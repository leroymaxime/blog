<?php ob_start(); ?>
    <p><a href="index.php">Retour à l'accueil</a></p>
<h2>Publier un commentaire</h2>
        <form action="index.php?action=updateComment&amp;id=<?= $comment['id'] ?>" method="post">
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Pseudo</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" value="<?= htmlspecialchars($comment['pseudo']); ?>" disabled >
            </div>
          </div>
          <div class="form-group row">
            <label for="content" class="col-sm-2 col-form-label">Votre commentaire</label>
            <div class="col-sm-10">
              <textarea id="content" name="content" class="form-control" rows="3" ><?= htmlspecialchars($comment['content']); ?></textarea>
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