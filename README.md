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

new Plugin();
```

### Facades

You can use components as objects:

```php
use Icarus\Assets\Script;

$script = new Script(__DIR__ . '/js');
$script->add('style1-name', 'style.css', [], false, 'all')
    ->add('style2-name', 'style2.css', [], false, 'all')
    ->save();
```

You can also use some components as facades:

```php
 Hook::register('activation', __FILE__, function () {
        return new HookController;
    });
```

## Components

### Config

```php
use Icarus\Config\Config;

$config = new Config;

// Bind a configuration file
$config->bind(['test' => require __DIR__ . '/config/test.php']);

// Get a key from a configuration file
$config->get('test')['key']; // Value
```

Config file example:

```php
return [
    'name' => 'WP Icarus plugin',
    'view' => __DIR__ . '/../resources/views/',
    'styles' =>  __DIR__ . '/../public/css/',
    'scripts' => __DIR__ . '/../public/js/',
];
```

### View

Your view files name must end with `.view.php` (e.g. `filename.view.php`);

```php
use Icarus\View\View;

$view = new View;
$view->setPath(__DIR__ . '/views/');

$view->render('filename');
$view->render('filename', ['key' => 'value']); // With data
```

### Style

```php
use Icarus\Assets\Style;

(new Style)->setPath(Config::get('plugin')['styles'])
    ->add('style1-name', 'style.css', [], false, 'all')
    ->add('style2-name', 'style2.css', [], false, 'all')
    ->save('wp_enqueue_style');
```

### Script

```php
use Icarus\Assets\Script;

(new Script)->setPath(Config::get('plugin')['scripts'])
        ->add('scripts', 'scripts.js', [], false, true)
        ->add('admin', 'admin.js', [], false, true)
        ->save('wp_enqueue_script');
```

### Menu

#### Facade

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

### Session

#### Facade

```php
Session::set('success', "Success test");
echo Session::has('success'); // True
echo Session::get('success'); // Success test
Session::remove('success');
Session::all();
Session::flush();
```

### Flash

#### Facade

```php
Flash::create('input', ['name' => 'test']);
echo Flash::get('input')['name'];
```

### Notice

#### Facade

```php
// Create a notice message
Notice::setKey("icarus-framework")->create('success', "Success test");

// Display a notice message
Notice::display();
```

### Hook

#### Facade

```php
Hook::register('activation', __FILE__, function () {
    new ActivationHook;
})->register('deactivation', __FILE__, function () {
    new DeactivationHook;
});
```

## Testing

```
$ ./vendor/bin/phpunit
```

Or

```
$ composer run-script test
```
