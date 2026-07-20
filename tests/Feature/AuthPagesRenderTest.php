<?php

use App\Models\User;

test('Gast-Auth-Seiten rendern ohne Fehler', function (string $uri) {
    $this->get($uri)->assertStatus(200);
})->with([
    '/login',
    '/forgot-password',
    '/register',
    '/reset-password/testtoken',
]);

test('confirm-password rendert für angemeldete Nutzer', function () {
    $this->actingAs(User::factory()->create());
    $this->get('/confirm-password')->assertStatus(200);
});
