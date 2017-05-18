<?php

namespace lluistfc\Diamond;

/**
 * Class Diamond
 * @package lluistfc\Diamond
 */
class Diamond
{
    const CHARACTER_A = 'a';
    const CHARACTER_Z = 'z';
    const WHITE_SPACE = ' ';

    /** @var string */
    private $letter;

    /** @var integer */
    private $size;

    /**
     * Diamond constructor.
     * @param string $value
     * @throws \Exception
     */
    public function __construct(string $value)
    {
        if (!$this->isLetter($value)) {
            throw new \Exception();
        }

        $this->letter = $value;
        $this->size = (2 * $this->numberOfElements())-1;
    }

    public function __toString()
    {
        $output = PHP_EOL;
        $letter = strtoupper(self::CHARACTER_A);

        for($line = 1; $line <= ($this->size/ 2)+1; $line++) {
            $output.= $this->writeLine($line, $letter);
            $letter = $this->nextLetter($letter);
        }

        return $output . substr(strrev($output), $this->size + 2);
    }

    private function writeLine($lineNumber, $letter)
    {
        $line = $this->writeFirstHalfOfLine($lineNumber, $letter);
        return utf8_encode($line . substr(strrev($line), 1) . PHP_EOL);
    }

    /**
     * @param $lineNumber
     * @param $letter
     * @return string
     */
    private function writeFirstHalfOfLine($lineNumber, $letter): string
    {
        $line = $this->whiteSpacesLeftOfLetter($lineNumber) .
            $letter .
            $this->writeSpacesRightOfLetter($lineNumber);
        return $line;
    }

    /**
     * @param $lineNumber
     * @return string
     */
    private function whiteSpacesLeftOfLetter($lineNumber): string
    {
        $multiplier = $this->numberOfElements() - $lineNumber;
        return str_repeat(self::WHITE_SPACE, $multiplier);
    }

    /**
     * @param $lineNumber
     * @return string
     */
    private function writeSpacesRightOfLetter($lineNumber): string
    {
        $multiplier = $lineNumber - 1;
        return str_repeat(self::WHITE_SPACE, $multiplier);
    }

    /**
     * @param $letter
     * @return string
     */
    private function nextLetter($letter): string
    {
        return chr(ord($letter) + 1);
    }

    /**
     * @param string $value
     * @return bool
     */
    private function isLetter(string $value): bool
    {
        return (strtolower($value) >= self::CHARACTER_A && strtolower($value) <= self::CHARACTER_Z)
            && (strlen($value) === 1);
    }

    /**
     * @return int
     */
    private function numberOfElements(): int
    {
        return ord($this->letter) - ord(self::CHARACTER_A) + 1;
    }
}
