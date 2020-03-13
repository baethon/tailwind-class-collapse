<?php

namespace Baethon\Tailwind;

class ClassCollapse
{
    private static string $tailwindVersion = Tailwind::V1_2;

    private array $list;

    private array $usedGroups = [];

    private ?string $collapsedString = null;

    public function __construct(array $list)
    {
        $this->list = $list;
    }

    public static function setTailwindVersion(string $version): void
    {
        static::$tailwindVersion = $version;
    }

    public static function fromString(string $list): ClassCollapse
    {
        return new static(preg_split('/\s+/', $list));
    }

    public static function fromArray(array $list): ClassCollapse
    {
        return new static($list);
    }

    public function collapse(): string
    {
        if ($this->collapsedString !== null) {
            return $this->collapsedString;
        }

        $classList = [];
        $patterns = $this->getPatterns();

        for ($i = count($this->list) - 1; $i >= 0; $i--) {
            $className = $this->list[$i];
            $groupId = $this->findGroup($className, $patterns);

            if ($this->isUsed($groupId)) {
                continue;
            }

            $classList = [$className, ...$classList];
            $this->usedGroups[] = $groupId;
        }

        $this->collapsedString = join(' ', $classList);

        return $this->collapsedString;
    }

    /**
     * Try to locate the key of the stored groups
     *
     * @param string $className
     * @param Pattern[] $patternsList
     * @return string|null
     */
    private function findGroup(string $className, array $patternsList): ?string
    {
        foreach ($patternsList as $pattern) {
            if ($pattern->test($className)) {
                return $pattern->getGroupId();
            }
        }

        return null;
    }

    private function isUsed(?string $groupKey): bool
    {
        if (is_null($groupKey)) {
            return false;
        }

        $foundKey = array_search($groupKey, $this->usedGroups);

        return $foundKey !== false;
    }

    private function getPatterns(): array
    {
        static $patterns;

        return $patterns ?? $patterns = require(sprintf(
            '%s/data/%s.php',
            __DIR__,
            static::$tailwindVersion,
        ));
    }
}
