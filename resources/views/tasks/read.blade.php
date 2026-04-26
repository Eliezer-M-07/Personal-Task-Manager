@extends('layouts.app')

@section('title', 'Detalhes da Tarefa')

@section('content')
@if(session('success'))
    <div id="toast"
         class="fixed top-5 right-5 z-50 bg-blue-500 text-white px-5 py-3 rounded-lg shadow-lg flex items-center gap-2 animate-slide-in">

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
<div class="flex min-h-screen bg-gray-100">

    @include('partials.sidebar')

    <div class="flex-1 p-8 flex items-center justify-center">

        <div class="w-full max-w-3xl">

            <div class="bg-white rounded-xl shadow-sm p-8 hover:shadow-md transition">

            <div class="flex items-start justify-between mb-4">

            <h1 class="text-3xl font-bold text-gray-800 pr-4">
                {{ $task->title }}
            </h1>

            <span class="text-xs px-3 py-1 rounded-full font-medium whitespace-nowrap
                @if($task->priority == 'high') bg-red-100 text-red-600
                @elseif($task->priority == 'medium') bg-yellow-100 text-yellow-700
                @else bg-green-100 text-green-700 @endif">
                {{ ucfirst($task->priority) }}
            </span>

            </div>

                <div class="flex items-center justify-between mb-6">

                    <div class="flex items-center gap-2 text-sm text-gray-500">
                        <i class="fa-regular fa-calendar"></i>

                        @if($task->due_date)
                            {{ \Carbon\Carbon::parse($task->due_date)->format('d/m/Y') }}
                        @else
                            Sem data definida
                        @endif
                    </div>

                    <span class="text-xs px-3 py-1 rounded-full font-medium
                        {{ $task->is_completed ? 'bg-green-200 text-green-700' : 'bg-yellow-200 text-yellow-700' }}">
                        {{ $task->is_completed ? 'Concluída' : 'Pendente' }}
                    </span>

                </div>

                <div class="text-gray-600 text-base leading-relaxed mb-10">
                    {{ $task->description ?? 'Sem descrição adicionada.' }}
                </div>

                <div class="flex items-center justify-between border-t pt-6">

                <a href="{{ route('tasks.edit', $task->id) }}"
                class="flex items-center gap-2 text-blue-600 hover:text-blue-800 font-medium">
                    <i class="fa-solid fa-pen-to-square"></i>
                    Editar
                </a>

                <div class="flex items-center gap-4">
                    <form action="{{ route('tasks.toggle', $task->id) }}" method="POST">
                        @csrf

                        <button type="submit"
                                class="cursor-pointer flex items-center gap-2 font-medium
                                {{ $task->is_completed ? 'text-yellow-600 hover:text-yellow-700' : 'text-green-600 hover:text-green-700' }}">

                            @if($task->is_completed)
                                <i class="fa-solid fa-rotate-left"></i>
                                Reabrir
                            @else
                                <i class="fa-solid fa-check"></i>
                                Concluir
                            @endif

                        </button>
                    </form>

                    <form action="{{ route('tasks.destroy', $task->id) }}" method="POST">
                        @csrf
                        @method('DELETE')

                        <button type="submit"
                                class="cursor-pointer flex items-center gap-2 text-red-600 hover:text-red-700 font-medium">
                            <i class="fa-solid fa-trash"></i>
                            Excluir
                        </button>
                    </form>

                </div>

            </div>

            </div>

        </div>

    </div>

</div>
@endsection