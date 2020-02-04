<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<title>MVC sample</title>
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	</head>
	<body>
		<div id="wrapper">
			<div id="header">
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
					<ul class="navbar-nav mr-auto">
						<li class="nav-item active"><a href="/"  class="nav-link">Главная</a></li>
						<li  class="nav-item"><a href="/login"  class="nav-link">Вход</a></li>
						<li  class="nav-item"><a href="/login/out"  class="nav-link">Выход</a></li>
					</ul>

                </nav>
			</div>
			<div id="page">

				<div id="content">
					<div class="box">
						<?php include 'mvc/views/'.$content_view; ?>

					</div>

				</div>

			</div>

		</div>
		<div id="footer" class="col-5 offset-md-4">
			All rights reserved 2020
		</div>
	</body>
</html>
