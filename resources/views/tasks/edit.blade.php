@extends('layouts.app')

@section('title', 'Editar Tarefa')

@section('content')
<div class="flex min-h-screen bg-gray-100">

    @include('partials.sidebar')

    <div class="flex-1 p-8 flex items-center justify-center">

        <div class="w-full max-w-2xl mb-15">

            <h1 class="text-3xl font-bold text-gray-800 mb-8">
                Editar Tarefa
            </h1>

            <form action="{{ route('tasks.update' , $task->id) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')
                <div>
                    <label class="text-sm font-medium text-gray-600">Título</label>

                    <input type="text"
                           required
                           name="title"
                           value="{{ old('title', $task->title) }}"
                           maxlength="100"
                           placeholder="Ex: Finalizar projeto"
                           class="w-full mt-2 px-4 py-3 border rounded-lg bg-white focus:outline-none
                           @error('title') border-red-500 @else focus:border-blue-600 @enderror">

                    <div class="mt-2 min-h-5 text-sm">
                        @error('title')
                            <div class="text-red-500 flex items-center gap-1">
                                <i class="fa-solid fa-circle-exclamation text-xs"></i>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div>
                    <label class="text-sm font-medium text-gray-600">Descrição</label>

                    <textarea name="description"
                              rows="4"
                              placeholder="Detalhes da tarefa..."
                              class="w-full mt-2 px-4 py-3 border rounded-lg bg-white focus:outline-none
                              @error('description') border-red-500 @else focus:border-blue-600 @enderror">{{ old('description', $task->description) }}</textarea>

                    <div class="mt-2 min-h-5 text-sm">
                        @error('description')
                            <div class="text-red-500 flex items-center gap-1">
                                <i class="fa-solid fa-circle-exclamation text-xs"></i>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                    <div>
                        <label class="text-sm font-medium text-gray-600">Data de entrega</label>

                        <input type="date"
                               name="due_date"
                               value="{{ old('due_date', $task->due_date) }}"
                               class="w-full mt-2 px-4 py-3 border rounded-lg bg-white focus:outline-none
                               @error('due_date') border-red-500 @else focus:border-blue-600 @enderror">

                        <div class="mt-2 min-h-5 text-sm">
                            @error('due_date')
                                <div class="text-red-500 flex items-center gap-1">
                                    <i class="fa-solid fa-circle-exclamation text-xs"></i>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <label class="text-sm font-medium text-gray-600">Prioridade</label>

                        <select name="priority"
                                required
                                class="w-full mt-2 px-4 py-3 border rounded-lg bg-white focus:outline-none
                                @error('priority') border-red-500 @else focus:border-blue-600 @enderror">

                                <option value="low" {{ old('priority', $task->priority) == 'low' ? 'selected' : '' }}>Baixa</option>
                                <option value="medium" {{ old('priority', $task->priority) == 'medium' ? 'selected' : '' }}>Média</option>
                                <option value="high" {{ old('priority', $task->priority) == 'high' ? 'selected' : '' }}>Alta</option>
                        </select>

                        <div class="mt-2 min-h-5 text-sm">
                            @error('priority')
                                <div class="text-red-500 flex items-center gap-1">
                                    <i class="fa-solid fa-circle-exclamation text-xs"></i>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                </div>

                <button type="submit"
                        class="w-full bg-linear-to-r from-blue-600 to-indigo-600 text-white py-3 rounded-lg font-semibold hover:opacity-90 transition">
                    Editar Tarefa
                </button>

            </form>

        </div>

    </div>

</div>
@endsection