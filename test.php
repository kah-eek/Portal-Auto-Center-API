<?php
	require("pagarme-php/Pagarme.php");

	Pagarme::setApiKey("ak_test_pH1ii84ODQvIediiZ8nrNq2arSIP5Q");

	$transaction = PagarMe_Transaction::findById("3676913");

	echo $transaction;

	// $transaction->capture(1000);
?>