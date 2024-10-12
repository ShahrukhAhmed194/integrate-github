<?php

namespace app\Services;

use GuzzleHttp\Client;


Class GitHubServices{

    public function getRepositoryListOfUser($token)
    {
        $client = new Client();
        $response = $client->get('https://api.github.com/user/repos', [
            'headers' => [
                'Authorization' => 'token ' . $token,
            ],
        ]);

        return json_decode($response->getBody(), true);
    }
}