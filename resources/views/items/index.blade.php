@extends('layouts.app')
@section('title', 'Items')

@section('content')
<div class="container">
    <div class="row justify-content-between">
        <div class="col-12 col-md-8">
            <h1>Teljes kínálat</h1>
        </div>
        @auth
        @if (\Auth::user()->is_admin)
            <div class="col-12 col-md-4">
                <div class="float-lg-end">
                    {{-- TODO: Links, policy --}}
                    <a href="{{ route('items.create') }}" role="button" class="btn btn-sm btn-success mb-1"><i class="fas fa-plus-circle"></i>Új tárgy felvétele</a>
                    <a href="{{ route('labels.create') }}" role="button" class="btn btn-sm btn-success mb-1"><i class="fas fa-plus-circle"></i>Új kategória felvétele</a>
                </div>
            </div>
        @endif
        @endauth
    </div>

    {{-- TODO: Session flashes --}}
    @if (Session::has('login_required'))
    <div class="alert alert-danger">
        Az új kategória felvételéhez be kell jelentkeznie!
    </div>
    @endif
    @if (Session::has('label_deleted'))
    <div class="alert alert-success">
        A címke sikeresen törölve lett
    </div>
    @endif
    @if (Session::has('item_deleted'))
    <div class="alert alert-success">
        A tárgy sikeresen törölve lett
    </div>
    @endif

    <div class="row mt-3">
        <div class="col-12 col-lg-9">
            <div class="row">
                @forelse ($items as $item)
                    <div class="col-12 col-md-6 col-lg-4 mb-3 d-flex align-self-stretch text-center">
                        <div class="card w-100">
                            <img
                                src="{{ asset($item->image) }}"
                                class="card-img-top"
                                alt="Post cover"
                            >
                            <div class="card-body align-self-center">
                                <h5 class="card-title mb-0">{{ $item->name }}</h5>
                                <p class="small mb-0">
                                    <span class="me-2">
                                        <i class="fas fa-user"></i>
                                        <!-- <span>By {{-- $item->user->name --}}</span> -->
                                    </span>

                                    <span>
                                        <i class="far fa-calendar-alt"></i>
                                        <span>{{ $item->obtained }}</span>
                                    </span>
                                </p>
                                <p class="card-text justify mt-1">{{ substr($item->description, 0, 20) }}</p>
                            </div>
                            <div class="card-footer">
                                <a href="{{ route('items.show', $item->id) }}" class="btn btn-primary">
                                    <span>Tárgy megnézése</span> <i class="fas fa-angle-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <div class="alert alert-warning" role="alert">
                            Nem található tárgy!
                        </div>
                    </div>
                @endforelse
            </div>

            <div class="d-flex justify-content-center">
                {{ $items->links() }}
            </div>

        </div>
        <div class="col-12 col-lg-3">
            <div class="row">
                <div class="col-12 mb-3">
                    <div class="card bg-light">
                        <div class="card-header">
                            Címkék
                        </div>
                        <div class="card-body">
                            @foreach ($labels as $label)
                                <a class="text-decoration-none" href="{{ route('labels.show', $label->id) }}">
                                    <span class="badge" style="background-color: {{ $label->color }}">{{ $label->name }}</span>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- <div class="col-12 mb-3">
                    <div class="card bg-light">
                        <div class="card-body">
                            <div class="small">
                                <ul class="fa-ul">
                                    <li><span class="fa-li"><i class="fas fa-user"></i></span>Users: {{-- $user_count --}}</li>
                                    <li><span class="fa-li"><i class="fas fa-layer-group"></i></span>Categories: {{-- $categories->count() --}}</li>
                                    <li><span class="fa-li"><i class="fas fa-file-alt"></i></span>Posts: {{-- $posts->count() --}}</li>
                                </ul>
                            </div>
                        </div> 
                    </div>
                </div> -->
            </div>

        </div>
    </div>
</div>
@endsection
