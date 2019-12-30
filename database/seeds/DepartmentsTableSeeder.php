<?php

use App\Models\Department;
use Illuminate\Database\Seeder;

class DepartmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Department::create(["name" => "None", "description" => "Member who are not part of any department.", "is_published" => true]);
        Department::create(["name" => "Bible Studies", "description" => "Members who are interested in studing the word of God and obtaining a lot of insight in it for the perpose of a better christian life.", "is_published" => true]);
        Department::create(["name" => "Welfare", "description" => "Welfare helps the church to grow in love an in harmony. People in this department see to it that members are been treated as family.", "is_published" => true]);
        Department::create(["name" => "Ushering and Greeting", "description" => "These people welcome people to church and make sure then have a comfortable place to sit.", "is_published" => true]);
        Department::create(["name" => "Media Team", "description" => "The media team is responsible for relay messages or information to the church in the form of video, audio, sms, whatsapp, flyer etc.", "is_published" => true]);
        Department::create(["name" => "Music and Drama", "description" => "Members who are part of the Voice of faith singing group.", "is_published" => true]);
    }
}
