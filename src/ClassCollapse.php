<?php

namespace Baethon\Tailwind;

use Baethon\Phln\Phln as P;

class ClassCollapse
{
    private static $version = Versions\TailwindV12::class;

    private array $list;

    private array $usedGroups = [];

    private ?string $collapsedString = null;

    public function __construct(array $list)
    {
        $this->list = $list;
    }

    public static function setVersion(Versions\VersionInterface $version): void
    {
        static::$version = $version;
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
        $groups = $this->getGroups();

        for ($i = count($this->list) - 1; $i >= 0; $i--) {
            $className = $this->list[$i];
            $groupId = $this->findGroup($className, $groups);

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
     * @param array $groups
     * @return int|null
     */
    private function findGroup(string $className, array $groups): ?int
    {
        foreach ($groups as $key => $list) {
            foreach ($list as $name) {
                /** @var Pattern $name */

                if ($name->test($className)) {
                    return $key;
                }
            }
        }

        return null;
    }

    private function isUsed(?int $groupKey): bool
    {
        return is_null($groupKey)
            ? false
            : P::contains($groupKey, $this->usedGroups);
    }

    private function getGroups(): array
    {
        /** @var callable $callable */
        $callable = sprintf('%s::getGroups', static::$version);

        return $callable();
    }
}
