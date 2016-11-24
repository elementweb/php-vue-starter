<h2>Products</h2>

<h3>Subscriptions</h3>

<?php foreach($subscriptions as $subscription){ ?>
<p><?= $subscription['title'] ?> (€<?= $subscription['charge_per_day'] ?>)</p>
<?php } ?>

<h3>Services</h3>

<?php foreach($services as $service){ ?>
<p><?= $service['title'] ?> (€<?= $service['charge_per_hour'] ?>)</p>
<?php } ?>

<h3>Goods</h3>

<?php foreach($goods as $good){ ?>
<p><?= $good['title'] ?> (€<?= $good['charge_per_unit'] ?>)</p>
<?php } ?>