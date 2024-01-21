<?php

use App\Models\State;
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
        Schema::create('lots', function (Blueprint $table) {
            $table->id();
            $table->string('currency')->default('EUR');
            $table->dateTime('datetime_start');
            $table->dateTime('datetime_end');
            $table->float('min_bid_amount', 12,2);
            $table->string('name');
            $table->longText('meta_description');
            $table->longText('short_description');
            $table->longText('long_description');
            $table->float('base_total_estimated_value', 12, 2);
            $table->float('total_estimated_value', 12, 2);
            $table->bigInteger('highest_bid')->nullable();
            $table->integer('bidvibe_profit')->nullable();
            $table->integer('priority')->default(0);
            $table->boolean('status')->default(false);
            $table->foreignIdFor(State::class)->references('id')->on('states');
            $table->boolean('processed_after_expiration')->default(false);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lots');
    }
};
