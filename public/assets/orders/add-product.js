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
  newItem.focus();
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

