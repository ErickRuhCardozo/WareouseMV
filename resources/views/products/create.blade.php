<x-app title="Cadastrar Produto" :backTo="route('products.index')">
  <form class="d-flex flex-column gap-2" action="{{ route('products.store') }}" method="POST">
    @csrf

    <x-input-field
      type="text"
      icon="box-fill"
      label="Nome do Produto"
      name="name"
      id="nameField"
      :autofocus="true"
      :value="old('name') ?? ''"
      :error="$errors->has('name') ? $errors->get('name')[0] : ''" />

    <x-input-field
      type="text"
      icon="upc"
      label="Código do Produto"
      name="code"
      id="codeField"
      :value="old('code') ?? ''"
      :error="$errors->has('code') ? $errors->get('code')[0] : ''" />

    <x-select-field
      label="Categoria do Produto"
      placeholder="Selecione uma Categoria"
      icon="tag-fill"
      name="category_id"
      id="categoryField"
      :options="$categories"
      :error="$errors->has('category_id') ? $errors->get('category_id')[0] : ''" />

    <input class="btn btn-success mt-2" type="submit" value="Cadastrar Produto">
  </form>
</x-app>
