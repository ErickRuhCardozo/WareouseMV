<x-app title="Cadastrar Unidade" :backTo="route('unities.index')">
  <form action="{{ route('unities.store') }}" method="POST">
    @csrf

    <x-input-field
      type="text"
      icon="buildings-fill"
      label="Nome"
      id="nameField"
      name="name"
      :error="$errors->has('name') ? $errors->get('name')[0] : ''"
      :autofocus="true" />

    <input class="btn btn-success w-100 mt-4" type="submit" value="Cadastrar">
  </form>
</x-app>
