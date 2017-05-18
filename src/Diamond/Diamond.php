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
        if (!(strtolower($value) >= 'a' && strtolower($value) <= 'z')) {
            throw new \Exception();
        }

        if (strlen($value) > 1) {
            throw new \Exception();
        }

        $this->value = $value;
    }

}
