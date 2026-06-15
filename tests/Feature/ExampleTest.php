<?php

use Database\Seeders\PackageSeeder;

test('the application returns a successful response', function () {
    $this->seed(PackageSeeder::class);

    $response = $this->get('/');

    $response->assertStatus(200);
});

