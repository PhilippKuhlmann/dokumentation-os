<?php

/*
|--------------------------------------------------------------------------
| Test Case
|--------------------------------------------------------------------------
|
| The closure you provide to your test functions is always bound to a specific PHPUnit test
| case class. By default, that class is "PHPUnit\Framework\TestCase". Of course, you may
| need to change it using the "uses()" function to bind a different classes or traits.
|
*/

uses(
    Tests\TestCase::class,
    Illuminate\Foundation\Testing\RefreshDatabase::class,
)->in('Feature');

/*
|--------------------------------------------------------------------------
| Expectations
|--------------------------------------------------------------------------
|
| When you're writing tests, you often need to check that values meet certain conditions. The
| "expect()" function gives you access to a set of "expectations" methods that you can use
| to assert different things. Of course, you may extend the Expectation API at any time.
|
*/

expect()->extend('toBeOne', function () {
    return $this->toBe(1);
});

/*
|--------------------------------------------------------------------------
| Functions
|--------------------------------------------------------------------------
|
| While Pest is very powerful out-of-the-box, you may have some testing code specific to your
| project that you don't want to repeat in every file. Here you can also expose helpers as
| global functions to help you to reduce the number of lines of code in your test files.
|
*/

/**
 * Legt einen authentifizierbaren Nutzer mit den angegebenen Permissions an
 * (ohne customer_id => Zugriff auf alle Kunden, wie ein Techniker).
 */
function userWithPermissions(array $names): \App\Models\User
{
    // Explizite hohe ID, damit die Rolle nie versehentlich die Admin- (1)
    // oder Techniker-Rolle (10) per Auto-Increment erwischt.
    $role = \App\Models\Role::factory()->create([
        'id' => (\App\Models\Role::max('id') ?? 0) + 100,
    ]);

    foreach ($names as $name) {
        $permission = \App\Models\Permission::factory()->create(['name' => $name]);
        $role->permissions()->attach($permission->id);
    }

    return \App\Models\User::factory()->create(['role_id' => $role->id]);
}

