<?php

namespace App\Admin\Controllers;

use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Illuminate\Support\Facades\Route;
use App\Models\Option;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;
use Symfony\Component\HttpFoundation\Response;

class OptionController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'サイトの設定';
    protected const IMAGE_PATH = '/options/images';


    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $optionsModel = (new Option())->getOptions(true);
        $options = $optionsModel?->options ?: [];

        $form = new Class ($optionsModel) extends Form{
            //オーバーライド
            public function store()
            {
                $data = \request()->all();

                // Handle validation errors.
                if ($validationMessages = $this->validationMessages($data)) {
                    return $this->responseValidationError($validationMessages);
                }

                if (($response = $this->prepare($data)) instanceof Response) {
                    return $response;
                }

                if ($response = $this->ajaxResponse(trans('admin.update_succeeded'))) {
                    return $response;
                }

                admin_toastr(trans('admin.save_succeeded'));
                return redirect(route(Route::currentRouteName()));
            }
        };

        $form->setAction(route(Route::currentRouteName()));
        $form->setTitle('サイトの設定');

        $form->hidden('options');

        $form->tab('トップ画面設定', function ($form) use ($options) {
            $form->text('options.top_title_head', 'トップサブタイトル')->value($options['top_title_head']);
            $form->text('options.top_title', 'トップタイトル')->value($options['top_title']);
            $form->ckeditor('options.top_text', 'トップテキスト')->value($options['top_text']);
            $form->image('options.top_image', 'トップ画像')->move('/tmp', function ($file) {
                return (string) Str::uuid() . '.' . $file->guessExtension();
            })->value($options['top_image'] ?? '');
        });

        $form->tab('ABOUT画面設定', function ($form) use ($options) {
            $form->text('options.about_first_title', 'ABOUTタイトル1')->value($options['about_first_title']);
            $form->ckeditor('options.about_first_text', 'ABOUTテキスト1')->value($options['about_first_text']);
            $form->image('options.about_first_image', 'ABOUT画像1')->move('/tmp', function ($file) {
                return (string) Str::uuid() . '.' . $file->guessExtension();
            })->value($options['about_first_image'] ?? '');
            $form->text('options.about_second_title', 'ABOUTタイトル2')->value($options['about_second_title']);
            $form->ckeditor('options.about_second_text', 'ABOUTテキスト2')->value($options['about_second_text']);
            $form->image('options.about_second_image', 'ABOUT画像2')->move('/tmp', function ($file) {
                return (string) Str::uuid() . '.' . $file->guessExtension();
            })->value($options['about_second_image'] ?? '');
            $form->text('options.about_third_title', 'ABOUTタイトル3')->value($options['about_third_title']);
            $form->ckeditor('options.about_third_text', 'ABOUTテキスト3')->value($options['about_third_text']);
            $form->image('options.about_third_image', 'ABOUT画像3')->move('/tmp', function ($file) {
                return (string) Str::uuid() . '.' . $file->guessExtension();
            })->value($options['about_third_image'] ?? '');
        });

        $form->saving(function ($form) {
            $this->saving($form);
        });

        return $form;
    }

    protected function saving(Form $form)
    {
        $options = $form->input('options');
        $oldOptions = (new Option())->getOptions();

        foreach ($options as $name => $value) {
            if (!$value instanceof UploadedFile) {
                continue;
            }

            $options[$name] = $value->storeAs(
                self::IMAGE_PATH,
                (string) pathinfo($value->getClientOriginalName(), PATHINFO_FILENAME) . '_' . Str::uuid() . '.' . $value->guessExtension()
            );

            //古い画像削除
            if (Storage::exists($oldImage = $oldOptions->$name ?? '')) {
                Storage::delete($oldImage);
            }
        }

        (new Option())->saveOptions($options);
    }
}
