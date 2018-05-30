<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

final class Situacao extends Enum
{
    const Ativo = 1;
    const Inativo = 2;

    /**
     * Get the description for an enum value
     *
     * @param  int  $value
     * @return string
     */
    public static function getDescricao(int $value): string {
        return self::getKey($value);  
    }
}
