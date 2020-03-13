<?php

use Baethon\Tailwind\Utils;

$pseudoClasses = [
    'hover',
    'focus',
    'active',
    'disabled',
    'visited',
    'first',
    'last',
    'odd',
    'even',
    'group-hover',
    'focus-within',
];

$responsiveClasses = ['sm', 'md', 'lg', 'xl'];

return [
    ...$pseudoClasses,
    ...$responsiveClasses,
    ...Utils::mixAll($responsiveClasses, $pseudoClasses, '%s:%s'),
];
