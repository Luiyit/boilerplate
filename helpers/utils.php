<?php

/**
 * get_fields_by_page_name
 * Retrive all page fields using ACF
 *
 * @param string $name
 *
 * @return Array of fields if page exist, false otherwise
 */
function get_fields_by_page_name($name){
  $page = get_page_by_title($name);
  if(!isset($page)) return []; 

  return get_fields($page->ID);
}