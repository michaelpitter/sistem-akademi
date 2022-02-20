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
        Schema::create('lecturers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            // $table->bigInteger("user_id")->unsigned();
            // $table->foreign("user_id")->references("id")->on("users")->onDelete("cascade");
            $table->string('nidn');
            $table->string('address');
            $table->string('phone');
            $table->string('sex')->nullable();
            $table->string('blood')->nullable();
            $table->string('religion')->nullable();
            $table->string('status')->nullable();
            $table->string('pob');
            $table->date('dob');
            $table->string('img')->nullable();
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
        Schema::dropIfExists('lecturers');
    }
};
