<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'name',
        'value',
        'json',
    ];

    protected $casts = [
        'json' => 'json',
    ];

    /**
     * あたかもモデルのカラムがあるみたいな感じで、全てのレコードをプロパティに入れる
     *
     * @param boolean $wantArray trueなら、optionsプロパティに配列で全部入る。
     *
     * @return self
     */
    public function getOptions(bool $wantArray = false) : self
    {
        $options = static::all();

        if($wantArray){
            $optionsArray = [];
        }

        $options->each(function($option) use ($wantArray, &$optionsArray){
            $name = $option->name;

            if(!is_null($option->value)){
                $value = $option->value;
            }elseif(!is_null($option->json)){
                $value = $option->json;
            }else{
                $value = null;
            }

            if($wantArray){
                $optionsArray[$name] = $value;
            }else{
                $this->$name = $value;
            }
        });

        if($wantArray){
            $this->options = $optionsArray;
        }

        return $this;
    }

    /**
     * レコードを更新して、モデルを返却する
     *
     * @param array $options
     *
     * @return bool
     */
    public function saveOptions(array $options) : bool
    {
        try{
            foreach($options as $optionName => $optionValue){
                if(is_scalar($optionValue)){
                    $column = 'value';
                    $otherColumn = 'json';
                    $value = $optionValue ?: '';
                }elseif(is_null($optionValue)){
                    $column = 'value';
                    $otherColumn = 'json';
                    $value = null;
                }else{
                    $column = 'json';
                    $otherColumn = 'value';
                    $value = collect($optionValue ?: [])->filter()->toArray();
                }

                static::updateOrCreate([
                    'name' => $optionName,
                ], [
                    $column => $value,
                    $otherColumn => null,
                ]);
            }
            return true;
        }catch(\Exception $e){
            return false;
        }
    }
}
