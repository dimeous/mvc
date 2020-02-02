<?php

class Model_Main extends Model
{

	public function get_data()
	{
	    $err=[];
        if (isset($_POST['save'])) {
            $_IN = fromGPC($_POST);

            if (!validMail($_IN['email2']))
                $err[]='wrong email';
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
