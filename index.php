<!doctype html>
<html class="no-js" lang="">

<?php
  $path = '';

  include $path.'includes/vars.php';

  // page variables
  $current_url = '/';
  $page_title = SITE_NAME.' - Front-end Developer and Designer';
  $page_desc = 'Chris Arnold - Front-end developer and designer working in Javascript, HTML, CSS, React, Vue, Node and much more.';

  $isCodeLoaded = false;
  $isResourcesLoaded = false;
?>

<head>
  <?php include $path.'includes/head.php'; ?>
</head>

<body class="theme-1">
  <!--[if IE]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
  <![endif]-->

  <?php
    include $path.'includes/main_header.php';
  ?>

  <div class="main-content">
    <?php include $path.'templates/home-page.php'; ?>
    <?php include $path.'templates/code-page.php'; ?>
    <?php include $path.'templates/resources-page.php'; ?>
  </div>

  <template id="code-item-template">
    <?php include $path.'templates/code-item.php'; ?>
  </template>

  <template id="resource-item-template">
    <?php include $path.'templates/resource-item.php'; ?>
  </template>

  <?php include $path.'includes/body_bottom.php'; ?>
</body>

</html>
