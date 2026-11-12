<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $settings["site_name"] ?? "Global Massage" }} - Exclusive Luxury Outcall Service</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
<script>tailwind.config={theme:{extend:{colors:{brand:{pink:'#ff007f',pinkDark:'#d6006b',pinkGlow:'#ff3399',darkBg:'#09090b',cardBg:'#121217',borderDark:'#262630'}},fontFamily:{sans:['Inter','sans-serif'],serif:['Playfair Display','serif']}}}}</script>
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts: Playfair Display & Inter -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:ital,wght@0,600;0,700;1,400&display=swap" rel="stylesheet">
<style>
        /* Custom Glowing & Wave Effects inspired by image */
        body {
            background-color: #09090b;
            color: #f3f4f6;
            overflow-x: hidden;
        }

        .neon-glow-pink {
            box-shadow: 0 0 20px rgba(255, 0, 127, 0.4), inset 0 0 15px rgba(255, 0, 127, 0.2);
        }

        .neon-text-glow {
            text-shadow: 0 0 12px rgba(255, 0, 127, 0.7);
        }

        .neon-border {
            border: 1px solid rgba(255, 0, 127, 0.3);
            transition: all 0.3s ease;
        }
        .neon-border:hover {
            border-color: rgba(255, 0, 127, 0.9);
            box-shadow: 0 0 20px rgba(255, 0, 127, 0.35);
        }

        /* Ambient Wave Lines Background */
        .ambient-waves {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: 0;
            pointer-events: none;
        }

        .wave-line {
            position: absolute;
            width: 200%;
            height: 400px;
            background: radial-gradient(ellipse at center, rgba(255, 0, 127, 0.15) 0%, rgba(9, 9, 11, 0) 70%);
            border-top: 2px solid rgba(255, 0, 127, 0.3);
            border-radius: 40%;
            transform: rotate(-15deg);
        }

        /* Glassmorphism */
        .glass-card {
            background: rgba(18, 18, 23, 0.75);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
        }

        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }
        ::-webkit-scrollbar-track {
            background: #09090b;
        }
        ::-webkit-scrollbar-thumb {
            background: #ff007f;
            border-radius: 4px;
        }
    </style>
