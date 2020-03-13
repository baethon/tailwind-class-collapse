<?php

namespace Baethon\Tailwind;

class Utils
{
    public static function mix(string $left, array $rightList, string $format = '%s-%s'): array
    {
        return array_map(
            fn ($right) => sprintf($format, $left, $right),
            $rightList,
        );
    }

    public static function mixAll(array $leftList, array $rightList, string $format = '%s-%s'): array
    {
        $list = [];

        foreach ($leftList as $left) {
            foreach ($rightList as $right) {
                $list[] = sprintf($format, $left, $right);
            }
        }

        return $list;
    }

    private static function flattenPatterns(array $groups): array
    {
        $patterns = [];

        foreach ($groups as $groupId => $list) {
            $patterns = [
                ...$patterns,
                ...array_map(
                    fn (string $match) => Pattern::of($match, $groupId),
                    $list,
                ),
            ];
        }

        return $patterns;
    }

    /**
     * Export list of patterns using multi-dimensions array with string values
     *
     * @param array $groups         Nested list of string patterns, it will be flattened
     *                              and wrapped in Pattern instance
     * @param array $prefixesList   List of Tailwind pseudo-class prefixes
     * @return Pattern[]
     */
    public static function exportPatterns(array $groups, array $prefixesList): array
    {
        $patterns = static::flattenPatterns($groups);
        $expandedPatterns = $patterns;

        foreach ($prefixesList as $prefix) {
            $expandedPatterns = [
                ...$expandedPatterns,
                ...array_map(
                    fn (Pattern $pattern) => $pattern->addPrefix("{$prefix}:"),
                    $patterns,
                ),
            ];
        }

        return $expandedPatterns;
    }
}
