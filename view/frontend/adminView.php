<?php $title = 'Administration du Blog'; ?>
<?php ob_start(); ?>
<h1>Hello Admin</h1>
<?php $content = ob_get_clean(); ?>

<?php require('templateAdmin.php'); ?>