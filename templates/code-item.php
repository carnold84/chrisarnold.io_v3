<?php
  if (!isset($project)) {
    $project = (object) [
      'demo_url' => '',
      'description' => '',
      'name' => '',
      'paddedNumber' => '',
      'repo_url' => '',
      'tags' => ''
    ];
  }
?>

<div class="code-item">
  <p class="code-item-number"><?php echo $project->paddedNumber; ?>.</p>
  <h2 class="code-item-header"><?php echo $project->name; ?></h2>
  <div class="code-item-content"><?php echo $project->description; ?></div>
  <p class="code-item-meta">
    <span>Tags:</span>
    <span class="code-item-tags"><?php echo $project->tags; ?></span>
  </p>
  <div class="code-item-links">
    <a
      class="code-item-link repo"
      href="<?php echo $project->repo_url; ?>"
      rel="noopener"
      target="_blank"
    >
      <svg xmlns="http://www.w3.org/2000/svg" width="102" height="100" viewBox="0 0 102 100" style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:1.41421;">
        <path d="M50.9,0c-28.106,0 -50.9,22.791 -50.9,50.906c0,22.491 14.584,41.569 34.812,48.3c2.547,0.469 3.475,-1.103 3.475,-2.453c0,-1.209 -0.043,-4.409 -0.068,-8.656c-14.16,3.075 -17.147,-6.825 -17.147,-6.825c-2.316,-5.881 -5.653,-7.447 -5.653,-7.447c-4.622,-3.156 0.35,-3.094 0.35,-3.094c5.109,0.36 7.797,5.247 7.797,5.247c4.54,7.778 11.915,5.531 14.815,4.228c0.463,-3.287 1.778,-5.531 3.231,-6.803c-11.303,-1.284 -23.187,-5.653 -23.187,-25.159c0,-5.556 1.984,-10.103 5.241,-13.66c-0.525,-1.287 -2.272,-6.465 0.5,-13.472c0,0 4.271,-1.368 13.996,5.219c4.06,-1.131 8.416,-1.693 12.744,-1.715c4.325,0.022 8.678,0.584 12.744,1.715c9.719,-6.587 13.984,-5.219 13.984,-5.219c2.778,7.007 1.032,12.185 0.51,13.472c3.262,3.557 5.231,8.104 5.231,13.66c0,19.556 -11.903,23.859 -23.241,25.118c1.825,1.572 3.453,4.679 3.453,9.426c0,6.806 -0.062,12.296 -0.062,13.965c0,1.363 0.919,2.947 3.5,2.45c20.212,-6.747 34.784,-25.812 34.784,-48.297c0,-28.115 -22.793,-50.906 -50.909,-50.906Z" />
      </svg>
      <span>Code</span>
    </a>
    <a
      class="code-item-link demo"
      href="<?php echo $project->demo_url; ?>"
      rel="noopener"
      target="_blank"
    >
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
        <path d="M0 0h24v24H0z" fill="none"/>
        <path d="M19 19H5V5h7V3H5c-1.11 0-2 .9-2 2v14c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2v-7h-2v7zM14 3v2h3.59l-9.83 9.83 1.41 1.41L19 6.41V10h2V3h-7z"/>
      </svg>
      <span>View</span>
    </a>
  </div>
</div>