<?php

namespace App\Enums;

enum EmploymentType: string
{
    case FULL_TIME = 'full-time';
    case PART_TIME = 'part_time';
    case TEMPORARY = 'temporary';
    case CONTRACT = 'contract';
    case FREELANCE = 'freelance';
}