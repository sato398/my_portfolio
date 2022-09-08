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
        Schema::create('skil_tools', function (Blueprint $table) {
            $table->id();
            $table->foreignId('skil_id')
            ->nullable()
            ->constrained()
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->string('icon');
            // $table->foreignId('base_tool_id')
            // ->nullable()
            // ->constrained()
            // ->onUpdate('cascade')
            // ->onDelete('cascade');
            $table->tinyInteger('years_of_dev');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('skil_tools');
    }
};
