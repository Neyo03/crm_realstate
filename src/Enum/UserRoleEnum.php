<?php

namespace App\Enum;

enum UserRoleEnum: string
{
    case SuperAdmin = 'super-admin';
    case Admin = 'admin';
    case Agent = 'agent';
    case Assistant = 'assistant';
    case Client = 'client';
    case Manager = 'manager';
}
