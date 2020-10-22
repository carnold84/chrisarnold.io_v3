<?php
  if (!isset($resource)) {
    $resource = (object) [
      'link' => NULL,
      'name' => NULL,
      'tags' => NULL
    ];
  }
?>

<div class="resource-item">
  <div class="resource-item-cell resource-item-title"><?php echo $resource->name; ?></div>
  <div class="resource-item-cell">
    <a class="resource-item-url-link" href="<?php echo $resource->link; ?>" rel="noopener" target="_blank">
      <?php echo $resource->link; ?>
    </a>
  </div>
  <div class="resource-item-cell resource-item-tags">
    <?php
      for($i = 0; $i < count($resource->tags); $i++) {
        $tag = $resource->tags[$i];
        include '../templates/tag.php';
      }
    ?>
  </div>
</div>