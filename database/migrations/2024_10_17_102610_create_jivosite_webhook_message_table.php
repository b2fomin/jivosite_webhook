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
            $table->unsignedBigInteger('jivosite_webhook_id')->index();
            $table->foreign('jivosite_webhook_id', 'jivosite_webhook_id_fk')->references('id')->on('jivosite_webhook');
            $table->text('message');
            $table->timestamp('timestamp');
            $table->string('type');
            $table->unsignedBigInteger('agent_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jisovite_webhook_message');
    }
};
