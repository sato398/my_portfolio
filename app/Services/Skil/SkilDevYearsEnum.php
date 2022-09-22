<?php

declare(strict_types=1);

namespace App\Services\Skil;

use BenSampo\Enum\Enum;

/**
 * Class OrderSession.
 *
 * @method string   getDescription();   ex) SkilDevYearsEnum::getDescription(0);    ===> '1年未満'
 * @method string   getValue();         ex) SkilDevYearsEnum::getValue('1年未満');  ===> 0
 *
 */

 /**
  * 開発年数のEnum
  */
final class SkilDevYearsEnum extends Enum
{
    public const LESS_THAN_1 = 0; //1年未満
    public const MORE_1 = 1; //1年以上
    public const MORE_2 = 2; //2年以上
    public const MORE_3 = 3; //3年以上

    public $skilArray;


    //返ってくる説明を日本語化
    public static function getDescription($value): string
    {
        return match ($value) {
            self::LESS_THAN_1 => '1年未満',
            self::MORE_1 => '1年以上',
            self::MORE_2 => '2年以上',
            self::MORE_3 => '3年以上',
            default => '不明',
        };
    }

    //キーを日本語化
    public static function getValue(string $key): mixed
    {
        return match ($key) {
            '1年未満' => self::LESS_THAN_1,
            '1年以上' => self::MORE_1,
            '2年以上' => self::MORE_2,
            '3年以上' => self::MORE_3,
        };

        return parent::getValue($key);
    }
}
