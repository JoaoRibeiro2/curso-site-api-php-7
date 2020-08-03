<?php

$data = json_decode(file_get_contents("php://input"));

$message = trim($data->message);

echo "Message: {$message}";
