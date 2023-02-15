@extends('layouts/main')
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ $heading}}</h1>
                {{-- <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Components</a></div>
                    <div class="breadcrumb-item">Article</div>
                </div> --}}
            </div>

            <div class="section-body">
                <h2 class="section-title">{{$heading}}</h2>
                <div class="row">
                    @forelse ($photos as $photo)
                        <div class="col-12 col-md-4 col-lg-4">
                            <article class="article article-style-c">
                                <div class="article-header">
                                    <div class="article-image">
                                        <a href="">
                                            <img src="{{$photo->thumbail_url}}" alt="{{$photo->title}}" width="350" height="233">
                                        </a>
                                    </div>
                                </div>
                                <div class="article-details">
                                    <div class="article-category"><div class="bullet"></div><a href="#">{{$photo->created_at->diffForHumans()}}</a></div>
                                    <div class="article-title">
                                        <h2><a href="#">{{$photo->title}}</a></h2>
                                    </div>
                                    <p>Duis aute irure dolor in reprehenderit in voluptate velit esse
                                    cillum dolore eu fugiat nulla pariatur. </p>
                                    <div class="article-user">
                                        <img alt="{{ $photo->album->user->name}} avatare" src="{{ asset('assets/img/avatar/avatar-1.png')}}">
                                        <div class="article-user-details">
                                            <div class="user-detail-name">
                                                <a href="#">{{$photo->album->user->name}}</a>
                                            </div>
                                            <div class="text-job"> <a href="">{{$photo->album->title}}</a>
                                                {{$photo->album->photos->count()}}
                                                {{ Str::plural('photo',$photo->album->photos->count())}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        </div>
                    @empty
                        <div class="alert alert-danger">
                            <h5><i class="icon fas fa-ban"></i> Information!</h5>
                            Aucune donnée en Base.
                        </div>
                    @endforelse
                </div>
            </div>
        </section>
        <nav>{!! $photos->links() !!}</nav>
    </div>
@endsection