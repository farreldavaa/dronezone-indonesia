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
    <div class='container-porto'>
        <p>Hi, my name is <b>Farrel</b>. Based in Malang, just ordinary people who wants to get rich real quick💵</p>
        <a href="https://www.instagram.com/octdevinn/?hl=id">Interested to work with me? Contact me!</a>
    </div> 
    <hr>
    <div class='container-gal'>
        <h4>My gallery</h4>
        <iframe width="100%" height="100%" src="https://www.youtube.com/embed/HcpBlldLVRg"
            title="YouTube video player"
            frameborder="0"
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
            allowfullscreen=""
            >
        </iframe>
    </div>
    <hr>
    <div class='container-music'>
        <h4>Check out my favorite Playlist</h4>
        <iframe style="border-radius:12px"
        src="https://open.spotify.com/embed/playlist/4dt126wAq64MGPkFfdLAWS?utm_source=generator&theme=0"
        width="100%"
        height="152"
        frameBorder="0"
        allowfullscreen=""
        allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture"
        loading="lazy">
        </iframe>
    </div>
</div>
    
@endsection