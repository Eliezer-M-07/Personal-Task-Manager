@extends('layouts.app')
@section('title', 'Registrar-se')

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
            <h1 class="text-4xl md:text-5xl font-bold mb-6 leading-tight">
                Bem-vindo(a)!
            </h1>

            <p class="text-lg mb-6 text-white/90">
                Gerencie suas tarefas, acompanhe suas informações e aproveite todos os recursos da plataforma.
            </p>

            <div class="space-y-4">
                <div class="flex items-center gap-3">
                    <i class="fa-solid fa-check-circle text-green-300"></i>
                    <span>Cadastro rápido e simples</span>
                </div>
                <div class="flex items-center gap-3">
                    <i class="fa-solid fa-lock text-green-300"></i>
                    <span>Seus dados protegidos</span>
                </div>
                <div class="flex items-center gap-3">
                    <i class="fa-solid fa-bolt text-green-300"></i>
                    <span>Acesso imediato após cadastro</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Formulário SEM CARD -->
    <div class="w-full md:w-1/2 flex items-center justify-center bg-gray-100 p-8">

        <div class="w-full max-w-md">
            <h2 class="text-3xl font-bold mb-8 text-gray-800">
                Criar Conta
            </h2>

            <form class="space-y-4" action="{{ route('register.store') }}" method="POST">
                @csrf

                <div>
                    <label class="text-sm font-medium text-gray-600">Nome</label>

                    <div class="relative mt-2">
                        <i class="fa-solid fa-user absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>

                        <input 
                            required
                            type="text"
                            name="name"
                            placeholder="Seu nome completo"
                            value="{{ old('name') }}"
                            class="w-full pl-10 pr-3 py-3 border-b bg-transparent focus:outline-none
                            @error('name') border-red-500 @else focus:border-blue-600 @enderror"
                        >
                    </div>

                    <div class="mt-2 min-h-5 text-sm">
                        @error('name')
                            <div class="text-red-500 flex items-center gap-1">
                                <i class="fa-solid fa-circle-exclamation text-xs"></i>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

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
                            placeholder="Crie uma senha segura"
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


                <div>
                    <label class="text-sm font-medium text-gray-600">Confirmar Senha</label>

                    <div class="relative mt-2">
                        <i class="fa-solid fa-key absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>

                        <input 
                            type="password"
                            name="password_confirmation"
                            placeholder="Repita sua senha"
                            class="w-full pl-10 pr-3 py-3 border-b border-gray-400 bg-transparent focus:outline-none focus:border-blue-600"
                        >
                    </div>

                </div>

                <!-- Botão -->
                <button type="submit"
                    class="w-full mt-6 bg-linear-to-r from-blue-600 to-indigo-600 text-white py-3 rounded-lg font-semibold hover:opacity-90 transition">
                    Criar Conta
                </button>

                
                <p class="text-sm text-center text-gray-600 mt-3">
                    Já tem uma conta?
                    <a href="{{ route('login') }}" class="text-blue-600 font-medium hover:underline">
                        Faça login
                    </a>
                </p>
            </form>
        </div>

    </div>

</div>
@endsection