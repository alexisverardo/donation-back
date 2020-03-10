<?php

namespace Tests\Unit;

use App\User;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testUsersIndex()
    {
        $response = $this->get('api/users');
        $response->assertStatus(200);

        $users = json_decode($response->getContent(), true);

        foreach ($users as $user){
            $this->assertArrayHasKey('blood_type', $user);
            $this->assertArrayHasKey('province', $user);
            $this->assertArrayHasKey('location', $user);
        }
    }

    public function testUserStore()
    {
        $user = factory(User::class)->make()->toArray();
        $user['password'] = 'secret';
        $response = $this->post('api/users', $user);
        $response->assertStatus(201);

        return json_decode($response->getContent(), true)['id'];
    }

    /**
     * @depends testUserStore
     */
    public function testUserShow($id)
    {
        $response = $this->get('api/users/' . $id);
        $response->assertStatus(200);
    }

    /**
     * @depends testUserStore
     */
    public function testUserUpdate($id)
    {
        $user = User::query()->find($id)->toArray();
        $user['first_name'] .= '_UPDATED';
        $response = $this->patch('api/users/' . $id, $user);
        $response->assertStatus(200);
    }

    /**
     * @depends testUserStore
     */
    public function testUserDestroy($id)
    {
        $response = $this->delete('api/users/' . $id);
        $response->assertStatus(200);
        $data = json_decode($response->getContent(), true);

        $this->assertArrayHasKey('status', $data);
        $this->assertEquals('ok', $data['status']);
    }

    public function testUserStoreFail()
    {
        $response = $this->post('api/users', []);
        $response->assertStatus(400);

        $data = json_decode($response->getContent(), true);

        $this->assertArrayHasKey('location_id', $data['errors']);
        $this->assertArrayHasKey('province_id', $data['errors']);
        $this->assertArrayHasKey('blood_type_id', $data['errors']);
        $this->assertArrayHasKey('email', $data['errors']);
        $this->assertArrayHasKey('last_name', $data['errors']);
        $this->assertArrayHasKey('first_name', $data['errors']);
    }
}
