<x-app title="Fazer Pedido" :backTo="route('orders.index')">
  <datalist id="productsDatalist">
    @foreach ($products as $product)
      <option value="{{ $product->name }}">
    @endforeach
  </datalist>

  <form class="d-flex flex-column" action="{{ route('orders.store') }}" method="POST">
    @csrf
    
    <ul id="productsList" class="list-group gap-1">
      <template id="productTemplate">
        <div class="d-flex gap-2 align-items-center"> 
          <input class="form-control" type="text" name="products[]" placeholder="Produto" list="productsDatalist" autocomplete="off" />
          <button class="btn btn-sm btn-danger rounded-circle" type="button" style="height: 32px; width: 32px;" onclick="this.parentElement.remove()">
            <i class="bi bi-x-lg"></i>
          </button>
        </div>
      </template>
    </ul>

    <button class="btn btn-sm btn-primary ms-auto mt-2" type="button" onclick="addProduct()">
      <i class="bi bi-plus-lg"></i>
    </button>

    @if ($errors->has('products'))
      <div class="alert alert-danger text-center p-2 w-50 align-self-center">
        <span class="lead">Adicione Produtos ao Pedido</span>
      </div>
      @pushOnce('scripts')
        <script>
          setTimeout(() => {
            const alert = document.querySelector('.alert');
            alert.animate([
              { opacity: 1 },
              { opacity: 0 },
            ], {
              duration: 350,
              easing: 'ease-out',
              fill: 'forwards'
            }).onfinish = () => alert.remove();
          }, 2500);
        </script>
      @endPushOnce
    @endif

    <input class="btn btn-success mt-4" type="submit" value="Fazer Pedido" list="productsDatalist">
  </form>

  @pushOnce('scripts')
    <script>
      const productsList = document.getElementById('productsList');
      const itemTemplate = document.getElementById('productTemplate');
      const products = [
        @foreach ($products as $product)
          { id: {{ $product->id }}, name: `{!! $product->name !!}`, },
        @endforeach
      ];

      function addProduct() {
        const newItem = itemTemplate.content.firstElementChild.cloneNode(true);
        productsList.appendChild(newItem);
        newItem.querySelector('input').focus();
      }

      addEventListener('submit', (event) => {
        const inputs = document.querySelectorAll('input[name="products[]"]');
        inputs.forEach((input) => {
          const product = products.find((p) => p.name === input.value);
        
          if (product) {
            input.value = product.id;
          }
        });

        // event.preventDefault();
      });
    </script>
  @endPushOnce
</x-app>
