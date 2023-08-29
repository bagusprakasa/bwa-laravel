<?php

namespace App\Helpers;

class Helpers
{
    public static function rupiah($rupiah)
    {
        $hasil_rupiah = "Rp " . number_format($rupiah, 2, ',', '.');
        return $hasil_rupiah;
    }
}
