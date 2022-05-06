<html>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta http-equiv="Cache-control" content="no-cache">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>
    <?php echo SITENAME; ?>
  </title>


  <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid.min.css" />
  <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid-theme.min.css" />
  <?php
  foreach ($data['styles'] as $style) {
    echo '<link rel="stylesheet" href="' . URLROOT . '/public/style/css/' . $style . '.css">';
  }
  ?>

  <script src="<?php echo URLROOT ?>/public/node_modules/jquery/dist/jquery.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid.min.js"></script>
  <script src="https://kit.fontawesome.com/22e2495c8c.js" crossorigin="anonymous"></script>

  <?php
  foreach ($data['js'] as $js) {
    echo '<script src="' . URLROOT . '/public/app/' . $js . '.js" type="module" defer></script>';
  }
  ?>

  <!-- TODO: add favicon -->
</head>

<body>