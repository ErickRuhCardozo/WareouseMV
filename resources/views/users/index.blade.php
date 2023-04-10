<x-app title="Usuários Cadastrados" :backTo="route('home')">
  <x-slot name="rightHeaderSection">
    <div class="d-flex gap-3">
      <x-icon-link
        class="fs-4 text-white"
        :href="route('users.create')"
        icon="plus-lg"
        tooltip="Cadastrar Usuário" />

      <input type="checkbox" class="btn-check" id="btn-check-2" @if ($isFiltering) checked @endif autocomplete="off" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample" title="Limpar Filtros" title="Filtrar Usuários">
      <label class="btn btn-primary" for="btn-check-2" title="Filtrar Usuários">
        <i class="bi bi-funnel-fill"></i>
      </label>
    </div>
  </x-slot>
  
  <div class="collapse mb-2 @if ($isFiltering) show @endif" id="collapseExample">
    <div class="card card-body p-2">
      <div class="row g-2">
        <div class="col">
          <select class="form-select" onchange="onUnitySelected(this)">
            <option class="d-none">Filtrar por Unidade</option>
            @foreach ($unities as $unity)
              <option value="{{ $unity['value'] }}" @if ($unity['value'] == $unityId) selected @endif>{{ $unity['label'] }}</option>
            @endforeach
          </select>
        </div>
        <div class="col">
          <select class="form-select" onchange="onRoleSelected(this)">
            <option class="d-none">Filtrar por Tipo de Usuário</option>
            @foreach ($roles as $role)
              <option value="{{ $role['value'] }}" @if ($role['value'] == $roleId) selected @endif>{{ $role['label'] }}</option>
            @endforeach
          </select>
        </div>
        <div class="col col-auto">
          <button class="btn btn-sm btn-danger rounded-circle" onclick="clearFilters()" title="Limpar Filtros">
            <i class="bi bi-x-lg"></i>
          </button>
        </div>
      </div>
    </div>
  </div>

  <ul class="list-group">
    @forelse ($users as $user)
      <button class="list-group-item list-group-item-dark list-group-item-action text-center" onclick="location.assign(`{{ route('users.show', $user->id) }}`)">{{ $user->name }}</button>
    @empty
      @if ($isFiltering)
        <p class="lead text-center">Nenhum Usuário Obedece aos Filtros</p>
        @else
        <p class="lead text-center">Nenhum Usuário Cadastrado</p>
      @endif
    @endforelse
  </ul>

  @pushOnce('scripts')
    <script>
      function onUnitySelected(select) {
        let unityId = select.selectedOptions[0].value;
        applyFilter({unityId: unityId});
      }

      function onRoleSelected(select) {
        let roleId = select.selectedOptions[0].value;
        applyFilter({roleId: roleId});
      }

      function clearFilters() {
        let url = new URL(location.href);
        location.assign(url.href.replace(url.search, ''));
      }

      function applyFilter({unityId = '', roleId = ''}) {
        let url = new URL(location.href);

        if (!url.searchParams.has('filter'))
          url.searchParams.append('filter', 'true');
        
        if (unityId)
          if (url.searchParams.has('unity'))
            url.searchParams.set('unity', unityId);
          else
            url.searchParams.append('unity', unityId);

        if (roleId)
          if (url.searchParams.has('role'))
            url.searchParams.set('role', roleId);
          else
            url.searchParams.append('role', roleId);
          
        location.assign(url);
      }
    </script>
  @endPushOnce
</x-app>
