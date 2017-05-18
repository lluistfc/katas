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

    public function __construct(string $value)
    {
        if (!$this->isLetter($value)) {
            throw new \Exception();
        }

        $this->value = $value;
    }

    /**
     * @param string $value
     * @return bool
     */
    private function isLetter(string $value): bool
    {
        return (strtolower($value) >= 'a' && strtolower($value) <= 'z')
            && (strlen($value) > 1);
    }

}
