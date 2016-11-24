<h2>Quotes</h2>

<?php foreach($quotes as $quote){ ?>
<p>(#<?= $quote['hash'] ?>) Total charge: €<?= $quote['charge_total'] ?></p>
<?php } ?>