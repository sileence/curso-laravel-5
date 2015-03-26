<?php

namespace Course\Providers;

use Course\Support\BootstrapThreePresenter;
use Illuminate\Pagination\AbstractPaginator;
use Illuminate\Support\ServiceProvider;

class PaginatorServiceProvider extends ServiceProvider {

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        AbstractPaginator::presenter(function ($paginator) {
            return new BootstrapThreePresenter($paginator);
        });
    }
}