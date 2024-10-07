<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('houses', function (Blueprint $table) {
            $table->uuid("id")->default(DB::raw("(UUID())"))->primary();
            $table->string("name", 64);
            $table->float("price", 4);
            $table->integer("bedrooms");
            $table->integer("bathrooms");
            $table->integer("storeys");
            $table->integer("garages");
            $table->timestamps();
        });

        DB::table('houses')->insert(
            [
                'name' => 'The Victoria',
                'price' => 250000,
                'bedrooms' => 3,
                'bathrooms' => 2,
                'storeys' => 2,
                'garages' => 2
            ]
        );

        DB::table('houses')->insert(
            [
                'name' => 'The Xavier',
                'price' => 300000,
                'bedrooms' => 4,
                'bathrooms' => 3,
                'storeys' => 1,
                'garages' => 2
            ]
        );

        DB::table('houses')->insert(
            [
                'name' => 'The Como',
                'price' => 200000,
                'bedrooms' => 2,
                'bathrooms' => 1,
                'storeys' => 1,
                'garages' => 1
            ]
        );

        DB::table('houses')->insert(
            [
                'name' => 'Green Meadows',
                'price' => 350000,
                'bedrooms' => 5,
                'bathrooms' => 3,
                'storeys' => 2,
                'garages' => 3
            ]
        );

        DB::table('houses')->insert(
            [
                'name' => 'The Geneva',
                'price' => 400000,
                'bedrooms' => 6,
                'bathrooms' => 3,
                'storeys' => 2,
                'garages' => 2
            ]
        );

        DB::table('houses')->insert(
            [
                'name' => 'Lakeview Estatesa',
                'price' => 400000,
                'bedrooms' => 6,
                'bathrooms' => 3,
                'storeys' => 2,
                'garages' => 2
            ]
        );


        DB::table('houses')->insert(
            [
                'name' => 'The Clifton',
                'price' => 400000,
                'bedrooms' => 6,
                'bathrooms' => 3,
                'storeys' => 2,
                'garages' => 2
            ]
        );

        DB::table('houses')->insert(
            [
                'name' => 'Hilltop',
                'price' => 400000,
                'bedrooms' => 6,
                'bathrooms' => 3,
                'storeys' => 2,
                'garages' => 2
            ]
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('houses');
    }
};
