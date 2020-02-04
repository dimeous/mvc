<?php

class Model_Login extends Model
{

	public function get_data()
	{
        if (isset($_POST['signin'])) {
            $_IN = fromGPC($_POST);
            if (sEmpty($_IN['login']))
                $err[] = 'укажите имя пользователя';
            elseif (sEmpty($_IN['password']))
                $err[] = 'укажите пароль';
            elseif (($_IN['login'] != 'adnmin') and ($_IN['password'] != '123'))
                $err[] = 'не верное имя пользователя/пароль';
            if (!$err) {
                global $db;
                session_destroy();
                session_start();
                $_SESSION['_uid'] = 'admin';

                $_SESSION['_lsess'] = md5(uniqid(1, true));
                setcookie('sess', $_SESSION['_lsess'], time() +  3600, '/');
                global $db;
                $db->update('Users', array('uSess' => $_SESSION['_lsess']),'', 'uID=?d', array(1));
                header("Location: /");
            }
        }
        return array(0=>0,1=>$err);
	}

}
