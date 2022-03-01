# Install

`composer require caikeal/oa-tapd-api`

# Settings

获取配置项：  `php artisan vendor:publish --provider="OaTapdApi\LaravelOATapd\ServiceProvider"`

# Usage
```PHP

...
use OaTapdApi\LaravelOATapd\Facade;

...

public function test () {
    return Facade::tapd('kealcai', 'xxxxxxxx')->auth->check();
}

```