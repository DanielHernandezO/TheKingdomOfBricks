<?php

namespace App\Enums;

use App\Traits\EnumToArray;

enum LangEnum: string
{
    use EnumToArray;
    case ENGLISH = 'en';
    case SPANISH = 'es';
};