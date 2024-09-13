<?php

namespace Database\Seeders;

use App\Models\Room;
use Illuminate\Database\Seeder;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = $this->data();

        foreach ($data as $value) {
            Room::create([
                "order" => $value["order"],
                "place_id" => $value["place_id"],
                "title" => $value["title"],
                "level" => $value["level"],
                "duration" => $value["duration"],
                "person" => $value["person"],
                "banner" => $value["banner"],
                "text_picture" => $value["text_picture"],
                "slug" => $value["slug"],
                "description" => $value["description"],
                "poster" => $value["poster"],
                "created_by" => $value["created_by"],
            ]);
        }
    }

    private function data(): array
    {
        return [
            ["order" => 1, "place_id" => 1,"title" => "Psychiatric",       "slug" => "psychiatric",     "person" => "2-10", "duration" => "60", "level" => "Hard",  "banner" => "uploads/rooms/1/banner.webp",   "text_picture" => "uploads/rooms/1/text_picture.webp",    "poster"=>"uploads/rooms/1/poster.webp",      "created_by"=>1, "description" => "<p>Kids loves to play game but we have Emily here, at least we had Emily…</p> <p>They used to live here before her family and herself disappeared, no one exactly knows how happened, some says they got into huge argument and left the town in immediate, some says they are still in the house but not going outside.</p> <p>Every kid loves to play games but Emily was into some different kind of games, like paranormal ones and everything changed after she found old dusty ouija board under the bed.</p> <p>Find out what happened to her!</p>",],
            ["order" => 2, "place_id" => 1,"title" => "Exorcism",          "slug" => "exorcism",        "person" => "2-10", "duration" => "60", "level" => "Hard",  "banner" => "uploads/rooms/2/banner.webp",   "text_picture" => "uploads/rooms/2/text_picture.webp",    "poster"=>"uploads/rooms/2/poster.webp",      "created_by"=>1, "description" => "<p>Unlucky days or numbers are a nothing but a big lie. There’s only one reality at Jason’s home and It’s Jason’s himself.</p> <p>And you are not gonna like this reality; a terrible murderer you can not even imagine in your nightmares. He does not have mercy or he does not have empathy. A childhood with full of traumas is built him and It was not in a good way. You must keep up your pace to escape from world’s most dangerous killer’s house Jason…</p> <p>Before he got back.</p>",],
            ["order" => 3, "place_id" => 1,"title" => "Torture",           "slug" => "torture",         "person" => "2-10", "duration" => "60", "level" => "Hard",  "banner" => "uploads/rooms/3/banner.webp",   "text_picture" => "uploads/rooms/3/text_picture.webp",    "poster"=>"uploads/rooms/3/poster.webp",      "created_by"=>1, "description" => "<p>Who is not afraid of cemeteries? Every cemetery is a bit creepy, especially when It is dark but this one… This one, Cemetery 333 is a bit different… There’s something wrong about it.</p> <p>You might ask what could be wrong with a cemetery? Well let me tell you a story, a short story but horrorful one. Visitors who came to The Cemetery 333 never heard or seen again and graveyard field is not even on the official records.</p> <p>In this cemetery dead are not completely dead.</p>",],
            ["order" => 4, "place_id" => 1,"title" => "Chaos",             "slug" => "chaos",           "person" => "2-10", "duration" => "60", "level" => "Hard",  "banner" => "uploads/rooms/4/banner.webp",   "text_picture" => "uploads/rooms/4/text_picture.webp",    "poster"=>"uploads/rooms/4/poster.webp",      "created_by"=>1, "description" => "<p>Back in the time around early on 1980s there was a school in this little town. It burnt down around late 1980s. No one really knows how it happened but there’s haunted stories about how it burnt down… Eventhough folk doesn’t believe It might interest you!</p> <p>Sometimes at night time classroom’s lights seems to be up and there is voice coming outside, voice of children screaming and crying all around. Well It is just folk stories after all, right?</p> <p>Are you brave enough to get in and find out what happened?</p> <p>There’s only one lesson you will learn at this school and It is how to survive.</p>",],

            ["order" => 5, "place_id" => 2,"title" => "Hotel 666",          "slug" => "hotel-666",      "person" => "2-10", "duration" => "60", "level" => "Hard",  "banner" => "uploads/rooms/5/banner.webp",   "text_picture" => "uploads/rooms/5/text_picture.webp",   "poster"=>"uploads/rooms/5/poster.webp",       "created_by"=>1, "description" => "<p>A moderate house in a peaceful village, everything looked normal until 1978. A family got lost and no one ever discovered what happened to them in reality. There was some folk stories going around of course, some say they just ran away one day, some say they are buried in a basement under concrete but one thing for sure something is off here.</p> <p>After the family’s sudden disappear some neighbors said they heard their voices, saw silhouettes after the curtains but no one was brave enough to enter and check the house.</p> <p>The question is,</p> <p>Are you brave enough to learn for yourself?</p>",],
            ["order" => 6, "place_id" => 2,"title" => "Exorcism",           "slug" => "exorcism",       "person" => "2-10", "duration" => "60", "level" => "Hard",  "banner" => "uploads/rooms/6/banner.webp",   "text_picture" => "uploads/rooms/6/text_picture.webp",   "poster"=>"uploads/rooms/6/poster.webp",       "created_by"=>1, "description" => "<p>Ah young and beautiful Veronica, what a tragedy that she’s gone now… She has been gone for a while and It’s unknown If it’s murder or a suicide, her body kept in the morgue where an autopsy was performed.</p> <p>Something was off at autopsy though, her body never rot, never changed, her body was always like a first day that she died, according to hospital staff, even after months… But It did not stop there, whoever took a glimpse of eye to her started to die one by one… You need to decipher the all of these!</p> <p>Someone needs to reach the morgue and obtain the box containing the DNA sample of Veronica.</p> <p>Or else… You will end like everyone else…</p>",],
            ["order" => 7, "place_id" => 2,"title" => "The Circus",         "slug" => "the-circus",     "person" => "2-10", "duration" => "60", "level" => "Hard",  "banner" => "uploads/rooms/7/banner.webp",   "text_picture" => "uploads/rooms/7/text_picture.webp",   "poster"=>"uploads/rooms/7/poster.webp",       "created_by"=>1, "description" => "<p>Jessica Lauren is the only child of a happy family living in a small town in the 1970s. While everything is going well, strange things start to happen.</p> <p>When she was at 13 years old, Jessica is mental hospitalized after a strange and scary behaviours...</p>",],
            ["order" => 8, "place_id" => 2,"title" => "Psychiatric",        "slug" => "psychiatric",    "person" => "2-10", "duration" => "60", "level" => "Hard",  "banner" => "uploads/rooms/8/banner.webp",   "text_picture" => "uploads/rooms/8/text_picture.webp",   "poster"=>"uploads/rooms/8/poster.webp",       "created_by"=>1, "description" => "<p>A group of friends gathered to have fun on Halloween night and decided to go to the black out together.</p> <p>Even though everything seems normal, there is something they don't know. The address they came to for fun is wrong!</p> ",],
            ["order" => 9, "place_id" => 2,"title" => "Dungeon",            "slug" => "dungeon",        "person" => "2-10", "duration" => "60", "level" => "Hard",  "banner" => "uploads/rooms/9/banner.webp",   "text_picture" => "uploads/rooms/9/text_picture.webp",   "poster"=>"uploads/rooms/9/poster.webp",       "created_by"=>1, "description" => "<p>The feet of a donkey. The eyes of a cat. Bladed hands. Hair black as night. Sweet perfume.</p> <p>She is Umm Al Duwais, at once horrific and beautiful, repugnant and irresistible, and by all accounts deadly.</p>",],
        ];
    }
}
