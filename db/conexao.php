<?php

$db = pg_connect("host=localhost port=5432 dbname=db_mercado user=postgres password=123") or die('Could not connect: ' . pg_last_error());

?>