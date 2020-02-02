<h1>Список задач </h1>

<table class="table">


    <?php
        $str='';
        $_selfLink='http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
            if ($a = explode('?', $_selfLink))
                $_selfLink = $a[0];
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
                $str .= "<a href='$_selfLink?sort=$f$z'>{$v[0]}	</a>";
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
                <td>'.$row['txt'].'</td>
                <td>'.$row['state'].'</td>
</tr>';
    }

    ?>
</table>

<div class="row ">
    <div class="col-md-5 offset-md-4">
        <h3>Добавить задачу</h3>
        <?php
        // errors
            if ($data[2]){
                $str='';
                foreach ($data[2] as $v)
                $str='<div class="alert alert-danger" role="alert">';
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
                   placeholder="User Name">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Email address</label>
            <input type="email" class="form-control" id="exampleFormControlInput1"
                   name="email"
                   placeholder="name@example.com">
        </div>

        <div class="form-group">
            <label for="exampleFormControlTextarea1">Текс задачи</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
            name="txt"
            ></textarea>
        </div>
        <button type="submit" class="btn btn-success" name="save">Добавить задачу</button>
    </form>
    </div>
</div>
