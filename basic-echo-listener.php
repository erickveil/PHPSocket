<?php
/**
 * Erick Veil
 * Date: 6/5/17
 *
 * Runs an echo server.
 * Outputs any bytes sent to it to stdout
 */

$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
assert ($socket);
socket_set_option($socket, SOL_SOCKET, SO_REUSEADDR, 1);
$bind_attempt = socket_bind($socket, "localhost", 50511);
assert ($bind_attempt);
$listen_attempt = socket_listen($socket, SOMAXCONN);
assert ($listen_attempt);

do {
    $connection = socket_accept($socket);
    usleep(100);
} while ($connection === false);

$buffer = "";
while (true) {
    @$byte = socket_read($connection, 100000, PHP_NORMAL_READ);
    if ($byte === false) { break; }
    $buffer .= $byte;
}

echo $buffer;
socket_write($connection,$buffer);

