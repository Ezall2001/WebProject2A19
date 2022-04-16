<html>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta http-equiv="Cache-control" content="no-cache">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>
    <?php echo SITENAME; ?>
  </title>


  <?php
  foreach ($data['styles'] as $style) {
    echo '<link rel="stylesheet" href="' . URLROOT . '/public/style/css/' . $style . '.css">';
  }
  ?>

  <script src="https://kit.fontawesome.com/22e2495c8c.js" crossorigin="anonymous"></script>
  <script src="./node_modules/jquery/dist/jquery.min.js" defer></script>
  <?php
  foreach ($data['js'] as $js) {
    echo '<script src="' . URLROOT . '/public/app/' . $js . '.js" type="module" defer></script>';
  }
  ?>

  <!-- TODO: add favicon -->
</head>

<body>