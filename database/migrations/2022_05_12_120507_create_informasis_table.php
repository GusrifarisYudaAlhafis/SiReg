<?php

use App\Models\Admin;
use App\Models\Bidang;
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
        Schema::create('informasis', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Admin::class)->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignIdFor(Bidang::class)->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->string('judul');
            $table->text('konten');
            $table->string('foto')->nullable();
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
        Schema::dropIfExists('informasis');
    }
};
