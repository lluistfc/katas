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

    /**
     * @test
     * @dataProvider letterProvider
     */
    public function shouldCreateADiamondOfSizeTwoTimesMinusOne($letter, $expectedSize)
    {
        $diamond = new Diamond($letter);
        $this->assertEquals($expectedSize, $diamond->getSize());

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

    public function letterProvider()
    {
        return array(
            array('a', 1),
            array('b', 3),
            array('c', 5),
            array('z', 51)
        );
    }
}
