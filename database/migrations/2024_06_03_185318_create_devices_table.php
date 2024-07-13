<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('devices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->enum('device_type', ['laptop', 'mobile']);
            $table->string('device_id')->unique();
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('devices');
    }
};
