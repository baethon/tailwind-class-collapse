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
                'display' => [
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
                'box-sizing' => ['box-border', 'box-content'],
                'float' => Utils::mix('float', ['right', 'left', 'none']),
                'clear' => Utils::mix('clear', ['left', 'right', 'both']),
                'object-fit' => [
                    ...Utils::mix('object', ['contain', 'cover', 'fill', 'none']),
                    'object-scale-down'
                ],
                'object-position' => [
                    ...Utils::mix('object', ['bottom', 'center', 'top', 'left', 'right']),
                    ...Utils::mix('object-left', ['bottom', 'top']),
                    ...Utils::mix('object-right', ['bottom', 'top']),
                ],
                'overflow' => Utils::mix('overflow', ['auto', 'hidden', 'visible', 'scroll']),
                'overflow-x' => Utils::mix('overflow-x', ['auto', 'hidden', 'visible', 'scroll']),
                'overflox-y' => Utils::mix('overflow-y', ['auto', 'hidden', 'visible', 'scroll']),
                'overflow-scrolling' => Utils::mix('scrolling', ['touch', 'auto']),
                'position' => ['static', 'fixed', 'absolute', 'relative', 'sticky'],
                'position-inset' => Utils::mix('inset', ['0', 'auto']),
                'position-inset-x' => Utils::mix('inset-x', ['0', 'auto']),
                'position-inset-y' => Utils::mix('inset-y', ['0', 'auto']),
                'top' => Utils::mix('top', ['0', 'auto']),
                'right' => Utils::mix('right', ['0', 'auto']),
                'bottom' => Utils::mix('bottom', ['0', 'auto']),
                'left' => Utils::mix('left', ['0', 'auto']),
                'visibility' => ['visible', 'invisible'],
                'z-index' => ['r:z-\d+', 'z-auto'],
                'flex-direction' => [
                    'flex-row',
                    ...Utils::mix('flex', ['col', 'row']),
                    ...Utils::mix('flex', ['col', 'row'], '%s-%s-reverse'),
                ],
                'flex-wrap' => ['flex-no-wrap', 'flex-wrap', 'flex-wrap-reverse'],
                'align-items' => Utils::mix('items', ['stretch', 'start', 'center', 'end', 'baseline']),
                'align-content' => Utils::mix('content', ['start', 'center', 'end', 'between', 'around']),
                'align-self' => Utils::mix('self', ['auto', 'start', 'center', 'end', 'stretch']),
                'justify-content' => Utils::mix('justify', ['start', 'center', 'end', 'between', 'around']),
                'flex' => Utils::mix('flex', ['initial', '1', 'auto', 'none']),
                'flex-grow' => ['flex-grow', 'flex-grow-0'],
                'flex-shrink' => ['flex-shrink', 'flex-shrink-0'],
                'order' => [...Utils::mix('order', ['first', 'last', 'none']), 'r:order-\w+'],
                'grid-template-columns' => ['grid-cols-none', 'r:grid-cols-\d+'],
                'grid-column' => ['col-auto', 'r:col-span-\d+'],
                'grid-column-start' => ['col-start-auto', 'r:col-start-\d+'],
                'grid-column-end' => ['col-end-auto', 'r:col-end-\d+'],
                'grid-template-rows' => ['grid-rows-none', 'r:grid-rows-\d+'],
                'grid-row' => ['row-auto', 'r:row-span-\d+'],
                'grid-row-start' => ['row-start-auto', 'r:row-start-\d+'],
                'grid-row-end' => ['row-end-auto', 'r:row-end-\d+'],
                'gap' => ['gap-px', 'r:gap-\d+'],
                'row-gap' => ['row-gap-px', 'r:row-gap-\d+'],
                'column-gap' => ['col-gap-px', 'r:col-gap-\d+'],
                'grid-auto-flow' => [
                    ...Utils::mix('grid-flow', ['row', 'col']),
                    ...Utils::mix('grid-flow', ['row', 'col'], '%s-%s-dense'),
                ],
                'padding' => ['p-px', 'r:p-\d+'],
                'padding-x' => ['px-px', 'r:px-\d+'],
                'padding-y' => ['py-px', 'r:py-\d+'],
                'padding-top' => ['pt-px', 'r:pt-\d+'],
                'padding-right' => ['pr-px', 'r:pr-\d+'],
                'padding-bottom' => ['pb-px', 'r:pb-\d+'],
                'padding-left' => ['pl-px', 'r:pl-\d+'],
                'margin' => ['m-auto', 'r:-?m-px', 'r:-?m-\d+'],
                'margin-x' => ['mx-auto', 'r:-?mx-\d+', 'r:-?mx-px'],
                'margin-y' => ['my-auto', 'r:-?my-px', 'r:-?my-\d+'],
                'margin-top' => ['mt-auto', 'r:-?mt-px', 'r:-?mt-\d+'],
                'margin-right' => ['mr-auto', 'r:-?mr-px', 'r:-?mr-\d+'],
                'margin-bottom' => ['mb-auto', 'r:-?mb-px', 'r:-?mb-\d+'],
                'margin-left' => ['ml-auto', 'r:-?ml-px', 'r:-?ml-\d+'],
                'width' => [
                    ...Utils::mix('w', ['px', 'full', 'screen', 'auto']),
                    'r:w-\d+', 'r:w-\d+\/\d+'
                ],
                'min-width' => Utils::mix('min-w', ['0', 'full']),
                'max-width' => [
                    ...Utils::mix('max-w', ['xs', 'sm', 'md', 'lg', 'xl', 'full', 'none']),
                    ...Utils::mix('max-w-screen', ['sm', 'md', 'lg', 'xl']),
                    'r:max-w-\d+xl',
                ],
                'height' => [
                    ...Utils::mix('h', ['px', 'full', 'screen', 'auto']),
                    'r:h-\d+', 'r:h-\d+\/\d+',
                ],
                'min-height' => Utils::mix('min-h', ['0', 'full', 'screen']),
                'max-height' => Utils::mix('max-h', ['full', 'screen']),
                'font-family' => Utils::mix('font', ['sans', 'serif', 'mono']),
                'font-size' => [
                    ...Utils::mix('text', ['xs', 'sm', 'base', 'lg', 'xl']),
                    'r:text-\d+xl',
                ],
                'font-smoothing' => ['antialiased', 'subpixel-antialiased'],
                'font-style' => ['italic', 'not-italic'],
                'font-weight' => Utils::mix('font', ['hairline', 'thin', 'light', 'normal', 'medium', 'semibold', 'bold', 'extrabold', 'black']),
                'letter-spacing' => Utils::mix('tracking', ['tighter', 'tight', 'normal', 'wide', 'wider', 'widest']),
                'line-height' => [
                    ...Utils::mix('leading', ['none', 'tight', 'snug', 'normal', 'relaxed', 'loose']),
                    'r:leading-\d+',
                ],
                'list-style-type' => Utils::mix('list', ['none', 'disc', 'decimal']),
                'list-style-position' => Utils::mix('list', ['inside', 'outside']),
                '::placeholder' => [
                    ...Utils::mix('placeholder', ['transparent', 'black', 'white']),
                    'r:placeholder-\w+-\d+',
                ],
                'text-align' => Utils::mix('text', ['left', 'center', 'right', 'justify']),
                'color' => [
                    ...Utils::mix('text', ['transparent', 'black', 'white']),
                    'r:text-\w+-\d+',
                ],
                'text-decoration' => ['underline', 'no-underline', 'line-through'],
                'text-transform' => ['uppercase', 'lowercase', 'capitalize', 'normal-case'],
                'vertical-align' => [
                    ...Utils::mix('align', ['baseline', 'top', 'middle', 'bottom']),
                    ...Utils::mix('align-text', ['top', 'bottom']),
                ],
                'white-space' => Utils::mix('whitespace', ['normal', 'no-wrap', 'pre', 'pre-line', 'pre-wrap']),
                'word-break' => [
                    ...Utils::mix('break', ['normal', 'words', 'all']),
                    'truncate'
                ],
                'background-attachment' => Utils::mix('bg', ['fixed', 'local', 'scroll']),
                'background-color' => [
                    ...Utils::mix('bg', ['transparent', 'black', 'white']),
                    'r:bg-\w+-\d+',
                ],
                'background-position' => [
                    ...Utils::mix('bg', ['bottom', 'center', 'left', 'right', 'top']),
                    ...Utils::mix('bg-left', ['bottom', 'top']),
                    ...Utils::mix('bg-right', ['bottom', 'top']),
                ],
                'background-repeat' => [
                    ...Utils::mix('bg-repeat', ['x', 'y', 'space', 'round']),
                    'bg-repeat', 'bg-no-repeat',
                ],
                'background-size' => Utils::mix('bg', ['auto', 'cover', 'contain']),
                'border-style' => Utils::mix('border', ['solid', 'dashed', 'dotted', 'double', 'none']),
                'border-width' => ['border', 'r:border-\d+'],
                'border-width-top' => ['border-t', 'r:border-t-\d+'],
                'border-width-right' => ['border-r', 'r:border-r-\d+'],
                'border-width-bottom' => ['border-b', 'r:border-b-\d+'],
                'border-width-left' => ['border-l', 'r:border-l-\d+'],
                'border-color' => [
                    ...Utils::mix('border', ['transparent', 'black', 'white']),
                    'r:border-\w+-\d+',
                ],
                'border-radius' => [
                    ...Utils::mix('rounded', ['none', 'sm', 'md', 'lg', 'full']),
                    'rounded'
                ],
                'border-top-radius' => [
                    ...Utils::mix('rounded-t', ['none', 'sm', 'md', 'lg', 'full']),
                    'rounded-t',
                ],
                'border-right-radius' => [
                    ...Utils::mix('rounded-r', ['none', 'sm', 'md', 'lg', 'full']),
                    'rounded-r',
                ],
                'border-bottom-radius' => [
                    ...Utils::mix('rounded-b', ['none', 'sm', 'md', 'lg', 'full']),
                    'rounded-b',
                ],
                'border-left-radius' => [
                    ...Utils::mix('rounded-l', ['none', 'sm', 'md', 'lg', 'full']),
                    'rounded-l',
                ],
                'border-top-left-radius' => [
                    ...Utils::mix('rounded-tl', ['none', 'sm', 'md', 'lg', 'full']),
                    'rounded-tl',
                ],
                'border-top-right-radius' => [
                    ...Utils::mix('rounded-tr', ['none', 'sm', 'md', 'lg', 'full']),
                    'rounded-tr',
                ],
                'border-bottom-left-radius' => [
                    ...Utils::mix('rounded-bl', ['none', 'sm', 'md', 'lg', 'full']),
                    'rounded-bl',
                ],
                'border-bottom-right-radius' =>[
                    ...Utils::mix('rounded-br', ['none', 'sm', 'md', 'lg', 'full']),
                    'rounded-br',
                ],
                'border-collapse' => Utils::mix('border', ['collapse', 'separate']),
                'table-layout' => Utils::mix('table', ['auto', 'fixed']),
                'box-shadow' => ['shadow', 'r:shadow-\w+'],
                'opacity' => ['r:opacity-\d+'],
                'transition-property' => [
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
                'transition-duration' => ['r:duration-\d+'],
                'transition-timing-function' => Utils::mix('ease', ['linear', 'in', 'out', 'in-out']),
                'transform-scale' => ['r:scale-\d+'],
                'transform-scale-x' => ['r:scale-x-\d+'],
                'transform-scale-y' => ['r:scale-y-\d+'],
                'transform-rotate' => ['r:-?rotate-\d+'],
                'transform-translate-x' => ['r:-?translate-x-\d+', 'r:-?translate-x-(full|px)', 'r:-?translate-x-1\/2'],
                'transform-translate-y' => ['r:-?translate-y-\d+', 'r:-?translate-y-(full|px)', 'r:-?translate-y-1\/2'],
                'transform-skew-x' => ['r:-?skew-x-\d+'],
                'transform-skew-y' => ['r:-?skew-y-\d+'],
                'transform-origin' => Utils::mix('origin', ['center', 'top', 'top-right', 'right', 'bottom-right', 'bottom', 'bottom-left', 'left', 'top-left']),
                'cursor' => Utils::mix('cursor', [
                    'auto',
                    'default',
                    'pointer',
                    'wait',
                    'text',
                    'move',
                    'not-allowed',
                ]),
                'pointer-events' => ['pointer-events-auto', 'pointer-events-none'],
                'resize' => [
                    ...Utils::mix('resize', ['none', 'x', 'y']),
                    'resize',
                ],
                'user-select' => Utils::mix('select', ['none', 'text', 'all', 'auto']),
                'stroke-width' => ['r:stroke-\d+'],
                'screen-readers' => ['sr-only', 'not-sr-only'],
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
