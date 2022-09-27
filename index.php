#!/usr/bin/env php
<?php

if (PHP_SAPI !== 'cli') {
    exit;
}
if (!isset($argv[1])) {
    print 'Please select a file' . PHP_EOL;
    exit();
}
$path = __DIR__ . '/' . $argv[1];

if (!file_exists($path)) {
    print 'File does not exist'.PHP_EOL;
    exit();
}
require __DIR__ . '/vendor/autoload.php';

unset($argv[0]);

$open = fopen($path, 'r');
$rows = [];
while (($data = fgetcsv($open, 1000, ",")) !== false) {
    $rows[] = $data;
}

$result = (new Kaisar\WalletTransfer\Transactions\TransactionList($rows))->make();
print implode(PHP_EOL, $result);
echo PHP_EOL;
