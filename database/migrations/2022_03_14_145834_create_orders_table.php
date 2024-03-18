<?php

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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('qty');
            $table->date('date');
            $table->time('time');
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('cascade');
            $table->string('address');
            $table->string("product_name");
            $table->integer('price');
            $table->string('status')->default('oncart');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
