<?php
/**
 * Date: 6/6/17
 *
 * A test of php socket client
 */

$msg = "<?xml version=\"1.0\"?>
<Send>
    <Request>
        <ID>1</ID>
        <OriginTime>2012-01-30T09:00:00-0800</OriginTime>
    </Request>
    <Alert>
        <Agency ID=\"1\">
            <Station ID=\"rsv1\">
                <Type>WSA</Type>
            </Station>
        </Agency>
    </Alert>
</Send>
";
$host = "192.168.60.149";
$port = 50502;
$socket = socket_create(AF_INET, SOCK_STREAM, 0);
assert($socket);
$connection_result = socket_connect($socket, $host, $port);
assert($connection_result);
socket_write($socket, $msg);
$response = socket_read($socket, 100000);
echo $response;
