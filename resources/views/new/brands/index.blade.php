<div>
  <div class="container-breadcrumb modal-color mb-0">
      <nav aria-label="breadcrumb">
          <ol class="breadcrumb mb-0">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Головна</a></li>
              <li class="breadcrumb-item" aria-current="page">Довідники</a></li>
              <li class="breadcrumb-item active" aria-current="page">Довідник брендів</li>
          </ol>
      </nav>
  </div>

  <div class="container-fluid container-title d-flex py-2 gap-2">

      <button class="btn-circle" type = "button">
          <svg class="bi">
              <use xlink:href="{{ asset('images/sprite.svg#add-note') }}"></use>
          </svg>
      </button>
      <h1 class="h3">Бренди</h1>
  </div>

  <div class="container px-2 py-1">
      @if (session()->has('success'))
          <div class="alert alert-success mt-2 ml-2 mr-2" role="alert">
              {{ session('success') }}
          </div>
      @endif

      {{ $brands->withQueryString()->links() }}

      {{-- -- table starts table-sm -- --}}
      <table class="table table-hover mt-1">
          <thead>
              <tr class="col-center">
                  <th scope="col">Дії</th>
                  <th scope="col">#</th>
                  @include('livewire.includes.table-sortable-th', [
                      'field' => 'name',
                      'fieldTiltle' => 'Назва',
                  ])
                  <th scope="col">Озн.</th>
                  {{-- <th scope="col" wire:click="setSortBy('sort')">Сортувати</th> --}}
                  @include('livewire.includes.table-sortable-th', [
                      'field' => 'sort',
                      'fieldTiltle' => 'Сорт',
                  ])
              </tr>

              <tr>
                  <td colspan="2">
                      {{-- -- wire:model.live='recordsPage' яку кількість записів показати на сторінці -- --}}
                      {{-- @include('livewire.includes.records-page', []) --}}
                      <x-livewire-filter-select fieldID="recordsPage" :listName="[]" />
                  </td>
                  <td>
                      {{-- -- Шукати -- --}}
                      <div class="input-group">
                          <input wire:model.live.debounce.300ms="keySearch" type="text" class="form-control">
                      </div>
                  </td>
                  <td colspan="2"></td>
              </tr>
          </thead>

          @php $i=$brands->firstItem(); @endphp
          @forelse ($brands as $item)
              {{-- @foreach ($brands as $item) --}}
              <tbody wire:key="{{ $item->id }}">
                  <tr>
                      <td nowrap>
                        <div class="d-flex align-items-center gap-2">
                              <span>{{-- wire:model="checkedCountry" --}}
                                  <input type="checkbox" value="{{ $item->id }}" />
                              </span>

                              {{-- -- Edit -- --}}
                              <x-livewire-btn-edit-id itemID="{{ $item->id }}" />

                              {{-- -- Delete -- --}}
                              <x-livewire-btn-delete-id itemID="{{ $item->id }}" itemName="{{ $item->name }}" />

                          </div>
                      </td>

                      <th class="col-center align-middle" scope="row">{{ $i++ }}</th>
                      <td class="align-middle"> {{ $item->name }}</td>
                      <td class="col-center align-middle"> {{ $item->status }}</td>
                      <td class="col-center align-middle"> {{ $item->sort }}</td>
                  </tr>
              </tbody>
          @empty
              <p>Записів не знайдено</p>
          @endforelse
      </table>

      {{ $brands->withQueryString()->links() }}
      {{-- -- table ends -- --}}


      @if ($isOpen)
          <div class="modal show" tabindex="-1" role="dialog" style="display: block;">
              <div class="modal-dialog" role="document">
                  {{-- <div class="modal-content text-bg-dark"> --}}
                  <div class="modal-content">
                      {{-- modal header  --}}
                      <x-livewire-modal-header itemID="{{ $itemID }}" />

                      <div class="modal-body">
                          <form wire:submit="{{ $itemID ? 'update' : 'store' }}" class="row">
                              <x-livewire-label-input-text name="name" label="Назва"
                                  placeholder="Назва від 2 символів" wiremodel="form.name" />
                              <x-livewire-label-input-text name="status" label="Статус" wiremodel="form.status" />
                              <x-livewire-label-input-text name="sort" label="Сортувати"
                                  placeholder="Порядок розташування" wiremodel="form.sort" />

                              {{-- modal body button  --}}
                              <x-livewire-btn-save-close itemID="{{ $itemID }}" />
                          </form>
                      </div>
                  </div>
              </div>
          </div>
          <div class="modal-backdrop fade show"></div>
      @endif
  </div>
</div>