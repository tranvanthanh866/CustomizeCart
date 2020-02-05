<?php
namespace Packages\ShoppingCart\Providers;

use Darryldecode\Cart\Cart;
use Packages\ShoppingCart\CacheStorage;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Cookie;

class ShoppingCartServiceProvider extends ServiceProvider
{

    /**
     * @var \Illuminate\Foundation\Application
     */
    protected $app;

    /**
     * Register the service provider.
     */
    public function register()
    {
        $base_folder = __DIR__. '/../../';
        include ($base_folder . 'helpers/functions.php');
        $this->mergeConfigFrom($base_folder . 'config/configCart.php', 'configCart');
        dd(config('configCart.view.NAME_LANG'));
		$this->loadRoutesFrom($base_folder . 'routes/web.php');
        $this->loadViewsFrom($base_folder . 'resources/views', config('configCart.view.NAME_BLADE'));
        $this->loadMigrationsFrom($base_folder . 'database/migrations'); // php artisan make:migration create_demo_table --path=platform/packages/shoppingcart/database/migrations
        $this->loadTranslationsFrom($base_folder . 'resources/lang', config('configCart.view.NAME_LANG'));
		//dd(1);

        $this->app->singleton('wishlist', function($app)
        {
            $storage = new CacheStorage();
            $events = $app['events'];
            $instanceName = 'cart_2';
            $session_key = Cookie::get('cart');
            return new Cart(
                $storage,
                $events,
                $instanceName,
                $session_key,
                config('shopping_cart')
            );
        });
    }

    /**
     * Bootstrap the application events.
     *
     */
    public function boot()
    {

    }
}
