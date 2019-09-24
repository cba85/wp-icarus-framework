# WP Icarus framework

Wordpress Icarus plugin framework.

## Components

- Style
- Script
- Menu
- Notice
- Router
- View

## Install

Via Composer

```
$ composer require cba85/wp-icarus-framework
```

## Usage

### Facades

You can use a component as an object:

```php
use Icarus\Assets\Script;

$script = new Script(__DIR__ . '/js');
$script->add('style1-name', 'style.css', [], false, 'all')
    ->add('style2-name', 'style2.css', [], false, 'all')
    ->save();
```

You can also use a component as a facade:

```php
use Icarus\Support\Facades\Script;

Script::setPath(__DIR__ . '/js')
    ->add('style1-name', 'style.css', [], false, 'all')
    ->add('style2-name', 'style2.css', [], false, 'all')
    ->save();
```

## Testing

```
$ ./vendor/bin/phpunit
```

Or

```
$ composer run-script test
```
