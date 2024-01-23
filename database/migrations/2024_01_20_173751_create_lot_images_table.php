<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Lot;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('lot_images', function (Blueprint $table) {
            $table->id();
            $table->longText('base64_normal');
            $table->integer('width');
            $table->integer('height');
            $table->boolean('primary')->default(false);
            $table->foreignIdFor(Lot::class);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lot_images');
    }
};
