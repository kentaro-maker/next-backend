<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Issue;


class IssueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->command->info("Issue Seeder Starting....");

        $json = file_get_contents(__DIR__ . '/issues.json');
        $issues = json_decode($json, true);


        $count = 0;
        foreach ($issues["data"] as $issue) {
            // foreach($category['ingredients'] as $ingredient) {
            //     // Ingredient::create([
            //     //     'name' => $ingredient['name'],
            //     //     'category' => $category['name']
            //     // ]);
            //     $count++;
            // }
            // $this->command->info("{$e}");
            // print_r($issue);
            $count++;
            // $this->command->info($issue["author"]["name"]);
            $text_array=[];
            $yomi_array=[];
            foreach ($issue["script"] as $item) {
                array_push($text_array, $item["text"]);
                array_push($yomi_array, $item["yomi"]);
            }

            $new_issue = new Issue();
            $new_issue->author_name = $issue["author"]["name"];
            $new_issue->author_yomi = $issue["author"]["name"];
            $new_issue->author_gender = $issue["author"]["gender"];
            $new_issue->author_profile = $issue["author"]["profile"];
            $new_issue->author_interpretation_name = $issue["author"]["interpretation"]["name"];
            $new_issue->author_interpretation_profile = $issue["author"]["interpretation"]["profile"];
            $new_issue->script_text = $text_array;
            $new_issue->script_yomi = $yomi_array;
            $new_issue->classification = $issue["info"]["classification"];
            $new_issue->anthology = $issue["info"]["anthology"];
            $new_issue->theme = $issue["info"]["theme"];
            $new_issue->meaning = $issue["info"]["meaning"];
            $new_issue->interpretation = $issue["info"]["interpretation"];
            // dd($new_issue->attributesToArray());

            $new_issue->save();
            
        }

        $this->command->info("{$count} issues were Created!!");

      
    }
}
