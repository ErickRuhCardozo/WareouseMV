<x-app>
  <x-slot name="leftHeaderSection">
    <span>Olá {{ auth()->user()->name }}</span>
  </x-slot>
  
  <x-slot name="rightHeaderSection">
    <form action="{{ route('logout') }}" method="POST">
      @csrf
      <button class="btn btn-sm btn-danger" type="submit" value="sair">
        <i class="bi bi-box-arrow-left me-1 align-text-top"></i>
        <span>Sair</span>
      </button>
    </form>
  </x-slot>

  <div class="d-flex flex-column gap-2">
    @can ('viewAny', \App\Models\Unity::class)
      <x-icon-link
        href="{{ route('unities.index') }}"
        class="btn btn-primary"
        icon="buildings-fill"
        text="Unidades" />
    @endif

    @can ('viewAny', \App\Models\User::class)
      <x-icon-link
        href="{{ route('users.index') }}"
        class="btn btn-primary"
        icon="person-fill"
        text="Usuários" />
    @endif

    @can ('viewAny', \App\Models\Product::class)  
      <x-icon-link
        href="{{ route('products.index') }}"
        class="btn btn-primary"
        icon="box-fill"
        text="Produtos" />
    @endcan

    @can ('viewAny', \App\Models\Order::class)
      <x-icon-link
        href="{{ route('orders.index') }}"
        class="btn btn-primary"
        icon="list-check"
        text="Pedidos" />
    @endcan
  </div>
</x-app>
