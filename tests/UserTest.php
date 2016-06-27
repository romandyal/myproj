<?php
require_once 'vendor/autoload.php';
require_once 'models/User.php';
require_once 'GetTableTest.php';



class UserTest extends PHPUnit_Framework_TestCase {

    private $b;

    protected function setUp() {
        $this->b = new User();
    }

    public function testUser_checkName()
    {
        $this->assertTrue($this->b->checkName('ku'));
        $this->assertFalse($this->b->checkName('k'));
        $this->assertTrue($this->b->checkName('56'));
    }

    public function testUser_checkPhone()
    {
        $this->assertFalse($this->b->checkPhone('12345678'));
        $this->assertFalse($this->b->checkPhone('sdfsdfswewrerer'));
        $this->assertTrue($this->b->checkPhone('1234567890'));

    }

    public function testUser_checkPassword()
    {
        $this->assertTrue($this->b->checkPassword('sdfsdfswewrerer'));
        $this->assertFalse($this->b->checkPassword('12345'));
    }


    public function testCreateTestTables()
    {
        $result = GetTableTest::getTable();

        $this->assertEquals(1,$result);
    }

    public function testUser_register()
    {
        $this->assertTrue($this->b->register('testName', 'test@test.te', 'testtest', '1234567890', 'test'));
    }

    public function testUser_dataExists()
    {
        $this->assertTrue($this->b->checkEmailExists('test@test.te','test'));
        $this->assertTrue($this->b->checkNameExists('testName','test'));
        $this->assertTrue($this->b->checkPhoneExists('1234567890','test'));
    }

    public function testUser_checkUserData()
    {
        $this->assertRegExp('/\d+/',$this->b->checkUserData('test@test.te', 'testtest','test'));
    }

    public function testUser_auth_checkLogged()
    {
        $id = $this->b->checkUserData('test@test.te', 'testtest','test');
        $this->b->auth($id,'testName','user');
        $this->assertEquals($_SESSION['user'],$id);
        $this->assertEquals($_SESSION['name'],'testName');
        $this->assertEquals($_SESSION['role'],'user');

        $this->assertRegExp('/\d+/',$this->b->checkLogged());
    }

    public function testUser_getUserById()
    {
        $id = $this->b->checkUserData('test@test.te', 'testtest','test');
        $arr = $this->b->getUserById($id,'test');
        $arr2 = ['id'=>$id,'name'=>'testName','email'=>'test@test.te','password'=>'testtest',
            'phone'=>'1234567890','role'=>'user'];
        $this->assertEquals($arr,$arr2);

    }
    public function testUser_edit()
    {
        $id = $this->b->checkUserData('test@test.te', 'testtest', 'test');
        $this->b->edit($id, 'testName1', 'testtest1', '12345678901', 'test1@test.te', 'test');
        $arr = $this->b->getUserById($id,'test');
        $arr2 = ['id'=>$id,'name'=>'testName1','email'=>'test1@test.te','password'=>'testtest1',
            'phone'=>'12345678901','role'=>'user'];
        $this->assertEquals($arr,$arr2);
    }

    public function testUser_deleteUserById()
    {
        $id = $this->b->checkUserData('test1@test.te', 'testtest1', 'test');
        $this->b->deleteUserById($id,'test');
        $id = $this->b->checkUserData('test1@test.te', 'testtest1', 'test');
        $this->assertEquals(0,$id);
    }

    protected function tearDown()
    {
        $this->b = NULL;
    }
}