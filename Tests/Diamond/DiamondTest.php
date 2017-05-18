<?php

namespace Tests\Diamond;

use lluistfc\Diamond\Diamond;

class DiamondTest extends \PHPUnit_Framework_TestCase
{
    const WHITE_SPACE = ' ';
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
     * @param $letter
     * @param $expectedSize
     */
    public function shouldCreateADiamondOfTwoTimesMinusOneElements($letter, $expectedSize)
    {
        $diamond = new Diamond($letter);

        $this->assertEquals($expectedSize, substr_count((string) $diamond, PHP_EOL));
    }

    /**
     * @test
     */
    public function shouldPrintADiamondOfSevenBySevenGivenLetterD()
    {
        $diamond = new Diamond('d');

        $expectedOutput = PHP_EOL .
            self::WHITE_SPACE . self::WHITE_SPACE . self::WHITE_SPACE . "A"               . self::WHITE_SPACE . self::WHITE_SPACE . self::WHITE_SPACE . PHP_EOL .
            self::WHITE_SPACE . self::WHITE_SPACE . "B"               . self::WHITE_SPACE . "B"               . self::WHITE_SPACE . self::WHITE_SPACE . PHP_EOL .
            self::WHITE_SPACE . "C"               . self::WHITE_SPACE . self::WHITE_SPACE . self::WHITE_SPACE . "C"               . self::WHITE_SPACE . PHP_EOL .
            "D"               . self::WHITE_SPACE . self::WHITE_SPACE . self::WHITE_SPACE . self::WHITE_SPACE . self::WHITE_SPACE . "D"               . PHP_EOL .
            self::WHITE_SPACE . "C"               . self::WHITE_SPACE . self::WHITE_SPACE . self::WHITE_SPACE . "C"               . self::WHITE_SPACE . PHP_EOL .
            self::WHITE_SPACE . self::WHITE_SPACE . "B"               . self::WHITE_SPACE . "B"               . self::WHITE_SPACE . self::WHITE_SPACE . PHP_EOL .
            self::WHITE_SPACE . self::WHITE_SPACE . self::WHITE_SPACE . "A"               . self::WHITE_SPACE . self::WHITE_SPACE . self::WHITE_SPACE . PHP_EOL;

            $this->assertEquals(utf8_encode($expectedOutput), (string) $diamond);
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
        // (2*n - 1) elements + 1 PHP_EOL at the end
        return array(
            array('a', 2*1-1+1),
            array('b', 2*2-1+1),
            array('c', 2*3-1+1),
            array('z', 2*26-1+1)
        );
    }
}
