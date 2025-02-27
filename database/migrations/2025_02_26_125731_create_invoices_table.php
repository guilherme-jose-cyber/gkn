<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            
            $table->foreignId('company_id')->constrained()->onDelete('cascade');
            $table->string('invoice_number');
            $table->string('series');
            $table->dateTime('issued_at');
            $table->decimal('total_value', 10, 2);
            $table->json('items')->nullable();
            $table->json('tax_info')->nullable();
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
