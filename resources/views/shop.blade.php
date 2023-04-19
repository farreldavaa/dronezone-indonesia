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
    <div class='container-items'>
        <h4>Items</h4>
    </div>
    <hr>
    <div class='container-copyright'>
        <h4>copyright</h4>
    </div>
</div>
    
@endsection