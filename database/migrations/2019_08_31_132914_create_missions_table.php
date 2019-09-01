<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('missions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->text('description')->nullable();
            $table->float('goal', 8, 2);
            $table->float('award', 8, 2);
            $table->boolean('is_period')->default(false);
            $table->enum('period', ['daily', 'weekly', 'monthly'])->default('daily');
            $table->boolean('is_deadline')->default(false);
            $table->dateTime('deadline')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::table('missions', function (Blueprint $table) {
            $table->unsignedBigInteger('distributor_id');
            $table->foreign('distributor_id')->references('id')->on('distributors');
            $table->unsignedBigInteger('unit_id');
            $table->foreign('unit_id')->references('id')->on('units');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('missions');
    }
}
