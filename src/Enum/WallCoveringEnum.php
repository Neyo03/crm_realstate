<?php

namespace App\Enum;

enum WallCoveringEnum: string
{
    case Peinture = 'peinture';
    case PapierPeint = 'papier-peint';
    case Carrelage = 'carrelage';
    case Bois = 'bois';
    case Tapisserie = 'tapisserie';
    case Enduit = 'enduit';
    case Panneaux = 'panneaux';
    case Beton = 'beton';
    case Brique = 'brique';
    case Autre = 'autre';
}
