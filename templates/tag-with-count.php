<li class="tag-item-container">
  <a class="tag-item" href="/">
    <?php echo $tag->name; ?>
    <?php if ($tag->count) : ?>
      <span class="tag-count"><?php echo $tag->count; ?></span>
    <?php endif; ?>
  </a>
</li>