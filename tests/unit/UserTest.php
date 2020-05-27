<?php

use PHPUnit\Framework\TestCase;

class UserTest extends TestCase{

	protected $user;

	public function setUp():void{

		$this->user = new \App\Models\User;
		//var_dump(1);

	}

	public function testThatWeCanGetTheFirstName(){

		$this->user->setFirstName('Md Abu');
		$this->assertEquals($this->user->getFirstName(),'Md Abu');

	}
	
	public function testThatWeCanGetTheLastName(){

		$this->user->setLastName('Yusuf');
		$this->assertEquals($this->user->getLastName(),'Yusuf');

	}

	public function testFullNameIsReturned(){

		$this->user->setFirstName('Md Abu');
		$this->user->setLastName('Yusuf');

		$this->assertEquals($this->user->getFullName(),'Md Abu Yusuf');

	}

	public function testFirstNameAndLastNameAreTrimmed(){

		$this->user->setFirstName('Md Abu ');
		$this->user->setLastName('  Yusuf');

		$this->assertEquals($this->user->getFirstName(),'Md Abu');
		$this->assertEquals($this->user->getLastName(),'Yusuf');

	}

	public function testEmailAddressCanBeSet(){

		$email = 'yusuf@real.de';
		$this->user->setEmail('yusuf@real.de');
		
		$this->assertEquals($this->user->getEmail(),$email);
		
	}

	public function testEmailVariablesContainCorrectValues(){

		$this->user->setFirstName('Md Abu');
		$this->user->setLastName('Yusuf');
		$this->user->setEmail('yusuf@real.de');

		$emailVariables = $this->user->getEmailVariables();

		$this->assertArrayHasKey('full_name',$emailVariables);
		$this->assertArrayHasKey('email',$emailVariables);

		$this->assertEquals($emailVariables['full_name'],'Md Abu Yusuf');
		$this->assertEquals($emailVariables['email'],'yusuf@real.de');

	}

}