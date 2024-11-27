<?php

namespace Database\Seeders;

use App\Models\Service;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = [
            ['id' => 1, 'code' => 'GDEV', 'name' => 'Game Development', 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
            ['id' => 2, 'code' => 'GDES', 'name' => 'Game Design', 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
            ['id' => 3, 'code' => 'GART', 'name' => 'Game Art (2D and 3D)', 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
            ['id' => 4, 'code' => 'CART', 'name' => 'Concept Art', 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
            ['id' => 5, 'code' => 'UI', 'name' => 'UI/UX', 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
            ['id' => 6, 'code' => 'AV', 'name' => 'Architectural Visualisation', 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
            ['id' => 7, 'code' => 'VS', 'name' => 'Virtual Staging', 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
            ['id' => 8, 'code' => 'GRAD', 'name' => 'Graphic Design', 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
            ['id' => 9, 'code' => 'VED', 'name' => 'Video Editing(short form, Long form)', 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
            ['id' => 10, 'code' => 'CGI', 'name' => 'CGI Advertisement', 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
            ['id' => 11, 'code' => 'WDES', 'name' => 'Web Design', 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
            ['id' => 12, 'code' => 'WDEV', 'name' => 'Web Development', 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
        ];

        // Insert each record into the database
        foreach ($services as $service) {
            Service::create($service);
        }
    }
}
