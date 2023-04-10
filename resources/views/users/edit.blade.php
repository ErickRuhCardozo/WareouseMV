<x-app title="Editar Usuário" :backTo="route('users.show', $user->id)">
  <form class="d-flex flex-column gap-2" action="{{ route('users.update', $user->id) }}" method="POST">
    @csrf
    @method('PATCH')

    <x-input-field
      type="text"
      icon="person-fill"
      label="Nome"
      id="nameField"
      name="name"
      :value="old('name') ?? $user->name"
      :error="$errors->has('name') ? $errors->get('name')[0] : ''"
      :autofocus="true" />

    <x-password-field
      label="Nova Senha (Deixe vazio para não alterar a senha atual"
      :error="$errors->has('password') ? $errors->get('password')[0] : ''" />

    <x-select-field
      label="Unidade"
      icon="buildings-fill"
      placeholder="Selecione a Unidade desse Usuário"
      name="unity_id"
      id="unitySelect"
      :options="$unities"
      :selectedLabel="$user->unity?->name"
      :error="$errors->has('unity_id') ? $errors->get('unity_id')[0] : ''" />

    <x-select-field
      label="Tipo"
      icon="gear-fill"
      placeholder="Selecione o Tipo desse Usuário"
      name="role_id"
      id="roleSelect"
      :options="$roles"
      :selectedLabel="$user->role->name"
      :error="$errors->has('role_id') ? $errors->get('role_id')[0] : ''" />

    <input class="btn btn-success w-100 mt-4" type="submit" value="Cadastrar">
  </form>
</x-app>


