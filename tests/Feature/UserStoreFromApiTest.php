<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Http\Controllers\UserController;
use Illuminate\Http\Request;

class UserStoreFromApiTest extends TestCase
{

    use RefreshDatabase;

    
    public function test_user_added_to_database()
    {
        $request = Request::create('/store', 'GET',[
            'api'     =>  'https://reqres.in/api/users',
        ]);
 
        $controller = new UserController();
        $response = $controller->store($request);

        $this->assertEquals(201, $response->getStatusCode());
    }

    public function test_user_added_to_database_with_page()
    {
        $request = Request::create('/store', 'GET',[
            // 'api'     =>  'https://reqres.in/api/users',
            'page'  =>  2,
        ]);
 
        $controller = new UserController();
        $response = $controller->store($request);

        $this->assertEquals(201, $response->getStatusCode());
    }
}
