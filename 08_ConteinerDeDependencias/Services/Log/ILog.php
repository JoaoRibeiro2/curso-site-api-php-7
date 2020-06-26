<?php

namespace Services\Log;

interface ILog
{
    public function writeLog(string $message): void;
}
