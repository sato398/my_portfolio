<?php

namespace App\Admin\Selectable;

use App\Models\BasePosition;
use Encore\Admin\Grid\Filter;
use Encore\Admin\Grid\Selectable;
use Carbon\Carbon;

class BasePositions extends Selectable
{
    public $model = BasePosition::class;

    public function make()
    {
        // $this->column('id', __('Id'));
        $this->column('name', '担当範囲名');

        // $this->filter(function (Filter $filter) {
        //     $filter->like('name');
        // });
    }
}
