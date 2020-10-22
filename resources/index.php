<!doctype html>
<html class="no-js" lang="">
  
<?php
  $path = '../';

  include $path.'api.php';
  include $path.'includes/vars.php';

  // page variables
  $current_url = '/resources';
  $page_title = SITE_NAME.' - Resources';
  $page_desc = 'Resources, useful links, libraries, frameworks and articles.';

  $response = $api->fetchResources();

  $resources = $response->resources;
  $tags = $response->tags;
  
  $isCodeLoaded = false;
  $isResourcesLoaded = true;
?>

<head>
  <?php include $path.'includes/head.php'; ?>
</head>

<body class="theme-2">
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

  <script>
    const resources = <?php echo json_encode($resources); ?>;
    const tags = <?php echo json_encode($tags); ?>;

    console.log(resources, tags)
  </script>

  <template id="code-item-template">
    <?php include $path.'/templates/code-item.php'; ?>
  </template>

  <?php include $path.'includes/body_bottom.php'; ?>
</body>

</html>
