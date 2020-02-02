<?php

class Model_Main extends Model
{

	public function get_data()
	{
	    $err=[];
        if (isset($_POST['save'])) {
            $_IN = fromGPC($_POST);

            if (!validMail($_IN['email']))
                $err[]='не верный email';
            if (sEmpty($_IN['login']))
                $err[]='не указано имя пользователя';
            if (sEmpty($_IN['txt']))
                $err[]='укажите текст задачи';
            if (!$err){
                global $db;
                $db->save('tasks',$_IN,'login, email, txt','id');
            }
        }
		// Здесь мы просто сэмулируем реальные данные.
        $id_field='id';
        $table='tasks';
        $list = opPageGet(_GETN('page'), 3, "$table",
            "*",
            "",
            array(),
            array(
                'login' => array('login desc', 'login'),
                'email' => array('email desc', 'email'),
                'state' => array('state desc', 'state')
            ),
            _GET('sort'), $id_field
        );
        $list[2]=$err;
        return $list;
	}

}
