<?php

use App\Models\User;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    public function testThatWeCanGetTheFirstName()
    {
        $user = new User;

        $user->setFirstName('pnlinh');

        $this->assertEquals('pnlinh', $user->getFirstName());
    }

    public function testThatWeCanGetTheLastName()
    {
        $user = new User;

        $user->setLastName('Pham');

        $this->assertEquals('Pham', $user->getLastName());
    }

    public function testFullNameIsReturned()
    {
        $user = new User;

        $user->setFirstName('Ngoc Linh');
        $user->setLastName('Pham');

        $this->assertEquals('Ngoc Linh Pham', $user->getFullName());
    }

    public function testFirstNameAndLastNameAreTrimed()
    {
        $user = new User;

        $user->setFirstName('   Ngoc Linh   ');
        $user->setLastName('Pham   ');

        $this->assertEquals('Ngoc Linh', $user->getFirstName());
        $this->assertEquals('Pham', $user->getLastName());
    }

    public function testEmailAddressCanSet()
    {
        $user = new User;

        $user->setEmail('pnlinh1207@gmail.com');

        $this->assertEquals('pnlinh1207@gmail.com', $user->getEmail());
    }

    public function testEmailVariablesContainCorrectValues()
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