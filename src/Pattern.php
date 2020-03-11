<?php

namespace Baethon\Tailwind;

class Pattern
{
    private string $pattern;

    private bool $regexp;

    private function __construct(string $pattern, bool $regexp)
    {
        $this->pattern = $pattern;
        $this->regexp = $regexp;
    }

    public static function of(string $string): Pattern
    {
        $regexp = (strpos($string, 'r:') === 0);
        $pattern = $regexp
            ? sprintf('/^%s$/', substr($string, 2))
            : $string;

        return new Pattern($pattern, $regexp);
    }

    public function test(string $compareString): bool
    {
        return $this->regexp
            ? preg_match($this->pattern, $compareString)
            : ($this->pattern === $compareString);
    }
}
