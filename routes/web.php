<?php

use Encore\DragSort\Http\Controllers\DragSortController;

Route::post('drag-sort', DragSortController::class.'@index');
