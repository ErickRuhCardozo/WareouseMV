<x-app title="Unidade" :backTo="route('unities.index')">
  <x-slot name="rightHeaderSection">
    <div class="d-flex gap-3">
      <x-icon-link
        class="fs-5 text-white"
        :href="route('unities.edit', $unity->id)"
        icon="pencil-fill"
        tooltip="Editar Unidade" />

        <button type="button" class="btn border-0 p-0" data-bs-toggle="modal" data-bs-target="#deleteModal" title="Excluir Unidade">
          <i class="bi bi-trash-fill fs-5 text-white"></i>
        </button>
    </div>
  </x-slot>

  <x-input-field
    type="text"
    icon="buildings-fill"
    label="Nome"
    :value="$unity->name"
    :readonly="true" />

  <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5 text-center w-100" id="deleteModalLabel">Excluir Unidade</h1>
        </div>
        <div class="modal-body">
          <p class="text-center mb-1">Deseja excluir a unidade "{{ $unity->name }}"?</p>
          <small class="text-center d-block">(Essa ação não pode ser desfeita)</small>
        </div>
        <div class="modal-footer flex-nowrap">
          <button type="button" class="btn btn-secondary w-100" data-bs-dismiss="modal">Cancelar</button>
          <form class="w-100" action="{{ route('unities.destroy', $unity->id) }}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger w-100">Excluir</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</x-app>
