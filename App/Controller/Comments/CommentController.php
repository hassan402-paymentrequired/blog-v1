<?php

namespace App\Controller\Comments;

use App\Model\Database;
use mysql_xdevapi\Exception;

class CommentController
{

    public static function store()
    {
        try {
            $title = trim(htmlentities($_POST["comment"]));
            $postId = trim(htmlentities($_POST["id"]));
            $userId = $_SESSION['user']['id'];

            if (! $title) {
                session('error', 'make a comment');
                redirect('/home/feed');
            }

            $db = new Database();

            $db->query("INSERT INTO comments (title, post_id, user_id) VALUES (?,?,?)",
            [$title, $postId, $userId]);


            session('success', 'Post added successfully');
            redirect('/home/feed/show');

        }catch (\Exception $exception){
            dd($exception);
        }
    }

    public static function destroy()
    {
        try
        {
            $id = $_POST['id'];
            $cid = $_POST['cid'];
            $db = new Database();

            $db->query("DELETE FROM comments WHERE id = ? AND comments.user_id = ?", [$cid,$id]);


            redirect('/home/feed');

        }
        catch (Exception $exception)
        {
            dd($exception->getMessage());
        }
    }

}