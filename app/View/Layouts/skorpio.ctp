<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
  <head>
  <?php echo $this->Html->charset(); ?>
  <meta name="generator" content="PSPad editor, www.pspad.com">
  <title><?php echo $this->fetch('title'); ?></title>
  <link href="<?php echo $this->webroot; ?>/css/skorpio.css" rel="stylesheet">
  </head>
  <body>
   <?php echo $this->Session->flash(); ?>
   <?php echo $this->fetch('content'); ?>
  </body>
</html>
