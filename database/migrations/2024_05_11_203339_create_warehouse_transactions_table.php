<?php

use App\Enums\WarehouseTransactionType;
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
        Schema::create('warehouse_transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('item_id')->constrained()->onDelete('cascade');
            $table->enum('transaction_type', WarehouseTransactionType::list());
            $table->integer('quantity');
            $table->string('source_location')->nullable();
            $table->string('destination_location')->nullable();
            $table->string('shipping_carrier')->nullable();
            $table->string('tracking_number')->unique();
            $table->timestamp('shipped_at')->nullable();
            $table->timestamp('received_at')->nullable();
            $table->enum('status', ['shipped', 'delivered', 'received', 'in_transit', 'pending_receipt'])->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('warehouse_transactions');
    }
};
