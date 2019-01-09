<nav class="navbar navbar-light" style="background-color: #BC8F8F;">
<div class="dropdown">
  <a class="btn btn-secondary dropdown-toggle" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="background-color: #DDBEC3;"><b>Меню</b></a>

  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink" style="background-color: #DDBEC3;">
    <a class="dropdown-item" href="index.php?id=1">Мониторы</a>
    <a class="dropdown-item" href="index.php?id=2">Компьютеры</a>
    <a class="dropdown-item" href="index.php?id=3">Ноутбуки</a>
    <a class="dropdown-item" href="index.php?id=4">Принтеры</a>
    <a class="dropdown-item" href="index.php?id=5">Столы</a>
    <a class="dropdown-item" href="index.php?id=6">Стулья</a>
    <a class="dropdown-item" href="index.php?id=7">Шкафы</a>
    <a class="dropdown-item" href="index.php?id=8">Кресла</a>
    <a class="dropdown-item" href="index.php?id=9">Диваны</a>
    <a class="dropdown-item" href="index.php">На Главную</a>
  </div>
</div>
		<span class="navbar-text">
		    	<?php 
				$user = new Users();
				$user->userName();
				?>
		</span>
</nav>


