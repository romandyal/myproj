<?php
require_once 'vendor/autoload.php';
require_once 'models/News.php';
require_once 'GetTableTest.php';


class NewsTest extends PHPUnit_Framework_TestCase
{
    
    private $a;
    private $b;

    protected function setUp(){
        
        $this->b = new News();
    }

    public function testCreateTestTables()
    {
        $result = GetTableTest::getTable();

        $this->assertEquals(1,$result);
    }

    public function testNews_addNews()
    {
        
        $this->b->addNews();
    }

    protected function tearDown(){
        $this->b = NULL;
    }
}