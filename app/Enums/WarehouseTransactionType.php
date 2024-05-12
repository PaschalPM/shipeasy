<?php

namespace App\Enums;
use App\Interfaces\EnumList;

enum WarehouseTransactionType: string implements EnumList
{
    case INBOUND = 'Inbound';
    case OUTBOUND = 'Outbound';

    static public function list(): array {
        return array_map(function($case){
            return $case->value;
        }, self::cases());
    }
}