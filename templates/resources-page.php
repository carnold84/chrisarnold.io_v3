<?php
  if ($isResourcesLoaded === false) {
    $resources = array();
    $tags = array();
  }
?>

<div 
  class="page<?php echo $isResourcesLoaded ? ' show' : ''; ?>"
  data-loaded="<?php echo $isResourcesLoaded === true ? 'true' : 'false'; ?>"
  id="resources-page"
>
  <div class="loading<?php echo $isResourcesLoaded ? ' show' : ''; ?>">
    Loading...
  </div>
  <div class="options" id="resources-page-options">
    <button class="tags-btn" data-click="tags-btn">
      Show Filters
    </button>
  </div>
  <div class="tags" id="resources-page-tags">
    <div class="tags-header">
      <h3 class="tags-title">Tags</h3>
      <button class="tags-close-btn" data-click="tags-btn">
        <CloseIcon />
      </button>
    </div>
    <ul class="tags-content">
      <li class="tag-item-container">
        <a class="tag-item" href="/resources">
          All
          <span class="tag-count"><?php echo count($tags); ?></span>
        </a>
      </li>
      <?php
        foreach($tags as $tag){
          include $path.'templates/tag-with-count.php';
        }
      ?>
    </ul>
  </div>
  <div class="resources-content" id="resources-page-content">
    <?php
      foreach($resources as $resource){
        include $path.'templates/resource-item.php';
      }
    ?>
  </div>
</div>