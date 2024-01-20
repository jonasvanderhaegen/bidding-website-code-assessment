<?php

use App\Models\Bid;
use App\Models\Lot;
use App\Models\State;
use App\Models\User;
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
        Schema::create('quotes', function (Blueprint $table) {
            $table->id();

            $table->string('coupon_code')->nullable();

            $table->float('discount_amount')->default(0.00);

            $table->float('subtotal')->default(0.00);

            $table->float('shipping_amount')->default(0.00);

            $table->float('tax_amount')->default(0.00);

            $table->float('tax_amount_incl_vat')->default(0.00);

            $table->decimal('weight')->nullable();
            $table->string('weight_unit')->default('kg');

            $table->float('grand_total')->default(0.00);

            $table->string('shipping_method');
            $table->string('shipping_description');

            $table->string('locale')->default('en_US');

            $table->string('customer_email');
            $table->string('customer_firstname');
            $table->string('customer_lastname');
            $table->foreignIdFor(Bid::class)->constrained()->restrictOnDelete();
            $table->foreignIdFor(Lot::class)->constrained()->restrictOnDelete();
            $table->foreignIdFor(User::class)->constrained()->restrictOnDelete();

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quotes');
    }
};
