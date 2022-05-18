<?php

use App\Models\Bidang;
use App\Models\Tiket;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anggota_ascs', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignIdFor(Tiket::class)->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignIdFor(Bidang::class)->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->string('nama');
            $table->string('email')->unique();
            $table->text('alamat');
            $table->string('hp');
            $table->string('foto')->nullable();
            $table->string('kesediaan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('anggota_ascs');
    }
};
