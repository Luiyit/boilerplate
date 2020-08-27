<?php

function os_text_size_shortcode( $atts = array(), $content = null ) {
  
  // set up default parameters
  extract(shortcode_atts(array('size' => 'quote'), $atts));
  
  ob_start(); ?>
    <div class="op-<?php echo $size ?>-size">
      <?php echo $content?>
    </div>
  <?php

  $content = ob_get_clean();
  return $content;
}

add_shortcode('os_size', 'os_text_size_shortcode');



function font_signature_shortcode( $atts = array(), $content = null ) {
  
  // set up default parameters
  extract(shortcode_atts(array('class_name' => '', 'size' => 'big'), $atts));
  
  ob_start(); ?>
    <div class="<?php echo $class_name?> better-signature-font bs-<?php echo $size?>-title-size accent-color-1"><?php echo $content?></div>
  <?php

  $content = ob_get_clean();
  return $content;
}

add_shortcode('font_signature', 'font_signature_shortcode');