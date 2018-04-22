<?php
  function unicode_encode($str) {
    return preg_replace_callback("/\\\\u([0-9a-zA-Z]{4})/", "encode_callback", $str);
  }

  function encode_callback($matches) {
    $char = mb_convert_encoding(pack("H*", $matches[1]), "UTF-8", "UTF-16");
    return $char;
  }

  $str = $argv[1];
  $encoded = unicode_encode($str);
  echo $encoded;
?>
