<?php

namespace Baethon\Tailwind\Versions;

use Baethon\Tailwind\Utils;

class TailwindV12 implements VersionInterface
{
    public static function getPatterns(): array
    {
        static $groups;
        return $groups ?? $groups = static::createPatterns();
    }

    private static function createPatterns(): array
    {
        return Utils::exportPatterns(
            [
                [
                    'hidden', 'block', 'inline-block', 'inline',
                    'flex', 'inline-flex', 'grid',
                    'table',
                    ...Utils::mix('table', [
                        'caption',
                        'cell',
                        'column',
                        'header',
                        'row',
                    ]),
                    ...Utils::mix('table', ['column', 'footer', 'header', 'row'], '%s-%s-group'),
                ],
                ['box-border', 'box-content'],
                Utils::mix('float', ['right', 'left', 'none']),
                Utils::mix('clear', ['left', 'right', 'both']),
                [
                    ...Utils::mix('object', ['contain', 'cover', 'fill', 'none']),
                    'object-scale-down'
                ],
                [
                    ...Utils::mix('object', ['bottom', 'center', 'top', 'left', 'right']),
                    ...Utils::mix('object-left', ['bottom', 'top']),
                    ...Utils::mix('object-right', ['bottom', 'top']),
                ],
                Utils::mix('overflow', ['auto', 'hidden', 'visible', 'scroll']),
                Utils::mix('overflow-x', ['auto', 'hidden', 'visible', 'scroll']),
                Utils::mix('overflow-y', ['auto', 'hidden', 'visible', 'scroll']),
                Utils::mix('scrolling', ['touch', 'auto']),
                ['static', 'fixed', 'absolute', 'relative', 'sticky'],
                Utils::mix('inset', ['0', 'auto']),
                Utils::mix('inset-x', ['0', 'auto']),
                Utils::mix('inset-y', ['0', 'auto']),
                Utils::mix('top', ['0', 'auto']),
                Utils::mix('right', ['0', 'auto']),
                Utils::mix('bottom', ['0', 'auto']),
                Utils::mix('left', ['0', 'auto']),
                ['visible', 'invisible'],
                ['r:z-\d+', 'z-auto'],
                [
                    'flex-row',
                    ...Utils::mix('flex', ['col', 'row']),
                    ...Utils::mix('flex', ['col', 'row'], '%s-%s-reverse'),
                ],
                ['flex-no-wrap', 'flex-wrap', 'flex-wrap-reverse'],
                Utils::mix('items', ['stretch', 'start', 'center', 'end', 'baseline']),
                Utils::mix('content', ['start', 'center', 'end', 'between', 'around']),
                Utils::mix('self', ['auto', 'start', 'center', 'end', 'stretch']),
                Utils::mix('justify', ['start', 'center', 'end', 'between', 'around']),
                Utils::mix('flex', ['initial', '1', 'auto', 'none']),
                ['flex-grow', 'flex-grow-0'],
                ['flex-shrink', 'flex-shrink-0'],
                [...Utils::mix('order', ['first', 'last', 'none']), 'r:order-\w+'],
                ['grid-cols-none', 'r:grid-cols-\d+'],
                ['col-auto', 'r:col-span-\d+'],
                ['col-start-auto', 'r:col-start-\d+'],
                ['col-end-auto', 'r:col-end-\d+'],
                ['grid-rows-none', 'r:grid-rows-\d+'],
                ['row-auto', 'r:row-span-\d+'],
                ['row-start-auto', 'r:row-start-\d+'],
                ['row-end-auto', 'r:row-end-\d+'],
                ['gap-px', 'r:gap-\d+'],
                ['row-gap-px', 'r:row-gap-\d+'],
                ['col-gap-px', 'r:col-gap-\d+'],
                [
                    ...Utils::mix('grid-flow', ['row', 'col']),
                    ...Utils::mix('grid-flow', ['row', 'col'], '%s-%s-dense'),
                ],
                ['p-px', 'r:p-\d+'],
                ['px-px', 'r:px-\d+'],
                ['py-px', 'r:py-\d+'],
                ['pt-px', 'r:pt-\d+'],
                ['pr-px', 'r:pr-\d+'],
                ['pb-px', 'r:pb-\d+'],
                ['pl-px', 'r:pl-\d+'],
                ['m-auto', 'r:-?m-px', 'r:-?m-\d+'],
                ['mx-auto', 'r:-?mx-\d+', 'r:-?mx-px'],
                ['my-auto', 'r:-?my-px', 'r:-?my-\d+'],
                ['mt-auto', 'r:-?mt-px', 'r:-?mt-\d+'],
                ['mr-auto', 'r:-?mr-px', 'r:-?mr-\d+'],
                ['mb-auto', 'r:-?mb-px', 'r:-?mb-\d+'],
                ['ml-auto', 'r:-?ml-px', 'r:-?ml-\d+'],
                [
                    ...Utils::mix('w', ['px', 'full', 'screen', 'auto']),
                    'r:w-\d+', 'r:w-\d+\/\d+'
                ],
                Utils::mix('min-w', ['0', 'full']),
                [
                    ...Utils::mix('max-w', ['xs', 'sm', 'md', 'lg', 'xl', 'full', 'none']),
                    ...Utils::mix('max-w-screen', ['sm', 'md', 'lg', 'xl']),
                    'r:max-w-\d+xl',
                ],
                [
                    ...Utils::mix('h', ['px', 'full', 'screen', 'auto']),
                    'r:h-\d+', 'r:h-\d+\/\d+',
                ],
                Utils::mix('min-h', ['0', 'full', 'screen']),
                Utils::mix('max-h', ['full', 'screen']),
                Utils::mix('font', ['sans', 'serif', 'mono']),
                [
                    ...Utils::mix('text', ['xs', 'sm', 'base', 'lg', 'xl']),
                    'r:text-\d+xl',
                ],
                ['antialiased', 'subpixel-antialiased'],
                ['italic', 'not-italic'],
                Utils::mix('font', ['hairline', 'thin', 'light', 'normal', 'medium', 'semibold', 'bold', 'extrabold', 'black']),
                Utils::mix('tracking', ['tighter', 'tight', 'normal', 'wide', 'wider', 'widest']),
                [
                    ...Utils::mix('leading', ['none', 'tight', 'snug', 'normal', 'relaxed', 'loose']),
                    'r:leading-\d+',
                ],
                Utils::mix('list', ['none', 'disc', 'decimal']),
                Utils::mix('list', ['inside', 'outside']),
                [
                    ...Utils::mix('placeholder', ['transparent', 'black', 'white']),
                    'r:placeholder-\w+-\d+',
                ],
                Utils::mix('text', ['left', 'center', 'right', 'justify']),
                [
                    ...Utils::mix('text', ['transparent', 'black', 'white']),
                    'r:text-\w+-\d+',
                ],
                ['underline', 'no-underline', 'line-through'],
                ['uppercase', 'lowercase', 'capitalize', 'normal-case'],
                [
                    ...Utils::mix('align', ['baseline', 'top', 'middle', 'bottom']),
                    ...Utils::mix('align-text', ['top', 'bottom']),
                ],
                Utils::mix('whitespace', ['normal', 'no-wrap', 'pre', 'pre-line', 'pre-wrap']),
                [
                    ...Utils::mix('break', ['normal', 'words', 'all']),
                    'truncate'
                ],
                Utils::mix('bg', ['fixed', 'local', 'scroll']),
                [
                    ...Utils::mix('bg', ['transparent', 'black', 'white']),
                    'r:bg-\w+-\d+',
                ],
                [
                    ...Utils::mix('bg', ['bottom', 'center', 'left', 'right', 'top']),
                    ...Utils::mix('bg-left', ['bottom', 'top']),
                    ...Utils::mix('bg-right', ['bottom', 'top']),
                ],
                [
                    ...Utils::mix('bg-repeat', ['x', 'y', 'space', 'round']),
                    'bg-repeat', 'bg-no-repeat',
                ],
                Utils::mix('bg', ['auto', 'cover', 'contain']),
                Utils::mix('border', ['solid', 'dashed', 'dotted', 'double', 'none']),
                ['border', 'r:border-\d+'],
                ['border-t', 'r:border-t-\d+'],
                ['border-r', 'r:border-r-\d+'],
                ['border-b', 'r:border-b-\d+'],
                ['border-l', 'r:border-l-\d+'],
                [
                    ...Utils::mix('border', ['transparent', 'black', 'white']),
                    'r:border-\w+-\d+',
                ],
                [
                    ...Utils::mix('rounded', ['none', 'sm', 'md', 'lg', 'full']),
                    'rounded'
                ],
                [
                    ...Utils::mix('rounded-t', ['none', 'sm', 'md', 'lg', 'full']),
                    'rounded-t',
                ],
                [
                    ...Utils::mix('rounded-r', ['none', 'sm', 'md', 'lg', 'full']),
                    'rounded-r',
                ],
                [
                    ...Utils::mix('rounded-b', ['none', 'sm', 'md', 'lg', 'full']),
                    'rounded-b',
                ],
                [
                    ...Utils::mix('rounded-l', ['none', 'sm', 'md', 'lg', 'full']),
                    'rounded-l',
                ],
                [
                    ...Utils::mix('rounded-tl', ['none', 'sm', 'md', 'lg', 'full']),
                    'rounded-tl',
                ],
                [
                    ...Utils::mix('rounded-tr', ['none', 'sm', 'md', 'lg', 'full']),
                    'rounded-tr',
                ],
                [
                    ...Utils::mix('rounded-bl', ['none', 'sm', 'md', 'lg', 'full']),
                    'rounded-bl',
                ],
                [
                    ...Utils::mix('rounded-br', ['none', 'sm', 'md', 'lg', 'full']),
                    'rounded-br',
                ],
                Utils::mix('border', ['collapse', 'separate']),
                Utils::mix('table', ['auto', 'fixed']),
                ['shadow', 'r:shadow-\w+'],
                ['r:opacity-\d+'],
                [
                    ...Utils::mix('transition', [
                        'none',
                        'all',
                        'colors',
                        'opacity',
                        'shadow',
                        'transform',
                    ]),
                    'transition',
                ],
                ['r:duration-\d+'],
                Utils::mix('ease', ['linear', 'in', 'out', 'in-out']),
                ['r:scale-\d+'],
                ['r:scale-x-\d+'],
                ['r:scale-y-\d+'],
                ['r:-?rotate-\d+'],
                ['r:-?translate-x-\d+', 'r:-?translate-x-(full|px)', 'r:-?translate-x-1\/2'],
                ['r:-?translate-y-\d+', 'r:-?translate-y-(full|px)', 'r:-?translate-y-1\/2'],
                ['r:-?skew-x-\d+'],
                ['r:-?skew-y-\d+'],
                Utils::mix('origin', ['center', 'top', 'top-right', 'right', 'bottom-right', 'bottom', 'bottom-left', 'left', 'top-left']),
                Utils::mix('cursor', [
                    'auto',
                    'default',
                    'pointer',
                    'wait',
                    'text',
                    'move',
                    'not-allowed',
                ]),
                ['pointer-events-auto', 'pointer-events-none'],
                [
                    ...Utils::mix('resize', ['none', 'x', 'y']),
                    'resize',
                ],
                Utils::mix('select', ['none', 'text', 'all', 'auto']),
                ['r:stroke-\d+'],
                ['sr-only', 'not-sr-only'],
            ],
            static::getPrefixes(),
        );
    }

    private static function getPrefixes(): array
    {
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
    }
}
