<?php
/* Created By: Lisa DeBona
 * Created On: 09.28.2020
/* ==================================================================================
 * No more configuration
 * ================================================================================== */
function extract_emails_from($string) {
  preg_match_all("/[\._a-zA-Z0-9-]+@[\._a-zA-Z0-9-]+/i", $string, $matches);
  return $matches[0];
}

add_filter ('the_content', 'anti_email_spam', 15);
function anti_email_spam ($string) {
  $emails_matched = ($string) ? extract_emails_from($string) : '';
  if($emails_matched) {
    foreach($emails_matched as $em) {
      $encrypted = antispambot($em,1);
      $replace = 'mailto:'.$em;
      $new_mailto = 'mailto:'.$encrypted;
      $string = str_replace($replace, $new_mailto, $string);
      $rep2 = $em.'</a>';
      $new2 = antispambot($em).'</a>';
      $string = str_replace($rep2, $new2, $string);
    }
  }
  return $string;
}
?>