<?php
/**
 * Created by PhpStorm.
 * User: ketan
 * Date: 4/27/2015
 * Time: 1:25 PM
 */

namespace Interactor;
use User;
use utility\ParseArray;

include_once("D:\\wamp\\www\\photo_gallery\\models\\Interactor\\db\\MySqlQueryEngine.php");
include_once("D:\\wamp\\www\\photo_gallery\\models\\entity\\User.php");
include_once("D:\\wamp\\www\\photo_gallery\\models\\Interactor\\DAO.php");
include_once("D:\\wamp\\www\\photo_gallery\\models\\utility\\ParseArray.php");

class UsersDAO extends DAO {
    /**
     * @param \Interactor\DBGetway $
     */
    public function __construct(DBGetway $db){
       $this->db=$db;
        $this->table_name="galleryusers";
    }

    public  function authenticate($user="", $pass="") {
        $username = filter_var($user,FILTER_SANITIZE_STRIPPED);
        $password =filter_var($pass);

        $result_object = $this->find_User($username, $password);
        return $result_object;
    }

    public   function find_User($username, $password)
    {
        $sql="select * from ".$this->table_name." where username='{$username}' AND password='{$password}' LIMIT 1";
             return  $this->db->find_user_query($sql);
    }

}
/*$user=new User();
$user->setUsername("hitesh");
$user->setPassword("h123");
$user->setFirstName("ok");
$user->setLastName("jain");
//when
$Userdao=new UsersDAO(new MySqlQueryEngine());
$Userdao->Insert($user);*/

?>