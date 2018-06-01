<p>Главная страница</p>
<?php foreach ($articles as $key => $val): ?>
    <h3><?php echo $val['title'] ?></h3>
    <p><?php echo $val['descriptions'] ?></p>
<?php endforeach; ?>
