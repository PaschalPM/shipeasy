<?php

use App\Enums\InboundTransactionStatus;
use App\Enums\OutboundTransactionStatus;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('warehouse_transactions', function (Blueprint $table) {
            $table->enum('inbound_status', InboundTransactionStatus::list())->nullable()->after('received_at')->default(InboundTransactionStatus::IN_TRANSIT->value);
            $table->enum('outbound_status', OutboundTransactionStatus::list())->nullable()->after('inbound_status')->default(OutboundTransactionStatus::PENDING->value);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('warehouse_transactions', function (Blueprint $table) {
            //
        });
    }
};
