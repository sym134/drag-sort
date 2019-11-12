<?php

namespace Encore\DragSort;

use Encore\Admin\Extension;

class DragSort extends Extension
{
    public $name = 'drag-sort';

    public $views = __DIR__.'/../resources/views';

    public $assets = __DIR__.'/../resources/assets';

    public $menu = [
        'title' => 'Dragsort',
        'path'  => 'drag-sort',
        'icon'  => 'fa-gears',
    ];
}