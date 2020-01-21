#!/usr/bin/env php
<?php
require __DIR__ . '/vendor/autoload.php';

use Game\Console\Initialiser;

$init = Initialiser::create();
$init->boot();
