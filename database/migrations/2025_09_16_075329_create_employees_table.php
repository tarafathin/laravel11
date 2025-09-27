<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create(table: 'employees', callback: function (Blueprint $table): void {
            $table->id();
            $table->string(column: 'nama_lengkap', length: 100);
            $table->string(column: 'email', length: 100);
            $table->string(column: 'nomor_telepon', length: 15);
            $table->date(column: 'tanggal_lahir');
            $table->text(column: 'alamat');
            $table->date(column: 'tanggal_masuk');
            $table->enum(column: 'status', allowed: ['aktif', 'nonaktif'])->default(value: 'aktif');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
