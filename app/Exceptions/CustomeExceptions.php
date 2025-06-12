<?php

namespace App\Exceptions;

use Exception;

class CustomeExceptions extends Exception
{
    //
    public function __construct(string $message = "", int $code = 0, \Throwable $previous = null)
    {
        $this->message = $message;
        $this->code = $code;
    }
    public function render()
    {
        return response()->json([
            "message" => $this->message,
            "status" => $this->code
        ],$this->code);
    }
}
