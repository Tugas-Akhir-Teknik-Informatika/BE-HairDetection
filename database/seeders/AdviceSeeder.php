<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;   // ← tambahkan
use Illuminate\Support\Str;

class AdviceSeeder extends Seeder
{
    public function run(): void
    {
        $advices = [
            [
                'prediction'  => 'Normal',
                'result'      => 'Rambut Tampak Sehat',
                'description' => 'Hebat! Rambutmu tampak mengilap, lembut, dan mudah diatur. Tidak ada masalah signifikan pada kulit kepala seperti gatal, bercak, atau kerontokan.',
                'advice'      => [
                    'Pilih sampo dan kondisioner yang cocok dengan jenis rambutmu.',
                    'Hindari alat styling panas berlebihan.',
                    'Sisir rambut dengan lembut, terutama saat rambut masih basah.',
                    'Rawat rambut seminggu sekali dengan masker, serum, atau minyak alami.',
                    'Konsumsi makanan bergizi.',
                ],
                'route'       => '/home/normal_hair',
            ],
            [
                'prediction' => 'Folliculitis',
                'result' => 'Ditemukan Gejala Kerusakan Rambut',
                'description' => 'Rambutmu menunjukkan gejala kerusakan akibat Folliculitis. Folliculitis adalah infeksi atau peradangan pada folikel rambut yang dapat menimbulkan benjolan merah, nanah, rasa gatal, atau nyeri. Jika tidak ditangani, kondisi ini bisa memperparah kerusakan rambut.',
                'advice' => [
                    'Jaga kebersihan kulit kepala.',
                    'Kompres hangat.',
                    'Hindari menggaruk area terinfeksi.',
                    'Hindari mencukur area tersebut.',
                    'Gunakan produk rambut yang tidak menyumbat pori.',
                    'Oleskan salep antibiotik.',
                    'Jika parah, konsultasi dokter.',
                ],
                'route' => '/home/folliculitis',
            ],
            [

                'prediction' => 'Lichen Planopilaris',
                'result' => 'Ditemukan Gejala Kerusakan Rambut',
                'description' => 'Rambutmu menunjukkan gejala kerusakan yang mengarah pada kondisi Lichen Planopilaris (LPP). LPP adalah penyakit autoimun yang menyebabkan peradangan pada folikel rambut, mengakibatkan kerontokan permanen akibat terbentuknya jaringan parut, disertai rasa gatal atau terbakar.',
                'advice' => [
                    'Konsumsi obat anti-inflamasi atau obat anti radang.',
                    'Terapi adisional.',
                ],
                'route' => '/home/lichen',

            ],
            [

                'prediction' => 'Psoriasis',
                'result' => 'Ditemukan Gejala Kerusakan Rambut',
                'description' => 'Rambutmu menunjukkan gejala kerusakan yang disebabkan oleh Psoriasis. Psoriasis adalah kondisi autoimun yang mempercepat regenerasi sel kulit, menyebabkan penumpukan di permukaan kulit kepala. Gejalanya meliputi bercak merah, sisik tebal, rasa gatal, dan dapat menyebabkan kerontokan rambut sementara.',
                'advice' => [
                    'Jaga kebersihan kulit kepala.',
                    'Hindari menggaruk area terinfeksi.',
                    'Gunakan pelembab.',
                    'Mandi dengan air hangat.',
                    'Gunakan obat topikal (oles) atau obat sistemik (suntikan) dari dokter.',
                    'Fototerapi (terapi cahaya).',
                ],
                'route' => '/home/psoriasis',

            ],
            [
                'prediction' => 'Rusak',
                'result' => 'Ditemukan Gejala Kerusakan Rambut',
                'description' => 'Gawat! Rambutmu tampak rusak. Ini bisa terjadi karena terlalu sering styling, penggunaan bahan kimia, atau cara menyisir yang salah.',
                'advice' => [
                    'Jaga kelembapan rambut. Gunakan masker rambut seminggu sekali, minyak alami , dan kondisioner.',
                    'Kurangi penggunaan alat panas.',
                    'Sisir rambut dengan hati-hati.',
                    'Makan makanan bergizi.',
                    'Hindari bahan kimia terlalu sering.',
                ],
                'route' => null,
            ],
        ];

        $rows = collect($advices)->map(function ($row) {
            $row['advice']      = json_encode($row['advice']);
            $row['created_at']  = now();
            $row['updated_at']  = now();
            return $row;
        })->all();

        DB::table('advices')->insert($rows);
    }
}
