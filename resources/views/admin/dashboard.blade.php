@extends('layouts.admin') @section('title','Overview & Statistics') @section('heading','Overview & Statistics')
@section('content')
<div class="grid sm:grid-cols-2 xl:grid-cols-4 gap-5 mb-8">
@foreach([['Total Est. Pendapatan',money($revenue),'fa-wallet'],['Total Pesanan',$orderCount.' Orders','fa-bag-shopping'],['Layanan Aktif',$activeServices.' Items','fa-list-check'],['WhatsApp Contact',$settings['whatsapp_number'] ?? '-','fa-whatsapp']] as $s)
<div class="glass-panel rounded-2xl p-6"><p class="text-xs text-gray-400 uppercase">{{ $s[0] }}</p><h2 class="font-serif text-2xl font-bold mt-2">{{ $s[1] }}</h2><i class="fa-solid {{ $s[2] }} text-brand-pink text-xl mt-4"></i></div>
@endforeach
</div>
<div class="glass-panel rounded-2xl p-6"><div class="flex justify-between mb-5"><div><h2 class="font-serif text-xl font-bold">Pesanan Masuk Terbaru</h2><p class="text-xs text-gray-400">Log pemesanan dari form landing page</p></div><a class="text-brand-pink text-sm" href="{{ route('admin.orders.index') }}">Lihat Semua Log</a></div>
<div class="overflow-x-auto"><table class="w-full text-sm text-left"><thead class="text-gray-400 border-b border-brand-borderDark"><tr><th class="p-3">Order ID</th><th class="p-3">Pelanggan</th><th class="p-3">Paket</th><th class="p-3">Add-ons</th><th class="p-3">Lokasi</th><th class="p-3">Total</th><th class="p-3">Status</th></tr></thead><tbody>@forelse($orders as $order)<tr class="border-b border-brand-borderDark/50"><td class="p-3 text-brand-pink">{{ $order->order_number }}</td><td class="p-3">{{ $order->customer_name }}</td><td class="p-3">{{ $order->service_name }}</td><td class="p-3">{{ $order->addons->pluck('name')->join(', ') ?: '-' }}</td><td class="p-3">{{ $order->location }}</td><td class="p-3">{{ money($order->total) }}</td><td class="p-3">{{ $order->status }}</td></tr>@empty<tr><td colspan="7" class="p-5 text-center text-gray-500">Belum ada pesanan.</td></tr>@endforelse</tbody></table></div></div>
@endsection
