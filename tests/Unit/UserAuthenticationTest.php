<?php

namespace Tests\Unit;

use App\User;
use App\Donor;
use Tests\TestCase;

class UserAuthenticationTest extends TestCase
{
    public function testUserRegister()
    {
        $user = factory(User::class)->make()->toArray();
        $user['password'] = 'secret';
        $donor = factory(Donor::class)->make()->toArray();
        $response = $this->post('api/register', ['user' => $user, 'donor' => $donor]);
        $data = json_decode($response->getContent(), true);

        $this->assertArrayHasKey('access_token', $data);
        $this->assertArrayHasKey('token_type', $data);
        $this->assertArrayHasKey('expires_in', $data);

        return $user;
    }

    /**
     * @depends testUserRegister
     */
    public function testUserLoginWithEmail($user)
    {
        $credentials = ['identity' => $user['email'], 'password' => $user['password']];

        $response = $this->post('api/login', $credentials);

        $data = json_decode($response->getContent(), true);

        $this->assertArrayHasKey('access_token', $data);
        $this->assertArrayHasKey('token_type', $data);
        $this->assertArrayHasKey('expires_in', $data);
    }

    /**
     * @depends testUserRegister
     */
    public function testUserLoginWithUsername($user)
    {
        $credentials = ['identity' => $user['username'], 'password' => $user['password']];

        $response = $this->post('api/login', $credentials);

        $data = json_decode($response->getContent(), true);

        $this->assertArrayHasKey('access_token', $data);
        $this->assertArrayHasKey('token_type', $data);
        $this->assertArrayHasKey('expires_in', $data);
    }

    /**
     * @depends testUserRegister
     */
    public function testInvalidUserLogin($user)
    {
        $user['password'] = 'novalidpassword';
        $response = $this->post('api/login', $user);

        $data = json_decode($response->getContent(), true);

        $this->assertArrayHasKey('error', $data);
    }
}
