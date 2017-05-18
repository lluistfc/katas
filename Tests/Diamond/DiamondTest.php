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

        $this->assertEquals($expectedSize, strlen((string) $diamond));
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
        // we have n*n columns + n+1 PHP_EOL
        return array(
            array('a', (1*1)+2),
            array('b', (3*3)+4),
            array('c', (5*5)+6),
            array('z', (51*51)+52)
        );
    }
}
