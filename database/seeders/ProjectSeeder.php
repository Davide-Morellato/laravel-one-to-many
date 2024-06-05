<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use App\Models\Project;
use Illuminate\Support\Facades\DB;


class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {

        DB::table('projects')->truncate();
        
        for($i = 0; $i < 10; $i++){
            $new_project = new Project();

            $name_project = $faker->sentence(5);

            $new_project->name_project = $name_project;
            $new_project->slug = Str::slug($name_project);
            $new_project->url_github = $faker->url();
            $new_project->description = $faker->text(400);

            $new_project->save();
        }
    }
}
