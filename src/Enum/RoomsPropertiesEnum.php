<?php

namespace App\Enum;

enum RoomsPropertiesEnum: string
{
    case Fenetre = 'fenetre';
    case Porte = 'porte';
    case Plafond = 'plafond';
    case Sol = 'sol';
    case Mur = 'mur';
    case Chauffage = 'chauffage';
    case Climatisation = 'climatisation';
    case PriseElectrique = 'prise-electrique';
    case Eclairage = 'eclairage';
    case Ventilation = 'ventilation';
    case Isolation = 'isolation';
    case HauteurSousPlafond = 'hauteur-sous-plafond';
    case RevêtementSol = 'revetement-sol';
    case RevêtementMur = 'revetement-mur';
    case NombrePrises = 'nombre-prises';
    case NombreInterrupteurs = 'nombre-interrupteurs';
    case TypePorte = 'type-porte';
    case TypeFenetre = 'type-fenetre';
    case PresencePlacard = 'presence-placard';
    case PresenceCheminée = 'presence-cheminee';
    case PresenceMezzanine = 'presence-mezzanine';
}
