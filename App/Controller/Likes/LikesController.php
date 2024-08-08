<?php

namespace App\Controller\Likes;

class LikesController
{

    public static function store()
    {

        dd('load');

        header('Content-Type: application/json');

// Check if the request method is POST
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Retrieve the posted data
            $username = $_POST['username'] ?? '';

            // Simulate processing (e.g., saving to a database)

        }

// If not a POST request, return an error
        $response = [
            'status' => 'error',
            'message' => 'Invalid request method.'
        ];

        echo json_encode($response);


    }

    public function destroy()
    {
        
    }

}