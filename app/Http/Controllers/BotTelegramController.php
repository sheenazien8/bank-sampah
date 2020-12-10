<?php

namespace App\Http\Controllers;

use App\Models\User;
use Telegram\Bot\Api;

class BotTelegramController extends Controller
{
    /**
     * @var string
     */
    private $path;

    public function __construct()
    {
        $token = config('telegram.token');
        $path = "https://api.telegram.org/bot{$token}";
        $this->path = $path;
    }

    public function handle()
    {
        $update = json_decode(file_get_contents("php://input"), TRUE);
        $chat_id = $update['message']['from']['id'];
        $message = $update['message']['text'];
        if (strpos($message, "/menu") === 0) {
            $this->send('sendMessage', $this->createButton($chat_id));
        }
        if (strpos($message, "/daftar") === 0) {
            $this->send('sendMessage', $this->askNomorRekening($chat_id));
            $this->send('sendMessage', [
                'chat_id' => $chat_id,
                'text' => "
Nomor Rekening:nomor_rekening
Pin:pin
                "
            ]);
        }
        if (strpos($message, "/start") === 0) {
            $this->send('sendMessage', $this->askNomorRekening($chat_id));
            $this->send('sendMessage', [
                'chat_id' => $chat_id,
                'text' => "
Nomor Rekening:nomor_rekening
Pin:pin
                "
            ]);
        }
        preg_match_all("/\D+/", $message, $key, PREG_SET_ORDER, 0);
        if (trim($key[0][0]) == "Nomor Rekening:" && trim($key[1][0]) == "Pin:") {
            preg_match_all("/\d+/", $message, $value, PREG_SET_ORDER, 0);
            $nomor_rekening = $value[0][0];
            $pin = $value[1][0];
            if ($pin == setting('pin_register_telegram')) {
                $user = User::where('nomor_rekening', trim($nomor_rekening))->first();
                $response = "Maaf Nomor Rekening tidak di temukan";
                if ($user) {
                    $user->update([
                        'telegram_account' => $chat_id
                    ]);
                    $response = "Selamat datang {$user->nasabahProfile->nama_lengkap}, anda sekarang sudah terdaftaran di Telegram Banking Banksampah Mawar";
                }
                $this->send('sendMessage', [
                    'chat_id' => $chat_id,
                    'text' => $response
                ]);
            } else {
                if (setting('pin_register_telegram')) {
                    $this->send('sendMessage', [
                        'chat_id' => $chat_id,
                        'text' => "Maaf pin yang anda masukkan salah"
                    ]);
                } else {
                    $this->send('sendMessage', [
                        'chat_id' => $chat_id,
                        'text' => "Pin Banksampah mawar belum diatur"
                    ]);
                }
            }
        }
        if (strpos($message, "Informasi Saldo") === 0) {
            $user = $this->checkUser($chat_id);
            $this->sendSaldoInformation($user, $chat_id);
        }
        if (strpos($message, "Informasi Arus Tabungan") === 0) {
            $user = $this->checkUser($chat_id);
            $this->sendArusTabungan($user, $chat_id);
        }
    }

    private function createButton($chat_id, $response = "Silahkan Pilih Menu Di Bawah.")
    {
        $keyboard = [
            'keyboard' => [
                [
                    ['text' => 'Informasi Saldo', 'callback_data' => '2']
                ],
                [
                    ['text' => 'Informasi Arus Tabungan', 'callback_data' => '3']
                ],
            ],
            'one_time_keyboard' => true,
            'resize_keyboard' => true,
        ];
        $encodedKeyboard = json_encode($keyboard);
        $parameters = [
            'chat_id' => $chat_id,
            'text' => $response,
            'reply_markup' => $encodedKeyboard,
            'remove_keyboard' => true,
        ];

        return $parameters;
    }

    private function send(string $method, $data, $text = '')
    {
        $url = $this->path . "/" . $method;
        if (!$curld = curl_init()) {
            exit;
        }
        curl_setopt($curld, CURLOPT_POST, true);
        curl_setopt($curld, CURLOPT_POSTFIELDS, $data);
        curl_setopt($curld, CURLOPT_URL, $url);
        curl_setopt($curld, CURLOPT_RETURNTRANSFER, true);
        $output = curl_exec($curld);
        curl_close($curld);

        return $output;
    }

    private function askNomorRekening($chat_id)
    {
        return [
            'chat_id' => $chat_id,
            'text' => "Masukkan Nomor Rekening dan Pin yang di Berikan Ketika Mendaftarkan Nasabah. Silahkan gunakan format sepert ini:",
        ];
    }

    private function checkUser($chat_id)
    {
        $checkExistUser = User::where('telegram_account', $chat_id)->first();
        $pesanNasabahTidakTerdaftar = "Maaf Anda Belum Terdaftar di Telegram Banking Banksampah Mawar";
        if (!$checkExistUser) {
            $this->send('sendMessage', [
                'chat_id' => $chat_id,
                'text' => $pesanNasabahTidakTerdaftar
            ]);
        }

        return $checkExistUser;
    }

    private function sendArusTabungan($user, $chat_id)
    {
        $price = price_format(0);
        $nama_lengkap = $user->nasabahProfile->nama_lengkap;
        $response = "Saudara {$nama_lengkap}: maaf dikarenakan tabungan anda masih sebesar {$price} and tidak bisa melihat aksi ini";
        if ($user->tabungan) {
            $price = price_format($user->tabungan->saldo_akhir);
            $riwayatTabungan = $user->tabungan->savingHistories;
            $response = "Saudara {$nama_lengkap}.\n\n";
            $response .= "------------------------------------------------\n";
            $response .= "Tanggal Transaksi|Type|Jumlah Uang\n";
            foreach ($riwayatTabungan as $riwayat) {
                $priceRow = price_format($riwayat->jumlah_uang);
                $response .= "------------------------------------------------\n";
                $response .= "{$riwayat->tanggal}|{$riwayat->type}|$priceRow\n";
            }
        }
        $this->send('sendMessage', [
            'chat_id' => $chat_id,
            'text' => $response
        ]);
    }

    private function sendSaldoInformation($user, $chat_id)
    {
        $price = price_format(0);
        $nama_lengkap = $user->nasabahProfile->nama_lengkap;
        $response = "Saudara {$nama_lengkap}: Total Saldo anda sekarang Sebesar {$price}";
        if ($user->tabungan) {
            $price = price_format($user->tabungan->saldo_akhir);
            $response = "Saudara {$nama_lengkap}: Total Saldo anda sekarang Sebesar {$price}";
        }
        $this->send('sendMessage', [
            'chat_id' => $chat_id,
            'text' => $response
        ]);
    }
}
