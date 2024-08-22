<?php

namespace App\Http\Controllers;

use App\Conversations\LayananBengkelConversation;
use App\Conversations\PengirimProdukConversation;
use BotMan\BotMan\BotMan;
use BotMan\BotMan\Messages\Conversations\Conversation;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Outgoing\Question;
use Illuminate\Http\Request;

class ChatbotController extends Controller
{


    public function handle()
    {
        $botman = app('botman');

        $botman->hears('{message}', function (BotMan $bot, $message) {
            if ($message == "1" || $message == "2" || $message == "3" || $message == "0") {
                if ($message == "1") {
                    // bot->conversation pengiriman produk
                    $this->showPengirimanProdukMenu($bot);
                } else if ($message == "2") {
                    // bot -> conversation 
                    $bot->startConversation(new LayananBengkelConversation());
                } else if ($message == "3") {
                    $this->inforRegister($bot);
                } else if ($message == "0") {
                    $this->showMainMenu($bot);
                }
            } else {
                $bot->reply('Harap masukkan angka pilihan diatas atau ketik 0 untuk kembali');
            }
        });

        // Add other conversation handlers here

        $botman->listen();
    }

    public function showMainMenu(BotMan $bot)
    {
        $bot->reply("Selamat datang di menu utama. Pilih opsi berikut:\n1. Pengiriman Produk\n2. Layanan Bengkel\n3. Cara Mendaftar Akun\n0. Kembali ke menu utama");
    }


    // // Menampilkan menu Pengiriman Produk
    public function showPengirimanProdukMenu(BotMan $bot)
    {
        $message = "Layanan Pengiriman Produk:\n" .
            "1. Informasi pickup\n" .
            "2. Informasi jasa kurir\n";

        $bot->reply($message);

        $bot->ask('Ketik pilihan Anda:', function ($answer, $bot) {
            // $bot->say('Welcome ' . $answer->getText());
            $selectedOption = $answer->getText();

            if (strtolower($selectedOption) === '1') {
                // $bot->say('Informasi mengenai pengiriman...');
                $bot->say(
                    "❗️(INFO PICKUP BARANG DITEMPAT)❗️<br><br>" .
                        "1. Konsumen dapat langsung mengambil barang tanpa menunggu pengiriman.<br>" .
                        "2. Tidak ada biaya tambahan untuk pengiriman.<br>" .
                        "3. Konsumen dapat memeriksa kondisi barang sebelum membawanya.<br><br>" .
                        "🛑Persyaratan Ambil di Tempat<br>" .
                        "1. Bawa tanda terima atau nomor pesanan saat mengambil barang.<br>" .
                        "2. Datang pada waktu yang dijanjikan untuk pengambilan.<br>" .
                        "3. Lokasi pengambilan di toko, gudang, atau cabang penjual.<br><br>" .
                        "🛑Waktu Pengambilan<br>" .
                        "1. Disesuaikan dengan jam operasional toko/gudang.<br>" .
                        "2. Hubungi penjual untuk memastikan waktu dan kondisi.<br>"
                );
            } elseif (strtolower($selectedOption) === '2') {
                $bot->say(
                    "❗️(INFO PENGIRIMAN JASA KURIR)❗️<br><br>" .
                        "1. Barang diantar langsung ke alamat.<br>" .
                        "2. Lacak status pengiriman.<br>" .
                        "3. Waktu pengiriman cepat.<br><br>" .
                        "🛑Biaya Pengiriman Kurir<br>" .
                        "1. Bervariasi tergantung jarak, berat, dan ukuran.<br>" .
                        "2. Tarif flat atau berlangganan.<br>" .
                        "3. Bandingkan beberapa jasa kurir.<br><br>" .
                        "🛑Pilihan Layanan Kurir<br>" .
                        "1. Sesuai kebutuhan, seperti reguler, cepat, atau same-day delivery.<br>" .
                        "2. Layanan asuransi pengiriman."
                );
            } else {
                $bot->say('Pilihan tidak valid. Kembali ke Menu Utama.');
                $this->showMainMenu($bot);
            }
        });
    }

    public function inforRegister(BotMan $bot)
    {
        $url = url("/userregister/");
        $link = '<a href="' . $url . '" target="_blank">Klik ini untuk Register</a>';
        $message = "❗️ (INFO REGISTRASI AKUN)❗️<br><br>" .
            "1.⁠ ⁠Kunjungi " . $link . "<br>" .
            "2.⁠ ⁠Isi formulir registrasi dengan informasi yang diminta.<br>" .
            "3.⁠ ⁠Lakukan verifikasi identitas jika diperlukan.<br>" .
            "4.⁠ ⁠Konfirmasi registrasi dengan mengklik \"Daftar\" atau \"Buat Akun\"";

        $bot->reply($message);
    }
}
