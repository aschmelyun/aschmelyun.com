@extends('layout.blog')
@section('content')
    <div class="container wrap is-blog">
        @php
            $postArray = array();
            $manifest = json_decode(file_get_contents(__DIR__ . '../../taro.json'));
            foreach($manifest as $page) {
                if(str_contains($page->content, 'blog.')) {
                    $postArray[$page->output] = array(
                        'title' => $page->vars->title,
                        'summary' => $page->vars->summary
                    );
                }
            }
        @endphp
        @foreach($postArray as $link => $content)
            <div class="title">
                <h1 class="is-blog-title font-normal">{{ str_replace(' - Andrew Schmelyun', '', $content['title']) }}</h1>
            </div>
            <div class="content font-alt line-height-4">
                <p>{{ $content['summary'] }} <a href="{{ $link }}" class="font-bold mt-2 font-x-small color-red hover--color-red-dark" style="font-family: 'Roboto', sans-serif">READ MORE &rarr;</a></p>
            </div>
        @endforeach
    </div>
@endsection    