</head>
<body class="font-sans antialiased selection:bg-brand-pink selection:text-white">

    <!-- Top Sticky Ambient Header -->
    <header class="fixed top-0 left-0 right-0 z-50 glass-card border-b border-brand-borderDark transition-all duration-300" id="navbar">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-20 flex items-center justify-between">
            <!-- Brand Logo -->
            <a href="#" class="flex items-center gap-3 group">
                <div class="w-10 h-10 rounded-full bg-gradient-to-tr from-brand-pink to-purple-600 flex items-center justify-center shadow-lg shadow-brand-pink/30 group-hover:scale-105 transition-transform">
                    <i class="fa-solid font-bold text-white text-lg">GM</i>
                </div>
                <div>
                    <span class="font-serif text-2xl font-bold tracking-wider text-white">GLOBAL</span>
                    <span class="font-serif text-2xl font-bold tracking-wider text-brand-pink neon-text-glow">MASSAGE</span>
                    <p class="text-[10px] tracking-widest text-gray-400 uppercase font-sans">Exclusive Outcall Service</p>
                </div>
            </a>

            <!-- Desktop Nav Links -->
            <nav class="hidden md:flex items-center gap-8 text-sm font-medium tracking-wide">
                <a href="#about" class="text-gray-300 hover:text-brand-pink transition-colors">Tentang Kami</a>
                <a href="#services" class="text-gray-300 hover:text-brand-pink transition-colors">Layanan & Tarif</a>
                <a href="#longtime" class="text-gray-300 hover:text-brand-pink transition-colors">Paket Long Time</a>
                <a href="#addons" class="text-gray-300 hover:text-brand-pink transition-colors">Add-Ons</a>
                <a href="#calculator" class="text-gray-300 hover:text-brand-pink transition-colors">Kalkulator Booking</a>
            </nav>

            <!-- Direct Contact CTA -->
            <div class="hidden sm:flex items-center gap-4">
                <a href="https://wa.me/{{ $settings["whatsapp_number"] ?? "6281234567890" }}?text=Halo%20Global%20Massage,%20saya%20ingin%20informasi%20pemesanan" target="_blank" class="px-5 py-2.5 rounded-full bg-gradient-to-r from-brand-pink to-brand-pinkDark text-white font-semibold text-sm hover:brightness-110 shadow-lg shadow-brand-pink/40 transition-all duration-300 flex items-center gap-2">
                    <i class="fa-brands fa-whatsapp text-lg"></i>
                    <span>Hubungi Kami</span>
                </a>
            </div>

            <!-- Mobile Hamburger Button -->
            <button id="mobileMenuBtn" class="md:hidden text-gray-300 hover:text-brand-pink text-2xl focus:outline-none">
                <i class="fa-solid fa-bars"></i>
            </button>
        </div>

        <!-- Mobile Drawer Menu -->
        <div id="mobileMenu" class="hidden md:hidden bg-brand-cardBg border-b border-brand-borderDark px-6 py-4 space-y-4">
            <a href="#about" class="block text-gray-300 hover:text-brand-pink">Tentang Kami</a>
            <a href="#services" class="block text-gray-300 hover:text-brand-pink">Layanan & Tarif</a>
            <a href="#longtime" class="block text-gray-300 hover:text-brand-pink">Paket Long Time</a>
            <a href="#addons" class="block text-gray-300 hover:text-brand-pink">Add-Ons</a>
            <a href="#calculator" class="block text-gray-300 hover:text-brand-pink">Kalkulator Booking</a>
            <a href="https://wa.me/{{ $settings["whatsapp_number"] ?? "6281234567890" }}?text=Halo%20Global%20Massage" target="_blank" class="w-full py-3 text-center block rounded-full bg-brand-pink text-white font-semibold">
                <i class="fa-brands fa-whatsapp mr-2"></i> WhatsApp Order
            </a>
        </div>
    </header>

    <!-- Hero Section -->
    @php($hero = $sections->get('hero'))
    @if(!$hero || $hero->is_visible)<section class="relative pt-32 pb-20 md:pt-44 md:pb-32 overflow-hidden flex items-center min-h-[90vh]" @if($hero?->image_path) style="background-image:linear-gradient(rgba(9,9,11,.82),rgba(9,9,11,.92)),url('{{ asset('storage/'.$hero->image_path) }}');background-size:cover;background-position:center" @endif>
        <!-- Background Ambient Glow Wave -->
        <div class="ambient-waves">
            <div class="wave-line -top-20 -left-40 opacity-70"></div>
            <div class="wave-line top-1/2 -right-40 opacity-50 transform rotate-45"></div>
            <div class="absolute top-1/3 left-1/2 -translate-x-1/2 w-[600px] h-[600px] bg-brand-pink/10 rounded-full blur-[140px] pointer-events-none"></div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
            <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full border border-brand-pink/40 bg-brand-pink/10 text-brand-pink text-xs sm:text-sm font-semibold tracking-wider uppercase mb-6 backdrop-blur-md">
                <i class="fa-solid fa-crown text-amber-400"></i> {{ $hero->eyebrow ?? 'Premium Outcall Service Specialist' }}
            </div>

            <h1 class="font-serif text-4xl sm:text-6xl md:text-7xl font-bold tracking-tight text-white mb-6 leading-tight">
                {{ $hero->title ?? 'Rasakan Sensasi Relaksasi Eksklusif & Mewah' }}
            </h1>

            <p class="max-w-2xl mx-auto text-gray-300 text-base sm:text-lg mb-10 font-light leading-relaxed">
                {{ $hero->description ?? 'Layanan pijat panggilan profesional langsung ke hotel berbintang atau kediaman pribadi Anda. Menjamin privasi penuh, kenyamanan maksimal, dan terapi kebugaran kelas atas.' }}
            </p>

            <div class="flex flex-col sm:flex-row items-center justify-center gap-4 sm:gap-6">
                <a href="{{ $hero->primary_cta_url ?: '#services' }}" class="w-full sm:w-auto px-8 py-4 rounded-full bg-gradient-to-r from-brand-pink to-brand-pinkDark text-white font-bold tracking-wide shadow-lg shadow-brand-pink/40 hover:scale-105 transition-all">
                    {{ $hero->primary_cta_text ?? 'Lihat Paket Layanan' }}
                </a>
                <a href="{{ $hero->secondary_cta_url ?: '#calculator' }}" class="w-full sm:w-auto px-8 py-4 rounded-full glass-card border border-brand-pink/50 text-white font-semibold hover:bg-brand-pink/10 transition-all flex items-center justify-center gap-2">
                    <i class="fa-solid fa-calculator text-brand-pink"></i>
                    <span>{{ $hero->secondary_cta_text ?? 'Hitung Pemesanan' }}</span>
                </a>
            </div>

            <!-- Stats/Badges -->
            <div class="mt-16 grid grid-cols-2 md:grid-cols-4 gap-4 max-w-4xl mx-auto">
                <div class="p-4 rounded-2xl glass-card border border-brand-borderDark">
                    <p class="font-serif text-2xl sm:text-3xl font-bold text-brand-pink">100%</p>
                    <p class="text-xs text-gray-400 mt-1">Privasi Terjaga</p>
                </div>
                <div class="p-4 rounded-2xl glass-card border border-brand-borderDark">
                    <p class="font-serif text-2xl sm:text-3xl font-bold text-brand-pink">24 / 7</p>
                    <p class="text-xs text-gray-400 mt-1">Layanan Outcall</p>
                </div>
                <div class="p-4 rounded-2xl glass-card border border-brand-borderDark">
                    <p class="font-serif text-2xl sm:text-3xl font-bold text-brand-pink">Hotel / Home</p>
                    <p class="text-xs text-gray-400 mt-1">Layanan Panggilan</p>
                </div>
                <div class="p-4 rounded-2xl glass-card border border-brand-borderDark">
                    <p class="font-serif text-2xl sm:text-3xl font-bold text-brand-pink">Top Tier</p>
                    <p class="text-xs text-gray-400 mt-1">Terapis Berpengalaman</p>
                </div>
            </div>
        </div>
    </section>@endif

    @php($aboutSection = $sections->get('about'))
    @if(!$aboutSection || $aboutSection->is_visible)<section id="about" class="py-16 border-t border-brand-borderDark"><div class="max-w-5xl mx-auto px-4 text-center">@if($aboutSection?->eyebrow)<p class="text-brand-pink uppercase tracking-widest text-xs font-semibold">{{ $aboutSection->eyebrow }}</p>@endif<h2 class="font-serif text-3xl sm:text-4xl font-bold mt-3">{{ $aboutSection->title ?? 'Tentang Kami' }}</h2><p class="text-gray-400 max-w-3xl mx-auto mt-5 leading-relaxed">{{ $aboutSection->description ?? '' }}</p>@if($aboutSection?->image_path)<img src="{{ asset('storage/'.$aboutSection->image_path) }}" alt="{{ $aboutSection->title }}" loading="lazy" class="mt-8 max-h-96 w-full object-cover rounded-3xl">@endif</div></section>@endif

    @php($servicesSection = $sections->get('services'))
    @if(!$servicesSection || $servicesSection->is_visible)<section id="services" class="py-20 relative bg-brand-darkBg/60 border-t border-brand-borderDark">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
          @if($servicesSection?->image_path)<img src="{{ asset('storage/'.$servicesSection->image_path) }}" alt="{{ $servicesSection->title }}" loading="lazy" class="mx-auto mb-6 max-h-64 rounded-2xl object-cover">@endif
          <h2 class="font-serif text-3xl sm:text-5xl font-bold text-white mb-4">{{ $servicesSection->title ?? $settings['services_title'] ?? 'Layanan & Tarif Pilihan' }}</h2>
          <div class="w-24 h-1 bg-gradient-to-r from-transparent via-brand-pink to-transparent mx-auto mb-4"></div>
          <p class="text-gray-400 max-w-xl mx-auto text-sm sm:text-base">{{ $servicesSection->description ?? $settings['services_description'] ?? 'Pilih paket pijat eksklusif yang sesuai dengan kebutuhan relaksasi dan kenyamanan tubuh Anda.' }}</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
          @foreach($services->where('category','Standard') as $service)
          <div class="glass-card rounded-3xl p-6 neon-border relative group flex flex-col justify-between">
            @if($service->image_path)<img src="{{ asset('storage/'.$service->image_path) }}" alt="{{ $service->name }}" loading="lazy" class="w-full h-44 object-cover rounded-2xl mb-5">@endif
            <div>
              <div class="flex justify-between items-start mb-4">
                <span class="px-3 py-1 rounded-full bg-white/10 text-gray-300 text-xs font-semibold">{{ $service->label ?: 'Standard Elegance' }}</span>
                <span class="text-brand-pink font-semibold text-sm"><i class="fa-regular fa-clock mr-1"></i> {{ $service->duration }}</span>
              </div>
              <h3 class="font-serif text-2xl font-bold text-white group-hover:text-brand-pink">{{ $service->name }}</h3>
              <p class="text-gray-400 text-sm mt-2">{{ $service->description }}</p>
            </div>
            <div class="mt-8 pt-4 border-t border-brand-borderDark flex items-center justify-between">
              <div><span class="text-xs text-gray-500 block">Harga</span><span class="font-serif text-2xl font-bold text-white">{{ money($service->price) }}</span></div>
              <button onclick="selectPackage({{ $service->id }})" class="px-4 py-2 rounded-xl bg-brand-pink/20 hover:bg-brand-pink text-brand-pink hover:text-white font-medium text-sm border border-brand-pink/40">Pilih Paket</button>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </section>@endif

    @php($addonsSection = $sections->get('addons'))
    @if(!$addonsSection || $addonsSection->is_visible)<section id="addons" class="py-16 relative">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="glass-card rounded-3xl p-8 border border-brand-pink/30 relative overflow-hidden">
          <div class="grid grid-cols-1 md:grid-cols-3 gap-8 items-center">
            <div>@if($addonsSection?->image_path)<img src="{{ asset('storage/'.$addonsSection->image_path) }}" alt="{{ $addonsSection->title }}" loading="lazy" class="w-full h-40 object-cover rounded-2xl mb-4">@endif<span class="text-brand-pink font-semibold text-xs tracking-wider uppercase">{{ $addonsSection->eyebrow ?? 'Extra Services' }}</span>
              <h3 class="font-serif text-3xl font-bold text-white mt-1">{{ $addonsSection->title ?? 'Layanan Tambahan (Add-Ons)' }}</h3>
              <p class="text-gray-400 text-sm mt-2">{{ $addonsSection->description ?? 'Tambahkan opsi khusus ini ke dalam sesi pemesanan Anda.' }}</p></div>
            <div class="md:col-span-2 grid grid-cols-1 sm:grid-cols-2 gap-4">
              @foreach($services->where('category','Add-on') as $addon)
              <div class="bg-black/50 p-5 rounded-2xl border border-brand-borderDark flex items-center justify-between gap-3">
                @if($addon->image_path)<img src="{{ asset('storage/'.$addon->image_path) }}" alt="{{ $addon->name }}" loading="lazy" class="w-16 h-16 object-cover rounded-xl">@endif<div><h4 class="font-semibold text-white">{{ $addon->name }}</h4><p class="text-xs text-gray-400">{{ $addon->description }}</p></div>
                <span class="font-bold text-brand-pink">+ {{ money($addon->price) }}</span>
              </div>
              @endforeach
            </div>
          </div>
        </div>
      </div>
    </section>@endif

    @php($longtimeSection = $sections->get('longtime'))
    @if(!$longtimeSection || $longtimeSection->is_visible)<section id="longtime" class="py-20 relative bg-brand-darkBg">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">@if($longtimeSection?->image_path)<img src="{{ asset('storage/'.$longtimeSection->image_path) }}" alt="{{ $longtimeSection->title }}" loading="lazy" class="mx-auto mb-6 max-h-64 rounded-2xl object-cover">@endif<span class="text-brand-pink font-semibold text-xs tracking-widest uppercase">{{ $longtimeSection->eyebrow ?? 'VIP Unlimited Companion' }}</span>
          <h2 class="font-serif text-3xl sm:text-5xl font-bold text-white mt-2">{{ $longtimeSection->title ?? 'Paket Long Time' }}</h2>
          <div class="w-24 h-1 bg-gradient-to-r from-transparent via-brand-pink to-transparent mx-auto mt-4 mb-4"></div>
          <p class="text-gray-400 max-w-xl mx-auto text-sm sm:text-base">{{ $longtimeSection->description ?? 'Nikmati paket berdurasi panjang untuk kenyamanan Anda.' }}</p></div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
          @foreach($services->where('category','Long Time') as $service)
          <div class="glass-card rounded-3xl p-6 border border-brand-borderDark text-center relative group hover:border-brand-pink/70">
            @if($service->image_path)<img src="{{ asset('storage/'.$service->image_path) }}" alt="{{ $service->name }}" loading="lazy" class="w-full h-36 object-cover rounded-2xl mb-4">@endif
            <div class="w-14 h-14 rounded-2xl bg-gradient-to-tr from-brand-pink to-purple-600 mx-auto flex items-center justify-center text-white text-2xl mb-4"><i class="fa-solid fa-clock"></i></div>
            <h3 class="font-serif text-2xl font-bold text-white">{{ $service->name }}</h3><p class="text-xs text-gray-400 mt-1 mb-6">{{ $service->duration }}</p>
            <div class="text-3xl font-serif font-bold text-brand-pink mb-6">{{ money($service->price) }}</div>
            <button onclick="selectPackage({{ $service->id }})" class="w-full py-3 rounded-xl bg-brand-pink/20 text-brand-pink hover:bg-brand-pink hover:text-white font-semibold text-sm border border-brand-pink/30">Pilih Long Time</button>
          </div>
          @endforeach
        </div>
      </div>
    </section>@endif

    @php($calculatorSection = $sections->get('calculator'))
    @if(!$calculatorSection || $calculatorSection->is_visible)<section id="calculator" class="py-20 relative border-t border-brand-borderDark">
      <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">@if($calculatorSection?->image_path)<img src="{{ asset('storage/'.$calculatorSection->image_path) }}" alt="{{ $calculatorSection->title }}" loading="lazy" class="mx-auto mb-6 max-h-48 rounded-2xl object-cover">@endif<span class="text-brand-pink text-xs font-semibold tracking-widest uppercase">{{ $calculatorSection->eyebrow ?? 'Reservation' }}</span>
          <h2 class="font-serif text-3xl sm:text-5xl font-bold text-white mt-2">{{ $calculatorSection->title ?? 'Kalkulator Booking' }}</h2>
          <p class="text-gray-400 mt-3">{{ $calculatorSection->description ?? 'Pilih paket dan add-ons untuk menghitung estimasi biaya.' }}</p></div>
        <div class="glass-card rounded-3xl p-6 sm:p-10 neon-border">
          <form id="bookingForm" class="space-y-6">
            <div><label class="block text-sm font-medium text-gray-300 mb-2">Pilih Paket Utama</label>
              <select id="mainPackage" class="w-full bg-brand-darkBg border border-brand-borderDark rounded-xl px-4 py-3 text-white">
                <option value="">-- Pilih Layanan Utama --</option>
                @foreach($services->whereIn('category',['Standard','Long Time']) as $service)
                <option value="{{ $service->id }}" data-price="{{ $service->price }}" data-name="{{ $service->name }}">{{ $service->name }} - {{ money($service->price) }}</option>
                @endforeach
              </select>
            </div>
            <div class="space-y-3"><label class="block text-sm font-medium text-gray-300">Layanan Tambahan (Add-Ons)</label>
              <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                @foreach($services->where('category','Add-on') as $addon)
                <label class="flex items-center space-x-3 p-4 rounded-xl bg-brand-darkBg border border-brand-borderDark cursor-pointer">
                  <input type="checkbox" class="addon-option w-5 h-5 accent-brand-pink" value="{{ $addon->id }}" data-price="{{ $addon->price }}">
                  <span class="text-sm font-medium text-gray-200">{{ $addon->name }} (+{{ money($addon->price) }})</span>
                </label>
                @endforeach
              </div>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
              <div><label class="block text-sm font-medium text-gray-300 mb-2">Nama Pemesan</label><input id="custName" type="text" placeholder="Contoh: Pak Alex" class="w-full bg-brand-darkBg border border-brand-borderDark rounded-xl px-4 py-3 text-white"></div>
              <div><label class="block text-sm font-medium text-gray-300 mb-2">No. WhatsApp</label><input id="custPhone" type="tel" placeholder="628..." class="w-full bg-brand-darkBg border border-brand-borderDark rounded-xl px-4 py-3 text-white"></div>
              <div class="sm:col-span-2"><label class="block text-sm font-medium text-gray-300 mb-2">Lokasi / Nama Hotel & No. Kamar</label><input id="custLocation" type="text" placeholder="Contoh: Hotel Ritz Room 402" class="w-full bg-brand-darkBg border border-brand-borderDark rounded-xl px-4 py-3 text-white"></div>
            </div>
            <div class="pt-6 border-t border-brand-borderDark flex flex-col sm:flex-row items-center justify-between gap-4">
              <div><span class="text-xs text-gray-400 block">Total Estimasi Harga</span><span id="displayTotal" class="font-serif text-3xl font-bold text-brand-pink">Rp 0</span></div>
              <button type="button" onclick="sendBooking()" class="w-full sm:w-auto px-8 py-4 rounded-xl bg-gradient-to-r from-green-500 to-emerald-600 text-white font-bold"><i class="fa-brands fa-whatsapp text-xl mr-2"></i>Order via WhatsApp Now</button>
            </div>
          </form>
        </div>
      </div>
    </section>@endif
    <!-- Footer -->
    <footer class="bg-black border-t border-brand-borderDark py-12 text-center text-gray-500 text-xs">
        <div class="max-w-7xl mx-auto px-4 space-y-4">
            <div class="flex items-center justify-center gap-2">
                <span class="font-serif text-xl font-bold text-white">{{ $sections->get('footer')?->title ?? 'GLOBAL MASSAGE' }}</span>
            </div>
            <p class="max-w-md mx-auto text-gray-400">{{ $sections->get('footer')?->description ?? 'Penyedia layanan outcall massage profesional, aman, dan terpercaya. Menjaga kerahasiaan dan kepuasan pelanggan secara maksimal.' }}</p>
            <div class="pt-4 border-t border-brand-borderDark text-gray-600">
                &copy; 2026 Global Massage Service. All Rights Reserved. Privasi & Kerahasiaan Terjamin. &copy; Powered Anavallo
            </div>
        </div>
    </footer>

    <!-- Interactive JavaScript -->

