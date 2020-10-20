<?php

namespace App\Http\Controllers\Auth;

class JsonFormatter {
    protected static $response = [
        'message' => [
            'code'     => 200,
            'status'   => 'success',
            'msg'      => null,
        ],
        'data' => null,
    ];

    // Success
    public static function success($data, $msg)
    {
        self::$response['message']['status'] = 'success';
        self::$response['message']['msg']    = $msg;
        self::$response['data']              = $data;
        return response()->json(self::$response);
    }

    // Filed
    public static function filed($data, $msg)
    {
        self::$response['message']['code']   = 400;
        self::$response['message']['status'] = 'filed';
        self::$response['message']['msg']    = $msg;
        self::$response['data']              = $data;
        return response(self::$response);
    }
}
