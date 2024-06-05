<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use App\Models\Project;
use Illuminate\Support\Facades\DB;
use App\Models\Type;


class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {

        DB::table('projects')->truncate();

        $types = Type::all();

        $ids = $types->pluck('id')->all();

        
        for($i = 0; $i < 10; $i++){
            $new_project = new Project();

            $name_project = $faker->sentence(5);

            $new_project->name_project = $name_project;
            $new_project->slug = Str::slug($name_project);
            $new_project->url_github = $faker->url();
            $new_project->description = $faker->text(400);
            $new_project->type_id = $faker->optional()->randomElement($ids);

            $new_project->save();
        }
    }
}
