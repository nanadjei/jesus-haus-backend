<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCashflowsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cashflows', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger("category_id")->comment("The id of the category which this cashflow belongs to");
            $table->foreign("category_id")->references("id")->on("categories");

            $table->unsignedBigInteger("staff_id")->comment("The id of the staff who entered the information");
            $table->foreign("staff_id")->references("id")->on("users");

            $table->enum('type', ["income", "expense"]);
            $table->text('description')->nullable();
            $table->decimal('amount', 8, 2);
            $table->string('receiver_or_giver')->nullable();

            $table->dateTime('as_at')->nullable();

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
        Schema::dropIfExists('cashflows');
    }
}
