<?php

namespace Baethon\Tailwind;

use Baethon\Phln\Phln as P;

class ClassCollapse
{
    private array $list;

    private array $groups = [
        [
            'hidden', 'block', 'inline-block', 'inline',
            'flex', 'inline-flex', 'grid',
            'table', 'table-(caption|cell|column|footer|header|row)(-[a-z]+)?',
        ],
        ['box-(border|content)'],
        ['float-\w+'],
        ['clear-\w+'],
        ['object-(contain|cover|fill|none)', 'object-scale-down'],
        ['object-(bottom|center|top)', 'object-(left|right)(-(top|bottom))?'],
        ['overflow-(auto|hidden|visible|scroll)'],
        ['overflow-x-\w+'],
        ['overflow-y-\w+'],
        ['scrolling-\w+'],
        ['(static|fixed|absolute|relative|sticky)'],
        ['inset-(0|auto)'],
        ['inset-x-(0|auto)'],
        ['inset-y-(0|auto)'],
        ['top-\w+'],
        ['right-\w+'],
        ['bottom-\w+'],
        ['left-\w+'],
        ['(in)?visible'],
        ['z-\d+', 'z-auto'],
        ['flex-row', 'flex-(row|col)(-reverse)?'],
        ['flex-no-wrap', 'flex-wrap(-reverse)?'],
        ['items-(stretch|start|center|end|baseline)'],
        ['content-(start|center|end|between|around)'],
        ['self-(auto|start|center|end|stretch)'],
        ['justify-(start|center|end|between|around)'],
        ['flex-(initial|1|auto|none)'],
        ['flex-grow(-0)?'],
        ['flex-shrink(-0)?'],
        ['order-(first|last|none)', 'order-\w+'],
        ['grid-cols-\w+', 'grid-cols-none'],
        ['col-auto', 'col-span-\w+'],
        ['col-start-\w+'],
        ['col-end-\w+'],
        ['grid-rows-none', 'grid-rows-\d+'],
        ['row-auto', 'row-span-\d+'],
        ['row-start-auto', 'row-start-\d+'],
        ['row-end-auto', 'row-end-\d+'],
        ['gap-\d+', 'gap-px'],
        ['row-gap-px', 'row-gap-\d+'],
        ['col-gap-px', 'col-gap-\d+'],
        ['grid-flow-(row|col)(-dense)?'],
        ['p-px', 'p-\d+'],
        ['px-px', 'px-\d+'],
        ['py-px', 'py-\d+'],
        ['pt-px', 'pt-\d+'],
        ['pr-px', 'pr-\d+'],
        ['pb-px', 'pb-\d+'],
        ['pl-px', 'pl-\d+'],
        ['-?m-px', '-?m-\d+', 'm-auto'],
        ['-?mx-px', '-?mx-\d+', 'mx-auto'],
        ['-?my-px', '-?my-\d+', 'my-auto'],
        ['-?mt-px', '-?mt-\d+', 'mt-auto'],
        ['-?mr-px', '-?mr-\d+', 'mr-auto'],
        ['-?mb-px', '-?mb-\d+', 'mb-auto'],
        ['-?ml-px', '-?ml-\d+', 'ml-auto'],
        ['w-px', 'w-\d+', 'w-\d+\/\d+', 'w-(full|screen|auto)'],
        ['min-w-(0|full)'],
        ['max-w-(xs|sm|md|lg|xl)', 'max-w-\d+xl', 'max-w-(full|none)', 'max-w-screen-(sm|md|lg|xl)'],
        ['h-px', 'h-\d+', 'h-\d+\/\d+', 'h-(full|screen|auto)'],
        ['min-h-(0|full|screen)'],
        ['max-h-(full|screen)'],
        ['font-(sans|serif|mono)'],
        ['text-(xs|sm|base|lg|xl)', 'text-\d+xl'],
        ['(subpixel-)?antialiased'],
        ['(not-)?italic'],
        ['font-\w+'],
        ['tracking-\w+'],
        ['leading-\w+'],
        ['list-(none|disc|decimal)'],
        ['list-(inside|outside)'],
        ['placeholder-\w+-\d+', 'placeholder-(transparent|black|white)'],
        ['text-(left|center|right|justify)'],
        ['text-(transparent|black|white)', 'text-\w+-\d+'],
        ['(no-)?underline', 'line-through'],
        ['(upper|lower|normal-)case', 'capitalize'],
        ['align-(baseline|top|middle|bottom)', 'align-text-(top|bottom)'],
        ['whitespace-\w+(-\w+)?'],
        ['break-(normal|words|all)', 'truncate'],
        ['bg-(fixed|local|scroll)'],
        ['bg-(transparent|black|white)', 'bg-\w+-\d+'],
        ['bg-(bottom|center|left|right|top)', 'bg-(left|right)-(bottom|top)'],
        ['bg(-no)?-repeat', 'bg-repeat-[xy]', 'bg-repeat-(space|round)'],
        ['bg-(auto|cover|contain)'],
        ['border-(solid|dashed|dotted|double|none)'],
        ['border', 'border-\d+'],
        ['border-t', 'border-t-\d+'],
        ['border-r', 'border-r-\d+'],
        ['border-b', 'border-b-\d+'],
        ['border-l', 'border-l-\d+'],
        ['border-(transparent|black|white)', 'border-\w+-\d+'],
        ['rounded-(none|sm|md|lg|full)', 'rounded'],
        ['rounded-t-(none|sm|md|lg|full)', 'rounded-t'],
        ['rounded-r-(none|sm|md|lg|full)', 'rounded-r'],
        ['rounded-b-(none|sm|md|lg|full)', 'rounded-b'],
        ['rounded-l-(none|sm|md|lg|full)', 'rounded-l'],
        ['rounded-tl-(none|sm|md|lg|full)', 'rounded-tl'],
        ['rounded-tr-(none|sm|md|lg|full)', 'rounded-tr'],
        ['rounded-bl-(none|sm|md|lg|full)', 'rounded-bl'],
        ['rounded-br-(none|sm|md|lg|full)', 'rounded-br'],
        ['border-(collapse|separate)'],
        ['table-(auto|fixed)'],
        ['shadow', 'shadow-\w+'],
        ['opacity-\d+'],
        ['transition', 'transition-\w+'],
        ['duration-\d+'],
        ['ease-(linear|in|out)', 'ease-in-out'],
        ['scale-\d+'],
        ['scale-x-\d+'],
        ['scale-y-\d+'],
        ['-?rotate-\d+'],
        ['-?translate-x-\d+', '-?translate-x-(full|px)', '-?translate-x-1\/2'],
        ['-?translate-y-\d+', '-?translate-y-(full|px)', '-?translate-y-1\/2'],
        ['-?skew-x-\d+'],
        ['-?skew-y-\d+'],
        ['origin-\w+(-\w+)?'],
        ['cursor-\w+', 'cursor-not-allowed'],
        ['pointer-events-\w+'],
        ['resize', 'resize-\w+'],
        ['select-\w+'],
        ['stroke-\d+'],
        ['(not-)?sr-only'],
    ];

    private array $usedGroups = [];

    private ?string $collapsedString = null;

    public function __construct(array $list)
    {
        $this->list = $list;
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

        for ($i = count($this->list) - 1; $i >= 0; $i--) {
            $className = $this->list[$i];
            $groupId = $this->findGroup($className);

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
     * @return int|null
     */
    private function findGroup(string $className): ?int
    {
        foreach ($this->groups as $key => $list) {
            foreach ($list as $name) {
                if (P::regexp("/^{$name}$/")->test($className)) {
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
}
