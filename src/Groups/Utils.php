<?php

namespace Baethon\Tailwind\Groups;

class Utils
{
    public static function mix(string $base, array $postfixes, string $format = '%s-%s'): array
    {
        return array_map(
            fn ($postfix) => sprintf($format, $base, $postfix),
            $postfixes,
        );
    }
}
