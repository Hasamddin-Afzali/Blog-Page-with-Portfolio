<?php

namespace Database\Seeders;

use App\Models\Project;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Project::create([
            'title'=>'Evrimsel Algoritma',
            'description'=>'Çizelgeleme probleminin evrim mekanizması ile çözümü.',
            'link'=>'#',
            'created_by'=>1,
            'created_at'=>Carbon::now()->subDays(10),
        ]);
        Project::create([
            'title'=>'Server Application',
            'description'=>'Client\'lar arası server üzerinden mesajlaşma yazılımı.',
            'link'=>'#',
            'created_by'=>1,
            'created_at'=>Carbon::now()->subDays(3),
        ]);
    }
}
