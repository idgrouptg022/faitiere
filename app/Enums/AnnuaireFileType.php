<?php

namespace App\Enums;

enum AnnuaireFileType: string
{
    case Logo = "logo";
    case Banner = "banner";
    case DomainePrior1 = "domaine_prior1";
    case DomainePrior2 = "domaine_prior2";
    case DomainePrior3 = "domaine_prior3";
    case Presentation = "presentation";
    case Partner = "partner";
}
