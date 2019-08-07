<?php

use Illuminate\Database\Seeder;
use App\Book;

class BookTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('books')->insert([
            [
                'isbn' => '5430859641',
                'title' => 'Jumbo Kertas Peperiksaan UPSR 2014 Bahasa Inggeris',
                'description' => 'Dapatkan Jumbo Kertas Peperiksaan UPSR 2014 Bahasa Inggeris',
                'author' => 'Wendy Seow Angel Sonam',
                'published_date' => '2014-05-24',
                'quantity' => '5',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
            [
                'isbn' => '5430859621',
                'title' => 'Jumbo Kertas Peperiksaan UPSR 2014 Bahasa Malaysia',
                'description' => 'Jumbo Kertas Peperiksaan UPSR 2014 Bahasa Malaysia',
                'author' => 'Md. Ramli Sabran',
                'published_date' => '2014-05-24',
                'quantity' => '2',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
            [
                'isbn' => '5430859341',
                'title' => 'Jumbo Kertas Peperiksaan UPSR 2014 Matematik',
                'description' => 'Jumbo Kertas Peperiksaan UPSR 2014 Matematik',
                'author' => 'Looi Liew Minm',
                'published_date' => '2014-11-24',
                'quantity' => '7',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
            [
                'isbn' => '4430859641',
                'title' => 'Aku Suka Dia',
                'description' => 'Nia Deliya dan Dennis Lee bersahabat baik. Disebabkan suatu insiden, timbul salah faham antara mereka hingga merenggangkan perhubungan mereka. Selepas bertahun-tahun terpisah, mereka dipertemukan semula. Mereka tidak lagi seperti dahulu. Mereka seperti orang asing di mata orang lain dan masing-masing tidak pernah menyatakan kepada sesiapa yang mereka saling mengenali suatu ketika dahulu.',
                'author' => 'Iman Zahra',
                'published_date' => '2016-01-15',
                'quantity' => '8',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
            [
                'isbn' => '5435859641',
                'title' => 'Siri Cerita Fantasi Kanak-kanak: Diserang Makhluk Asing',
                'description' => 'Siri ini mengandungi 14 buah cerita kanak-kanak bertemakan sainsastronomi yang disampaikan secara kreatif. Unsur magis yang dipaparkan pula memberi ruang kepada kanak-kanak untuk berimaginasi.',
                'author' => 'Mf Kencana, Mohd. Tajuliqbal Mohd. Taqiyuddin',
                'published_date' => '2014-05-24',
                'quantity' => '2',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
            [
                'isbn' => '5430009641',
                'title' => 'Tabu',
                'description' => 'Bibi tahu dia cantik. Dia bukan BBL (Big Beautiful Lady) biasa. Hidupnya selesa dengan rakan baik yang sentiasa di sisi, dan juga kekasih gelap warga asing yang sangat setia. Malangnya, keselesaan itu berakhir apabila dia berhadapan dengan dua misteri. Misteri ketika dia cuba mengenalpasti identiti pemilik telefon bimbit yang dia temui, dan misteri tentang kematian mengejutkan rakan baiknya. Bibi cuba membongkar',
                'author' => 'Shaz Johar',
                'published_date' => '2019-05-24',
                'quantity' => '10',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
            [
                'isbn' => '5430851234',
                'title' => 'Augmented Reality using Appcelerator Titanium Starter',
                'description' => 'Its a quick start tutorial to help you get started with creating Augmented Reality applications and acquainting yourself with essential aspects of creating AR applications using the Appcelerator Titanium Framework',
                'author' => 'Trevor Ward',
                'published_date' => '1998-12-24',
                'quantity' => '5',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],          
        ]);
    }
}
