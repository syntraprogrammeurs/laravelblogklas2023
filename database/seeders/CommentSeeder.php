<?php

namespace Database\Seeders;

use App\Models\Comment;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
// Maak 2000 comments aan
        $comments = Comment::factory()->count(2000)->create();
// Wijs aan elk comment een willekeurige parent_id toe
        foreach ($comments as $comment) {
// Haal alle reacties op voor dezelfde post en ken ze willekeurig een parent toe
            //Binnen de foreach-lus worden alle comments opgehaald voor dezelfde post als de huidige comment en krijgen
            // ze willekeurig een parent toegewezen. Dit gebeurt door middel van de where()-methode van de Comment-klasse,
            // die zoekt naar comments met dezelfde post_id en een id die lager is dan die van de huidige comment.
            // Deze comments worden vervolgens in willekeurige volgorde gesorteerd met behulp van de inrandomOrder()-methode,
            // en de eerste comment wordt toegewezen als de parent van de huidige comment.
            // Als er geen geschikte parent comment gevonden wordt, krijgt de huidige comment geen parent_id toegewezen.
            // Ten slotte wordt de comment opgeslagen met behulp van de save()-methode.
            $postComments = Comment::where("post_id", $comment->post_id)
                ->where("id", "<", $comment->id)
                ->inrandomOrder()
                ->first();
            $comment->parent_id = $postComments ? $postComments->id : null;
            $comment->save();
        }
    }
}
