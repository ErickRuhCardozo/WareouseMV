<x-app title="DML Melhor Viver">
  <form method="POST" action="{{ route('authenticate') }}">
    @csrf

    <x-input-field
      class="mb-2"
      type="text"
      icon="person-fill"
      label="Usuário"
      id="usernameField"
      name="user"
      :suggestions="$userNames"
      :value="old('user') ?? ''"
      :error="$errors->has('user') ? $errors->get('user')[0] : ''" />

    <x-password-field 
      label="Senha"
      :error="$errors->has('password') ? $errors->get('password')[0] : ''" />

    <input class="btn btn-success w-100 mt-4" type="submit" value="Entrar" />
  </form>
</x-app>
