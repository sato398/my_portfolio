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
        Schema::create('base_tools', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('base_tool_category_id')
            ->nullable()
            ->constrained()
            ->onUpdate('cascade')
            ->nullOnDelete();
            // $table->foreignId('work_tool_id')
            // ->nullable()
            // ->constrained()
            // ->onUpdate('cascade')
            // ->nullOnDelete();
            // $table->foreignId('skil_tool_id')
            // ->nullable()
            // ->constrained()
            // ->onUpdate('cascade')
            // ->nullOnDelete();
            $table->unsignedInteger('sort')->nullable();
            $table->integer('parent_id')->nullable();
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
        Schema::dropIfExists('base_tools');
    }
};
