<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class MigrasiDataSeeder extends Seeder
{
    public function run(): void
    {
        $filePath = database_path('backup_data_tinythink.php');

        if (!File::exists($filePath)) {
            $this->command->error('File backup tidak ditemukan!');
            return;
        }

        $data = include $filePath;

        // KODE BARU: Matikan pengecekan foreign key sementara
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        // Kosongkan tabel MySQL
        DB::table('surat_pendek_ayats')->truncate();
        DB::table('surat_pendeks')->truncate();

        // KODE BARU: Nyalakan kembali pengecekan setelah dikosongkan
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // Masukkan data surat
        foreach ($data['surat_pendeks'] as $surat) {
            DB::table('surat_pendeks')->insert($surat);
        }

        // Masukkan data ayat
        foreach ($data['surat_pendek_ayats'] as $ayat) {
            DB::table('surat_pendek_ayats')->insert($ayat);
        }

        $this->command->info('Selamat! Semua data berhasil bermigrasi ke MySQL!');
    }
}