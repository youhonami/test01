<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained()->cascadeOnDelete();
            $table->string('first_name')->nullable(false);
            $table->string('last_name')->nullable(false);
            $table->text('gender')->nullable(false);
            $table->string('email')->nullable(false);
            $table->text('tel', 11)->nullable(false);
            $table->text('address')->nullable(false);
            $table->text('building')->nullable();
            $table->text('detail')->nullable(false);
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
        Schema::dropIfExists('contacts');
    }
}
