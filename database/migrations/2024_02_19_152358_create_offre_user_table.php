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
    Schema::create('offre_user', function (Blueprint $table) {
        $table->id();
        $table->boolean('status')->default(0);
        $table->unsignedBigInteger('offer_id');
        $table->foreign('offre_id')->references('id')->on('offres')->onUpdate('cascade')->onDelete('cascade');
        $table->unsignedBigInteger('user_id');
        $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
        $table->softDeletes();
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('offer_user');
    }
};
