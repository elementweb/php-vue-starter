<h2>Users</h2>

<table class="table">
  <thead>
    <tr>
      <th>Firstname</th>
      <th>Lastname</th>
      <th>Email</th>
      <th>Phone number</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($users as $user){ ?>
    <tr>
    	<td><?= $user['first_name'] ?></td>
    	<td><?= $user['last_name'] ?></td>
    	<td><?= $user['email'] ?></td>
    	<td><?= $user['phone'] ?></td>
    <?php } ?>
  </tbody>
</table>