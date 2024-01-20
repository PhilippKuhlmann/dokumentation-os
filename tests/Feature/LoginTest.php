<?php

test('login user with role admin and assert redirect to admin page', function () {
    $this->createAndAuthenticateUserAdmin();

    $response = $this->get('/');

    $this->assertAuthenticated();

    $this->followRedirects($response)->assertViewIs('admin.index');
});

test('login user without customer and assert redirect to customer search page', function () {
    $this->createAndAuthenticateUserWithoutCustomer();

    $response = $this->get('/');

    $this->assertAuthenticated();

    $this->followRedirects($response)->assertViewIs('customer.search');
});

test('login user with role customer and assert redirect to customer dashboard page', function () {
    $this->createAndAuthenticateUserWithCustomer();

    $response = $this->get('/');

    $this->assertAuthenticated();

    $this->followRedirects($response)->assertViewIs('customer.dashboard');
});
