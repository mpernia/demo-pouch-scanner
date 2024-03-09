<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('rolls', function (Blueprint $table) {
            $table->id();
            $table->string('external_id')->nullable()->default(null);
            $table->string('batch_id')->nullable()->default(null);
            $table->string('patient_id')->nullable()->default(null);
            $table->enum('status', ['Checked', 'Not checked', 'OK'])->default('Not checked');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('rolls');
    }
};
