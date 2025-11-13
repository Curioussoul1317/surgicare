<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('appointment_otps', function (Blueprint $table) {
            $table->id();
            $table->string('phone_number');
            $table->string('code', 6);
            $table->json('appointment_data');
            $table->timestamp('expires_at');
            $table->timestamps();
            
            $table->index('phone_number');
            $table->index('code');
        });
    }

    public function down()
    {
        Schema::dropIfExists('appointment_otps');
    }
};