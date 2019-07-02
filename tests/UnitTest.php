<?php
require_once('UserModel.php');
require_once('Connection.php');

use PHPUnit\Framework\TestCase;

class UnitTest extends TestCase
{
    public function setUp()
    {
        parent::setUp();
        $this->userModel = new UserModel();
    }

    public function tearDown()
    {
        parent::tearDown();
    }

    public function test_validate_user()
    {
        $checkData = [
            'email' => 'admin@admin.com',
            'password' => 'admin@admin'
        ];
        
        $data = $this->userModel->validateUser($checkData);

        $this->assertEquals($data, 1);
    }

    public function test_validate_user_fail()
    {
        $checkData = [
            'email' => 'test@test.com',
            'password' => 'password'
        ];
        
        $data = $this->userModel->validateUser($checkData);

        $this->assertFalse($data);
    }

    public function test_validte_email()
    {
        $checkData = 'admin@admin.com';
        
        $data = $this->userModel->validteEmail($checkData);

        $this->assertTrue($data);
    }

    public function test_validte_email_fail()
    {
        $checkData = 'test@test1122.qwerty';
        
        $data = $this->userModel->validteEmail($checkData);

        $this->assertFalse($data);
    }
}