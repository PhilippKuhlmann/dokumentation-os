<?php

use App\Models\Customer;

test('user without admin role cannot access admin page', function () {
    $user = $this->createAndAuthenticateUserwithoutCustomer();

    $response = $this->get('/admin');
    $response->assertStatus(403);
});

test('user with customer can only access assigned customer', function () {
    $user = $this->createAndAuthenticateUserwithCustomer();

    $customerTwo = Customer::factory()->create(['slug' => 'othercustomer']);

    $response = $this->get($user->customer->slug);
    $response->assertStatus(200);

    $response = $this->get($customerTwo->slug);
    $response->assertStatus(403);
});

test('user without customer can access all customer', function () {
    $user = $this->createAndAuthenticateUserwithoutCustomer();

    $customerOne = Customer::factory()->create(['slug' => 'customerone']);
    $customerTwo = Customer::factory()->create(['slug' => 'customertwo']);

    $response = $this->get($customerOne->slug);
    $response->assertStatus(200);

    $response = $this->get($customerTwo->slug);
    $response->assertStatus(200);
});

test('user with role admin can access everything', function () {
    $user = $this->createAndAuthenticateUserAdmin();

    $customerOne = Customer::factory()->create(['slug' => 'customerone']);
    $customerTwo = Customer::factory()->create(['slug' => 'customertwo']);

    $response = $this->get($customerOne->slug);
    $response->assertStatus(200);

    $response = $this->get($customerTwo->slug);
    $response->assertStatus(200);

    $response = $this->get('/admin');
    $response->assertStatus(200);
});
