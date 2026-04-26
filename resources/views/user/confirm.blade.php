@extends('layouts.app')

@section('title', 'Excluir Conta')

@section('content')
<div class="flex min-h-screen bg-gray-100">

    @include('partials.sidebar')

    <div class="flex-1 p-8 flex items-center justify-center">

        <div class="w-full max-w-2xl">

            <div class="bg-white rounded-xl shadow-sm p-8 border border-red-200">

                <div class="flex items-center gap-3 mb-4 text-red-600">
                    <i class="fa-solid fa-triangle-exclamation text-2xl"></i>
                    <h1 class="text-2xl font-bold">
                        Excluir conta
                    </h1>
                </div>

                <p class="text-gray-600 mb-6 leading-relaxed">
                    Esta ação é <span class="font-semibold text-red-600">irreversível</span>.
                    Ao excluir sua conta, todos os seus dados, incluindo tarefas e informações,
                    serão permanentemente removidos do sistema.
                </p>

                <div class="bg-red-50 border border-red-100 text-red-600 p-4 rounded-lg mb-6 text-sm">
                    <i class="fa-solid fa-circle-info mr-1"></i>
                    Recomendamos que você revise antes de continuar.
                </div>

                <form action="{{ route('user.delete') }}" method="POST" class="space-y-4">
                    @csrf
                    @method('DELETE')

                    <div>
                        <label class="text-sm text-gray-600">
                            Digite sua senha para confirmar
                        </label>

                        <input type="password"
                               name="password"
                               placeholder="Sua senha"
                               class="@error('email') border-red-500 @else focus:border-blue-600 @enderror w-full mt-2 px-4 py-3 border rounded-lg focus:outline-none">
                    <div class="mt-2 min-h-5 text-sm">
                        @error('email')
                            <div class="text-red-500 flex items-center gap-1">
                                <i class="fa-solid fa-circle-exclamation text-xs"></i>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    </div>
                    <div class="flex items-center justify-between mt-6">

                        <a href="{{ route('tasks.index') }}"
                           class="text-gray-600 hover:text-gray-800">
                            Cancelar
                        </a>

                        <button type="submit"
                                class="flex items-center gap-2 bg-red-600 text-white px-5 py-3 rounded-lg hover:bg-red-700 transition">
                            <i class="fa-solid fa-trash"></i>
                            Excluir minha conta
                        </button>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection