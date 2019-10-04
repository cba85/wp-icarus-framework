# WP Icarus framework

Wordpress Icarus plugin framework.

## Install

Via Composer

```
$ composer require cba85/wp-icarus-framework
```

## Usage

### Bootstrap

```php
use Icarus\Plugin;

require __DIR__ . '/../vendor/autoload.php';

$config = __DIR__ . '/plugin.php'; // Your config file
$plugin = new Plugin($config);
$plugin->bootstrap();
```

You must include a config file :

```php
return [
    'name' => 'WP Icarus plugin',
    'view' => __DIR__ . '/../resources/views/',
    'styles' =>  __DIR__ . '/../public/css/',
    'scripts' => __DIR__ . '/../public/js/',
];
```

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

## Components

### Config

```php
// Bind a configuration file
Config::bind(['test' => require __DIR__ . '/config/test.php']);

// Get a key from a configuration file
Config::get('test')['key']; // Value
```

### View

Your view files name must end with `.view.php` (e.g. `filename.view.php`);

```php
View::render('filename');

View::render('filename', ['key' => 'value']); // With data
```

### Style

#### Usage

```php
 Style::setPath(Config::get('plugin')['styles'])
    ->add('style1-name', 'style.css', [], false, 'all')
    ->add('style2-name', 'style2.css', [], false, 'all')
    ->save('wp_enqueue_style');
```

### Script

#### Usage

```php
Script::setPath(Config::get('plugin')['scripts'])
        ->add('scripts', 'scripts.js', [], false, true)
        ->add('admin', 'admin.js', [], false, true)
        ->save('wp_enqueue_script');
```

### Menu

#### Usage

```php
Menu::create(function () {

    Menu::addPage('page', 'menu', 'capability', 'slug', function () {
        return (new \Icarus\Tests\Mocks\AdminController)->index();
    });

    Menu::addSubPage('parent', 'page', 'menu', 'capability', 'slug', function () {
        return (new \Icarus\Tests\Mocks\AdminController)->index();
    });

});
```

### Notice

#### Usage

```php
// Create a notice message
Notice::setKey("icarus-framework")->create('success', "Success test");

// Display a notice message
Notice::display();
```

## Testing

```
$ ./vendor/bin/phpunit
```

Or

```
$ composer run-script test
```
