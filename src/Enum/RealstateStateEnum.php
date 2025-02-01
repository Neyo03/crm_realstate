<?php

namespace App\Enum;

enum RealstateStateEnum: string
{
    case Disponible = 'disponible';
    case SousOffre = 'sous-offre';
    case Vendu = 'vendu';
    case Loue = 'loue';
}
