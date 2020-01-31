<?php $title = 'Blog'; ?>
<div class="row">
  </div>
  <br />
    <div class="row row-cols-1 row-cols-md-3">
        <?php
          while ($data = $posts->fetch()) {
        ?> 
        <div class="col mb-4"> 
          <div class="card">
            <div class="card-body">
              <h2 class="card-title"><?= htmlspecialchars($data['title']); ?></h2>
              <p class="card-text"><?= htmlspecialchars($data['introduction']); ?></p>
              <p><a href="index.php?action=post&amp;id=<?= $data['id'] ?>"> Lire la suite</a></p>
            </div>
            <div class="card-footer">
              <small class="text-muted">Posté le : <?= htmlspecialchars($data['created_at']); ?></small>          
            </div>
          </div>
        </div>
        <?php 
        }
          $posts->closeCursor();
        ?>
    </div>