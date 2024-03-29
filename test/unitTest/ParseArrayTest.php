<?php
use utility\ParseArray;

/**
 * Created by PhpStorm.
 * User: ketan
 * Date: 4/28/2015
 * Time: 10:45 AM
 */
include_once("D:\\wamp\\www\\photo_gallery\\models\\entity\\User.php");
include_once("D:\\wamp\\www\\photo_gallery\\models\\utility\\ParseArray.php");
include_once"D:\\wamp\\www\\photo_gallery\\models\\entity\\Photograph.php";

class ParseArrayTest extends PHPUnit_Framework_TestCase {

    public function testParsingofUserObject(){
        //given
        $user=new User();
        $user->setFirstName("hitesh");
        $user->setLastName("kie");
        $user->setPassword("jpeg");
        $user->setUsername("rock");
        //when
        $userObject= ParseArray::doParse($user);
        // print_r($userObject);
        //then
        $this->assertEquals("rock",$userObject['username']);
    }

    public function testParsingofPhotoGraph(){
        //given
        $user=new Photograph();
        $user->setFilename("hitesh");
        $user->setsize(12);
        $user->setType("jpeg");
        $user->setCaption("rock");
        //when
        $userObject= ParseArray::doParse($user);
       //  print_r($userObject);
        //then
        $this->assertEquals(12,$userObject['size']);
    }

}
