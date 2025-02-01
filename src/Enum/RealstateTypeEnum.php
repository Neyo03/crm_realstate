<?php

namespace App\Enum;

enum RealstateTypeEnum: string
{
    case Maison = 'maison';
    case Appartement = 'appartement';
    case Terrain = 'terrain';
    case Commerce = 'commerce';
}
