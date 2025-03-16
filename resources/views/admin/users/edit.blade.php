<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Gerenciar Usuários') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container">
            <h2 class="mb-4">Editar Usuário: {{ $user->name }}</h2>

            <!-- Exibe mensagens de erro -->
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
                    <form action="{{ route('users.update', $user->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- Nome -->
                        <div class="mb-3">
                            <label for="name" class="form-label">Nome</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $user->name) }}" required>
                        </div>

                        <!-- E-mail -->
                        <div class="mb-3">
                            <label for="email" class="form-label">E-mail</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $user->email) }}" required>
                        </div>

                        <!-- Papéis (Roles) -->
                        <div class="mb-3">
                            <label for="roles" class="form-label">Papéis</label>
                            <select name="role" id="roles" class="form-control" multiple>
                                @foreach ($roles as $role)
                                    <option value="{{ $role->id }}"
                                        @if($user->roles->contains($role)) selected @endif>
                                        {{ $role->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <button type="submit" class="btn btn-success">Salvar</button>
                        <a href="{{ route('users.index') }}" class="btn btn-secondary">Voltar</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>