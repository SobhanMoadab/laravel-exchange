<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->enum('status', ['completed' , 'failed' , 'cancelled']);
            // Generate A BCrypt String Of (Current Time Stamp And user_id)
            $table->text('invoice_ray_id');
            $table->text('gateway_message')->nullable();
            // All User Inputs Returned From Gateway Will Recoreded In Here For Example : { data : amount : xxx$ } }
            $table->text('payment_data')->nullable();
            $table->integer('gateway_id');
            $table->integer('status_code')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoices');
    }
}
