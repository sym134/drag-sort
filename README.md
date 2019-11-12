laravel-admin 行拖动排序  
======
[drag-sort](https://github.com/sym134/drag-sort) 不才凑合用吧😄
![Xnip2019-11-12_20-58-03](https://raw.githubusercontent.com/sym134/drag-sort/master/Xnip2019-11-12_20-58-03.jpg)

##安装
```php
# drag-sort
composer require heimiao/drag-sort

# 拓展包
composer require rutorika/sortable

```
##配置
1、发布资源
```php
php artisan vendor:publish --tag=dragsort
```
2、模型引入SortableTrait
```php
class 模型XX extends Model
{
    use \Rutorika\Sortable\SortableTrait;
    // 排序的字段
    protected static $sortableField = 'somefield';
}
```
3、使用排序
```php
// columnsort方法需要传参你要排序的字段，默认是id，格式：columnsort-字段名
// $url提交处理的路由 默认会调教到drag-sort路由
$grid->column('id', __('Id'))->columnsort('coulumn-id',$url);
```
