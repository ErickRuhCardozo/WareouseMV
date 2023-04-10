<x-app title="Editar Unidade" :backTo="route('unities.show', $unity->id)">
  <form action="{{ route('unities.update', $unity->id) }}" method="POST">
    @csrf
    @method('PATCH')

    <x-input-field
      type="text"
      icon="buildings-fill"
      label="Nome"
      id="nameField"
      name="name"
      :value="old('name') ?? $unity->name"
      :error="$errors->has('name') ? $errors->get('name')[0] : ''"
      :autofocus="true" />

    <input class="btn btn-success w-100 mt-4" type="submit" value="Alterar">
  </form>
</x-app>
