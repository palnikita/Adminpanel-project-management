<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolesTable extends Migration
{
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('rolename');
            $table->boolean('view_leads')->default(1);
            $table->boolean('add_leads')->default(1);
            $table->boolean('delete_leads')->default(1);
            $table->boolean('edit_leads')->default(1);
            $table->boolean('view_team')->default(1);
            $table->boolean('add_team')->default(1);
            $table->boolean('delete_team')->default(1);
            $table->boolean('edit_team')->default(1);
            $table->boolean('view_roles')->default(1);
            $table->boolean('edit_roles')->default(1);
            $table->boolean('delete_roles')->default(1);
            $table->boolean('add_roles')->default(1);
            $table->boolean('view_task')->default(1);
            $table->boolean('add_task')->default(1);
            $table->boolean('delete_task')->default(1);
            $table->boolean('edit_task')->default(1);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('roles');
    }
}
