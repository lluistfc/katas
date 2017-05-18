<?php

namespace lluistfc\Diamond;

/**
 * Class Diamond
 * @package lluistfc\Diamond
 */
class Diamond
{
    /** @var string */
    private $value;

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

        $this->value = $value;
        $this->calculateSize();
    }

    /**
     * @return int
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * @param string $value
     * @return bool
     */
    private function isLetter(string $value): bool
    {
        return (strtolower($value) >= 'a' && strtolower($value) <= 'z')
            && (strlen($value) === 1);
    }

    private function calculateSize()
    {
        $this->size = (2*$this->numberOfElements()) -1;
    }

    /**
     * @return int
     */
    private function numberOfElements(): int
    {
        return ord($this->value) - ord('a') + 1;
    }

}
