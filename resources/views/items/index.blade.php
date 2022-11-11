@extends('layouts.app')
@section('title', 'Items')

@section('content')
<div class="container">
    <div class="row justify-content-between">
        <div class="col-12 col-md-8">
            <h1>All items</h1>
        </div>
        @auth
        <div class="col-12 col-md-4">
            <div class="float-lg-end">
                {{-- TODO: Links, policy --}}

                <!-- <a href="{{ route('items.create') }}" role="button" class="btn btn-sm btn-success mb-1"><i class="fas fa-plus-circle"></i> Create post</a>

                <a href="{{ route('item.create') }}" role="button" class="btn btn-sm btn-success mb-1"><i class="fas fa-plus-circle"></i> Create category</a> -->

            </div>
        </div>
        @endauth
    </div>

    {{-- TODO: Session flashes --}}
    @if (Session::has('login_required'))
    <div class="alert alert-danger">
        Login required for that action!
    </div>
    @endif
    login_required
    @if (Session::has('category_deleted'))
    <div class="alert alert-success">
        Category successfully deleted!
    </div>
    @endif
    @if (Session::has('post_deleted'))
    <div class="alert alert-success">
        Post successfully deleted!
    </div>
    @endif

    <div class="row mt-3">
        <div class="col-12 col-lg-9">
            <div class="row">
                @forelse ($items as $item)
                    <div class="col-12 col-md-6 col-lg-4 mb-3 d-flex align-self-stretch">
                        <div class="card w-100">
                            <img
                                src="{{-- asset($items->image) --}}"
                                class="card-img-top"
                                alt="Post cover"
                            >
                            <div class="card-body">
                                <h5 class="card-title mb-0">{{ $item->nanme }}</h5>
                                <p class="small mb-0">
                                    <span class="me-2">
                                        <i class="fas fa-user"></i>
                                        <!-- <span>By {{-- $post->user->name --}}</span> -->
                                    </span>

                                    <span>
                                        <i class="far fa-calendar-alt"></i>
                                        <span>{{ $item->obtained }}</span>
                                    </span>
                                </p>
<!-- {{--
                                @foreach ($post->categories as $category) --}}
                                    <a href="/categories/{{-- $category->id --}}" class="text-decoration-none">
                                        <span class="badge" style="background-color: {{-- $category->color --}};">{{-- $category->name --}}</span>
                                    </a>
                                {{-- @endforeach --}} -->

                                <p class="card-text mt-1">{{ $item->description }}</p>
                            </div>
                            <div class="card-footer">
                                <a href="{{-- route('item.show', $item->id) --}}" class="btn btn-primary">
                                    <span>View post</span> <i class="fas fa-angle-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <div class="alert alert-warning" role="alert">
                            No posts found!
                        </div>
                    </div>
                @endforelse
            </div>

            <div class="d-flex justify-content-center">
                {{-- TODO: Pagination --}}
                {{ $items->links() }}
            </div>

        </div>
        <div class="col-12 col-lg-3">
            <div class="row">
                <div class="col-12 mb-3">
                    <div class="card bg-light">
                        <div class="card-header">
                            Categories
                        </div>
                        <!-- <div class="card-body">
                            {{-- @foreach ($categories as $category) --}
                                <a href="{{-- route('categories.show', $category->id) --}}" class="text-decoration-none">
                                    <span class="badge" style="background-color: {{-- $category->color --}}">{{-- $category->name --}}</span>
                                </a>
                            {{-- @endforeach --]
                        </div> -->
                    </div>
                </div>

                <div class="col-12 mb-3">
                    <div class="card bg-light">
                        <div class="card-header">
                            Statistics
                        </div>
                        <div class="card-body">
                            <!-- <div class="small">
                                <ul class="fa-ul">
                                    <li><span class="fa-li"><i class="fas fa-user"></i></span>Users: {{-- $user_count --}}</li>
                                    <li><span class="fa-li"><i class="fas fa-layer-group"></i></span>Categories: {{-- $categories->count() --}}</li>
                                    <li><span class="fa-li"><i class="fas fa-file-alt"></i></span>Posts: {{-- $posts->count() --}}</li>
                                </ul>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
