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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("customerID")->unsigned();
            $table->bigInteger("roomID")->unsigned();
            $table->date("checkIn");
            $table->date("checkOut");
            $table->foreign("customerID")->references("id")->on("customers");
            $table->foreign("roomID")->references("id")->on("rooms");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
