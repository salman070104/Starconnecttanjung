<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('paket_requests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pelanggan_id');
            $table->string('paket_lama');
            $table->integer('tagihan_lama');
            $table->string('paket_baru');
            $table->integer('tagihan_baru');
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->text('admin_note')->nullable();
            $table->timestamp('approved_at')->nullable();
            $table->timestamps();

            $table->foreign('pelanggan_id')->references('id')->on('pelanggans')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('paket_requests');
    }
};
