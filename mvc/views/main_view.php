<h1>Список задач </h1>


<?php
// messages
$str='';
$by_admin=($data[4]['0']==='admin');
if ($data[4]){
    foreach ($data[4] as $v)
        $str='<div class="alert-success" role="alert">';
    $str.='Вы вошли как: ';
    $str.=$v;
    $str.='  </div>';
}

echo $str;

if ($by_admin)
  echo'  <form method="post" name="adm_save">';
?>

<table class="table">

    <?php
        $state=['в ожидании', 'выполнено', 'отредактировано администратором'];
        $str='';
        $_selfLink='http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
            if ($a = explode('?', $_selfLink))
                $_selfLink = $a[0];
        $linkparams=(isset($_GET['page']))?"&page=".$_GET['page']:'';
        $pl_params= $data[1];
        $fields=['id'=>['ID'],
                'login'=>['Имя пользователя'],
                'email'=>['E-mail'],
                'txt'=>['Текст задачи'],
                'state'=>['Статус'],
                ];
		foreach ($fields as $f=>$v) {
            $str .= '<th class="header">';
            if ($pl_params['Orders'][$f]) {
                if (textLeft($pl_params['Order'], -1) == $f) {
                    $z = 1 + textRight($pl_params[Order], 1);
                    $str .= "<sup>$z</sup>";
                } else
                    $z = '';
                $str .= "<a href='$_selfLink?sort=$f$z$linkparams'>{$v[0]}	</a>";
            }
            else
                $str .= $v[0];

            }
             $str .=   '</th >';
		echo $str;
    foreach($data[0] as $row)
    {
        echo
            '<tr><td>'.$row['id'].'</td>
                <td>'.$row['login'].'</td>
                <td>'.$row['email'].'</td>
                <td>'.(($by_admin)?  '<textarea  name="txt-'.$row['id'].'">'.$row['txt'].'</textarea>' : $row['txt']).'
                </td>
                <td>'.(($by_admin)?  '<input type="checkbox"  name="state-'.$row['id'].'"'.
                (($row['state']==1)?'checked':'')
                .'><br><small>'.$state[$row['state']].'</small>' :$state[$row['state']]).'</td>
</tr>';
    }

    ?>
</table>

<?php
    if ($by_admin) {
        echo '       <div class="form-group row">   <div class="col-md-6 offset-md-4"><button type="submit" class="btn btn-success" name="save_adm">Сохранить</button></div></div>';
        echo '  </form>';
    }

    $str='';
    $linkparams=(isset($_GET['sort']))?"&sort=".$_GET['sort']:'';
    if (count($pl_params['Pages']) > 0){
            $str.='<nav aria-label="Страницы">
                 <ul class="pagination">
                 <li class="page-item disabled justify-content-center">
        <a class="page-link">Страница '.$pl_params['Page'].' из '.$pl_params['PagesCount'].'</a></li>';

        if (count($pl_params['Pages']) > 0)
            $str.='&nbsp;&nbsp;&nbsp;';
        foreach ($pl_params['Pages'] as $i=>$pn) {

            $str .= ' <li class="page-item"><a class="page-link" href="' . $_selfLink . '?page=' . $pn[1] . $linkparams . '" class="' ;
            $str .=(($pn[1] == $pl_params['Page']) ? 'pgactive' : 'pgbutton' ). '">';
            if ($pn[0] == '&lt;&lt;')
                $str .= 'Первая';
            elseif ($pn[0] == '&lt;')
                $str .= 'Назад';
            elseif ($pn[0] == '&gt;')
                $str .= 'Вперед';
            elseif ($pn[0] == '&gt;&gt;')
                $str .= 'Последняя';
            else
                $str .= $pn[0] . '</a></li>';
        }
        $str .='</ul></nav>';
        echo $str;
    }
?>
<div class="row ">
    <div class="col-md-5 offset-md-4">
        <h3>Добавить задачу</h3>
        <?php
        // errors
        $str='';
            if ($data[2]){
                foreach ($data[2] as $v)
                $str='<div class="alert alert-danger" role="alert">';
                $str.=$v;
                $str.='  </div>';
            }
            echo $str;
        ?>

        <?php
        // messages
        $str='';
        if ($data[3]){
            foreach ($data[3] as $v)
                $str='<div class="alert-success" role="alert">';
            $str.=$v;
            $str.='  </div>';
        }
        echo $str;
        ?>

    <form name="form_save" method="post">
        <div class="form-group">
            <label for="exampleFormControlInput0" >Имя пользователя</label>
            <input type="text" class="form-control" id="exampleFormControlInput0"
                   name="login"
                   placeholder="User Name" required>
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Email address</label>
            <input type="email" class="form-control" id="exampleFormControlInput1"
                   name="email"
                   placeholder="name@example.com" required>
        </div>

        <div class="form-group">
            <label for="exampleFormControlTextarea1">Текс задачи</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
            name="txt" required></textarea>
        </div>
        <button type="submit" class="btn btn-success" name="save">Добавить задачу</button>
    </form>
    </div>
</div>
