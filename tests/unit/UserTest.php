<?php

use App\Models\User;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    /** @var \App\Models\User */
    protected $user;

    public function setUp()
    {
        $this->user = new User();
    }

    /** @test */
    public function that_we_can_get_the_first_name()
    {
        $this->user->setFirstName('pnlinh');

        $this->assertEquals('pnlinh', $this->user->getFirstName());
    }

    public function test_that_we_can_get_the_last_name()
    {
        $this->user->setLastName('Pham');

        $this->assertEquals('Pham', $this->user->getLastName());
    }

    public function test_full_name_is_returned()
    {
        $this->user->setFirstName('Ngoc Linh');
        $this->user->setLastName('Pham');

        $this->assertEquals('Ngoc Linh Pham', $this->user->getFullName());
    }

    public function test_first_name_and_last_name_are_trimed()
    {
        $this->user->setFirstName('   Ngoc Linh   ');
        $this->user->setLastName('Pham   ');

        $this->assertEquals('Ngoc Linh', $this->user->getFirstName());
        $this->assertEquals('Pham', $this->user->getLastName());
    }

    public function test_email_address_can_set()
    {
        $this->user->setEmail('pnlinh1207@gmail.com');

        $this->assertEquals('pnlinh1207@gmail.com', $this->user->getEmail());
    }

    public function test_email_variables_contain_values()
    {
        $this->user->setFirstName('Ngoc Linh');
        $this->user->setLastName('Pham');
        $this->user->setEmail('pnlinh1207@gmail.com');

        $emailVariables = $this->user->getEmailVariables();

        $this->assertArrayHasKey('full_name', $emailVariables);
        $this->assertArrayHasKey('email', $emailVariables);

        $this->assertEquals('Ngoc Linh Pham', $emailVariables['full_name']);
        $this->assertEquals('pnlinh1207@gmail.com', $emailVariables['email']);
    }
}