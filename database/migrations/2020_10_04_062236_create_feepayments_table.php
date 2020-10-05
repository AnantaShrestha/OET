<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeepaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feepayments', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('feespaidamount');
            $table->date('dateofpayment');
            $table->string('modeofpayment');
            $table->string('paymentreceivedby');
            $table->unsignedBigInteger('applicant_id');
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
        Schema::dropIfExists('feepayments');
    }
}
