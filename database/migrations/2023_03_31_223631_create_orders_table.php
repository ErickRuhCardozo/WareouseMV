<?php

use App\Models\Unity;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('requester_id')->constrained('users');
            $table->tinyText('product_ids_csv');
            $table->date('date')->default(now());
        });
    }

    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
