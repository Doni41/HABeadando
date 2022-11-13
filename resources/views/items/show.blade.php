@extends('layouts.app')
@section('title', 'View item: ' . $item->name)

@section('content')
<div class="container">
    <a href="{{ route('items.index') }}"><i class="fas fa-long-arrow-alt-left"></i> Vissza a kezdőlapra</a>

    {{-- TODO: Session flashes --}}

    <div class="row justify-content-between">
        <div class="col-12 col-md-8">
            <h1 class="text-uppercase">{{ $item->name }}</h1>

            <p class="small text-secondary mb-2 font-weight-normal">
                <i class="fas fa-user"></i>
                <span>Tárgy megszerzésének ideje: {{ $item->obtained }}</span>
            </p>
            <img id="cover_preview_image" src="{{ asset($item->image) }}" alt="Cover preview" class="my-3 mb-4">
            <p class="small text-muted mb-4">
                <i class="far fa-calendar-alt">
                    <span class="font-italic">{{ $item->description }}</span>
                </i>
            </p>
            <div class="row d-flex justify-content-between">
                <div class="col-md-8 col-lg-6">
                    <div class="card shadow-0 border" style="background-color: #f0f2f5;">
                        <div class="card-body p-4">
                            <div class="form-outline mb-4">
                                <input type="text" id="addANote" class="form-control" placeholder="Type comment..." />
                                <label class="form-label" for="addANote">+ Add a note</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mb-2">
            </div>

        </div>

        <div class="col-12 col-md-4">
            <div class="float-lg-end">

                {{-- TODO: Links, policy --}}
                <a role="button" class="btn btn-sm btn-primary" href="{{ route('items.edit', $item->id) }}"><i class="far fa-edit"></i> Tárgy szerkesztése</a>

                <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#delete-confirm-modal"><i class="far fa-trash-alt">
                        <span></i> Tárgy törlése</span>
                </button>

            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="delete-confirm-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Confirm delete</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete post <strong>{{ $item->name }}</strong>?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger" onclick="document.getElementById('delete-post-form').submit();">
                        Yes, delete this post
                    </button>

                    {{-- TODO: Route, directives --}}
                    <form id="delete-post-form" action="{{ route('items.destroy', $item->id) }}" method="POST" class="d-none">
                        @csrf
                        @method('DELETE')

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection