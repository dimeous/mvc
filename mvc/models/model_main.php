<?php

class Model_Main extends Model
{

	public function get_data()
	{
        session_start();

	    $err=[];
	    // новая запись пользователем
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
                if ($db->save('tasks',$_IN,'login, email, txt','id')){
                    $msg[]='Сохранено';
                }
            }
        }

        // сохранение админом таблицы
        if (isset($_POST['save_adm'])) {
            if ($_SESSION['_uid']==='admin') {
                global $db;
                $_IN = fromGPC($_POST);
                foreach ($_IN as $k=>$v){
                   $a=explode('-',$k);
                   if ($a[0]=='txt'){
                       $txt = $db->fetch1($db->select('tasks','txt','id=?d',array($a[1])));
                       if ($a[0]!=$txt){
                           $db->update('tasks',array('state'=>2,'txt'=>$v),'','id=?d',array($a[1]));
                       }
                   }
                }
                foreach ($_IN as $k=>$v){
                   $a=explode('-',$k);
                   if ($a[0]=='state'){
                       if ($_IN['$k']!=1)
                           $db->update('tasks',array('state'=>1),'','id=?d',array($a[1]));
                       else {
                           $state = $db->fetch1($db->select('tasks', 'state', 'id=?d', array($a[1])));
                           if ($state!=2)
                               $db->update('tasks',array('state'=>0),'','id=?d',array($a[1]));
                       }
                   }
                }
                $msg[] = 'Сохранено';
            }
            else
                // если не админ переходим на логин
                header("Location: /login");
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
        $list[3]=$msg;

        // проверяем под админом или нет
        if ($_SESSION['_uid']==='admin')
                $list[4]=['admin'];


        return $list;
	}

}
