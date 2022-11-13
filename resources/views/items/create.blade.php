@extends('layouts.app')
@section('title', 'Edit label: ' . $label->name)

@section('content')
<div class="container">
    <a href="{{ route('labels.index') }}"><i class="fas fa-long-arrow-alt-left"></i> Vissza a kezdőlapra</a>

    <div class="row justify-content-between">
        <div class="col-12 col-md-8">
            <h1 class="text-uppercase mt-4">{{ $label->name }}</h1>
            <h3 class="text-muted mb-4">
                <i class="far fa-calendar-alt">
                    <span class="badge" style="background-color: {{ $label->color }}">{{ $label->color }}</span>
                </i>
            </h3>
            <h4 class="secondary text-muted mb-2">
                Láthatóság: 
                @if ($label->dipsplay)
                    Látható
                @else
                    Nem látható
                @endif
            </h4>
        </div>
        @if (\Auth::user() && \Auth::user()->is_admin)
            <div class="col-12 col-md-4">
                <div class="float-lg-end">
                    <a role="button" class="btn btn-sm btn-primary" href="{{ route('labels.edit', $label->id) }}"><i class="far fa-edit"></i> Címke szerkesztése</a>
                    <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#delete-confirm-modal"><i class="far fa-trash-alt">
                            <span></i> Címke törlése</span>
                    </button>
                </div>
            </div>
        @endif

            <h3 class="mt-2">A címkéhez a következő posztok tartoznak:</h3>
            @forelse ($label->items as $item)
                <div class="col-12 col-md-6 col-lg-4 mb-3 d-flex align-self-stretch text-center mt-2">
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

    <!-- Modal -->
    <div class="modal fade" id="delete-confirm-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Törlés jóváhagyása</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Biztos vagy benne, hogy törölni szeretnéd, az alábbi címkét: <strong>{{ $label->name }}</strong>?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Vissza</button>
                    <button type="button" class="btn btn-danger" onclick="document.getElementById('delete-post-form').submit();">
                        Igen, törlöm a címkét
                    </button>

                    {{-- TODO: Route, directives --}}
                    <form id="delete-post-form" action="{{ route('labels.destroy', $label->id) }}" method="POST" class="d-none">
                        @csrf
                        @method('DELETE')

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection