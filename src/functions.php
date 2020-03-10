<?php

namespace Baethon\Tailwind;

function tailwind_class_collapse($list): string
{
    $instance = is_array($list)
        ? ClassCollapse::fromArray($list)
        : ClassCollapse::fromString($list);

    return $instance->collapse();
}
