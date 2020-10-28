<!doctype html>
<html class="no-js" lang="">
  
<?php
  $path = '../';

  include $path.'api.php';

  // page variables
  $current_url = '/code';
  $page_title = SITE_NAME.' - Code';
  $page_desc = 'Experiments and projects built using Javascript, React, Vue, Angular and much more.';

  $projects = $api->fetchProjects();
  
  $isCodeLoaded = true;
  $isResourcesLoaded = false;
?>

<head>
  <?php include $path.'includes/head.php'; ?>
</head>

<body class="theme-2">
  <!--[if IE]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
  <![endif]-->

  <?php
    include $path.'includes/main-header.php';
  ?>

  <div class="main-content">
    <?php include $path.'templates/home-page.php'; ?>
    <?php include $path.'templates/code-page.php'; ?>
    <?php include $path.'templates/resources-page.php'; ?>
  </div>

  <template id="resource-item-template">
    <?php include $path.'/templates/resource-item.php'; ?>
  </template>

  <?php include $path.'includes/body-bottom.php'; ?>
</body>

</html>
