<x-app title="Produtos Cadastrados" :backTo="route('home')">
  <x-slot name="rightHeaderSection">
    <x-icon-link
      class="text-white fs-4"
      :href="route('products.create')"
      icon="plus-lg"
      tooltip="Cadastrar Produto" />
  </x-slot>

  <ul class="list-group">
    @foreach ($products as $product)
      <button class="list-group-item list-group-item-action text-center" onclick="location.assign(`{{ route('products.show', $product->id) }}`)">{{ $product->name }}</button>
    @endforeach
  </ul>
</x-app>
