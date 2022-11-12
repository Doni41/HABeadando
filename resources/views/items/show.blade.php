@extends('layouts.app')
@section('title', 'View item: ' . $item->name)

@section('content')
<div class="container">

    {{-- TODO: Session flashes --}}

    <div class="row justify-content-between">
        <div class="col-12 col-md-8">
            <h1>{{ $item->name }}</h1>

            <p class="small text-secondary mb-0">
                <i class="fas fa-user"></i>
                <span>By {{-- $post->user->name --}}</span>
            </p>
            <p class="small text-secondary mb-0">
                <i class="far fa-calendar-alt"></i>
                <span>{{ $item->obatained }}</span>
            </p>

            <div class="mb-2">
            </div>

            <a href="{{ route('items.index') }}"><i class="fas fa-long-arrow-alt-left"></i> Vissza a kezdőlapra</a>

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
                    <button
                        type="button"
                        class="btn btn-danger"
                        onclick="document.getElementById('delete-post-form').submit();"
                    >
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

    <img
        id="cover_preview_image"
        {{-- TODO: Cover --}}
        src="{{ asset('images/default_post_cover.jpg') }}"
        alt="Cover preview"
        class="my-3"
    >

    <div class="mt-3">
        {{ $item->description }}
    </div>
</div>
@endsection
