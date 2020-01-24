<?php
        require('../../application/database.php');
        $req = $db->prepare('UPDATE comments SET approuved = 1 WHERE id = ?');
        $req->execute([$_GET['id']]);

        header('Location:commentsList.php');
      ?>