<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger("department_id")->comment("The role that the user has");
            $table->foreign("department_id")->references("id")->on("departments");

            $table->enum('type', ["member", "visitor"])->default("member");
            $table->string('first_name');
            $table->string('last_name')->nullable();
            $table->string('email')->unique();
            $table->enum('title', ["mr", "mrs", "miss"]);
            $table->date("dob")->nullable();
            $table->string('phone')->nullable();
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
        Schema::dropIfExists('members');
    }
}
