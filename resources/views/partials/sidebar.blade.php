<div class="w-64 bg-white shadow-md p-6 hidden md:flex flex-col min-h-screen">

    <div>

        <h2 class="text-xl font-bold mb-8 text-gray-800">
           Gestão de Tarefas 
        </h2>

        <a href="{{ route('tasks.create') }}"
           class="flex items-center justify-start px-4 gap-2 border bg-blue-600 border-gray-300 text-white py-3 rounded-lg hover:bg-blue-800 transition mb-6">
            <i class="fa-solid fa-plus"></i>
            Nova Tarefa
        </a>

        <a href="{{ route('tasks.index') }}"
           class="flex items-center justify-start px-4 gap-2 border border-gray-300 text-gray-700 py-3 rounded-lg hover:bg-gray-100 transition mb-3">
            <i class="fa-solid fa-list-check"></i>
            Tarefas
        </a>

        <div class="mb-3">
            <button id="userDropdownBtn"
                    class="w-full flex items-center justify-between px-4 gap-2 border border-gray-300 text-gray-700 py-3 rounded-lg hover:bg-gray-100 transition">
                <span class="flex items-center gap-2">
                    <i class="fa-solid fa-user"></i>
                    Perfil
                </span>

                <i class="fa-solid fa-chevron-down text-xs"></i>
            </button>

            <div id="userDropdownMenu" class="mt-2 space-y-2 pl-2 hidden">

                <a href="{{ route('user.edit') }}"
                   class="flex items-center gap-2 text-gray-600 hover:text-blue-600 text-sm">
                    <i class="fa-solid fa-pen"></i>
                    Editar usuário
                </a>

                <a href="{{ route('user.confirm') }}"
                        class="cursor-pointer flex items-center gap-2 text-red-500 hover:text-red-600 text-sm" style="">
                    <i class="fa-solid fa-trash"></i>
                    Excluir conta
                </a>

            </div>
        </div>

    </div>

    <div class="mt-auto pt-6 border-t border-gray-200">
        <div class="px-1 mb-3 text-sm text-gray-500">
            <span class="font-semibold text-gray-800">
                {{ auth()->user()->name }}
            </span>
            <br>
            <span class="font-semibold text-sm text-gray-500">
                {{ auth()->user()->email }}
            </span>
        </div>

        <form action="{{ route('logout') }}" method="POST">
            @csrf

            <button type="submit"
                    class="cursor-pointer flex items-center gap-3 px-4 py-3 border border-gray-300 rounded-lg hover:bg-gray-100 transition w-full text-gray-700">
                <i class="fa-solid fa-right-from-bracket"></i>
                Sair
            </button>
        </form>
    </div>
</div>

<script>
    const btn = document.getElementById('userDropdownBtn');
    const menu = document.getElementById('userDropdownMenu');

    btn.addEventListener('click', () => {
        menu.classList.toggle('hidden');
    });

    document.addEventListener('click', (e) => {
        if (!btn.contains(e.target) && !menu.contains(e.target)) {
            menu.classList.add('hidden');
        }
    });
</script>