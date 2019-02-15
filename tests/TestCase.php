<?php

namespace Tests;

use Faker\Factory as Faker;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    public $faker = null;

    protected function setUp()
    {
        parent::setUp(); // TODO: Change the autogenerated stub
        $this->artisan("migrate");
        $this->faker = Faker::create();
    }


    protected function tearDown()
    {
        $this->artisan("migrate:reset");
        parent::tearDown(); // TODO: Change the autogenerated stub
    }


}
