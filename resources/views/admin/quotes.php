<h2>Quotes</h2>

<table class="table">
  <thead>
    <tr>
      <th>Quote ID</th>
      <th>Total amount (€)</th>
      <th>User ID</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($quotes as $quote){ ?>
    <tr>
    	<td><?= $quote['hash'] ?></td>
    	<td><?= $quote['charge_total'] ?></td>
    	<td><?= $quote['user_id'] ?></td>
    <?php } ?>
  </tbody>
</table>