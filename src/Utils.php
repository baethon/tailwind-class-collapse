<?php

namespace Baethon\Tailwind;

use Baethon\Phln\Phln as P;

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

    public static function wrapGroupsInPattern(array $groups): array
    {
        return array_map(
            fn (array $list) => array_map(
                fn ($pattern) => Pattern::of($pattern),
                $list,
            ),
            $groups,
        );
    }

    public static function expandWithPrefixes(array $groups, array $prefixes): array
    {
        return $groups;
        $extendedGroups = $groups;

        foreach ($prefixes as $prefix) {
            foreach ($groups as $list) {
                $extendedGroups[] = array_map(
                    fn (Pattern $pattern) => $pattern->addPrefix($prefix),
                    $list,
                );
            }
        }

        return $extendedGroups;
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
