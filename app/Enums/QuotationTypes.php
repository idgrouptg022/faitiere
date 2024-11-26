<?php

namespace App\Enums;

enum QuotationTypes:string
{
    case Historique = 'historique';
    case RoleMission = 'role-mission';
    case Statut = 'statut';
    case Reglement = 'reglement';
    case Organigramme = 'organigramme';
    case DecentralisationLois = 'decentralisation-lois';
    case DecentralisationInfo = 'decentralisation-info';
}
