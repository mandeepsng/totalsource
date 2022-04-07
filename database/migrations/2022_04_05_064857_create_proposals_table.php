<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProposalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proposals', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('jobs_id')->unsigned();
            $table->integer('working_user_id');
            $table->string('proposal_time');
            $table->string('proposal_desc');
            $table->string('bidding_price');
            $table->string('bidding_type')->comment('1 = fixed or 2 = hourly');
            $table->string('current_proposal_status');
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
        Schema::dropIfExists('proposals');
    }
}
