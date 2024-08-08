<?php

namespace App\Controller\Profile;

use App\Model\Database;

class UserProfile
{
    public static function index()
    {
        try {
            $db = new Database();

           $data =  $db->query("SELECT * FROM posts WHERE user_id = ?", [$_SESSION['user']['id']])->fetchAll();

        }catch (\Exception $exception){
            dd($exception->getMessage());
        }

        require base_path('resources/views/profile/index.view.php');
    }

    public static function edit()
    {
        require base_path('resources/views/profile/edit.view.php');
    }

    public static function update()
    {

        try {

            $email = trim(htmlentities($_POST['email']));
            $username = trim(htmlentities($_POST['text']));

            if (! $email || ! $username) {
                session('error', 'all fields are required');
                redirect('/profile/update');
            };

            $db = new Database();

            $db->query("UPDATE users SET username = ? , email = ? WHERE id = ?",
                [$username, $email , $_SESSION['user']['id']]);

            $user = $db->query("SELECT * FROM users WHERE id = ?", [$_SESSION['user']['id']])->fetch();

            session('user', $user);

            redirect('/profile');

        }catch (\Exception $exception){
            dd($exception->getMessage());
        }
    }


}