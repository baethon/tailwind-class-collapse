<?php

namespace Baethon\Tailwind;

class PatternsList extends \ArrayObject
{
    public function prioritizeGroup(string $groupId)
    {
        $this->uasort(function (Pattern $left, Pattern $right) use ($groupId) {
            if ($left->getGroupId() === $right->getGroupId()) {
                return 0;
            }

            if ($left->getGroupId() === $groupId) {
                return 1;
            }

            return -1;
        });
    }
}
