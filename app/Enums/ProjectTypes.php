<?php

namespace App\Enums;

enum ProjectTypes:string
{
    case Plaidoyer = 'plaidoyer';
    case Pending = 'pending';
    case Complete = 'complete';
}
