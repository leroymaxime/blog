<?php $title = 'Ajouter un article'; ?>
<?php ob_start(); ?>
<h2>Publier un article</h2>
        <form action="admin.php?action=newArticle" method="post">
          <div class="form-group row">
            <label for="title" class="col-sm-2 col-form-label">Titre</label>
            <div class="col-sm-10">
              <input type="text" id="title" name="title" class="form-control" >
            </div>
          </div>
          <div class="form-group row">
            <label for="slug" class="col-sm-2 col-form-label">Slug</label>
            <div class="col-sm-10">
              <input type="text" id="slug" name="slug" class="form-control" >
            </div>
          </div>
          <div class="form-group row">
            <label for="introduction" class="col-sm-2 col-form-label">Introduction</label>
            <div class="col-sm-10">
              <textarea id="introduction" name="introduction" class="form-control" rows="3"></textarea>
            </div>
          </div>
          <div class="form-group row">
            <label for="content" class="col-sm-2 col-form-label">Contenu</label>
            <div class="col-sm-10">
              <textarea id="content" name="content" class="form-control" rows="3"></textarea>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-sm-10">
              <button type="submit" class="btn btn-primary">Envoyer</button>
            </div>
          </div>
        </form>
        <?php $content = ob_get_clean(); ?>

<?php require('templateAdmin.php');