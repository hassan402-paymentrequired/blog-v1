<?php

namespace App\Controller\Posts;

use App\Model\Database;

class BlogPostsController
{

    public static function index()
    {
            try {
                $title = trim(htmlentities($_POST["comments"]));
                $postId = trim(htmlentities($_POST["id"]));
                $userId = $_SESSION['user']['id'];


                if (!$title) {
                    session('error', 'make a comment');
                    redirect('/home/feed/show');
                }



                $db = new Database();

                $db->query("INSERT INTO comments (title, post_id, user_id) VALUES (?,?,?)",
                    [$title, $postId, $userId]);


                session('success', 'Post added successfully');
                redirect('/home/feed/show');

            } catch (\Exception $exception) {
                dd($exception->getMessage());
            }
        }



    public static function create()
    {
        require base_path('resources/views/feed/index.view.php');
    }

    public static function store()
    {
        try {

            $title = trim(htmlentities($_POST['title']));
            $content = trim(htmlentities($_POST['body']));
            $tag = trim(htmlentities($_POST['tag']));

            if (!$title || !$content) {
                session('error', 'both fields are required');
                redirect('/home/feed/create');
            }

            $db = new Database();

            $db->query("INSERT INTO posts (user_id, title, body, tag) VALUES (?,?,?, ?)",
                [$_SESSION['user']['id'], $title, $content, $tag]);

            session('success', 'Post added successfully');
            redirect('/home/feed');

        }catch (\Exception $exception){
            dd($exception->getMessage());
        }
    }

    public static function show()
    {
        try {

            $db = new Database();

            $data = $db->query("SELECT
            posts.id AS post_id,
            posts.title AS post_title,
            posts.body AS post_body,
            posts.tag AS post_tag,
            posts.created_at AS post_created_at,
            users.id AS user_id,
            users.username AS username,
            users.email AS user_email,
            (SELECT COUNT(*) FROM likes WHERE likes.post_id = posts.id) AS like_count,
            CONCAT('[', 
                IFNULL(
                    GROUP_CONCAT(
                        CONCAT(
                            '{\"comment_id\":', comments.id, 
                            ',\"comment_title\":\"', comments.title, 
                            '\",\"comment_created_at\":\"', comments.created_at,
                            '\",\"comment_user_id\":', comment_users.id, 
                            ',\"comment_username\":\"', comment_users.username,
                            '\",\"comment_user_email\":\"', comment_users.email, '\"}'
                        ) SEPARATOR ','
                    ), 
                '') ,']') AS comments
        FROM
            posts
        JOIN
            users ON posts.user_id = users.id
        LEFT JOIN
            comments ON posts.id = comments.post_id
        LEFT JOIN
            users AS comment_users ON comments.user_id = comment_users.id
        WHERE
                posts.id = 3
        GROUP BY
            posts.id, users.id
        ORDER BY
            posts.created_at DESC")->fetch();

            require base_path('resources/views/blog-posts/show.view.php');

        }
        catch (\Exception $exception){
            dd($exception->getMessage());
        }
    }

    public static function update()
    {

    }

    public static function edit()
    {

    }

    public static function destroy()
    {

    }


}