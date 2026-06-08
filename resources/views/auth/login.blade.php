@extends('layouts.app')

@section('content')
    <div class="min-h-screen flex items-center justify-center py-20 relative overflow-hidden">
        <!-- decorative blobs -->
        <div class="absolute -top-20 -left-20 w-72 h-72 bg-indigo-400 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob"></div>
        <div class="absolute -bottom-20 -right-20 w-72 h-72 bg-purple-400 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob animation-delay-2000"></div>

        <div class="w-full max-w-md">
            <div class="glass border border-white/20 rounded-[2rem] p-8 shadow-xl">
                <div class="flex flex-col items-center mb-6">
                    <div class="w-16 h-16 bg-indigo-600 rounded-xl flex items-center justify-center text-white font-bold text-xl mb-3">AH</div>
                    <h1 class="text-2xl font-extrabold text-slate-900">Masuk ke AmikomEventHub</h1>
                    <p class="text-sm text-slate-500">Masukkan email dan kata sandi untuk melanjutkan</p>
                </div>

                @if($errors->any())
                    <div class="mb-4 p-3 rounded-lg bg-red-50 border border-red-100 text-red-700">
                        <ul class="list-disc pl-5 text-sm">
                            @foreach($errors->all() as $err)
                                <li>{{ $err }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('admin.login.post') }}" method="POST" class="space-y-4">
                    @csrf

                    <div>
                        <label for="email" class="block text-sm font-medium text-slate-700 mb-2">Email</label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-3 flex items-center text-slate-400"><i class="fa-regular fa-envelope"></i></span>
                            <input id="email" name="email" type="email" required value="{{ old('email') }}"
                                class="w-full rounded-xl border border-slate-200 bg-white/60 px-12 py-3 text-slate-900 placeholder-slate-400 focus:border-indigo-600 focus:outline-none focus:ring-2 focus:ring-indigo-600/20" 
                                placeholder="contoh@domain.com">
                        </div>
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-medium text-slate-700 mb-2">Kata Sandi</label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-3 flex items-center text-slate-400"><i class="fa-solid fa-lock"></i></span>
                            <input id="password" name="password" type="password" required
                                class="w-full rounded-xl border border-slate-200 bg-white/60 px-12 py-3 text-slate-900 placeholder-slate-400 focus:border-indigo-600 focus:outline-none focus:ring-2 focus:ring-indigo-600/20"
                                placeholder="Masukkan kata sandi">
                        </div>
                    </div>

                    <div class="flex items-center justify-between text-sm text-slate-600">
                        <label class="flex items-center gap-2">
                            <input type="checkbox" name="remember" class="w-4 h-4 rounded" />
                            <span>Ingat saya</span>
                        </label>
                        <a href="#" class="text-indigo-600 font-medium">Lupa kata sandi?</a>
                    </div>

                    <button type="submit" 
                        class="w-full rounded-2xl bg-indigo-600 text-white font-semibold px-4 py-3 hover:bg-indigo-700 transition-colors duration-200 shadow-lg">
                        Masuk
                    </button>
                </form>

                <div class="mt-6 text-center text-sm text-slate-600">
                    Belum punya akun?
                    <a href="#" class="text-indigo-600 font-semibold">Daftar sekarang</a>
                </div>
            </div>
        </div>
    </div>
@endsection
