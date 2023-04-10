<x-app title="Pedido" :backTo="route('orders.index')">
  <x-slot name="rightHeaderSection">
    <div class="d-flex gap-3">
      @can('viewAny', \App\Models\Order::class)
        <x-icon-link
          class="fs-4 text-white"
          :href="route('orders.edit', $order->id)"
          icon="pencil-fill" />
      @endcan
      <button type="button" class="btn border-0 p-0" data-bs-toggle="modal" data-bs-target="#deleteModal" title="Excluir Pedido">
        <i class="bi bi-trash-fill fs-5 text-white"></i>
      </button>
    </div>
  </x-slot>

  <div class="d-flex flex-column gap-2">
    <x-input-field 
      type="text"
      icon="person-fill"
      label="Solicitante"
      :value="$requester"
      :readonly="true" />
  
    <x-input-field
      type="text"
      icon="calendar-fill"
      label="Data do Pedido"
      :value="$date" />

    <p class="lead fw-bold mt-2 mb-0">Produtos:</p>

    <ul class="list-group">
      @forelse ($products as $product)
        <button class="list-group-item list-group-item-action text-center" onclick="location.assign(`{{ route('products.show', ['product' => $product->id, 'backTo' => route('orders.show', $order->id)]) }}`)">{{ $product?->name ?? 'Produto não Encontrado' }}</button>
      @empty
        <span class="lead">Nenhum Produto</span>
      @endforelse
    </ul>
  </div>

  <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5 text-center w-100" id="deleteModalLabel">Excluir Pedido</h1>
        </div>
        <div class="modal-body">
          <p class="text-center mb-1">Deseja excluir esse pedido?</p>
          <small class="text-center d-block">(Essa ação não pode ser desfeita)</small>
        </div>
        <div class="modal-footer flex-nowrap">
          <button type="button" class="btn btn-secondary w-100" data-bs-dismiss="modal">Cancelar</button>
          <form class="w-100" action="{{ route('orders.destroy',$order->id) }}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger w-100">Excluir</button>
          </form>
      </div>
    </div>
  </div>
</x-app>
