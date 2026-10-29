<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->tinyText('phone');
            $table->tinyText('telegram');
            $table->tinyText('vk');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
