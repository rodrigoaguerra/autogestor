<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Gerenciar Permissões') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container">
            <h2 class="mb-4">Editar Perfil: {{ $role->name }}</h2>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="card">
                <div class="card-body">
                    <form action="{{ route('roles.update', $role->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="name" class="form-label">Nome do Perfil</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $role->name }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Permissões</label>
                            @foreach($permissions as $permission)
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" name="permissions[]" value="{{ $permission->name }}"
                                        @if($role->permissions->contains($permission)) checked @endif>
                                    <label class="form-check-label">{{ $permission->name }}</label>
                                </div>
                            @endforeach
                        </div>

                        <button type="submit" class="btn btn-success">Atualizar</button>
                        <a href="{{ route('roles.index') }}" class="btn btn-secondary">Voltar</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>