<?php

namespace Course\Support;

use Illuminate\Pagination\BootstrapThreePresenter as LaravelBootstrapThreePresenter;
use Illuminate\Contracts\Pagination\Paginator as PaginatorContract;
use Illuminate\Pagination\UrlWindow;

class BootstrapThreePresenter extends LaravelBootstrapThreePresenter
{

    public function __construct(PaginatorContract $paginator, UrlWindow $window = null)
    {
        $this->paginator = $paginator;
        $side = config('view.paginator.side', 3);
        $this->window = is_null($window) ? UrlWindow::make($paginator, $side) : $window->get($side);
    }


}