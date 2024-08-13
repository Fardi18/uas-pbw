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
            "2. Informasi jasa kurir\n" .
            "Ketik salah satu dari opsi di atas atau ketik 'Kembali ke Menu Utama' untuk kembali.";

        $bot->reply($message);

        $bot->ask('Ketik pilihan Anda:', function ($answer, $bot) {
            // $bot->say('Welcome ' . $answer->getText());
            $selectedOption = $answer->getText();

            if (strtolower($selectedOption) === '1') {
                // $bot->say('Informasi mengenai pengiriman...');
                $bot->say("INFO PICKUP BARANG DITEMPAT🔫\n

1.⁠ ⁠*Keuntungan Ambil di Tempat*:
   - Konsumen dapat langsung mengambil barang yang sudah dipesan tanpa harus menunggu pengiriman.
   - Tidak ada biaya tambahan untuk pengiriman.
   - Konsumen dapat langsung memeriksa kondisi barang sebelum membawanya.
\n
2.⁠ ⁠*Persyaratan Ambil di Tempat*:
   - Konsumen harus membawa tanda terima atau nomor pesanan saat mengambil barang.
   - Konsumen harus datang pada waktu yang telah dijanjikan untuk pengambilan.
   - Lokasi pengambilan barang biasanya adalah toko, gudang, atau cabang penjual.
\n
3.⁠ ⁠*Waktu Pengambilan*:
   - Waktu pengambilan barang biasanya disesuaikan dengan jam operasional toko atau gudang.
   - Konsumen disarankan untuk menghubungi penjual terlebih dahulu untuk memastikan waktu dan lokasi pengambilan.
\n
4.⁠ ⁠*Pilihan Pembayaran*:
   - Konsumen dapat membayar barang saat mengambil di tempat.
   - Beberapa penjual juga menawarkan opsi pembayaran online sebelum pengambilan.
\n
5.⁠ ⁠*Jaminan dan Pengembalian*:
   - Barang yang diambil di tempat tetap memiliki jaminan dan kebijakan pengembalian sesuai dengan ketentuan penjual.
   - Konsumen dapat langsung mengajukan pengembalian atau perbaikan jika menemukan masalah dengan barang yang diterima.");
            } elseif (strtolower($selectedOption) === '2') {
                $bot->say("INFO JASA KURIR🔫
Berikut ini adalah beberapa informasi terkait pengiriman barang dengan menggunakan jasa kurir:
\n
1.⁠ ⁠*Keuntungan Pengiriman Kurir*:
   - Barang diantar langsung ke alamat tujuan, sehingga lebih praktis dan nyaman bagi konsumen.
   - Barang dapat dilacak status pengirimannya melalui website atau aplikasi kurir.
   - Umumnya memiliki waktu pengiriman yang lebih cepat dibandingkan dengan jasa pengiriman lainnya.
\n
2.⁠ ⁠*Biaya Pengiriman Kurir*:
   - Biaya pengiriman kurir bervariasi tergantung pada jarak, berat, dan ukuran barang.
   - Beberapa kurir menawarkan layanan pengiriman dengan tarif flat atau berlangganan.
   - Konsumen dapat membandingkan tarif beberapa jasa kurir untuk mendapatkan penawaran terbaik.
\n
3.⁠ ⁠*Waktu Pengiriman*:
   - Waktu pengiriman barang melalui kurir biasanya lebih cepat dibandingkan dengan jasa pengiriman lainnya.
   - Namun, waktu pengiriman juga dapat dipengaruhi oleh faktor jarak, lalu lintas, dan ketersediaan kurir.
   - Konsumen dapat meminta perkiraan waktu pengiriman saat melakukan pemesanan.
\n
4.⁠ ⁠*Pilihan Layanan Kurir*:
   - Konsumen dapat memilih jenis layanan kurir sesuai dengan kebutuhan, seperti pengiriman reguler, pengiriman cepat, atau pengiriman khusus (same-day delivery).
   - Beberapa kurir juga menawarkan layanan asuransi pengiriman untuk melindungi barang.
\n
5.⁠ ⁠*Pengambilan Barang oleh Kurir*:
   - Kurir akan datang ke alamat yang telah ditentukan untuk mengambil barang yang akan dikirim.
   - Konsumen dapat meminta kurir untuk menunggu sebentar saat barang sedang dikemas.
");
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
        $message = "INFO REGIS🔫

Berikut adalah informasi tentang cara melakukan registrasi:
\n
Untuk melakukan registrasi, Anda dapat mengikuti langkah-langkah berikut:
\n
1.⁠ ⁠*Kunjungi Halaman Registrasi*:
   Buka website atau aplikasi Bengkelin(https://danusanhmif.store), kemudian cari dan klik tautan atau tombol \"Daftar\" atau \"Registrasi\" untuk menuju ke halaman registrasi.
\n
2.⁠ ⁠*Isi Formulir Registrasi*:
   Lengkapi formulir registrasi dengan informasi yang diminta, seperti nama, email, nomor telepon, dan kata sandi. Pastikan Anda mengisi semua informasi dengan benar.
\n
3.⁠ ⁠*Verifikasi Identitas*:
   Beberapa layanan mungkin meminta Anda untuk melakukan verifikasi identitas, seperti mengirimkan foto KTP atau membuat akun media sosial terhubung.
\n
4.⁠ ⁠*Konfirmasi Registrasi*:
   Setelah Anda mengisi formulir dengan lengkap, klik tombol \"Daftar\" atau \"Buat Akun\". Anda mungkin akan menerima email konfirmasi atau kode verifikasi untuk menyelesaikan proses registrasi.
\n
5.⁠ ⁠*Aktivasi Akun*:
   Jika Anda menerima email konfirmasi atau kode verifikasi, ikuti instruksi yang diberikan untuk mengaktifkan akun Anda.
\n
Anda dapat mengakses halaman registrasi dengan mengklik tautan berikut:
\n
[Daftar Sekarang] " . $link;

        $bot->reply($message);
    }
}
