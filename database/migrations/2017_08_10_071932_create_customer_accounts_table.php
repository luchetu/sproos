<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_accounts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name',200);
            $table->string('second_name',200);
            $table->string('email',200);
            $table->string('phone_number',200);
            $table->string('shipping_address',200);
            $table->string('city',200);
            $table->string('state_town',200);
            $table->string('postal_address',200);
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
        Schema::dropIfExists('customer_accounts');
    }
}
