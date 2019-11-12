<?php

namespace Encore\DragSort;

use Encore\Admin\Grid;
use Illuminate\Support\ServiceProvider;

class DragSortServiceProvider extends ServiceProvider
{
    /**
     * {@inheritdoc}
     */
    public function boot(DragSort $extension)
    {
        if (! DragSort::boot()) {
            return ;
        }

        if ($views = $extension->views()) {
            $this->loadViewsFrom($views, 'drag-sort');
        }

        if ($this->app->runningInConsole() && $assets = $extension->assets()) {
            $this->publishes(
                [$assets => public_path('vendor/laravel-admin-ext/drag-sort')],
                'drag-sort'
            );
        }

        $this->app->booted(function () {
            DragSort::routes(__DIR__.'/../routes/web.php');
            Grid\Column::extend('columnsort',ColumnSort::class);
        });
    }
}
