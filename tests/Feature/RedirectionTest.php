<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RedirectionTest extends TestCase
{
    use RefreshDatabase;

    public function test_the_application_redirect_to_login_on_default_url_for_unauthenticated_user()
    {
        $response = $this->get('/');
        $response->assertRedirect('/login');
    }

    public function test_the_application_redirect_to_login_on_customer_url_for_unauthenticated_user()
    {
        $response = $this->get('/mustermann');
        $response->assertRedirect('/login');
    }

    public function test_the_application_redirect_to_login_on_admin_url_for_unauthenticated_user()
    {
        $response = $this->get('/admin');
        $response->assertRedirect('/login');
    }

    public function test_the_application_redirect_to_login_on_profile_url_for_unauthenticated_user()
    {
        $response = $this->get('/profile');
        $response->assertRedirect('/login');
    }

    public function test_the_application_redirect_to_login_on_utmsearch_url_for_unauthenticated_user()
    {
        $response = $this->get('/utmsearch');
        $response->assertRedirect('/login');
    }

    public function test_the_application_redirect_to_login_on_remotesearch_url_for_unauthenticated_user()
    {
        $response = $this->get('/remotesearch');
        $response->assertRedirect('/login');
    }
}
