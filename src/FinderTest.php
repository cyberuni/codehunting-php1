<?php

namespace codehunting_php1;

use DOMDocument;
use PHPUnit\Framework\TestCase;

class FinderTest extends TestCase
{
  function test_singleEntry()
  {
    $xml = file_get_contents(realpath(__DIR__ . '/../fixtures/single-entry.xml'));

    $dom = new DOMDocument();
    $dom->loadXML($xml);
    $result = Finder::occurance($dom, '2');

    $this->assertEquals(1, $result);
  }

  function test_bigFile()
  {
    $xml = file_get_contents(realpath(__DIR__ . '/../fixtures/big.xml'));

    $dom = new DOMDocument();
    $dom->loadXML($xml);
    $result = Finder::occurance($dom, '2');

    $this->assertEquals(190676, $result);
  }
}
