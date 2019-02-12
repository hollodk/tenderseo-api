<?php

namespace Translator\Test;

use PHPUnit\Framework\TestCase;

final class DefaultTest extends TestCase
{
    public function testTypos()
    {
        $seo = new \TenderSEO\Client();

        // first test, just to make sure we dont have any typos
        $this->assertEquals(1, 1);
    }
}
