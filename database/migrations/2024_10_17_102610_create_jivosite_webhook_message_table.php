<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('jivosite_webhook_message', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->unsignedBigInteger('jivosite_webhook_id');
            $table->string('message');
            $table->timestamp('timestamp');
            $table->string('type');
            $table->unsignedBigInteger('agent_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('webhook_messages');
    }
};
