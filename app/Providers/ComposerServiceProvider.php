<?php
namespace mathmaster\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\View\Factory as ViewFactory;

class ComposerServiceProvider extends ServiceProvider {

    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function boot(ViewFactory $view)
    {
        $view->composer('*', 'mathmaster\Http\ViewComposers\GlobalComposer');
    }

    public function register()
    {
        //
    }

}
