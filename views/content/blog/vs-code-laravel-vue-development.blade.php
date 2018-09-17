@extends('layout.blog')
@section('content')
    <div class="container wrap is-blog">
        <div class="nav-back mb-4">
            <a href="/blog" class="font-bold mt-2 font-x-small color-red hover--color-red-dark">&larr; ALL POSTS</a>
        </div>
        <header class="title">
            <h1 class="is-blog-title font-normal">Setting up VS Code for streamlined Laravel and Vue development</h1>
            <h5 class="is-blog-meta font-normal font-regular color-half-clear-black mt-2">~ 4 minutes - Published on Aug 16, 2018</h5>
        </header>
        <main class="content font-alt mt-8 line-height-4">
            <p><strong>tl;dr: </strong>Install and configure this plugins and you’ll be good to go with Laravel/Vue development in VS Code:</p>
            <p>
                <ul>
                    <li><a href="https://marketplace.visualstudio.com/items?itemName=onecentlin.laravel-blade" class="color-red" target="_blank">Laravel Blade Snippets</a></li>
                    <li><a href="https://marketplace.visualstudio.com/items?itemName=codingyu.laravel-goto-view" class="color-red" target="_blank">Laravel goto view</a></li>
                    <li><a href="https://marketplace.visualstudio.com/items?itemName=stef-k.laravel-goto-controller" class="color-red" target="_blank">laravel-goto-controller</a></li>
                    <li><a href="https://marketplace.visualstudio.com/items?itemName=bmewburn.vscode-intelephense-client" class="color-red" target="_blank">PHP Intelephense</a></li>
                    <li><a href="https://marketplace.visualstudio.com/items?itemName=octref.vetur" class="color-red" target="_blank">Vetur</a></li>
                    <li><a href="https://marketplace.visualstudio.com/items?itemName=dbaeumer.vscode-eslint" class="color-red" target="_blank">ESLint</a></li>
                </ul>
            </p>
            <p>If you haven’t heard of VS Code by now, you’ve probably been living under a rock. It’s a lightning-fast code editor built on the Electron framework with a massive amount of extensibility and a huge library of themes and plugins, all courtesy of Microsoft. I’ve been using it for almost two years, and for the last year full-time after a transitionary period switching frequently between it and PHPStorm.</p>
            <p><strong>Why’d I settle on VS Code?</strong> In all honesty, the biggest factor for me was speed. Booting up one, or multiple, instances of VS Code is a non-issue. It loads up super fast, even with all of the plugins listed above. Opening whole projects, searching via regex, finding specific blocks of code, or scrolling through massive log files, I’ve never had a hiccup in speed or responsiveness. Using it in the command line is also a breeze by typing code . in the appropriate project root folder.</p>
            <p>While these plugins make it a formidable IDE for Laravel and Vue development, there are some caveats. Deep integration into Laravel code for things like autocompletion aren’t perfect and some facades/relationships won’t show up; a trade-off for speed and cost. With that being said, let’s dive into some plugins!</p>
            <p>&nbsp;</p>
            <p><h3>Laravel Blade Snippets</h3></p>
            <p><img src="https://cdn-images-1.medium.com/max/1600/1*2d4ayaUS_Jq60qHWbBVIwA.png" alt="Code screenshot of Laravel Blade Snippets in action"></p>
            <p>This is arguably the most necessary plugin for Laravel development on VS Code. Not only does it provide appropriate html/php syntax highlighting for Laravel’s Blade templates, it also adds in emmet functionality for them as well. Typing foreach and hitting tab while in a Blade file will autocomplete into a foreach loop structure. The same works for other Blade methods like component, switch, and slot.</p>
            <p>&nbsp;</p>
            <p><h3>Laravel Goto View + Laravel Goto Controller</h3></p>
            <p><img src="https://cdn-images-1.medium.com/max/1600/1*SPJtnfCZXv_goLHAiTg-Kg.png" alt="Code screenshot of Laravel goto view and Laravel goto controller in action"></p>
            <p>Not really necessary, but definitely helpful in making VS Code more IDE-like, these simple little plugins underscore view and controller names. Holding down ctrl (or cmd) and clicking on them will open up the appropriate file in a new tab. While using Goto Controller, if you include the method in your controller file (e.g. PostController@show) it’ll jump you right to the method in question.</p>
            <p>&nbsp;</p>
            <p><h3>PHP Intelephense</h3></p>
            <p><img src="https://cdn-images-1.medium.com/max/1600/1*sQK3I8IkNBRq3HxF93oJjw.png" alt="Code screenshot of PHP Intelephense in action"></p>
            <p>This is arguably the most powerful plugin for turning VS Code into a full-blown IDE. There’s a handful of highly-rated PHP Intellisense plugins all with varying degrees of speed, reliability, and code depth, but this one has taken the top spot for me when it comes to Laravel development.</p>
            <p>Some of the basic features that you’ll get with it are basic class suggestions, hints about generic PHP methods/functions, and some limited-scope autocompletion in your app. However, to get the real full-blown experience I highly recommend that you install and configure <a href="https://github.com/barryvdh/laravel-ide-helper" class="color-red" target="_blank">barryvdh’s Laravel IDE helper</a> alongside any project that you can. It provides much deeper integration into the Laravel environment (a big one being suggestions on Eloquent relationships).</p>
            <p>Additionally, it’s recommend that you add the following to your settings.json file to prevent a ton of generic PHP suggestions from flooding your autocorrect window: "php.suggest.basic": false</p>
            <p>&nbsp;</p>
            <p><h3>Vetur</h3></p>
            <p><img src="https://cdn-images-1.medium.com/max/1600/1*iDqVda4VYww769A1hMhxBQ.png" alt="Code screenshot of Vetur in action"></p>
            <p><strong>The</strong> VueJS plugin. Not just syntax highlighting for Vue components, but also emmet tab-completion, syntax/error checking, and pretty advanced autocompletion with code suggestions and method hints on all native Vue methods. For instance, in the screenshot above if you were to rollover the native transition element, you’ll be greeted with a pop-up box and the following content:</p>
            <p><em>{{'<transition>'}} serves as transition effects for single element/component. It applies the transition behavior to the wrapped content inside.</em></p>
            <p>If you include Sass/stylus in your Vue components and have the appropriate plugins installed, you’ll also have the appropriate syntax highlighting and formatting added in with the help of Vetur.</p>
            <p>With the help of the ESLint plugin and following some basic project setup on the <a href="https://vuejs.github.io/vetur/setup.html#extensions" class="color-red" target="_blank">Vetur documentation</a> page, you can lint your Vue components without a hassle.</p>
            <p>&nbsp;</p>
            <p>That’s all for now! This setup has made me pretty happy over the last year developing dozens of Laravel and Vue projects. If you have any suggestions for additional plugins or settings that would make working with them in VS Code even easier, don’t hesitate to let me know!</p>
        </main>
    </div>
@endsection