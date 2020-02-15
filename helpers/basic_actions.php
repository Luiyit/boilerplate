<?php

  function Include_google_analytic_tracking() {
    $traking_id = get_theme_mod('bt_ga_traking_id');

    if (empty($traking_id)) return;

    ?>
      <!-- Global site tag (gtag.js) - Google Analytics -->
      <script async src="https://www.googletagmanager.com/gtag/js?id=UA-70101134-1"></script>
      <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', '<?php echo $traking_id ?>' );
      </script>
    <?php
  }
  add_action('wp_head', 'Include_google_analytic_tracking');