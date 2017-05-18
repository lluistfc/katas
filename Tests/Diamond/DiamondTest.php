<?php

namespace Tests\Diamond;

use lluistfc\Diamond\Diamond;

class DiamondTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     * @dataProvider invalidValuesProvider
     * @expectedException \Exception
     */
    public function shouldGiveErrorIfInputIsNotALetter($value)
    {
        new Diamond($value);
    }

    public function invalidValuesProvider()
    {
        return array(
            array('1'),
            array('!'),
            array(''),
            array(' '),
            array('1a2c')
        );
    }
}
