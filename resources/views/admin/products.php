<h2>Products</h2>

<br>

<h4>Subscriptions</h4>

<table class="table">
	<thead>
		<tr>
			<th>Subscription title</th>
			<th>Price / day (€)</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach($subscriptions as $subscription){ ?>
		<tr>
			<td><?= $subscription['title'] ?></td>
			<td><?= $subscription['charge_per_day'] ?></td>
			<?php } ?>
		</tr>
	</tbody>
</table>

<h4>Services</h4>

<table class="table">
	<thead>
		<tr>
			<th>Service title</th>
			<th>Price / hour (€)</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach($services as $service){ ?>
		<tr>
			<td><?= $service['title'] ?></td>
			<td><?= $service['charge_per_hour'] ?></td>
			<?php } ?>
		</tr>
	</tbody>
</table>

<h4>Goods</h4>

<table class="table">
	<thead>
		<tr>
			<th>Good title</th>
			<th>Unit price (€)</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach($goods as $good){ ?>
		<tr>
			<td><?= $good['title'] ?></td>
			<td><?= $good['charge_per_unit'] ?></td>
			<?php } ?>
		</tr>
	</tbody>
</table>