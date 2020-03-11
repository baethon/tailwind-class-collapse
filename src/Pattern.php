<?php

namespace Baethon\Tailwind;

class Pattern
{
    private string $pattern;

    private bool $regexp;

    private string $groupId;

    private function __construct(string $pattern, bool $regexp, string $groupId)
    {
        $this->pattern = $pattern;
        $this->regexp = $regexp;
        $this->groupId = $groupId;
    }

    public static function of(string $string, string $groupId): Pattern
    {
        $regexp = (strpos($string, 'r:') === 0);
        $pattern = $regexp
            ? sprintf('/^%s$/', substr($string, 2))
            : $string;

        return new Pattern($pattern, $regexp, $groupId);
    }

    public function test(string $compareString): bool
    {
        return $this->regexp
            ? preg_match($this->pattern, $compareString)
            : ($this->pattern === $compareString);
    }

    public function addPrefix(string $prefix): Pattern
    {
        $pattern = $this->regexp
            ? sprintf('r:%s%s', $prefix, substr($this->pattern, 2, -2))
            : "{$prefix}{$this->pattern}";

        return Pattern::of($pattern, "{$prefix}{$this->groupId}");
    }

    public function getGroupId(): string
    {
        return $this->groupId;
    }
}
