@extends('layouts.app')
@section('title', 'Login')

@section('content')
@if(session('success'))
    <div id="toast"
         class="fixed top-5 left-5 z-50 bg-blue-500 text-white px-5 py-3 rounded-lg shadow-lg flex items-center gap-2">
        <i class="fa-solid fa-circle-check"></i>
        <span>{{ session('success') }}</span>
    </div>

    <script>
        setTimeout(() => {
            const toast = document.getElementById('toast');
            if (toast) {
                toast.style.transition = 'all 0.5s ease';
                toast.style.opacity = '0';
                toast.style.transform = 'translateY(-10px)';

                setTimeout(() => toast.remove(), 500);
            }
        }, 3000);
    </script>
@endif
<div class="flex flex-col md:flex-row min-h-screen">

    <!-- Apresentação -->
    <div class="w-full md:w-1/2 relative flex items-center justify-center p-10 bg-linear-to-br from-blue-600 to-indigo-700 text-white">
        <div class="absolute inset-0 bg-black/20"></div>

        <div class="relative max-w-lg">
            <h1 class="text-4xl md:text-4xl font-bold mb-6 leading-tight">
                Bem-vindo(a) de volta!
            </h1>

            <p class="text-lg mb-6 text-white/90">
                Acesse sua conta para continuar gerenciando suas tarefas e aproveitar todos os recursos da plataforma.
            </p>

            <div class="space-y-4">
                <div class="flex items-center gap-3">
                    <i class="fa-solid fa-bolt text-green-300"></i>
                    <span>Acesso rápido e seguro</span>
                </div>
                <div class="flex items-center gap-3">
                    <i class="fa-solid fa-shield-halved text-green-300"></i>
                    <span>Seus dados protegidos</span>
                </div>
                <div class="flex items-center gap-3">
                    <i class="fa-solid fa-user-check text-green-300"></i>
                    <span>Continue de onde parou</span>
                </div>
            </div>
        </div>
    </div>

    <div class="w-full md:w-1/2 flex items-center justify-center bg-gray-100 p-8">

        <div class="w-full max-w-md">
            <h2 class="text-3xl font-bold mb-8 text-gray-800">
                Entrar na conta
            </h2>

            <form class="space-y-6" action="{{ route('login.store') }}" method="POST">
                @csrf

                <div>
                    <label class="text-sm font-medium text-gray-600">E-mail</label>

                    <div class="relative mt-2">
                        <i class="fa-solid fa-envelope absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>

                        <input 
                            required
                            type="email"
                            name="email"
                            placeholder="seu@email.com"
                            value="{{ old('email') }}"
                            class="w-full pl-10 pr-3 py-3 border-b bg-transparent focus:outline-none
                            @error('email') border-red-500 @else focus:border-blue-600 @enderror"
                        >
                    </div>

                    <div class="mt-2 min-h-5 text-sm">
                        @error('email')
                            <div class="text-red-500 flex items-center gap-1">
                                <i class="fa-solid fa-circle-exclamation text-xs"></i>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div>
                    <label class="text-sm font-medium text-gray-600">Senha</label>

                    <div class="relative mt-2">
                        <i class="fa-solid fa-lock absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>

                        <input 
                            required
                            type="password"
                            name="password"
                            placeholder="Digite sua senha"
                            class="w-full pl-10 pr-3 py-3 border-b bg-transparent focus:outline-none
                            @error('password') border-red-500 @else focus:border-blue-600 @enderror"
                        >
                    </div>

                    <div class="mt-2 min-h-5 text-sm">
                        @error('password')
                            <div class="text-red-500 flex items-center gap-1">
                                <i class="fa-solid fa-circle-exclamation text-xs"></i>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="flex items-center justify-between text-sm">
                    <label class="flex items-center gap-2 text-gray-600">
                        <input type="checkbox" name="remember" value="1" class="rounded border-gray-300">
                        Lembrar de mim
                    </label>
                </div>

                <button type="submit"
                    class="w-full mt-4 bg-linear-to-r from-blue-600 to-indigo-600 text-white py-3 rounded-lg font-semibold hover:opacity-90 transition">
                    Entrar
                </button>

                <p class="text-sm text-center text-gray-600 mt-4">
                    Não tem uma conta?
                    <a href="{{ route('register.create') }}" class="text-blue-600 font-medium hover:underline">
                        Criar agora
                    </a>
                </p>

            </form>
        </div>

    </div>

</div>
@endsection