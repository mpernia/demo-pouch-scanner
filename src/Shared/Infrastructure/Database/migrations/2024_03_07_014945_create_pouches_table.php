<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('pouches', function (Blueprint $table) {
            $table->id();
            $table->string('pouch_id')->nullable()->default(null);
            $table->boolean('second_validation')->default(false);
            $table->string('second_validation_by')->nullable()->default(null);
            $table->string('checked_by')->nullable()->default(null);
            $table->dateTime('checked_date_time')->nullable()->default(null);
            $table->string('pouch_image_url')->nullable()->default(null);
            $table->string('production_box')->nullable()->default(null);
            $table->dateTime('dose_time')->nullable()->default(null);
            $table->enum('vision_state', ['Checked', 'Not checked', 'OK'])->default('Not checked');
            $table->string('vision_message')->nullable()->default(null);
            $table->foreignId('roll_id')->constrained();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pouches');
    }
};
