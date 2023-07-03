@extends('template.sidebar')

@section('title')
        Dronezone
@endsection

@section('content')
<div class='container' style="">
    <div class='img'>
        <div class='description'>
        </div>
    </div>
    <div class='container-shop' style="margin-top: 20px;">
        <h4>Drone Providers</h4>
        <p>These are our articles, we offer you pilots to draw your dream footage</p>

    </div>
    <hr>
    <h4>Articles</h4>
    {{-- <div class='container-items'>
        @foreach ( $product as $p )
        <div class="row">
            <div class="column">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="{{$p->product_image}}" alt="Card image cap">
                    <div class="card-body">
                        <h4>{{$p->name}}</h4>
                        <p class="card-text">{{$p->description}}</p>
                            <a class="btn btn-outline-secondary" href="{{$p->link}}" style="font-size: 13px;">Contact</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div> --}}


    <div class="card mb-3" style="max-width: auto;">
        <div class="row g-0">
          <div class="col-md-4">
            <img class="card-img-top" src="{{$product->product_image ?? ''}}" alt="Card image cap">
          </div>
          <div class="col-md-8">
            <div class="card-body">
                <h4>{{$product->name ?? ''}}</h4>
                <p class="card-text">{{$product->description ?? ''}}</p>
                <a class="btn btn-outline-secondary" href="{{$product->link ?? ''}}" style="font-size: 13px; margin-top: 110px;">Contact</a>
            </div>
          </div>
        </div>
      </div>

      <hr style=" margin-top: 30px;">
      <div class='container-copyright' style="margin-top: 20px; margin-bottom: 30px; text-align: center; display: flex; justify-content: center; gap: 30px;">
            <a href="https://www.instagram.com/octdevinn/?hl=id" style="color:rgb(184, 184, 184)">
                <i class="fa fa-instagram" style="font-size:24px"></i>
            <a href="https://www.youtube.com/@octdevinn" style="color:rgb(184, 184, 184)">
                <i class="fa fa-youtube-play" style="font-size:24px"></i>
            </a>
            <a href="mailto:farrel.davaa@gmail.com?" target="_top" style="color:rgb(184, 184, 184)">
                <i class="fa fa fa-envelope-o" style="font-size:24px"></i>
            </a>
      </div>
      <div class='container-copyright' style="text-align: center;">
        <p>© 2023 Dronezone, All Rights Reserved</p>
      </div>
    {{--
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
    </div> --}}
</div>

@endsection
