<?php
function get_classes($url, $current_url) {
  $classes = ['main-nav-link'];

  if ($url === $current_url) {
    array_push($classes, 'is-active');
  }

  echo implode(" ", $classes);
}
?>

<div class="main-header" id="main-header">
  <div class="title">
    <a
      class="logo"
      data-route="home"
      href="<?php echo BASE_URL ?>/"
    >
      <svg width="100%" height="100%" viewBox="0 0 75 39" version="1.1" xml:space="preserve" style="fill-rule: evenodd; clip-rule: evenodd; stroke-linejoin: round; stroke-miterlimit: 1.41421;">
        <path d="M37.999,26.025l-2.93,3.903c-0.315,0.461 -0.779,0.907 -1.133,1.337l-0.035,0.047l-0.002,-0.002c-3.511,4.252 -8.822,6.964 -14.762,6.964c-10.562,0 -19.137,-8.575 -19.137,-19.137c0,-10.562 8.575,-19.137 19.137,-19.137c6.682,0 12.569,3.432 15.992,8.628l-6.607,8.808c-0.804,-4.453 -4.702,-7.835 -9.385,-7.835c-5.263,0 -9.536,4.273 -9.536,9.536c0,5.263 4.273,9.536 9.536,9.536c3.684,0 6.199,-1.608 8.99,-4.896c0,0 12.272,-15.933 12.401,-16.105c6.326,-8.458 18.329,-10.188 26.787,-3.862c4.756,3.558 7.385,8.911 7.65,14.419l0.002,0l0,0.058c0.025,0.556 0.026,1.114 0.003,1.672l0.03,18.445l-9.567,0l-0.004,-2.698c-6.43,3.709 -14.723,3.478 -21.039,-1.247c-2.992,-2.237 -5.141,-5.185 -6.391,-8.434Zm12.141,0.746c-4.214,-3.152 -5.077,-9.133 -1.924,-13.348c3.152,-4.215 9.133,-5.077 13.348,-1.925c4.215,3.153 5.077,9.134 1.924,13.349c-3.152,4.214 -9.133,5.077 -13.348,1.924Z"></path>
      </svg>
    </a>
  </div>
  <div class="main-nav">
    <a
      class="<?php get_classes('/', $current_url) ?>"
      data-route="home"
      href="<?php echo BASE_URL ?>/"
    >
      Home
    </a>
    <a
      class="<?php get_classes('/code', $current_url) ?>"
      data-route="code"
      href="<?php echo BASE_URL ?>/code"
    >
      Code
    </a>
    <a
      class="<?php get_classes('/resources', $current_url) ?>"
      data-route="resources"
      href="<?php echo BASE_URL ?>/resources"
    >
      Resources
    </a>
  </div>
</div>