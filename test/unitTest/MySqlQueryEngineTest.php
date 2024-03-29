<?php
/**
 * Created by PhpStorm.
 * User: ketan
 * Date: 5/19/2015
 * Time: 9:05 AM
 */
use Interactor\MySqlQueryEngine;
use utility\ParseArray;

include_once("../../models/entity/User.php");
include_once("../../models/utility/ParseArray.php");
include_once "../../models/Interactor/db/MySqlQueryEngine.php";
class MySqlQueryEngineTest extends PHPUnit_Framework_TestCase {
    private $mysqlEngine;
    private $user;
    private $userlist;

    /*
     * @before
     * */
    public function setup(){
        $this->mysqlEngine=new MySqlQueryEngine();
        $this->user=new User();
        $this->user->setFirstName("ankit");
        $this->user->setLastName("kie");
        $this->user->setPassword("jpeg");
        $this->user->setUsername("rock");
        //when
        $userObject= ParseArray::doParse($this->user);
        $this->mysqlEngine->create($userObject,"galleryusers");

    }
    public function testFindByID(){

        //when
        $this->userlist=$this->mysqlEngine->find_by_id(1,"galleryusers");
        //then
        $this->assertEquals("rock",$this->userlist[0]->username);

    }
    /*
     *
     * @after*/
    public function tearDown(){
        //assert
        $this->mysqlEngine->deleteall("galleryusers");
        $this->user=new User();
        //defult user
        $this->user->setFirstName("ketan");
        $this->user->setLastName("jain");
        $this->user->setPassword("k123");
        $this->user->setUsername("rock");
        $userObject= ParseArray::doParse($this->user);
        $this->mysqlEngine->create($userObject,"galleryusers");
    }
}
