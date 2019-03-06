<?php

use App\Models\User;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    /** @test */
    public function that_we_can_get_the_first_name()
    {
        $user = new User;

        $user->setFirstName('pnlinh');

        $this->assertEquals('pnlinh', $user->getFirstName());
    }

    public function test_that_we_can_get_the_last_name()
    {
        $user = new User;

        $user->setLastName('Pham');

        $this->assertEquals('Pham', $user->getLastName());
    }

    public function test_full_name_is_returned()
    {
        $user = new User;

        $user->setFirstName('Ngoc Linh');
        $user->setLastName('Pham');

        $this->assertEquals('Ngoc Linh Pham', $user->getFullName());
    }

    public function test_first_name_and_last_name_are_trimed()
    {
        $user = new User;

        $user->setFirstName('   Ngoc Linh   ');
        $user->setLastName('Pham   ');

        $this->assertEquals('Ngoc Linh', $user->getFirstName());
        $this->assertEquals('Pham', $user->getLastName());
    }

    public function test_email_address_can_set()
    {
        $user = new User;

        $user->setEmail('pnlinh1207@gmail.com');

        $this->assertEquals('pnlinh1207@gmail.com', $user->getEmail());
    }

    public function test_email_variables_contain_values()
    {
        $user = new User;

        $user->setFirstName('Ngoc Linh');
        $user->setLastName('Pham');
        $user->setEmail('pnlinh1207@gmail.com');

        $emailVariables = $user->getEmailVariables();

        $this->assertArrayHasKey('full_name', $emailVariables);
        $this->assertArrayHasKey('email', $emailVariables);

        $this->assertEquals('Ngoc Linh Pham', $emailVariables['full_name']);
        $this->assertEquals('pnlinh1207@gmail.com', $emailVariables['email']);
    }
}