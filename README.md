[![License](http://poser.pugx.org/kylegg/web-utilities/license)](https://packagist.org/packages/kylegg/web-utilities)

# WebUtilities
A kit of Laravel helper classes that I have found useful in my own projects.

## Installing
Use composer to install WebUtilities
```bash
composer install kylegg/web-utilities
```

## Usage
As of right now WebUtilities' use case is very limited. However the functionality that it does have is very helpful for setting up subdomain based routing in Laravel easily.
You can use WebUtilities in your Laravel RouteServiceProvider by adding the following code:
```php
use Kylegg\WebUtilities\Domain;

/**
 * Define the routes for the application.
 *
 * @return void
 */
public function map(): void
{
	//
	// Domain: www.example.com
	//
	Route::domain(Domain::Subdomain('www'))
		->middleware('web')
		->namespace('App\Http\Controllers\Web')
		->group(base_path('routes/web.php'));
	
	//
	// Domain: bizozzle.example.com
	//
	Route::domain(Domain::Subdomain('bizozzle'))
		->middleware('web')
		->namespace('App\Http\Controllers\Bizozzle')
		->group(base_path('routes/bizozzle.php'));
}
```

The domain helper is intended to be used for routing and each function returns the following:
```php
Domain::TLD(); // returns "example.com" when app.url is set to https://www.example.com
```
```php
Domain::DotLedTLD(); // returns ".example.com" when app.url is set to https://www.example.com
```
```php
Domain::Subdomain("bizozzle"); // returns "bizozzle.example.com" when app.url is set to https://www.example.com
```