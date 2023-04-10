<x-app title="Pedidos" :backTo="route('home')">
  <x-slot name="rightHeaderSection">
    <div class="d-flex gap-3">
      <x-icon-link
        class="fs-4 text-white"
        :href="route('orders.create')"
        icon="plus-lg"
        tooltip="Fazer Pedido" />
    </div>
  </x-slot>

  <ul class="list-group">
    @forelse ($orders as $order)
      <button class="list-group-item list-group-item-action d-flex justify-content-between" onclick="location.assign(`{{ route('orders.show', $order->id) }}`)">
        <span>{{ $order->requester->unity->name }}</span>
        <span>{{ Str::title($order->date->translatedFormat('l, d/m/Y')) }}</span>
      </button>
    @empty
      <p class="text-center lead">Nenhum Pedido Cadastrado</p>
    @endforelse
  </ul>
</x-app>
