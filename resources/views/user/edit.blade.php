@extends('layouts.app')

@section('title', 'Editar Perfil')

@section('content')
<div class="flex min-h-screen bg-gray-100">

    <!-- Sidebar -->
    @include('partials.sidebar')

    <!-- Conteúdo -->
    <div class="flex-1 p-8 flex items-center justify-center">

        <div class="w-full max-w-2xl mb-15">

            <h1 class="text-3xl font-bold text-gray-800 mb-8">
                Editar Perfil
            </h1>

            <form action="{{ route('user.update') }}" method="POST" class="space-y-6">
                @csrf

                <div>
                    <label class="text-sm font-medium text-gray-600"><i class="fa-solid fa-user text-gray-400"></i> Nome</label>

                    <input type="text"
                           name="name"
                           value="{{ $user->name }}"
                           class="w-full mt-2 px-4 py-3 border rounded-lg bg-white focus:outline-none
                           @error('name') border-red-500 @else focus:border-blue-600 @enderror">

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
                    <label class="text-sm font-medium text-gray-600"><i class="fa-solid fa-envelope text-gray-400"></i> E-mail</label>
                    
                    <input name="email"
                        type="email"
                        
                        value="{{ $user->email }}"
                            class="w-full mt-2 px-4 py-3 border rounded-lg bg-white focus:outline-none
                            @error('email') border-red-500 @else focus:border-blue-600 @enderror">
                        </input>

                    <div class="mt-2 min-h-5 text-sm">
                        @error('email')
                            <div class="text-red-500 flex items-center gap-1">
                                <i class="fa-solid fa-circle-exclamation text-xs"></i>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <!-- Botão -->
                <button type="submit"
                        class="w-full bg-linear-to-r from-blue-600 to-indigo-600 text-white py-3 rounded-lg font-semibold hover:opacity-90 transition">
                    Editar
                </button>

            </form>

        </div>

    </div>

</div>
@endsection