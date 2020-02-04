<style type="text/css">
    .login-form
    {
        padding-top: 1.5rem;
        padding-bottom: 1.5rem;
    }

    .login-form .row
    {
        margin-left: 0;
        margin-right: 0;
    }
</style>
<main class="login-form">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Вход</div>
                    <div class="card-body">
                        <?php
                        // errors
                        $str='';
                        if ($data[1]){
                            foreach ($data[1] as $v)
                                $str='<div class="alert alert-danger" role="alert">';
                            $str.=$v;
                            $str.='  </div>';
                        }
                        echo $str;
                        ?>
                        <form action="/login" method="post">
                            <div class="form-group row">
                                <label for="login_id" class="col-md-4 col-form-label text-md-right">Имя пользователя</label>
                                <div class="col-md-6">
                                    <input type="text" id="login_id" class="form-control" name="login" required autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Пароль</label>
                                <div class="col-md-6">
                                    <input type="password" id="password" class="form-control" name="password" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-success" name="signin">Войти</button>
                                </div>
                            </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
</main>
