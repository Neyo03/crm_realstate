<?php

namespace App\Enum;

enum FloorCoveringEnum: string
{
    case Carrelage = 'carrelage';
    case Parquet = 'parquet';
    case Moquette = 'moquette';
    case Beton = 'beton';
    case Vinyle = 'vinyle';
    case Liège = 'liege';
    case Marbre = 'marbre';
    case Pierre = 'pierre';
    case Bois = 'bois';
    case Autre = 'autre';
}
