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
    // self::printCallRate();

    if ($node->nodeType === XML_TEXT_NODE) {
      return $node->nodeValue === $value ? 1 : 0;
    }

    if ($node->hasChildNodes()) {
      $occurance = 0;
      foreach ($node->childNodes as $child) {
        $occurance += self::occurance($child, $value);
      }

      return $occurance;
    }

    return 0;
  }

  static $last;
  static $count = 0;

  static function printCallRate()
  {
    if (!isset(self::$last)) self::$last = microtime(true);

    self::$count++;

    if (self::$count % 500 === 0) {
      $now = microtime(true);
      $elasped = $now - self::$last;
      error_log(sprintf('process rate: %.3fs /  100', $elasped / 5));
      self::$last = $now;
    }
  }
}
