<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Gradebook;
use App\Models\Student;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // User::factory(3)->create();

        $users = User::factory(10)->create();

        for($i = 0; $i < 6; $i++) {
            $gradebook = Gradebook::factory()->make();
            $users[$i]->gradebook()->save($gradebook);

           if($i < 3) {
                for($j = 0; $j <3; $j++) {
                    $student = Student::factory()->make();
                    $student->user_id = $users[$i]->id;
                    $student->gradebook_id = $gradebook->id;
                    $student->save();
                }
                for($k = 0; $k <3; $k++) {
                    $comment = Comment::factory()->make();
                    $comment->user_id = $users[$i]->id;
                    $comment->gradebook_id = $gradebook->id;
                    $comment->first_name = $users[$i]->first_name;
                    $comment->last_name = $users[$i]->last_name; 
                    $comment->save();
                }
           }
        } 
    }
}
