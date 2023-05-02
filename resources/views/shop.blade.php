@extends('template.template')

@section('title')
        Farrel Dava
@endsection

@section('content')
<div class='container'>
    <div class='img'>
        <img class='avatar' src="img/devinn.png" alt="avatar">
        <div class='description'>
            <h4>{{$name}}</h4>
            <span class='highlight'>{{$kelas}}</span>
        </div>
    </div>
    <hr>
    <div class='container-shop'>
        <h4>Shop</h4>
        <p>These are stuff in daily use I have, and I want to recommend to y'all incase you interested to my stuff and etc.</p>

    </div>
    <hr>
    <h4>Items</h4>
    <div class='container-items'>
        @foreach ( $product as $p )
        <div class="row">
            <div class="column">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="{{$p->product_image}}" alt="Card image cap">
                    <div class="card-body">
                        <h4>{{$p->name}}</h4>
                        <p class="card-text">{{$p->description}}</p>
                            <a class="btn btn-outline-secondary" href="{{$p->link}}" style="font-size: 13px;">Buy Now</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <hr>
    <div class='container-copyright'>
        <a href="https://www.instagram.com/octdevinn/?hl=id" style="color:rgb(184, 184, 184)">
            <i class="fa fa-instagram" style="font-size:24px"></i>
        </a>
        <a href="https://www.youtube.com/@octdevinn" style="color:rgb(184, 184, 184)">
            <i class="fa fa-youtube-play" style="font-size:24px"></i>
        </a>
        <a href="https://open.spotify.com/user/bz9w0swqal7cxlwpfbp047mep?si=81a3d4dd63fe48ba" style="color:rgb(184, 184, 184)">
            <i class="fa fa-spotify" style="font-size:24px"></i>
        </a>
        <a href="mailto:farrel.davaa@gmail.com?" target="_top" style="color:rgb(184, 184, 184)">
            <i class="fa fa fa-envelope-o" style="font-size:24px"></i>
        </a>
    </div>
    <div class='container-copyright'>
        <p>© 2023 Farrel, All Rights Reserved</p>
    </div>
</div>

@endsection
