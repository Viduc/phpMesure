<?php

$sock = socket_create(AF_INET, SOCK_DGRAM, SOL_UDP);
$message = ['type'=>'timer','application'=>'monappli','methode'=>'mamethode','debut'=>150,'fin'=>200];
$json = json_encode($message);
$len = strlen($json);

echo socket_sendto($sock, $json, $len, 0, '127.0.0.1', 1223);
socket_close($sock);

?>