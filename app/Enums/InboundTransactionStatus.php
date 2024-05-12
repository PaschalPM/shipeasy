<?php

namespace App\Enums;
use App\Interfaces\EnumList;

enum InboundTransactionStatus: string implements EnumList
{
    case RECEIVED = 'received';
    case IN_TRANSIT = 'in_transit';
    case PENDING_RECEIPT = 'pending_receipt';

    static public function list(): array {
        return array_map(function($case){
            return $case->value;
        }, self::cases());
    }
}
