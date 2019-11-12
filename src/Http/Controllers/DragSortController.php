<?php

namespace Encore\DragSort\Http\Controllers;

use Encore\Admin\Layout\Content;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Str;

class DragSortController extends Controller
{
    public function index(Request $request)
    {
        $table = Str::studly($request->get('table'));
        $table = 'App\\' . $table;
        // 判断模型是否存在
        if (!class_exists($table)) {
            admin_toastr('模型不存在', 'warning');
        }
        //$model = new $table;
        $entity = $table::findOrFail($request->id);
        $positionEntity = $table::findOrFail($request->positionEntityId);

        if ($request->type == 'moveAfter') {
            $entity->moveAfter($positionEntity);
        } else {
            $entity->moveBefore($positionEntity);
        }
        admin_toastr('模型不存在', 'warning');
    }
}
