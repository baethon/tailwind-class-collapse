<?php

namespace Baethon\Tailwind;

class Utils
{
    public static function mix(string $base, array $postfixes, string $format = '%s-%s'): array
    {
        return array_map(
            fn ($postfix) => sprintf($format, $base, $postfix),
            $postfixes,
        );
    }

    public static function mixAll(array $base, array $postfixes, string $format = '%s-%s'): array
    {
        $list = [];

        foreach ($base as $baseString) {
            foreach ($postfixes as $postfixString) {
                $list[] = sprintf($format, $baseString, $postfixString);
            }
        }

        return $list;
    }
}
