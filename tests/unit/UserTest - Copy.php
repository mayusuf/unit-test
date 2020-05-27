<?php

use PHPUnit\Framework\TestCase;

class UserTest extends TestCase{

	public function testThatWeCanGetTheFirstName(){

		$user = new \App\Models\User;

		$user->setFirstName('Md Abu');
		$this->assertEquals($user->getFirstName(),'Md Abu');

	}
	
	public function testThatWeCanGetTheLastName(){

		$user = new \App\Models\User;

		$user->setLastName('Yusuf');
		$this->assertEquals($user->getLastName(),'Yusuf');

	}

	public function testFullNameIsReturned(){

		$user = new \App\Models\User;

		$user->setFirstName('Md Abu');
		$user->setLastName('Yusuf');

		$this->assertEquals($user->getFullName(),'Md Abu Yusuf');

	}

	public function testFirstNameAndLastNameAreTrimmed(){

		$user = new \App\Models\User;

		$user->setFirstName('Md Abu ');
		$user->setLastName('  Yusuf');

		$this->assertEquals($user->getFirstName(),'Md Abu');
		$this->assertEquals($user->getLastName(),'Yusuf');

	}

	public function testEmailAddressCanBeSet(){

		$user = new \App\Models\User;

		$email = 'yusuf@real.de';
		$user->setEmail('yusuf@real.de');
		
		$this->assertEquals($user->getEmail(),$email);
		
	}

	public function testEmailVariablesContainCorrectValues(){

		$user = new \App\Models\User;

		$user->setFirstName('Md Abu');
		$user->setLastName('Yusuf');
		$user->setEmail('yusuf@real.de');

		$emailVariables = $user->getEmailVariables();

		$this->assertArrayHasKey('full_name',$emailVariables);
		$this->assertArrayHasKey('email',$emailVariables);

		$this->assertEquals($emailVariables['full_name'],'Md Abu Yusuf');
		$this->assertEquals($emailVariables['email'],'yusuf@real.de');

	}

}