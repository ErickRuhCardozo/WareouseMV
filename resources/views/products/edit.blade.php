<x-app title="Editar Produto" :backTo="route('products.show', $product->id)">
  <form class="d-flex flex-column gap-2" action="{{ route('products.update', $product->id) }}" method="POST">
    @csrf
    @method('PATCH')

    <x-input-field
      type="text"
      icon="box-fill"
      label="Nome do Produto"
      name="name"
      id="nameField"
      :autofocus="true"
      :value="old('name') ?? $product->name"
      :error="$errors->has('name') ? $errors->get('name')[0] : ''" />

    <x-input-field
      type="text"
      icon="upc"
      label="Código do Produto"
      name="code"
      id="codeField"
      :value="old('code') ?? $product->code"
      :error="$errors->has('code') ? $errors->get('code')[0] : ''" />

    <x-select-field
      label="Categoria do Produto"
      placeholder="Selecione uma Categoria"
      icon="tag-fill"
      name="category_id"
      id="categoryField"
      :options="$categories"
      :selectedLabel="$product->category?->name ?? ''"
      :error="$errors->has('category_id') ? $errors->get('category_id')[0] : ''" />

    <input class="btn btn-success mt-2" type="submit" value="Salvar Alterações">
  </form>
</x-app>
