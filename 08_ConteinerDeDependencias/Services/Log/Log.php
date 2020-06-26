<?php

namespace Services\Log;

use DateTimeZone;

class Log implements ILog
{
    public function writeLog(string $message): void
    {
        $datetime = (new \DateTime('now', new DateTimeZone(DateTimeZone::UTC)))->format('Y-m-d H:i:s.u');

        $directory = __DIR__ . '/../../Log/log.log';

        $logMessage = "[INFO][{$datetime} UTC] {$message}\n";

        file_put_contents($directory, $logMessage, FILE_APPEND);
    }
}
