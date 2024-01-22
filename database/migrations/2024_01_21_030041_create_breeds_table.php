<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('breeds', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('type');
            $table->timestamps();
        });

        // Insert breeds for dogs
        DB::table('breeds')->insert([
            ['name' => 'Labrador', 'type' => 'dog'],
            ['name' => 'Golden Retriever', 'type' => 'dog'],
            ['name' => 'Poodle', 'type' => 'dog'],
            ['name' => 'French Bulldog', 'type' => 'dog'],
            ['name' => 'Beagle', 'type' => 'dog'],
            ['name' => 'Pug', 'type' => 'dog'],
            ['name' => 'Rottweiler', 'type' => 'dog'],
            ['name' => 'German Shepherd', 'type' => 'dog'],
            ['name' => 'Bulldog', 'type' => 'dog'],
            ['name' => 'Siberian Husky', 'type' => 'dog'],
            ['name' => 'Dobermann', 'type' => 'dog'],
            ['name' => 'Great Dane', 'type' => 'dog'],
            ['name' => 'Shih Tzu', 'type' => 'dog'],
            ['name' => 'Miniature Schnauzer', 'type' => 'dog'],
            ['name' => 'Cavalier King Charles Spaniel', 'type' => 'dog'],
            ['name' => 'Pomeranian', 'type' => 'dog'],
            ['name' => 'Australian Shepherd', 'type' => 'dog'],
            ['name' => 'Border Collie', 'type' => 'dog'],
            ['name' => 'Chihuahua', 'type' => 'dog'],
            ['name' => 'Shetland Sheepdog', 'type' => 'dog'],
            ['name' => 'Boston Terrier', 'type' => 'dog'],
            ['name' => 'Maltese', 'type' => 'dog'],
            ['name' => 'Bernese Mountain Dog', 'type' => 'dog'],
            ['name' => 'Pembroke Welsh Corgi', 'type' => 'dog'],
            ['name' => 'Cocker Spaniel', 'type' => 'dog'],
            ['name' => 'Havanese', 'type' => 'dog'],
            ['name' => 'English Mastiff', 'type' => 'dog'],
            ['name' => 'Brittany', 'type' => 'dog']
        ]);

        DB::table('breeds')->insert([
            ['name' => 'Persian', 'type' => 'cat'],
            ['name' => 'Maine Coon', 'type' => 'cat'],
            ['name' => 'Ragdoll', 'type' => 'cat'],
            ['name' => 'Siamese', 'type' => 'cat'],
            ['name' => 'Bengal', 'type' => 'cat'],
            ['name' => 'British Shorthair', 'type' => 'cat'],
            ['name' => 'Sphynx', 'type' => 'cat'],
            ['name' => 'Abyssinian', 'type' => 'cat'],
            ['name' => 'Birman', 'type' => 'cat'],
            ['name' => 'Scottish Fold', 'type' => 'cat'],
            ['name' => 'Devon Rex', 'type' => 'cat'],
            ['name' => 'Norwegian Forest Cat', 'type' => 'cat'],
            ['name' => 'Oriental', 'type' => 'cat'],
            ['name' => 'American Shorthair', 'type' => 'cat'],
            ['name' => 'Russian Blue', 'type' => 'cat'],
            ['name' => 'Savannah', 'type' => 'cat'],
            ['name' => 'Balinese', 'type' => 'cat'],
            ['name' => 'Bombay', 'type' => 'cat'],
            ['name' => 'Himalayan', 'type' => 'cat'],
            ['name' => 'Manx', 'type' => 'cat'],
            ['name' => 'Egyptian Mau', 'type' => 'cat'],
            ['name' => 'Ragamuffin', 'type' => 'cat'],
            ['name' => 'Cornish Rex', 'type' => 'cat'],
            ['name' => 'Tonkinese', 'type' => 'cat'],
            ['name' => 'Turkish Angora', 'type' => 'cat'],
            ['name' => 'Burmese', 'type' => 'cat'],
            ['name' => 'Chartreux', 'type' => 'cat'],
            ['name' => 'Exotic', 'type' => 'cat']
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('breeds');
    }
};
