<?php

namespace App\Admin\Extensions;

use Closure;
use Encore\Admin\Exception\Handler;
use Encore\Admin\Form\Builder;
use Encore\Admin\Form\Concerns\HandleCascadeFields;
use Encore\Admin\Form\Concerns\HasFields;
use Encore\Admin\Form\Concerns\HasHooks;
use Encore\Admin\Form\Field;
use Encore\Admin\Form\Layout\Layout;
use Encore\Admin\Form\Row;
use Encore\Admin\Form\Tab;
use Encore\Admin\Traits\ShouldSnakeAttributes;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Str;
use Illuminate\Validation\Validator;
use Spatie\EloquentSortable\Sortable;
use Symfony\Component\HttpFoundation\Response;
use Encore\Admin\Form as FormOrigin;
use App\Admin\Extensions\Form\Field\HasMany;

/**
 * Class Form.
 */
class Form extends FormOrigin
{
    /**
     * Generate a Field object and add to form builder if Field exists.
     *
     * @param string $method
     * @param array  $arguments
     *
     * @return Field
     */
    public function __call($method, $arguments)
    {
        if ($className = static::findFieldClass($method)) {
            $column = Arr::get($arguments, 0, ''); //[0];

            if ($method === 'hasMany') {
                $element = new HasMany($column, array_slice($arguments, 1));
            } else {
                $element = new $className($column, array_slice($arguments, 1));
            }

            $this->pushField($element);

            return $element;
        }

        admin_error('Error', "Field type [$method] does not exist.");

        return new Field\Nullable();
    }
}
