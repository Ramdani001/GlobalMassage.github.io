@extends('layouts.admin') 
@section('title','Konten Landing Page') 
@section('heading','Manajemen Konten Landing Page')
@section('content')
<div class="mb-6 text-sm text-gray-400">Kelola teks, tombol, gambar, dan status tampil untuk setiap bagian halaman utama. Perubahan langsung diterapkan setelah disimpan.</div>
<div class="space-y-6">
    @foreach($sections as $section)
    <form method="POST" enctype="multipart/form-data" action="{{ route('admin.sections.update',$section) }}" class="glass-panel rounded-2xl p-6">
        @csrf @method('PUT')
        <div class="flex flex-wrap items-center justify-between gap-3 mb-5">
            <div>
                <h2 class="text-lg font-bold">{{ $section->label }}</h2>
                <p class="text-xs text-gray-500">Key: {{ $section->section_key }}</p></div><label class="flex items-center gap-2 text-sm"><input type="checkbox" name="is_visible" value="1" @checked($section->is_visible)> Tampilkan section</label>
            </div>
            <div class="grid md:grid-cols-2 gap-4"><div><label class="block text-sm mb-2">Eyebrow / Label Kecil</label>
            <input name="eyebrow" value="{{ old('eyebrow',$section->eyebrow) }}" class="w-full bg-brand-darkBg border border-brand-borderDark rounded-xl p-3"></div><div><label class="block text-sm mb-2">Judul Section</label><input name="title" value="{{ old('title',$section->title) }}" class="w-full bg-brand-darkBg border border-brand-borderDark rounded-xl p-3"></div>
                <div class="md:col-span-2"><label class="block text-sm mb-2">Subjudul</label>
                <input name="subtitle" value="{{ old('subtitle',$section->subtitle) }}" class="w-full bg-brand-darkBg border border-brand-borderDark rounded-xl p-3">
                </div>
                <div class="md:col-span-2">
                    <label class="block text-sm mb-2">Deskripsi</label>
                    <textarea name="description" rows="3" class="w-full bg-brand-darkBg border border-brand-borderDark rounded-xl p-3">{{ old('description',$section->description) }}</textarea>
                </div>
                <div class="md:col-span-2"><label class="block text-sm mb-2">Konten Tambahan</label><textarea name="body" rows="2" class="w-full bg-brand-darkBg border border-brand-borderDark rounded-xl p-3">{{ old('body',$section->body) }}</textarea></div><div><label class="block text-sm mb-2">Teks Tombol Utama</label><input name="primary_cta_text" value="{{ old('primary_cta_text',$section->primary_cta_text) }}" class="w-full bg-brand-darkBg border border-brand-borderDark rounded-xl p-3"></div><div><label class="block text-sm mb-2">URL Tombol Utama</label><input name="primary_cta_url" value="{{ old('primary_cta_url',$section->primary_cta_url) }}" class="w-full bg-brand-darkBg border border-brand-borderDark rounded-xl p-3"></div><div><label class="block text-sm mb-2">Teks Tombol Kedua</label><input name="secondary_cta_text" value="{{ old('secondary_cta_text',$section->secondary_cta_text) }}" class="w-full bg-brand-darkBg border border-brand-borderDark rounded-xl p-3"></div><div><label class="block text-sm mb-2">URL Tombol Kedua</label><input name="secondary_cta_url" value="{{ old('secondary_cta_url',$section->secondary_cta_url) }}" class="w-full bg-brand-darkBg border border-brand-borderDark rounded-xl p-3">
                </div>
                <div class="md:col-span-2">
                        @if($section->image_path)<img src="{{ asset('storage/'.$section->image_path) }}" class="mt-3 h-36 w-56 object-cover rounded-xl">
                        <label class="mt-2 flex items-center gap-2 text-sm">
                            <input type="checkbox" name="remove_image" value="1"> Hapus gambar</label>@endif</div>
                        </div>
                        <div class="mt-5 flex justify-end">
                            <button class="bg-brand-pink rounded-xl px-6 py-3 font-semibold">Simpan {{ $section->label }}</button></div>
                        </form>
                        @endforeach</div>
    @endsection
