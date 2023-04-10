<x-app title="Usuário" :backTo="route('users.index')">
  <x-slot name="rightHeaderSection">
    <div class="d-flex gap-3">
      <x-icon-link
        class="fs-5 text-white"
        :href="route('users.edit', $user->id)"
        icon="pencil-fill"
        tooltip="Editar Usuário" />

        <button type="button" class="btn border-0 p-0" data-bs-toggle="modal" data-bs-target="#deleteModal" title="Excluir Usuário">
          <i class="bi bi-trash-fill fs-5 text-white"></i>
        </button>
    </div>
  </x-slot>

  <div class="d-flex flex-column gap-2">
    <x-input-field
      type="text"
      icon="person-fill"
      label="Nome"
      :value="$user->name"
      :readonly="true" />

    <x-input-field
      type="text"
      label="Unidade"
      icon="buildings-fill"
      :value="$unity"
      :readonly="true" />

    <x-input-field
      type="text"
      label="Tipo"
      icon="gear-fill"
      :value="$role"
      :readonly="true" />
  </div>

  <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5 text-center w-100" id="deleteModalLabel">Excluir Usuário</h1>
        </div>
        <div class="modal-body">
          <p class="text-center mb-1">Deseja excluir o usuário "{{ $user->name }}"?</p>
          <small class="text-center d-block">(Essa ação não pode ser desfeita)</small>
        </div>
        <div class="modal-footer flex-nowrap">
          <button type="button" class="btn btn-secondary w-100" data-bs-dismiss="modal">Cancelar</button>
          <form class="w-100" action="{{ route('users.destroy', $user->id) }}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger w-100">Excluir</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</x-app>
