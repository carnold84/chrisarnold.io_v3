<?php
  if ($isCodeLoaded === false) {
    $projects = array();
  }
?>

<div
  class="page<?php echo $isCodeLoaded === true ? ' show' : ''; ?>"
  data-loaded="<?php echo $isCodeLoaded === true ? 'true' : 'false'; ?>"
  id="code-page"
>
  <div class="loading">Loading...</div>
  <?php
    include $path.'plugins/Parsedown.php';
    $Parsedown = new Parsedown();

    for($i = 0; $i < count($projects); $i++) {
      $project = $projects[$i];
      $number = $i + 1;
      $project->description = $Parsedown->text($project->description);
      $project->paddedNumber = $number < 10 ? '0'.$number : $number;
      include $path.'templates/code-item.php';
    }
  ?>
</div>