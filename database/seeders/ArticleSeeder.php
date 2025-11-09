<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Category;
use App\Models\Writer;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create('id_ID');

        // Get categories and writers
        $dataScience = Category::where('slug', 'data-science')->first();
        $networkSecurity = Category::where('slug', 'network-security')->first();
        $interactiveMultimedia = Category::where('slug', 'interactive-multimedia')->first();
        $softwareEngineering = Category::where('slug', 'software-engineering')->first();

        $writers = Writer::all();

        // Data Science Articles
        if ($dataScience) {
            $dataScienceArticles = [
                [
                    'title' => 'Apa itu Machine Learning? Beserta Pengertian dan Cara Kerjanya',
                    'content' => 'Teknologi machine learning (ML) adalah mesin yang dikembangkan untuk bisa belajar dengan sendirinya tanpa arahan dari penggunanya. Pembelajaran mesin dikembangkan berdasarkan disiplin ilmu lainnya seperti statistika, matematika dan data mining sehingga mesin dapat belajar dengan menganalisa data tanpa perlu di program ulang atau diperintah.

Dalam hal ini machine learning memiliki kemampuan untuk memperoleh data yang ada dengan perintah ia sendiri. ML juga dapat mempelajari data yang ada dan data yang ia peroleh sehingga bisa melakukan tugas tertentu. Tugas yang dapat dilakukan oleh ML pun sangat beragam, tergantung dari apa yang ia pelajari.',
                    'excerpt' => 'Di tengah pesatnya perkembangan teknologi kecerdasan buatan atau artificial intelligence (AI), machine learning menjadi salah satu teknologi yang paling banyak dibahas dan digunakan.',
                    'writer_name' => 'Bia Mecca Annisa',
                    'published_date' => '2024-05-14',
                    'is_popular' => true,
                ],
                [
                    'title' => 'Mengenal Deep Learning Lebih Jelas',
                    'content' => 'Deep learning merupakan subbidang machine learning yang algoritmanya terinspirasi dari struktur otak manusia yang disebut jaringan saraf tiruan. Deep learning menggunakan beberapa lapisan (layer) untuk memproses data dan menghasilkan output yang lebih akurat.

Deep learning telah berhasil digunakan dalam berbagai aplikasi seperti pengenalan gambar, pemrosesan bahasa alami, dan sistem rekomendasi. Teknologi ini memungkinkan komputer untuk belajar dari data yang sangat besar dan kompleks.',
                    'excerpt' => 'Deep learning merupakan subbidang machine learning yang algoritmanya terinspirasi dari struktur otak...',
                    'writer_name' => 'Lia',
                    'published_date' => '2024-05-14',
                    'is_popular' => true,
                ],
                [
                    'title' => 'Natural Language Processing',
                    'content' => 'Natural Language Processing (NLP) merupakan salah satu cabang ilmu AI yang berfokus pada pengolahan dan pemahaman bahasa manusia oleh komputer. NLP memungkinkan komputer untuk membaca, memahami, dan menghasilkan teks dalam bahasa manusia.

Aplikasi NLP sangat luas, mulai dari chatbot, terjemahan bahasa, analisis sentimen, hingga asisten virtual. Teknologi ini terus berkembang seiring dengan kemajuan dalam machine learning dan deep learning.',
                    'excerpt' => 'Natural Language Processing (NLP) merupakan salah satu cabang ilmu AI yang berfokus pada pengolahan...',
                    'writer_name' => 'Husna',
                    'published_date' => '2024-05-15',
                    'is_popular' => false,
                ],
            ];

            foreach ($dataScienceArticles as $articleData) {
                $writer = $writers->where('name', $articleData['writer_name'])->first();
                if ($writer) {
                    Article::create([
                        'title' => $articleData['title'],
                        'slug' => Str::slug($articleData['title']),
                        'content' => $articleData['content'],
                        'excerpt' => $articleData['excerpt'],
                        'published_date' => $articleData['published_date'],
                        'category_id' => $dataScience->id,
                        'writer_id' => $writer->id,
                        'is_popular' => $articleData['is_popular'],
                    ]);
                }
            }
        }

        // Network Security Articles
        if ($networkSecurity) {
            $networkArticles = [
                [
                    'title' => 'Apa itu Network Security?',
                    'content' => 'Keamanan jaringan (network security) terdiri dari kebijakan dan praktik untuk mencegah dan memantau akses yang tidak sah, penyalahgunaan, modifikasi, atau penolakan jaringan komputer dan sumber daya yang dapat diakses melalui jaringan. Network security melibatkan otorisasi akses ke data dalam jaringan, yang dikendalikan oleh administrator jaringan.',
                    'excerpt' => 'Keamanan jaringan (network security) terdiri dari kebijakan dan praktik untuk mencegah dan memantau akses yang tidak sah, penyalahgunaan,...',
                    'writer_name' => 'Abi Firmansyah',
                    'published_date' => '2024-05-14',
                    'is_popular' => true,
                ],
                [
                    'title' => 'Software Security',
                    'content' => 'Software security adalah proses untuk memastikan bahwa perangkat lunak bebas dari kerentanan yang dapat dieksploitasi oleh penyerang. Ini melibatkan praktik pengembangan yang aman, pengujian keamanan, dan pemeliharaan berkelanjutan untuk melindungi aplikasi dari ancaman keamanan.',
                    'excerpt' => 'Software security adalah proses untuk memastikan bahwa perangkat lunak bebas dari kerentanan yang dapat dieksploitasi...',
                    'writer_name' => 'Abi Firmansyah',
                    'published_date' => '2024-05-16',
                    'is_popular' => false,
                ],
                [
                    'title' => 'Network Administration',
                    'content' => 'Network administration melibatkan pengelolaan, pemeliharaan, dan pengoperasian infrastruktur jaringan komputer. Administrator jaringan bertanggung jawab untuk memastikan bahwa semua komponen jaringan berfungsi dengan baik dan aman.',
                    'excerpt' => 'Network administration melibatkan pengelolaan, pemeliharaan, dan pengoperasian infrastruktur jaringan komputer...',
                    'writer_name' => 'Abi Firmansyah',
                    'published_date' => '2024-05-17',
                    'is_popular' => false,
                ],
            ];

            foreach ($networkArticles as $articleData) {
                $writer = $writers->where('name', $articleData['writer_name'])->first();
                if ($writer) {
                    Article::create([
                        'title' => $articleData['title'],
                        'slug' => Str::slug($articleData['title']),
                        'content' => $articleData['content'],
                        'excerpt' => $articleData['excerpt'],
                        'published_date' => $articleData['published_date'],
                        'category_id' => $networkSecurity->id,
                        'writer_id' => $writer->id,
                        'is_popular' => $articleData['is_popular'],
                    ]);
                }
            }
        }

        // Interactive Multimedia Articles
        if ($interactiveMultimedia) {
            $multimediaArticles = [
                [
                    'title' => 'Human and Computer Interaction',
                    'content' => 'Human-Computer Interaction (HCI) adalah bidang studi yang berfokus pada desain dan penggunaan teknologi komputer, terutama interaksi antara manusia dan komputer. HCI menggabungkan ilmu komputer, desain, psikologi, dan ilmu kognitif untuk menciptakan antarmuka yang lebih baik dan lebih mudah digunakan.',
                    'excerpt' => 'Human-Computer Interaction (HCI) adalah bidang studi yang berfokus pada desain dan penggunaan teknologi komputer...',
                    'writer_name' => 'Raka Putra Wicaksono',
                    'published_date' => '2024-05-14',
                    'is_popular' => false,
                ],
                [
                    'title' => 'User Experience',
                    'content' => 'User experience adalah pengalaman pengguna saat menggunakan suatu produk. Istilah ini mencakup semua aspek interaksi pengguna dengan perusahaan, layanannya, dan produknya. UX yang baik memastikan bahwa pengguna dapat dengan mudah dan menyenangkan mencapai tujuan mereka saat menggunakan produk.',
                    'excerpt' => 'User experience adalah pengalaman pengguna saat menggunakan suatu produk. Istilah ini...',
                    'writer_name' => 'Husna',
                    'published_date' => '2024-05-15',
                    'is_popular' => true,
                ],
                [
                    'title' => 'Popular Network Technology',
                    'content' => 'Teknologi jaringan populer saat ini mencakup berbagai protokol dan standar yang digunakan untuk menghubungkan perangkat dan memfasilitasi komunikasi data. Teknologi seperti 5G, Wi-Fi 6, dan SDN (Software-Defined Networking) telah mengubah cara kita berpikir tentang infrastruktur jaringan.',
                    'excerpt' => 'Teknologi jaringan populer saat ini mencakup berbagai protokol dan standar yang digunakan untuk menghubungkan perangkat...',
                    'writer_name' => 'Abi Firmansyah',
                    'published_date' => '2024-05-21',
                    'is_popular' => true,
                ],
                [
                    'title' => 'User Experience for Digital Immersive Technology',
                    'content' => 'User Experience untuk teknologi imersif digital melibatkan desain pengalaman yang mendalam dan menarik menggunakan teknologi seperti Virtual Reality (VR), Augmented Reality (AR), dan Mixed Reality (MR). Teknologi ini menawarkan cara baru untuk berinteraksi dengan konten digital.',
                    'excerpt' => 'User Experience untuk teknologi imersif digital melibatkan desain pengalaman yang mendalam...',
                    'writer_name' => 'Raka Putra Wicaksono',
                    'published_date' => '2024-05-18',
                    'is_popular' => false,
                ],
            ];

            foreach ($multimediaArticles as $articleData) {
                $writer = $writers->where('name', $articleData['writer_name'])->first();
                if ($writer) {
                    Article::create([
                        'title' => $articleData['title'],
                        'slug' => Str::slug($articleData['title']),
                        'content' => $articleData['content'],
                        'excerpt' => $articleData['excerpt'],
                        'published_date' => $articleData['published_date'],
                        'category_id' => $interactiveMultimedia->id,
                        'writer_id' => $writer->id,
                        'is_popular' => $articleData['is_popular'],
                    ]);
                }
            }
        }

        // Software Engineering Articles
        if ($softwareEngineering) {
            $seArticles = [
                [
                    'title' => 'Software Engineering',
                    'content' => 'Software engineering adalah proses merancang, mengembangkan, menguji, dan memelihara perangkat lunak. Ini adalah pendekatan sistematis untuk pengembangan perangkat lunak yang menggabungkan prinsip-prinsip rekayasa dengan praktik pengembangan perangkat lunak untuk menciptakan sistem yang andal dan efisien.',
                    'excerpt' => 'Software engineering adalah proses merancang, mengembangkan, menguji, dan memelihara perangkat lunak....',
                    'writer_name' => 'Lia',
                    'published_date' => '2024-05-14',
                    'is_popular' => true,
                ],
                [
                    'title' => 'Pattern Software Design',
                    'content' => 'Design patterns adalah solusi yang dapat digunakan kembali untuk masalah umum dalam desain perangkat lunak. Pattern membantu developer untuk menyelesaikan masalah desain dengan cara yang telah terbukti efektif dan dapat digunakan kembali dalam berbagai konteks.',
                    'excerpt' => 'Design patterns adalah solusi yang dapat digunakan kembali untuk masalah umum dalam desain perangkat lunak...',
                    'writer_name' => 'Lia',
                    'published_date' => '2024-05-19',
                    'is_popular' => false,
                ],
                [
                    'title' => 'Agile Software Development',
                    'content' => 'Agile software development adalah metodologi pengembangan perangkat lunak yang menekankan pada pengembangan iteratif, kolaborasi tim, dan responsif terhadap perubahan. Agile memungkinkan tim untuk memberikan nilai kepada pelanggan lebih cepat dan lebih sering.',
                    'excerpt' => 'Agile software development adalah metodologi pengembangan perangkat lunak yang menekankan pada pengembangan iteratif...',
                    'writer_name' => 'Lia',
                    'published_date' => '2024-05-20',
                    'is_popular' => false,
                ],
            ];

            foreach ($seArticles as $articleData) {
                $writer = $writers->where('name', $articleData['writer_name'])->first();
                if ($writer) {
                    Article::create([
                        'title' => $articleData['title'],
                        'slug' => Str::slug($articleData['title']),
                        'content' => $articleData['content'],
                        'excerpt' => $articleData['excerpt'],
                        'published_date' => $articleData['published_date'],
                        'category_id' => $softwareEngineering->id,
                        'writer_id' => $writer->id,
                        'is_popular' => $articleData['is_popular'],
                    ]);
                }
            }
        }
    }
}
