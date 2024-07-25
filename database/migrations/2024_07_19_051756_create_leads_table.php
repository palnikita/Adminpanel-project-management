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
        Schema::create('leads', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('Leadtype');
            $table->string('phone');
            $table->string('website')->nullable();
            $table->string('label');// Corrected from 'Lable' to 'label'
            $table->date('Date');
            $table->string('Owner');
            $table->string('Status');
            $table->string('source')->nullable();
            $table->text('Address')->nullable();
            $table->text('Description')->nullable();
            
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
        Schema::dropIfExists('leads');
    }
};