<script>
const csrf = document.querySelector('meta[name="csrf-token"]').content;
const waNumber = @json($settings['whatsapp_number'] ?? '6281234567890');
function idr(n){return new Intl.NumberFormat('id-ID',{style:'currency',currency:'IDR',maximumFractionDigits:0}).format(n||0)}
function selected(){return document.getElementById('mainPackage').selectedOptions[0]}
function calc(){
 const base=selected()?.dataset.price ? Number(selected().dataset.price) : 0;
 const addons=[...document.querySelectorAll('.addon-option:checked')];
 const total=base+addons.reduce((a,x)=>a+Number(x.dataset.price),0);
 document.getElementById('displayTotal').textContent=idr(total); return {base,addons,total};
}
document.getElementById('mainPackage').addEventListener('change',calc);
document.querySelectorAll('.addon-option').forEach(x=>x.addEventListener('change',calc));
function selectPackage(id){document.getElementById('mainPackage').value=id;calc();document.getElementById('calculator').scrollIntoView({behavior:'smooth'});}
async function sendBooking(){
 const opt=selected(), {base,addons,total}=calc();
 if(!base){alert('Silakan pilih paket utama.');return}
 const payload={customer_name:document.getElementById('custName').value.trim()||'Pelanggan',customer_phone:document.getElementById('custPhone').value.trim(),location:document.getElementById('custLocation').value.trim()||'Hotel / Alamat Pribadi',service_id:Number(opt.value),addon_ids:addons.map(x=>Number(x.value))};
 try{
  const res=await fetch(@json(route('orders.store')),{method:'POST',headers:{'Content-Type':'application/json','X-CSRF-TOKEN':csrf,'Accept':'application/json'},body:JSON.stringify(payload)});
  const data=await res.json(); if(!res.ok) throw new Error(data.message||'Gagal menyimpan pesanan');
  const msg=`Halo ${@json($settings['site_name'] ?? 'Global Massage')}, saya ingin melakukan pemesanan:%0A%0A*Order ID:* ${data.order_number}%0A*Nama:* ${encodeURIComponent(payload.customer_name)}%0A*Lokasi:* ${encodeURIComponent(payload.location)}%0A*Paket:* ${encodeURIComponent(opt.dataset.name)}%0A*Add-ons:* ${encodeURIComponent(addons.map(x=>x.parentElement.innerText.trim()).join(', ')||'Tidak ada')}%0A*Total:* ${encodeURIComponent(idr(total))}`;
  window.open(`https://wa.me/${waNumber}?text=${msg}`,'_blank');
 }catch(e){alert(e.message)}
}
document.getElementById('mobileMenuBtn')?.addEventListener('click',()=>document.getElementById('mobileMenu').classList.toggle('hidden'));
</script>
</body></html>
