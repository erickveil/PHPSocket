<?php
/**
 * Date: 6/6/17
 *
 * A test of php socket client
 */

$msg = "Hello World";
$host = "127.0.0.1";
$port = 50502;
$socket = socket_create(AF_INET, SOCK_STREAM, 0);
assert($socket);
$connection_result = socket_connect($socket, $host, $port);
assert($connection_result);
socket_write($socket, $msg);
$response = socket_read($socket, 100000);
echo $response;
