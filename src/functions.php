<?php

namespace Baethon\Tailwind;

function collapse_classes($list): string
{
    $instance = is_array($list)
        ? ClassCollapse::fromArray($list)
        : ClassCollapse::fromString($list);

    return $instance->collapse();
}
