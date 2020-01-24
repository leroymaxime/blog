<?php
        require('../../application/database.php');
        
        $req = $db->query('SELECT * FROM comments ORDER BY approuved ASC');
        while ($comments = $req->fetch()) {
          if($comments['approuved'] == 0) {
            ?>
            <p><strong><?= $comments['author']; ?></strong> => Commentaire non approuvé<br />
                    <em>Posté le : <?= $comments['created_at']; ?></em></p>
                    <p><?= $comments['content']; ?></p>
                    <a href="approuve.php?id=<?= $comments['id']; ?>">Approuver</a>
        
      <?php
          } elseif($comments['approuved'] == 1) {
      ?>
            <p>Il n'y a aucun commentaire à approuvé.</p>
      <?php
          } else {
            echo 'Aucun commentaires trouvés !';
          }
        }?>