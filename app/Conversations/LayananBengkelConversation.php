<?php

namespace App\Conversations;

use App\Models\Bengkel;
use App\Models\Kecamatan;
use BotMan\BotMan\Messages\Conversations\Conversation;
use BotMan\BotMan\Messages\Incoming\Answer;
use App\Models\Kelurahan;

class LayananBengkelConversation extends Conversation
{
    public function run()
    {
        $this->askCategory();
    }

    // protected function askCategory()
    // {
    //     $this->ask('Silakan pilih cari bengkel berdasarkan kecamatan', function (Answer $answer) {
    //         $kemacatan = $answer->getText();

    //         // if ($category == '1') {
    //         //     $this->showBengkels('Umum');
    //         // } else if ($category == '2') {
    //         //     $this->showBengkels('Spesialis');
    //         // } else {
    //         //     $this->say('Pilihan tidak valid, silakan coba lagi.');
    //         //     $this->askCategory();
    //         // }
    //     });
    // }

    // protected function showKecamatan($text){

    // }





    protected function askCategory()
    {
        // $this->listKecamatan();
        $this->ask('Silakan ketik nama kecamatan anda di kota Tangerang Selatan', function (Answer $answer) {
            $kecamatan = $answer->getText();
            $this->showKecamatan($kecamatan);
            // $this->listKecamatan();
        });
    }

    protected function listKecamatan()
    {
        // Ambil semua kecamatan dari database
        $kecamatanList = kecamatan::all();
        dd($kecamatanList);

        if ($kecamatanList->isNotEmpty()) {
            $this->say("Daftar Kecamatan yang tersedia:");

            // Loop melalui setiap kecamatan dan tampilkan namanya
            foreach ($kecamatanList as $kecamatan) {
                $this->say("- " . $kecamatan->name);
            }

            // Minta pengguna untuk memilih salah satu kecamatan
            $this->ask('Silakan ketik nama kecamatan untuk melihat detail lebih lanjut atau ketik "Kembali ke Menu Utama" untuk kembali.', function (Answer $answer) {
                $kecamatanName = $answer->getText();

                if (strtolower($kecamatanName) == 'kembali ke menu utama') {
                    // Kembali ke menu utama atau pilihan lain
                    $this->askCategory();
                } else {
                    $this->showKecamatan($kecamatanName);
                }
            });
        } else {
            $this->say("Tidak ada kecamatan yang ditemukan.");
        }
    }


    protected function showKecamatan($text)
    {
        // Contoh pencarian kecamatan berdasarkan nama
        $kecamatan = kecamatan::where('name', 'like', '%' . $text . '%')->first();

        if ($kecamatan) {
            // $this->say("ID Kecamatan: " . $kecamatan->id . " - Nama: " . $kecamatan->name);
            $this->say(" - Nama Kecamatan Anda: " . $kecamatan->name);
            $this->showKelurahan($kecamatan->id);
            // Lanjutkan ke proses selanjutnya jika diperlukan
        } else {
            $this->say("Kecamatan tidak ditemukan, silakan coba lagi.");
            $this->askCategory();
        }
    }


    protected function showKelurahan($kecamatanId)
    {
        // Ambil kelurahan berdasarkan kecamatan_id
        $kelurahanList = Kelurahan::where('kecamatan_id', $kecamatanId)->get();

        if ($kelurahanList->isNotEmpty()) {
            $this->say("Kelurahan yang terdapat di kecamatan ini:");
            foreach ($kelurahanList as $kelurahan) {
                $this->say("- " . $kelurahan->name);
            }
            $this->ask('Masukkan nama kelurahan, untuk menampilkan data bengkel', function (Answer $answer) {
                $lurah = $answer->getText();
                $kelurahan = Kelurahan::where('name', 'like', '%' . $lurah . '%')->first();
                $this->showBengkel($kelurahan->id);
            });
        } else {
            $this->say("Tidak ada kelurahan yang ditemukan di kecamatan ini.");
        }
    }

    protected function showBengkel($kelurahanId)
    {
        // Ambil bengkel berdasarkan kelurahan_id
        $bengkelList = Bengkel::where('kelurahan_id', $kelurahanId)->get();

        if ($bengkelList->isNotEmpty()) {
            $this->say("Bengkel yang terdapat di kelurahan ini:");

            foreach ($bengkelList as $bengkel) {
                // Buat URL menuju halaman detail bengkel
                // $url = "http://127.0.0.1:8001/detailbengkelpage/" . $bengkel->id;
                $url = url('/detailbengkelpage/' . $bengkel->id);
                $link = '<a href="' . $url . '" target="_blank">Kunjungi Situs</a>';
                $this->say("Nama Bengkel : " . $bengkel->name . "<br>Alamat Bengkel : " . $bengkel->alamat . "<br>" . $link . "<br> Untuk ke menu awal ketik 0");
            }
        } else {
            $this->say("Tidak ada bengkel yang ditemukan di kelurahan ini. kemudian ketik 0 untuk kembali");
        }
    }
}
