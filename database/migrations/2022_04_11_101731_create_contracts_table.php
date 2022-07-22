<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contracts', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('jobs_id')->unsigned();
            $table->integer('proposal_id');
            $table->integer('company_id');
            $table->integer('freelancer_id')->comment("freelancer or agency id");
            $table->string('start_time');
            $table->string('end_time');
            $table->string('payment_type_id');
            $table->string('payment_amount');
            $table->string('conversation')->nullable();
            $table->timestamps();
            $table->foreign('jobs_id')->references('id')->on('jobs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contracts');
    }
}
