<?php

use App\Models\Setting;
use App\Models\User;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

if (! function_exists('action')) {
    function action(array $action)
    {
    }
}

if (! function_exists('dash_to_space')) {
    function dash_to_space(string $string, bool $capital = false)
    {
        $name = str_replace('-', ' ', $string);
        $name = str_replace('_', ' ', $name);

        return $capital ? Str::upper($name) : $name;
    }
}
if (! function_exists('price_format')) {
    function price_format($price)
    {
        return 'Rp. '.number_format($price, 0, ',', '.');
    }
}
if (! function_exists('get_lang')) {
    function get_lang()
    {
        app()->setLocale(session()->get('lang'));
    }
}
if (! function_exists('media')) {
    function media(Media $media = null)
    {
        return url($media->getFullName ?? '');
    }
}
if (! function_exists('medias')) {
    function medias(Collection $media)
    {
        dd($media);
    }
}

if (! function_exists('checkValueArray')) {
    function array_must_same(array $array, array $key, $expectedValue): bool
    {
        for ($i = 0; $i < count($key); $i++) {
            if (isset($array[$key[$i]])) {
                $val = $array[$key[$i]];
                if ($val != $expectedValue) {
                    return false;
                }

            } else {
                return false;
            }
        }

        return true;
    }
}

if (! function_exists('percentage')) {
    function percentage(int $percentage): string
    {
        return $percentage . '%';
    }
}

if (! function_exists('get_month')) {
    function get_month($length = null, $withKey = false): array
    {
        $month = [];
        $i = 1;
        for($m=1; $m<=12; ++$m){
            $i;
            if ($length) {
                if ($withKey) {
                    $month[] = [
                        'month_name' => substr(date('F', mktime(0, 0, 0, $m, 1)), 0, $length),
                        'month_key' => $i++,
                        'value' => null
                    ];
                } else {
                    $month[] = substr(date('F', mktime(0, 0, 0, $m, 1)), 0, $length);
                }
            } else {
                if ($withKey) {
                    $month[] = [
                        'month_name' => date('F', mktime(0, 0, 0, $m, 1)),
                        'month_key' => $i++,
                    ];
                } else {
                    $month[] = date('F', mktime(0, 0, 0, $m, 1));
                }
            }
        }

        return $month;
    }
}

if (! function_exists('get_wrapper_month')) {
    function get_wrapper_month(): array
    {
        $wrapp = [];
        for ($i = 0; $i <12; $i++) {
            $wrapp[$i] = null;
        }

        return $wrapp;
    }
}

if (! function_exists('setting')) {
    function setting(string $key)
    {
        return optional(Setting::where('key', $key)->first())->value;
    }
}


if (! function_exists('penyebut')) {
    function penyebut($nilai) {
        $nilai = abs($nilai);
        $huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
        $temp = "";
        if ($nilai < 12) {
            $temp = " ". $huruf[$nilai];
        } else if ($nilai <20) {
            $temp = penyebut($nilai - 10). " belas";
        } else if ($nilai < 100) {
            $temp = penyebut($nilai/10)." puluh". penyebut($nilai % 10);
        } else if ($nilai < 200) {
            $temp = " seratus" . penyebut($nilai - 100);
        } else if ($nilai < 1000) {
            $temp = penyebut($nilai/100) . " ratus" . penyebut($nilai % 100);
        } else if ($nilai < 2000) {
            $temp = " seribu" . penyebut($nilai - 1000);
        } else if ($nilai < 1000000) {
            $temp = penyebut($nilai/1000) . " ribu" . penyebut($nilai % 1000);
        } else if ($nilai < 1000000000) {
            $temp = penyebut($nilai/1000000) . " juta" . penyebut($nilai % 1000000);
        } else if ($nilai < 1000000000000) {
            $temp = penyebut($nilai/1000000000) . " milyar" . penyebut(fmod($nilai,1000000000));
        } else if ($nilai < 1000000000000000) {
            $temp = penyebut($nilai/1000000000000) . " trilyun" . penyebut(fmod($nilai,1000000000000));
        }
        return $temp;
    }
}
if (! function_exists('terbilang')) {
    function terbilang($nilai) {
        if($nilai<0) {
            $hasil = "minus ". trim(penyebut($nilai));
        } else {
            $hasil = trim(penyebut($nilai));
        }
        return $hasil;
    }
}
if (! function_exists('getActiveClass')) {
    function getActiveClass($activefor) {
        foreach ($activefor as $value) {
            if ($value == Route::current()->action['as']) {
                return 'active';
            }
        }
        return '';
    }
}

