@extends('layouts.app')

@section('title', 'Tarefas')

@section('content')

@if(session('success'))
    <div id="toast"
         class="fixed top-5 right-5 z-50 bg-blue-500 text-white px-5 py-3 rounded-lg shadow-lg flex items-center gap-2">

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

    <!-- Sidebar -->
    @include('partials.sidebar')

    <!-- Conteúdo -->
    <div class="flex-1 p-8 flex flex-col">

        <!-- Header -->
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Minhas Tarefas</h1>
        </div>

        <!-- Conteúdo principal -->
        <div class="flex-1 flex flex-col">

            <!-- GRID -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                @forelse($tasks as $task)

                <div class="bg-white rounded-xl shadow-sm p-5 hover:shadow-md transition flex flex-col h-full">

                    <div>

                        <div class="flex items-start justify-between mb-2">

                            <h2 class="text-lg font-semibold pr-2 transition-all duration-300
                                {{ $task->is_completed 
                                    ? 'line-through text-gray-400' 
                                    : 'text-gray-800' }}">
                                {{ $task->title }}
                            </h2>

                            <div class="flex flex-col items-end gap-1">

                                <span class="text-xs px-2 py-1 rounded-full font-medium
                                    @if($task->priority == 'high') bg-red-100 text-red-600
                                    @elseif($task->priority == 'medium') bg-yellow-100 text-yellow-700
                                    @else bg-green-100 text-green-700 @endif">
                                    {{ ucfirst($task->priority) }}
                                </span>

                                @if($task->due_date)
                                    <span class="text-xs text-gray-500 flex items-center gap-1">
                                        <i class="fa-regular fa-calendar"></i>
                                        {{ \Carbon\Carbon::parse($task->due_date)->format('d/m/Y') }}
                                    </span>
                                @endif

                            </div>

                        </div>
                        <p class="text-gray-600 text-sm mb-4">
                            {{ \Illuminate\Support\Str::limit($task->description, 40) }}
                        </p>

                    </div>

                    <div class="mt-auto">
                        <div class="flex items-center justify-between mb-3">

                            <span class="text-xs px-3 py-1 rounded-full 
                                {{ $task->is_completed ? 'bg-green-300' : 'bg-yellow-300' }}">
                                {{ $task->is_completed ? 'Concluída' : 'Pendente' }}
                            </span>

                            <form action="{{ route('tasks.toggle', $task->id) }}" method="POST">
                                @csrf

                                <button type="submit"
                                        class="text-xs font-medium flex items-center gap-1 cursor-pointer
                                        {{ $task->is_completed 
                                            ? 'text-yellow-600 hover:text-yellow-700' 
                                            : 'text-green-600 hover:text-green-700' }}">

                                    @if($task->is_completed)
                                        <i class="fa-solid fa-rotate-left"></i>
                                        Reabrir
                                    @else
                                        <i class="fa-solid fa-check"></i>
                                        Concluir
                                    @endif

                                </button>
                            </form>

                        </div>

                        <div class="flex items-center justify-end gap-3 pt-3">

                            <a href="{{ route('tasks.show', $task->id) }}"
                               class="text-gray-500 hover:text-blue-600">
                                <i class="fa-solid fa-eye"></i>
                            </a>

                            <a href="{{ route('tasks.edit', $task->id) }}"
                               class="text-gray-500 hover:text-blue-600">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>

                            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST">
                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        class="text-gray-500 hover:text-red-600 cursor-pointer">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </form>

                        </div>

                    </div>

                </div>

                @empty
                    <div class="col-span-full text-center text-gray-500">
                        Nenhuma tarefa ativa.
                    </div>
                @endforelse

            </div>

            <div class="mt-auto pt-8 flex justify-center">
                <div class="bg-white px-4 py-2 rounded-lg shadow-sm">
                    {{ $tasks->links() }}
                </div>
            </div>

        </div>

    </div>

</div>

@endsection