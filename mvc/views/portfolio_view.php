<h1>Портфолио</h1>
<p>
<table class="table">

<tr><td>ID</td><td>Пользовател</td><td>Описание</td></tr>
<?php

	foreach($data as $row)
	{
		echo '<tr><td>'.$row['ID'].'</td><td>'.$row['User'].'</td><td>'.$row['Description'].'</td></tr>';
	}

?>
</table>
</p>
