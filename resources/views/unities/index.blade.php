<x-app title="Unidades Cadastradas" :backTo="route('home')">
  <x-slot name="rightHeaderSection">
    @can('create', \App\Models\Unity::class)
      <x-icon-link
        class="fs-4 text-white"
        :href="route('unities.create')"
        icon="plus-lg"
        tooltip="Cadastrar Unidade" />
    @endcan
  </x-slot>

  <ul class="list-group">
    @forelse ($unities as $unity)
      <button class="list-group-item list-group-item-dark list-group-item-action text-center" onclick="location.assign(`{{ route('unities.show', $unity->id) }}`)">{{ $unity->name }}</button>
    @empty
      <p class="lead text-center">Nenhuma Unidade Cadastrada</p>
    @endforelse
  </ul>
</x-app>
