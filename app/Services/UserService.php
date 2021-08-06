<?php

namespace App\Services;
use Carbon\Carbon;
use App\Models\User;

class UserService {

    public static function store($api, $page)
    {
        $users = self::getUserFromApi($api, $page) ?? [];

        foreach($users as $key => $user)
        {
            User::updateOrCreate(
                [
                    "id"          => $user->id,
                ],
                [
                    "id"          => $user->id,
                    "email"       => $user->email,
                    "first_name"  => $user->first_name,
                    "last_name"   => $user->last_name,
                    "avatar"      => $user->avatar
            ]);
        }
        
        return response()->json('Successful Stored Users', 201);
    }

    public static function getUserFromApi($apiLink, $page)
    {
        try {
            if (!$apiLink) {
                $api = $page > 0 ? $apiLink . '?page=' . $page : $apiLink;
                $httpClient = new \GuzzleHttp\Client();
                $request = $httpClient->get($api);
                
                return json_decode($request->getBody()->getContents())->data;
            }
        } catch (Throwable $e) {
            return response()->json([
                'message' => 'Record not found.'
            ], 404);
        }

       
    } 
}