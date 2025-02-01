<?php

namespace App\Enum;

enum RoomsTypeEnum: string
{
    case Chambre = 'chambre';
    case Cuisine = 'cuisine';
    case SalleDeBain = 'salle-de-bain';
    case Salon = 'salon';
    case SalleAManger = 'salle-a-manger';
    case Toilette = 'toilette';
    case Buanderie = 'buanderie';
    case Bureau = 'bureau';
    case Garage = 'garage';
    case Grenier = 'grenier';
    case Cave = 'cave';
    case Dressing = 'dressing';
    case Entree = 'entree';
    case Couloir = 'couloir';
    case Veranda = 'veranda';
    case Balcon = 'balcon';
    case Terrasse = 'terrasse';
    case Cellier = 'cellier';
    case Bibliotheque = 'bibliotheque';
    case LocalTechnique = 'local-technique';
    case SalleDeJeux = 'salle-de-jeux';
    case HomeCinema = 'home-cinema';
    case PiscineInterieure = 'piscine-interieure';
}
