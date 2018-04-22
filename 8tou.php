<?php
  function unicode_decode($str) {
    return preg_replace_callback("/((?:[^\x09\x0A\x0D\x20-\x7E]{3})+)/", "decode_callback", $str);
  }

  function decode_callback($matches) {
    $char = mb_convert_encoding($matches[1], "UTF-16", "UTF-8");
    $escaped = "";
    for ($i = 0, $l = strlen($char); $i < $l; $i += 2) {
      $escaped .=  "\u" . sprintf("%02x%02x", ord($char[$i]), ord($char[$i+1]));
    }
    return $escaped;
  }

  $str = $argv[1];
  $encoded = unicode_decode($str);
  echo $encoded;
?>
