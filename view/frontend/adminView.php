<?php $title = 'Administration du Blog'; ?>
<?php ob_start(); ?>
<h1><?php if(!isset($_SESSION['email'])) {
  echo 'No';
} else {
  echo $_SESSION['email'];
}
?></h1>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>