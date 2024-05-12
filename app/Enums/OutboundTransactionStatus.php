<?php

namespace App\Enums;
use App\Interfaces\EnumList;

enum OutboundTransactionStatus: string implements EnumList
{
    case PENDING = 'pending';
    case SHIPPED = 'shipped';
    case IN_TRANSIT = 'in_transit';
    case DELIVERED = 'delivered';

    static public function list(): array {
        return array_map(function($case){
            return $case->value;
        }, self::cases());
    }
}