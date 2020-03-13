[![Build Status](https://travis-ci.org/baethon/tailwind-class-collapse.svg?branch=master)](https://travis-ci.org/baethon/tailwind-class-collapse)

---

# baethon/tailwind-class-collapse

Removes Tailwind class names keeping the rightmost class of the same type.

## Installation

```
composer require baethon/tailwind-class-collapse
```

## Usage

```php
use function Baethon\Tailwind\class_collapse as tailwind_class_collapse;

$class = tailwind_class_collapse('shadow font-bold text-gray-700 py-2 px-4 rounded text-center inline-block focus:shadow-outline focus:outline-none bg-blue-500 text-white hover:bg-blue-400');

// shadow font-bold py-2 px-4 rounded text-center inline-block focus:shadow-outline focus:outline-none bg-blue-500 text-white hover:bg-blue-400
```

## Why collapse?

I'll use an example. Consider following [snippet](https://codepen.io/radmen/pen/WNvzdYB):

```html
<button class="shadow font-bold text-gray-700 py-2 px-4 rounded text-center inline-block focus:shadow-outline focus:outline-none bg-blue-500 text-white hover:bg-blue-400" type="submit">Sign In</button>
```

As you can see, the `text-white` did not apply correctly. It's overwritten by the `text-gray-700`. To fix this, you need to remove the `text-gray-700` class.

Easy right? Well, things get complicated when you have a solution which appends some classes based on a set of predicates. To avoid the issue one should set condition statements making simple things complex.

## How does it work?

`class_collapse()` groups Tailwind classes by their purpose (or, in most cases, by the CSS property they set). It splits the class list by space and preserves only the rightmost class of the same type. The package supports Tailwinds [pseudo-class variants](https://tailwindcss.com/docs/pseudo-class-variants).

## Supported Tailwind versions

For now, the package supports only Tailwind v1.2. It's possible to add class definitions for other versions, however I don't intend doing this now. If you'd like to add support for different Tailwind version feel free to open a PR.

## Testing

```
composer test
```
