<?php

$DB_SERVER = getenv("MVC_SERVER") ?: "192.168.139.1";
$DB_DATABASE = getenv("MVC_DB") ?: "2o-nco";
$DB_USER = getenv("MVC_USER") ?: "2o-nco-1";
$DB_PASSWORD = getenv("MVC_TOKEN") ?: "eGYnySiQ";
$DEBUG = getenv("MVC_DEBUG") ?: true;

return array(
    "DB_USER" => $DB_USER,
    "DB_PASSWORD" => $DB_PASSWORD,
    "DB_DSN" => "mysql:host=$DB_SERVER;dbname=$DB_DATABASE;charset=utf8",
    "DEBUG" => $DEBUG
);

