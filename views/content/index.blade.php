@extends('layout.default')
@section('content')
    <div class="container wrap">
        @include('content.index.projects')
    </div>
    <div class="pos-relative mt-10 mb-8" style="z-index:99; background: #0d432f; background-image:url('/assets/img/geometry.png'), -moz-linear-gradient(-45deg, #0d432f 0%, #42a28f 100%); background-image:url('/assets/img/geometry.png'), -webkit-linear-gradient(-45deg, #0d432f 0%,#42a28f 100%); background-image:url('/assets/img/geometry.png'), linear-gradient(135deg, #0d432f 0%,#42a28f 100%); background-attachment: fixed;">
        <div class="container wrap">
            @include('content.index.experience')
        </div>
    </div>
    <div class="container wrap">
        @include('content.index.resume')
    </div>
    <div class="pos-relative mt-8" style="background: #102940; background: -moz-linear-gradient(-45deg, #102940 0%, #4D71A7 100%); background: -webkit-linear-gradient(-45deg, #102940 0%,#4D71A7 100%); background: linear-gradient(135deg, #102940 0%,#4D71A7 100%); background-attachment: fixed;">
        <div class="container wrap">
            @include('content.index.contact')
        </div>
    </div>
@endsection    