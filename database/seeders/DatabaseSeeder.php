<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;use App\Models\{User,Service,Setting};
class DatabaseSeeder extends Seeder {
 public function run():void{
  if(app()->environment('production') && (!env('ADMIN_PASSWORD') || env('ADMIN_PASSWORD')==='Gl0B4lAdmin!')) throw new \RuntimeException('Set ADMIN_PASSWORD to a unique strong secret before production seeding.');
  User::updateOrCreate(['email'=>env('ADMIN_EMAIL','admin@globalmassage.com')],['name'=>'Administrator','password'=>env('ADMIN_PASSWORD','Gl0B4lAdmin!'),'is_admin'=>true]);
  $rows=[
   ['White Golden','Standard','60 Menit',750000,'Terapi pijat relaksasi tubuh lembut untuk meredakan kelelahan harian dan mengembalikan stamina.','Standard Elegance'],
   ['Black Golden','Standard','60 Menit',1000000,'Kombinasi teknik deep tissue massage untuk membantu menghilangkan ketegangan otot.','Popular'],
   ['Red Golden','Standard','60 Menit',1300000,'Layanan premium dengan sentuhan lembut dan aromaterapi khusus.','Premium Sensational'],
   ['Red Golden (Extended)','Standard','90 Menit',1600000,'Waktu lebih panjang untuk rangkaian terapi relaksasi.','Extended Sensational'],
   ['Golden Diamond 4 Hand','Standard','90 Menit',3000000,'Terapi bersama dua terapis secara bersamaan.','VIP Favorite'],
   ['Spouse 1','Standard','90 Menit',2300000,'Paket istimewa untuk pasangan.','Couple / Spouse'],
   ['Spouse 2','Standard','90 Menit',3000000,'Layanan pasangan tingkat lanjut.','Luxury Couple'],
   ['Body to Body','Add-on','Ekstra',300000,'Opsi tambahan pada sesi pemesanan.','Extra Services'],
   ['Extra Time 30 Min','Add-on','30 Menit',300000,'Perpanjangan sesi selama 30 menit.','Extra Services'],
   ['Long Time 3 Hours','Long Time','3 Jam',3500000,'Sesi relaksasi berdurasi tiga jam.','VIP'],
   ['Long Time 5 Hours','Long Time','5 Jam',6000000,'Sesi berdurasi lima jam.','VIP'],
   ['Long Time 8 Hours','Long Time','8 Jam',8500000,'Sesi berdurasi delapan jam.','VIP'],
   ['Long Time 12 Hours','Long Time','12 Jam',13500000,'Sesi berdurasi dua belas jam.','VIP'],
  ];
  foreach($rows as $i=>$r) Service::updateOrCreate(['name'=>$r[0]],['category'=>$r[1],'duration'=>$r[2],'price'=>$r[3],'description'=>$r[4],'label'=>$r[5],'status'=>'Active','sort_order'=>$i+1]);
  $settings=['site_name'=>'Global Massage','whatsapp_number'=>'6281234567890','tagline'=>'Exclusive Luxury Outcall Service Specialist','services_title'=>'Layanan & Tarif Pilihan','services_description'=>'Pilih paket pijat eksklusif yang sesuai dengan kebutuhan relaksasi dan kenyamanan tubuh Anda.','maintenance_mode'=>'0'];
  foreach($settings as $k=>$v) Setting::updateOrCreate(['key'=>$k],['value'=>$v]);
  $sections=[
   ['hero','Hero / Beranda','Premium Outcall Service Specialist','Rasakan Sensasi Relaksasi Eksklusif & Mewah','Layanan pijat panggilan profesional langsung ke hotel berbintang atau kediaman pribadi Anda. Menjamin privasi penuh, kenyamanan maksimal, dan terapi kebugaran kelas atas.','Layanan panggilan profesional dengan privasi dan kenyamanan.','Lihat Paket Layanan','#services','Hitung Pemesanan','#calculator'],
   ['about','Tentang Kami','Tentang Global Massage','Kenyamanan dan Privasi Prioritas Kami','Penyedia layanan outcall massage profesional, aman, dan terpercaya. Menjaga kerahasiaan dan kepuasan pelanggan secara maksimal.',null,null,null,null,null],
   ['services','Layanan & Tarif','Pilihan Layanan','Layanan & Tarif Pilihan','Pilih paket pijat eksklusif yang sesuai dengan kebutuhan relaksasi dan kenyamanan tubuh Anda.',null,null,null,null,null],
   ['addons','Add-Ons','Extra Services','Layanan Tambahan (Add-Ons)','Tambahkan opsi khusus ini ke dalam sesi pemesanan Anda.',null,null,null,null,null],
   ['longtime','Paket Long Time','VIP Unlimited Companion','Paket Long Time','Nikmati paket berdurasi panjang untuk kenyamanan Anda.',null,null,null,null,null],
   ['calculator','Kalkulator Booking','Reservation','Kalkulator Booking','Pilih paket dan add-ons untuk menghitung estimasi biaya.',null,null,null,null,null],
   ['footer','Footer','Global Massage','Global Massage','Penyedia layanan outcall massage profesional, aman, dan terpercaya. Menjaga kerahasiaan dan kepuasan pelanggan secara maksimal.',null,null,null,null,null],
  ];
  foreach($sections as $i=>$v) \App\Models\LandingSection::updateOrCreate(['section_key'=>$v[0]],['label'=>$v[1],'eyebrow'=>$v[2],'title'=>$v[3],'description'=>$v[4],'body'=>$v[5],'primary_cta_text'=>$v[6],'primary_cta_url'=>$v[7],'secondary_cta_text'=>$v[8],'secondary_cta_url'=>$v[9],'is_visible'=>true,'sort_order'=>$i+1]);
 }
}
