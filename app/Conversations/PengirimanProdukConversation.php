<?php

namespace App\Conversations;

use App\Models\Bengkel;
use BotMan\BotMan\Messages\Conversations\Conversation;
use BotMan\BotMan\Messages\Incoming\Answer;

class PengirimProdukConversation extends Conversation
{
    public function run()
    {
        $this->askCategory();
    }

    protected function askCategory()
    {
        $this->ask('1. Layanan Pengiriman Produk, 2. Cara mengubah alamat pengiriman', function (Answer $answer) {
            $category = $answer->getText();

            if ($category == '1') {
                $this->showLayanan();
            } else if ($category == '2') {
                $this->showBengkels('Spesialis');
            } else {
                $this->say('Pilihan tidak valid, silakan coba lagi.');
                $this->askCategory();
            }
        });
    }

    protected function showLayanan()
    {
        $this->say("Ambil ditempat dan dikirim dengan kurir");
        // $bengkels = Bengkel::where('type', $type)->get();

        // if ($bengkels->isEmpty()) {
        //     $this->say("Tidak ada bengkel dengan kategori $type.");
        // } else {
        //     $bengkels->each(function ($bengkel) {
        //         $this->say("Nama: {$bengkel->name}, Lokasi: {$bengkel->location}");
        //     });
        // }
    }
}
