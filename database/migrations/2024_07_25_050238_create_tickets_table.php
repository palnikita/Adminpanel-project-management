<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTable extends Migration
{
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->string('assign_to');
            $table->string('email');
            $table->string('phone');
            $table->string('project');
            $table->string('subject');
            $table->enum('priority', ['Low', 'High', 'Average']);
            $table->string('attachment')->nullable();
            $table->text('message');
            $table->enum('status', ['Pending', 'In Progress', 'Closeticket'])->default('Pending');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tickets');
    }
}
