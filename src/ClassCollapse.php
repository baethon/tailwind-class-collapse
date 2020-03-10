<?php

namespace Baethon\Tailwind;

class ClassCollapse
{
    private array $list;

    public function __construct(array $list)
    {
        $this->list = $list;
    }

    public static function fromString(string $list): ClassCollapse
    {
        return new static(preg_split('/\s+/', $list));
    }

    public static function fromArray(array $list): ClassCollapse
    {
        return new static($list);
    }

    public function collapse(): string
    {
        return '';
    }
}
