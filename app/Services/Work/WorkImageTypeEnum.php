<?php

declare(strict_types=1);

namespace App\Services\Work;

use BenSampo\Enum\Enum;

/**
 * Class OrderSession.
 *
 * @method string   getDescription();   ex) WorkImageTypeEnum::getDescription(1);    ===> 'デスクトップ'
 * @method string   getValue();         ex) WorkImageTypeEnum::getValue('デスクトップ');  ===> 1
 *
 */

 /**
  * 開発年数のEnum
  */
final class WorkImageTypeEnum extends Enum
{
    public const DESKTOP = 1; //デスクトップ
    public const PHONE = 2; //スマホ

    public $skilArray;


    //返ってくる説明を日本語化
    public static function getDescription($value): string
    {
        return match ($value) {
            self::DESKTOP => 'デスクトップ',
            self::PHONE => 'スマホ',
            default => '不明',
        };
    }

    //キーを日本語化
    public static function getValue(string $key): mixed
    {
        return match ($key) {
            'デスクトップ' => self::DESKTOP,
            'スマホ' => self::PHONE,
        };

        return parent::getValue($key);
    }
}
