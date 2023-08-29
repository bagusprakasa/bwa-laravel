<?php

namespace App\Helpers;

use Symfony\Component\HttpFoundation\Response;

class Helpers
{
    public static function rupiah($rupiah)
    {
        $hasil_rupiah = "Rp " . number_format($rupiah, 2, ',', '.');
        return $hasil_rupiah;
    }

    protected static $response = [
        'meta' => [
            'code' => Response::HTTP_OK,
            'status' => 'success',
            'message' => null
        ],
        'data' => null,
    ];

    public static function succesResponse($data = null, $message = null)
    {
        self::$response['meta']['message'] = $message;
        self::$response['data'] = $data;

        return response()->json(self::$response, self::$response['meta']['code']);
    }

    public static function errorResponse($data = null, $message = null, $code)
    {
        self::$response['meta']['message'] = $message;
        self::$response['meta']['code'] = $code;
        self::$response['meta']['status'] = 'error';
        self::$response['data'] = $data;

        return response()->json(self::$response, self::$response['meta']['code']);
    }
}
