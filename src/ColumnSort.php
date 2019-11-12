<?php


namespace Encore\DragSort;


use Encore\Admin\Admin;
use Encore\Admin\Grid\Displayers\AbstractDisplayer;

class ColumnSort extends AbstractDisplayer
{
    private $val;
    private $table;

    public function __construct($value, $arguments, $column, $row)
    {
        $this->table = $row->getTable();
        $this->val = $value;
    }


    /**
     * Display method.
     *
     * @param string $column
     *
     * @param string $url
     *
     * @return mixed
     */
    public function display($column = 'column-id', $url = 'drag-sort')
    {
        Admin::script('table = "' . $this->table . '";');
        Admin::script('column = "' . $column . '";');
        Admin::script('sort_url = "' . $url . '";');
        Admin::css('/vendor/laravel-admin-ext/drag-sort/dist/css/drag.css');
        Admin::js('/vendor/laravel-admin-ext/drag-sort/dist/js/jquery-sortable.js');
        Admin::js('/vendor/laravel-admin-ext/drag-sort/dist/js/drag.js');
        return $this->val;
    }
}
