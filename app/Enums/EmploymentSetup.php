<?php

namespace App\Enums;

enum EmploymentSetup: string
{
    case WORK_FROM_HOME = 'Work From Home';
    case HYBRID = 'Hybrid';
    case ONSITE = 'OnSite';
}