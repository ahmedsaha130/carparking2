<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->integer('number')->unique();
            $table->unsignedTinyInteger('status')->default(0);
//            $table->string('reservation_start',0)->nullable();
//            $table->string('reservation_end',0)->nullable();
            $table->string('start_time_sensor',0)->nullable();
            $table->string('end_time_sensor',0)->nullable();
            $table->string('duration',0)->nullable();

            $table->unsignedBigInteger('customer_id');
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
//            $table->foreignId("customer_id")->constrained()->onDelete('cascade');
//            $table->foreignId("park_id")->constrained()->onDelete('cascade');
//            $table->foreignId("interval_id")->constrained()->onDelete('cascade');

            $table->unsignedBigInteger('park_id');
            $table->foreign('park_id')->references('id')->on('parks')->onDelete('cascade');

            $table->unsignedBigInteger('interval_id');
            $table->foreign('interval_id')->references('id')->on('intervals')->onDelete('cascade');
            $table->softDeletes();


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
        Schema::dropIfExists('reservations');
    }
}
