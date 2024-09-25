{{-- @extends('components.layouts.main')

@section('title', 'Довідник пристроїв')

@section('content') --}}
<main class="main">

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <nav class="breadcrumbs">
                    <ul class="breadcrumbs">
                        <li class="breadcrumbs-item"><a href="{{ route('home') }}">Головна</a></li>
                        <li class="breadcrumbs-item"><a href="#">Довідники</a></li>
                        <li class="breadcrumbs-item active" aria-current="page"><span>Довідник пристрої</span></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>


    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-md-4">


                <aside class="sidebar">

                    <button class="btn btn-warning w-100 text-start collapse-filters-btn mb-2" type="button"
                        data-bs-toggle="collapse" data-bs-target="#collapseFilters" aria-expanded="false"
                        aria-controls="collapseFilters">
                        Фільтри
                    </button>

                    <form action="{{ route('devices.index') }}" method="get">

                        {{-- <div class="form-group">
                                <label for="name" class="form-control"></label>
                                
                            </div> --}}
                        <h5 class="section-title"><span>Назва</span></h5>

                        <div class="collapse collapse-filters" id="collapseFilters">

                            <input type="text" name="filters[filtertitle]" class="form-control"
                                @if (request('filters.filtertitle')) value="{{ request('filters.filtertitle') }}" @endif>
                            {{-- @if (isset($_GET['filters']['filtertitle'])) value="{{ $_GET['filters']['filtertitle'] }}"  @endif> --}}
                            </input>

                            {{-- <input type="text" name="filtertitle" class="form-control" 
                                @if (isset($_GET['filtertitle'])) value="{{$_GET['filtertitle']}}"  @endif></input> --}}

                            {{-- value="{{$filters[filter-title]}}" --}}

                            {{-- <div class="filter-blok">
                                    <h5 class="section-title"><span>Види</span></h5>
                                    <div class="mb-3">
                                        <select name="devtype_id" class="form-select form-select-sm" aria-label="Оберіть">
                                            <option selected disable>Откройте это меню выбора</option>
                                            @foreach ($devtypes as $devtype)
                                                <option value="{{ $devtype->id }}"
                                                    @if (isset($_GET['devtype_id'])) @if ($_GET['devtype_id'] == $devtype->id) selected @endif
                                                    @endif >{{ $devtype->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>


                                </div> --}}

                            <div class="filter-blok">
                                <h5 class="section-title"><span>Види</span></h5>
                                @foreach ($devtypes as $devtype)
                                    <div class="form-check d-flex justify-content-between">
                                        <div>
                                            <input name="filters[devtypes][{{ $devtype->id }}]"
                                                class="form-check-input" type="checkbox" value="{{ $devtype->id }}"
                                                @checked(request('filters.devtypes.' . $devtype->id)) id="filters-brands-{{ $devtype->id }}">
                                            <label class="form-check-label" for="filters-brands-{{ $devtype->id }}">
                                                {{ $devtype->title }}
                                            </label>
                                        </div>
                                        <span class="badge border rounded-2">{{ $devtype->devices->count() }}</span>
                                    </div>
                                @endforeach
                            </div>
                            <div class="filter-blok">
                                <h5 class="section-title"><span>Бренди</span></h5>
                                @foreach ($brands as $brand)
                                    <div class="form-check d-flex justify-content-between">
                                        <div>
                                            <input name="filters[brands][{{ $brand->id }}]" class="form-check-input"
                                                type="checkbox" value="{{ $brand->id }}"
                                                @checked(request('filters.brands.' . $brand->id)) id="filters-brands-{{ $brand->id }}">
                                            <label class="form-check-label" for="filters-brands-{{ $brand->id }}">
                                                {{ $brand->title }}
                                            </label>
                                        </div>
                                        <span class="badge border rounded-2">{{ $brand->devices->count() }}</span>
                                    </div>
                                @endforeach
                            </div>

                        </div>
                        <button type="submit" class="btn btn-primary">Відібрати</button>

                        @if (request('filters'))
                            <a href="{{ route('devices.index') }}" class="py-4 ">Очистити</a>
                        @endif

                    </form>

                </aside>
            </div>

            <!-- ===== Content ===== -->
            <div class="col-lg-9 col-md-8">

                <div class="row">
                    <div class="col-12">
                        <h1 class="section-title h3 d-flex justify-content-between">
                            Довідник пристроїв
                            @if (request('filters'))
                                <span>Застосовано фільтр: {{ $devices->total() }} запис(-ів)</span>
                            @endif
                            <a href="{{ route('devices.create') }} ">
                                <svg class="icon">
                                    <use xlink:href="{{ asset('images/sprite.svg#add1') }}"></use>
                                </svg>
                            </a>
                        </h1>
                    </div>
                </div>

                <hr>

                {{-- <form action="{{ route('devices.index') }}" method="get">
                                <div class="grid grid-cols-2 gap-3">
                                    @each('devices.shared.devtype', $devtypes, 'item')
                                </div>
                              </form> --}}

                <div class="row">
                    <div class="col-sm-6">
                        <div class="input-group d-flex mb-3">
                            <span class="input-group-text">Сортувати:</span>
                            <form action="{{ route('devices.index') }}" method="get">
                                <select name="sort" onchange="this.form.submit()" class="form-select"
                                    aria-label="Сортувати:">
                                    {{-- <option value="" select>Усталене налаштування</option> --}}
                                    <option value="" select></option>
                                    <option @selected(request('sort') === 'title') value="title">Назва (а-я)</option>
                                    <option @selected(request('sort') === '-title') value="-title">Назва (я-а)</option>
                                    <option @selected(request('sort') === 'brand_id') value="brand_id">Бренд (а-я)</option>
                                </select>
                            </form>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="input-group mb-3">
                            <span class="input-group-text">Показати:</span>
                            <select class="form-select" aria-label="Показати:">
                                <option select>9</option>
                                <option value="15">15</option>
                                <option value="30">30</option>
                                <option value="45">45</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Дії</th>
                                    <th scope="col">Тип</th>
                                    <th scope="col">Бренд</th>
                                    <th scope="col">Назва</th>
                                </tr>
                            </thead>
                            <tbody>

                                @php $i=$devices->firstItem(); @endphp
                                @forelse ($devices as $device)
                                    <tr>
                                        <td scope="row">{{ $i++ }}</td>
                                        {{-- <td><a class="icon-link" href="{{ route('devices.show', [$device->id]) }}"> --}}
                                        <td><a class="icon-link" href="{{ route('devices.edit', [$device->id]) }}">
                                                <svg class="bi" aria-hidden="true">
                                                    <use xlink:href="{{ asset('images/sprite.svg#visibility') }}">
                                                    </use>
                                                </svg>
                                            </a></td>
                                        <td>{{ $device->devtype->title }}</td>
                                        <td>{{ $device->brand->title }}</td>
                                        <td>{{ $device->title }}</td>
                                    </tr>
                                @empty
                                    <div class="alert alert-danger">Записи відсутні</div>
                                @endforelse
                            </tbody>
                        </table>

                    </div>
                </div>
                <!-- <div class="row mt-3"> $devices->links() </div> -->
                <div class="row mt-3">{{ $devices->withQueryString()->links() }}</div>
            </div>
        </div>
    </div>

    Route::get('/', function () { return view('index');});Auth::routes();Route::get('/post/{slug}',
    [\App\Http\Livewire\ReadPost::class, '__invoke']);Route::get('/home', '[email protected]')->name('home');class,
    '__invoke'])->middleware('auth');Route::get('/posts/{id}/edit', [\App\Http\Livewire\EditPost::class,
    '__invoke'])->middleware('auth');

    //ListPost.php<?phpnamespace App\Http\Livewire;use Livewire\Component;class ListPost extends Component{    public function render()    {        $posts = \App\Post::latest()->paginate(20);        return view('livewire.list-post', ['posts' => $posts])            ->extends('layouts.app')            ->section('content');    }}//livewire/list-post.blade.php<div>    <h4>My Posts <a href="{{ url('posts/create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Add new</a></h4>    <ul class="list-group list-group-flush">        @forelse ($posts as $post)
<li class="list-group-item">                <div class="float-right">                    <a href='{{ url("posts/{$post->id}/edit") }}' class="btn btn-primary"><i class="fa fa-edit"></i> Edit</a>                </div>                <div>                    <h5>{{ $post->title }}</h5>                    <p>{!! substr(strip_tags($post->body), 0, 200) !!}</p>                    <small class="text-muted">Published {{ $post->created_at }}</small>                </div>            </li>            @empty            <li>You have not written any posts yet, write one now</li>
@endforelse    </ul></div>

        </main>


@endsection
