<?php

namespace Database\Seeders;

use App\Models\About;
use App\Models\Program;
use App\Models\User;
use App\Models\VisionMission;
use App\Models\VisionPage;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'firstName' => 'Admin',
                'middleName' => 'Middle',
                'lastName' => 'Last',
                'email' => 'farhanlubis.nf@gmail.com',
                'role' => 'admin',
                'email_verified_at' => Carbon::now(),
                'lastLogin' => Carbon::now(),
                'photo' => 'comment1.png',
                'password' => Hash::make('password'), // Sesuaikan dengan password yang diinginkan
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
        DB::table('home_pages')->insert([
            'section1_title' => 'Selamat Datang di MA Putri AN-NUR',
            'section1_subtitle' => 'Hidup Mulia atau Mati Syahid',
            'section1_photo' => 'siswi.png',
            'section1_url' => 'https://www.youtube.com/watch?v=kbAbXGnR5Dc',

            'section2_photo' => 'MA.jpg',
            'section2_list1' => 'Tenaga Pengajar Ustadz dan Ustadzah',
            'section2_list1_val' => '13',
            'section2_list2' => 'Murid Santri dan Non Santri',
            'section2_list2_val' => '71',
            'section2_list3' => 'Jam Belajar dalam satu pekan',
            'section2_list3_val' => '48',

            'section3_title' => 'Bergabunglah Bersama Kami',
            'section3_subtitle' => 'Madrasah Aliyah Putri An-Nur, Sekolah Modern khusus Perempuan berbasis Pesantren',
            'section3_photo' => 'maprofil.png',
            'section3_vid1' => 'profil2ma.mp4',
            'section3_vid2' => 'videoprofilma.mp4',

            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('settings')->insert([
            'app_name' => 'MA Putri AN-NUR',
            'app_name2' => 'MAPAN',
            'app_name3' => 'Madrasah Aliyah Putri An-Nur Kota Cirebon',
            'open_weekday' => 'Mon-Sun: 07AM - 18PM',
            'open_weekend' => 'Friday: day off',
            'logo' => 'MAANNUR.png',
            'email' => 'maannurcirebon@gmail.com',
            'phone' => '+62 831-2387-2374',
            'youtube' => 'http://www.youtube.com/@maannurcirebon511',
            'facebook' => 'https://web.facebook.com/Mapanofficialcrb',
            'instagram' => 'https://www.instagram.com/mapanofficialcrb?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==',
            'copyright' => 'MA Putri AN-NUR',
            'address' => 'Jln. Pangeran Drajat Jagasatru, Kesambi Kota Cirebon',
        ]);
        $client = [
            [
                'logo' => 'PPJ.png',
            ],
            [
                'logo' => 'LOGOMA.png',
            ],
            [
                'logo' => 'LOGOKEMENAG.png',
            ],
            [
                'logo' => 'LOGOMI.png',
            ],
            [
                'logo' => 'LOGOKOTA.png',
            ],
            [
                'logo' => 'LOGOMTS.png',
            ],
        ];

        DB::table('clients')->insert($client);

        DB::table('ekskul_pages')->insert([
            'title' => 'Ekstrakurikuler',
            'description' => 'Ekstrakurikuler merupakan kegiatan yang diselenggarakan oleh unit sekolah yang dirancang secara khusus sesuai dengan minat dan bakat siswa. Fungsi kegiatan Ekstrakurikuler sendiri sebagai bagian dari pengembangan minat dan bakat, memperluas pengalaman komunikasi, relaksasi dan persiapan jenjang karir di masa depan.',
        ]);

        $ekskuls = [
            [
                'name' => 'Engslih Club',
                'description' => 'Engslih Club merupakan Ekstrakurikuler yang menyediakan pelatihan Bahasa Inggris. Kegiatan ini dapat menumbuhkan dan meningkatkan keahlian siswa dalam berbicara, mendengar dan menulis Bahasa Inggris.',
                'image' => 'englis club.jpg',
            ],
            [
                'name' => 'Pramuka MAPAN',
                'description' => 'Gerakan Pramuka merupakan organisasi yang menyelenggarakan pendidikan kepaduan nasional nonformal. Kegiatan Pramuka dilaksanakan dengan berbagai kegiatan menarik, sehat, menyenangkan dan umumnya dilaksanakan di tempat terbuka.',
                'image' => 'peramuka mapan.jpg',
            ],
            [
                'name' => 'BTQ MAPAN',
                'description' => "BTQ Mapan merupakan kegiatan Ekstrakurikuler yang mempelajari dan mendalami Ilmu dan Seni Al-Qur'an, seperti Qira'ati, kaligrafi, tajwid, hafalan Al-Qur'an dan lain sebagainya",
                'image' => 'BTQ Mapan.jpg',
            ],
            [
                'name' => 'Hadroh MAPAN',
                'description' => 'Hadroh MAPAN merupakan kegiatan Ekstrakurikuler yang mempelajari seni musik Hadroh. Seni musik hadrah berisi lantunan pujian atau sholawat Nabi Muhammad SAW, yang diiringi dengan alat musik seperti rebana, bass, genjring dan sebagainya.',
                'image' => 'hadroh mapan.jpg',
            ],
        ];

        DB::table('ekskuls')->insert($ekskuls);

        VisionMission::create([
            'title' => 'Visi dan Misi MA Putri An-Nur Kota Cirebon',
            'vision' => <<<HTML
            <p>"Terwujudnya Insan Terdidik yang Berakhlakul Karimah Kuat dan Menjunjung Tinggi Nilai-nilai Islami.</p>
            <p>Unggul dalam Prestasi, Memilik Kecerdasan Intelektual serta Mampu Menerapkan Teknologi Digital"</p>
            <ul style="text-align: justify;">
                <b>Indikator Visi MA An-Nur Kota Cirebon adalah:</b>
                <li><b>Memiliki Budi Pekerti dan Akhlak Mulia.</b></li>
                <li><b>Memiliki Kecintaan Terhadap Bangsa dan Negara Indonesia.</b></li>
                <li><b>Memiliki Semangat untuk Meraih Prestasi secara Berkelanjutan.</b></li>
                <li><b>Memiliki Rasa Solidaritas dan Toleransi Terhadap Keanekaragaman Bangsa Indonesia.</b></li>
                <li><b>Menguasai Ilmu Pengetahuan dan Teknologi.</b></li>
                <li><b>Memiliki Sikap Kritis, Kreatif, Komunikatif dan Kolaboratif.</b></li>
                <li><b>Memiliki Kemandirian Belajar dan Berorganisasi.</b></li>
                <li><b>Memiliki Kecintaan Terhadap Budaya Membaca dan Menulis Dimanapun Berada.</b></li>
            </ul>
            HTML
            ,
            'mission' => <<<HTML
            <ul style="text-align: justify;">
                <li><b>Memberikan Pendidikan Islami dan Qur'ani Berkualitas untuk Membentuk Karakter Siswa yang Berakhlakul Karimah dan Menjunjung Tinggi Nilai-nilai Islami.</b></li>
                <li><b>Menerapkan Kurikulum yang Berbasis Kompetensi dan Mengintegritasikan Nilai-nilai Agama ke dalam Pembelajaran Sains untuk Meningkatkan Kecerdasan Intelektual.</b></li>
                <li><b>Mengasah Peserta Didik untuk Berprestasi dan Meningkatkan Pengetahuan Sains.</b></li>
                <li><b>Membentuk Peserta Didik yang Mandiri, Kolaboratif dan Berpikir Kritis.</b></li>
                <li><b>Mengembangkan Kemampuan Peserta Didik dalam Menggunakan Teknologi Digital untuk Memperoleh Informasi, Menganalisis Data, dan Berkomunikasi Secara Efektif.</b></li>
                <li><b>Mendorong Peserta Didik untuk Mengembangkan Kreativitas dan Inovasi dalam Pemanfaatan Teknologi Digital untuk Kepentingan Agama dan Masyarakat.</b></li>
                <li><b>Menyiapkan Lulusan yang Memiliki Life Skill dan Berdaya Guna Bagi Masyarakat.</b></li>
            </ul>
            HTML
        ,
        ]);

        DB::table('vision_pages')->insert([
            'title' => 'Sambutan Kepala Sekolah',
            'description' => 'Selamat datang di Madrasah Aliyah Putri An-Nur Kota Cirebon. Kami segenap keluarga MAPAN mengucapkan Terimakasih kepada para wali murid yang telah mendaftarkan putri nya di Madrasah Aliyah Putri An-Nur Kota Cirebon dan tidak lupa kepada para Ustadz dan Ustadzah yang telah membantu kegiatan belajar mengajar dan memberikan ilmu serta pengalamannya kepada para murid. Semoga ilmunya bermanfaat bagi diri sendiri dan masyarakat. Aamiiin.',
        ]);

        DB::table('programs')->insert([
            'title' => 'Program Unggulan',
            'description' => 'Program unggulan merupakan sebuah program beasiswa bagi siswa yang kurang mampu dalam hal ekonomi, siswa yang berprestasi dan mendapatkan program beasiswa dari pemerintah',
            'info_beasiswa' => <<<HTML
            <h2>Program Beasiswa</h2>
              <p>
                Program beasiswa merupakan sebuah program yang bertujuan untuk membantu masyarakat dengan keadaan ekonomi menengah kebawah agar tetap melanjutkan pendidikan.
              </p>
              <p>
                Tidak hanya itu, program beasiswa ini memiliki beberapa kriteria, adapun kriteria yang dimaksud ialah:
              </p>
              <ul style="text-align: justify;">
                <li><b>Program Beasiswa Berprestasi</b></li>
                <li><b>Program Beasiswa Siswa Yatim</b></li>
                <li><b>Program Beasiswa dari Pemerintah</b></li>
              </ul>
            HTML
            ,
            'link_pendaftaran' => 'https://google.com',
            'quote' => 'Selamat bergabung menjadi anggota keluarga MA Putri An-Nur Kota Cirebon. Selamat belajar dan berprestasi, semangat kalian membantu kalian di masa yang akan datang.',
            'admin_photo' => 'woman.png',
            'admin_name' => 'Vivi Silvana, SE',
            'admin_position' => 'Kepala Sekolah',
        ]);

        DB::table('program_photos')->insert([
            [
                'photo' => 'brosur2.jpg',
            ],
            [
                'photo' => 'brosur.jpg',
            ],
            [
                'photo' => 'Program Beasiswa.png',
            ],
        ]);

        About::create([
            'title' => 'Tentang Kami',
            'description' => 'Madrasah Aliyah Putri An-Nur berdiri dibawah naungan Yayasan Pendidikan dan Dakwah Islam Jagasatru (YPDIJ).',
            'section1_image' => 'anur (2).jpg',
            'section1_description' => 'Dari kelebihan diatas Madrasah Aliyah Putri An-Nur Kota Cirebon dapat bersaing dan berkembang baik secara ilmu pengetahuan dan ilmu keagamaan.',
            'section2_description' => 'Madrasah Aliyah Putri An-Nur Kota Cirebon merupakan Lembaga pendidikan dibawah naungan Yayasan Pendidikan dan Dakwah Islam Jagasatru (YPDIJ) Kota Cirebon. Sekolah khusus putri yang sistem pendidikan kurtilas yang dipadukan dengan kurikulum Pondok Pesantren berbasis Multimedia. Madrasah Aliyah Putri An-Nur Kota Cirebon berlokasi di Jln. Pangeran Drajat, Kecamatan Kesambi, Jagasatru, Kota Cirebon.',
            'section2_image' => 'po.jpg',
            'section2_video' => 'videoprofilma copy.mp4',
        ]);
        DB::table('why_uses')->insert([
            [
                'title' => 'Pendidikan Holistik',
                'description' => 'Memberikan pengalaman belajar yang mencakup aspek Agama, Moral, Sosial, Sains dan Akademis',
            ],
            [
                'title' => 'Pengembangan Karakter dan Akhlak',
                'description' => 'Yayasan Pendidikan dan Dakwah Islam Jagasatru (YPDIJ) turut membantu pembentukan karakter dan akhlak siswa melalui pendekatan pendidikan yang berfokus pada integritas, kejujuran dan tanggung jawab.',
            ],
            [
                'title' => 'Pembentukan Kemandirian',
                'description' => 'Menyediakan asrama Pesantren yang dapat membantu siswa mengembangkan kemandirian, tanggung jawab pribadi, dan keterampilan sehari-hari.',
            ],
            [
                'title' => 'Pengajaran Nilai-nilai Keagamaan',
                'description' => 'Siswa mendapatkan pemahaman yang mendalam tentang Nilai-nilai keagamaan dan etika yang kuat dalam disiplin ilmu agama.',
            ],
            [
                'title' => 'Pemberdayaan Perempuan',
                'description' => 'Meningkatkan rasa percaya diri untuk mampu berperan aktif dalam memecahkan masalah, dan memberikan akses yang setara untuk mendukung pengembangan potensi perempuan.',
            ],
            [
                'title' => 'Pengajaran oleh Guru Ahli',
                'description' => 'Tenaga pengajar yang terlatih dan berpengalaman di bidangnya memberikan pengalaman yang terarah dan mendalam, sehingga dapat membantu siswa memahami konsep pembelajaran yang kompleks.',
            ],
        ]);

        DB::table('page_facilities')->insert([
            'title' => 'Fasilitas',
            'description' => 'Madrasah Aliyah Putri An-Nur Kota Cirebon memiliki Fasilitas belajar yang lengkap dan nyaman.',
        ]);
        DB::table('page_teams')->insert([
            'title' => 'Tenaga Pengajar',
            'description' => 'Madrasah Aliyah An-Nur Kota Cirebon memiliki Tenaga Pengajar yang berpengalaman dan berintegritas tinggi.',
        ]);

        DB::table('facilities')->insert([
            [
                'name' => 'Ruang Belajar yang Representative',
                'description' => 'Ruangan belajar yang luas dan nyaman dapat menampung kurang lebih 40 siswa perkelasnya.',
                'icon' => 'bi-clock-history',
            ],
            [
                'name' => 'Hotspot Area',
                'description' => 'Madrasah Aliyah Putri An-Nur memiliki hotspot area yang dapat mendukung kegiatan belajar siswa dalam mengerjakan tugas.',
                'icon' => 'bi-broadcast',
            ],
            [
                'name' => 'Pembelajaran Menggunakan Media Infocus dan Multimedia',
                'description' => 'Madrasah Aliyah Putri An-Nur Kota Cirebon memiliki 3 ruang kelas, masing-masing kelas memiliki fasilitas belajar seperti Infokus sehingga kegiatan belajar mengajar tidak membosankan dan nyaman.',
                'icon' => 'bi-easel',
            ],
            [
                'name' => 'Koperasi Sekolah',
                'description' => 'Peran Koperasi Sekolah dapat membantu siswa dalam kegiatan belajar mengajar. Unit ini bertujuan melayani kebutuhan pokok siswa serta melatih siswa untuk bertanggung jawab, bekerjasama dan jujur.',
                'icon' => 'bi-bounding-box-circles',
            ],
            [
                'name' => 'Lab Komputer',
                'description' => 'Madrasah Aliyah Putri An-Nur Kota Cirebon memiliki Lab Komputer. Selain belajar ilmu agama dan sains, siswa juga dapat mempelajari ilmu komputer.',
                'icon' => 'bi-pc-display-horizontal',
            ],
            [
                'name' => 'Perpustakaan',
                'description' => 'Madrasah Aliyah Putri An-Nur Kota Cirebon memiliki Perpustakaan bersih dan nyaman untuk para siswa membaca dan memperluas ilmu pengetahuan.',
                'icon' => 'bi-book-half',
            ],
        ]);
        DB::table('teams')->insert([
            [
                'name' => 'Vivi Silvana, SE',
                'position' => 'Kepala Madrasah',
                'image' => 'woman.png',
                'facebook' => '',
                'twitter' => '',
                'instagram' => '',
                'linkedin' => '',
            ],
            [
                'name' => 'Emi Sukemi, S.Ag',
                'position' => 'Kabid. Perpustakaan',
                'image' => 'woman.png',
                'facebook' => '',
                'twitter' => '',
                'instagram' => '',
                'linkedin' => '',
            ],
            [
                'name' => 'Nurun Novianah, S.Pd.I',
                'position' => 'Kabid. Tata Usaha',
                'image' => 'woman.png',
                'facebook' => '',
                'twitter' => '',
                'instagram' => '',
                'linkedin' => '',
            ],
            [
                'name' => 'Abdul Hamid Yahya',
                'position' => 'Wakabid. Humas',
                'image' => 'man.png',
                'facebook' => '',
                'twitter' => '',
                'instagram' => '',
                'linkedin' => '',
            ],
            [
                'name' => 'Ahmad Aisy, MM',
                'position' => 'Wakabid. Kurikulum',
                'image' => 'man.png',
                'facebook' => '',
                'twitter' => '',
                'instagram' => '',
                'linkedin' => '',
            ],
            [
                'name' => 'Vidya S.Hakimi, S.Pd',
                'position' => 'Wakabid. Kesiswaan',
                'image' => 'woman.png',
                'facebook' => '',
                'twitter' => '',
                'instagram' => '',
                'linkedin' => '',
            ],
            [
                'name' => 'Saadah N, S.Pd',
                'position' => 'Staff Tata Usaha',
                'image' => 'woman.png',
                'facebook' => '',
                'twitter' => '',
                'instagram' => '',
                'linkedin' => '',
            ],
            [
                'name' => 'Abdurrahman, S.Pd',
                'position' => 'Staff Tata Usaha',
                'image' => 'man.png',
                'facebook' => '',
                'twitter' => '',
                'instagram' => '',
                'linkedin' => '',
            ],
            [
                'name' => 'Abdurrahman, S.Pd',
                'position' => 'Wali Kelas X',
                'image' => 'man.png',
                'facebook' => '',
                'twitter' => '',
                'instagram' => '',
                'linkedin' => '',
            ],
            [
                'name' => 'Siti Khodijah, S.Pd',
                'position' => 'Wali Kelas XI',
                'image' => 'woman.png',
                'facebook' => '',
                'twitter' => '',
                'instagram' => '',
                'linkedin' => '',
            ],
            [
                'name' => 'Ahmad Aisy, MM',
                'position' => 'Wali Kelas XII',
                'image' => 'man.png',
                'facebook' => '',
                'twitter' => '',
                'instagram' => '',
                'linkedin' => '',
            ],
            [
                'name' => 'Mais Nursiam',
                'position' => 'Operator',
                'image' => 'man.png',
                'facebook' => '',
                'twitter' => '',
                'instagram' => '',
                'linkedin' => '',
            ],
        ]);
    }
}
