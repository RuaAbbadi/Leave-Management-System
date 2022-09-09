<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leaves', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('emp_id');
            $table->unsignedBigInteger('leavetype_id');
            $table->date('start_date');
            $table->date('end_date');
            $table->string('description',250);
            $table->integer('leavestatus');

            $table->foreign('leavetype_id')->references('id')->on('leavestype')->cascadeOnDelete();
            $table->foreign('emp_id')->references('id')->on('employees')->cascadeOnDelete();

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
        Schema::dropIfExists('leaves');
    }
};
