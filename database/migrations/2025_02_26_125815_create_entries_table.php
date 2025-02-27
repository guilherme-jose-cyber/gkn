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
    Schema::create('entries', function (Blueprint $table) {
        $table->id();
        $table->foreignId('company_id')->constrained()->onDelete('cascade');
        $table->foreignId('invoice_id')->constrained()->onDelete('cascade');
        $table->dateTime('entry_date');
        $table->string('entry_type'); // 'journal' ou 'financial'
        $table->string('account_code')->nullable();
        $table->text('description');
        $table->decimal('amount', 10, 2);
        $table->string('nature'); // 'D' ou 'C' para journal, 'income' ou 'expense' para financial
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('entries');
    }
};
