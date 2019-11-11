<?php

namespace codehunting_php1;

use DOMDocument;

class Finder
{
  /**
   * @param DOMDocument $node
   */
  static function occurance($node, $value)
  {
    if ($node->nodeType === XML_TEXT_NODE) {
      return $node->nodeValue === $value ? 1 : 0;
    }

    if ($node->hasChildNodes()) {
      $occurance = 0;
      for ($i = 0; $i < $node->childNodes->length; $i++) {
        $child = $node->childNodes->item($i);
        $occurance += self::occurance($child, $value);
      }

      return $occurance;
    }

    return 0;
  }
}
