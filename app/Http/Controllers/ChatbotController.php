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
                    // bot conversation cara mendaftar akun
                } else if ($message == "0") {
                    $this->showMainMenu($bot);
                }
            } else {
                $bot->reply('Harap masukkan angka pilihan diatas');
            }
        });

        // Add other conversation handlers here

        $botman->listen();
    }

    public function showMainMenu(BotMan $bot)
    {
        $bot->reply("Selamat datang di menu utama. Pilih opsi berikut:\n1. Pengiriman Produk\n2. Layanan Bengkel\n3. Cara Mendaftar Akun\n0. Kembali ke menu utama");
    }




    // Menampilkan menu utama
    // public function showMainMenu(BotMan $bot)
    // {
    //     $question = Question::create('Silakan pilih topik:')
    //         ->fallback('Maaf, pilihan tidak tersedia.')
    //         ->callbackId('select_option')
    //         ->addButtons([
    //             Button::create('Pengiriman Produk')->value('Pengiriman Produk'),
    //             Button::create('Layanan Bengkel')->value('Layanan Bengkel'),
    //             Button::create('Cara Mendaftar Akun')->value('Cara Mendaftar Akun')
    //         ]);

    //     $bot->ask($question, function (Answer $answer) use ($bot) {
    //         // Menangani jawaban dari pengguna
    //         $selectedOption = $answer->getText();

    //         if ($selectedOption === 'Pengiriman Produk') {
    //             $this->showPengirimanProdukMenu($bot);
    //         } elseif ($selectedOption === 'Layanan Bengkel') {
    //             $this->showLayananBengkelMenu($bot);
    //         } elseif ($selectedOption === 'Cara Mendaftar Akun') {
    //             $this->showCaraMendaftarAkun($bot);
    //         }
    //         // else {
    //         //     $this->showMainMenu($bot);
    //         // }
    //     });
    // }

    // public function handle()
    // {
    //     $botman = app('botman');

    //     // Mendengarkan input dari pengguna
    //     $botman->hears('Pengiriman Produk', function (BotMan $bot) {
    //         $this->showPengirimanProdukMenu($bot);
    //     });

    //     $botman->hears('Layanan Bengkel', function (BotMan $bot) {
    //         $this->showLayananBengkelMenu($bot);
    //     });

    //     $botman->hears('Cara Mendaftar Akun', function (BotMan $bot) {
    //         $this->showCaraMendaftarAkun($bot);
    //     });

    //     $botman->hears('Kembali ke Menu Utama', function (BotMan $bot) {
    //         $this->showMainMenu($bot);
    //     });

    //     $botman->fallback(function (BotMan $bot) {
    //         $bot->reply('Maaf, saya tidak mengerti perintah Anda. Silakan pilih dari menu yang tersedia.');
    //         $this->showMainMenu($bot);
    //     });

    //     // Memulai bot dengan menampilkan menu utama
    //     $this->showMainMenu($botman);
    //     $botman->listen();
    // }


    // // Menampilkan menu Pengiriman Produk
    public function showPengirimanProdukMenu(BotMan $bot)
    {
        $message = "Layanan Pengiriman Produk:\n" .
            "1. Informasi Pengiriman\n" .
            "2. Cara Mengubah Alamat Pengiriman\n" .
            "Ketik salah satu dari opsi di atas atau ketik 'Kembali ke Menu Utama' untuk kembali.";

        $bot->reply($message);

        $bot->ask('Ketik pilihan Anda:', function ($answer, $bot) {
            // $bot->say('Welcome ' . $answer->getText());
            $selectedOption = $answer->getText();

            if (strtolower($selectedOption) === 'informasi pengiriman') {
                $bot->say('Informasi mengenai pengiriman...');
            } elseif (strtolower($selectedOption) === 'cara mengubah alamat pengiriman') {
                $bot->say('Informasi mengenai cara mengubah alamat pengiriman...');
            } else {
                $bot->say('Pilihan tidak valid. Kembali ke Menu Utama.');
                $this->showMainMenu($bot);
            }
        });
    }

    // // Menampilkan menu Layanan Bengkel
    // public function showLayananBengkelMenu(BotMan $bot)
    // {
    //     $question = Question::create('Layanan Bengkel:')
    //         ->fallback('Maaf, pilihan tidak tersedia.')
    //         ->callbackId('select_option')
    //         ->addButtons([
    //             Button::create('Bengkel Umum')->value('Bengkel Umum'),
    //             Button::create('Bengkel Spesialis')->value('Bengkel Spesialis'),
    //             Button::create('Kembali ke Menu Utama')->value('Kembali ke Menu Utama')
    //         ]);

    //     $bot->ask($question, function (Answer $answer) use ($bot) {
    //         $selectedOption = $answer->getText();

    //         if ($selectedOption === 'Bengkel Umum') {
    //             $bot->reply('Daftar bengkel umum...');
    //         } elseif ($selectedOption === 'Bengkel Spesialis') {
    //             $bot->reply('Daftar bengkel spesialis...');
    //         } else {
    //             $this->showMainMenu($bot);
    //         }
    //     });
    // }

    // // Menampilkan informasi cara mendaftar akun
    // public function showCaraMendaftarAkun(BotMan $bot)
    // {
    //     $bot->reply('Informasi mengenai cara mendaftar akun...');
    //     $this->showMainMenu($bot);
    // }
}
