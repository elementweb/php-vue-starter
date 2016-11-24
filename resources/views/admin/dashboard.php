<h2>Dashboard</h2>

<br>

<h4>New quotes</h4>
<p>There are <?= $new_quotes ? $new_quotes : 'no' ?> new quotes</p>

<a href="admin-quotes" type="button" class="btn btn-success" data-dismiss="modal">Show quotes</a>

<br>
<br>

<h4>New users</h4>
<p>There are <?= $new_users ? $new_users : 'no' ?> new users</p>

<a href="admin-users" type="button" class="btn btn-success" data-dismiss="modal">Show users</a>
