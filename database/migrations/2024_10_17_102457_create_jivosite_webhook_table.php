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
        Schema::create('jivosite_webhook', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('event_name');
            $table->string('widget_id');
            $table->string('visitor_name');
            $table->string('visitor_email');
            $table->string('visitor_phone');
            $table->string('visitor_description');
            $table->string('visitor_number');
            $table->unsignedBigInteger('chat_id');
            $table->string('session_geoip_country');
            $table->string('session_geoip_region');
            $table->string('session_geoip_city');
            $table->string('session_utm_json_source');
            $table->string('session_utm_json_campaign');
            $table->string('session_utm_json_content');
            $table->string('session_utm_json_medium');
            $table->string('session_utm_json_term');
            $table->string('page_title');
            $table->string('page_url');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jivosite_webhook');
    }
};
