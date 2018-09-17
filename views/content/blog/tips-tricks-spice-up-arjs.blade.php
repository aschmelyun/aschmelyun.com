@extends('layout.blog')
@section('content')
    <div class="container wrap is-blog">
        <div class="nav-back mb-4">
            <a href="/blog" class="font-bold mt-2 font-x-small color-red hover--color-red-dark">&larr; ALL POSTS</a>
        </div>
        <header class="title">
            <h1 class="is-blog-title font-normal">A few helpful gems tucked away in Laravel Eloquent</h1>
            <h5 class="is-blog-meta font-normal font-regular color-half-clear-black mt-2">~ 5 minutes - Published on Sep 16, 2018</h5>
        </header>
        <main class="content font-alt mt-8 line-height-4">
            <p>Okay, so you should have some foundations down from my <a href="/blog/get-started-with-arjs" class="color-red">previous article</a> on AR.js. Let’s dive into some more interesting tidbits.</p>
            <p>&nbsp;</p>
            <p><h3>Shrink the size of the black marker border</h3></p>
            <p>Personally I think that the default border thickness is a little jarring to see on markers, and I’ve heard the same thing parroted by a few other people using AR.js. However, if you’re using the latest version of the framework, it’s easier than ever to adjust the border size to your preference!</p>
            <p><img src="https://cdn-images-1.medium.com/max/1600/1*UjR6nsfKSoAChKN3lJzncw.png" alt="Marker border difference for AR.js"></p>
            <p>I discussed during the last article about how to generate markers and their images using the <a href="https://jeromeetienne.github.io/AR.js/three.js/examples/marker-training/examples/generator.html" class="color-red">AR.js Marker Training tool</a>. If you visit the link, you’ll see that in the top-left corner there’s a little slider for <strong>Pattern Ratio</strong> (hint: that’s the black border thickness). You can think of it as ‘Percentage of the marker taken up by the actual marker image’. So for instance, if the Pattern Ratio is set to 0.75 (my preferred value), that means that 75% of the marker is your image in the center, and the remaining 25% is taken up by the black border.</p>
            <p>Once you’ve nailed down where you want your pattern ratio to be, generate and save both your marker pattern and marker image for your app as detailed in my <a href="/blog/get-started-with-arjs" class="color-red">previous AR.js article</a>. Back in your app, all it takes is one small adjustment to tie this in. On your {{'<a-scene>'}} element, add in patternRatio=0.75 (or whatever your desired value is) to the <strong>arjs</strong> prop.</p>
            <p><img src="https://cdn-images-1.medium.com/max/1600/1*ctvKA6qOh08YFP2zAT7AdA.png" alt="Code screenshot for AR.js patternRatio adjustments"></p>
            <p>&nbsp;</p>
            <p><h3>Use your own 3D models</h3></p>
            <p>Sure cubes, spheres, planes, and cylinders are cool, but most of the time you’re going to want to utilize and display a custom 3D model in the augmented reality scene you’re creating. Luckily AR.js makes that a pretty simple endeavor!</p>
            <p>The easiest way to get started with this, would be to make sure your models are either in <strong>obj</strong> or <strong>glTF</strong> formats. These work natively with AR.js and a-frame, requiring zero additional setup or configuration to get started. You can find a huge repository of free and affordable obj models on <a href="https://sketchfab.com" class="color-red" target="_blank">https://sketchfab.com</a>.</p>
            <p><strong>Note:</strong> In the following examples you’ll see the {{'<a-entity>'}} tag, this is a generic replacement for {{'<a-sphere>'}} and the like, allowing you to specify your own geometries/materials/etc instead of using prefabbed ones.</p>
            <p><h4>For obj models:</h4></p>
            <p>Inside of our a-entity tag, we’ll be using the obj-model prop, which will require you to specify paths to both the <strong>.obj</strong> model file and the accompanying <strong>.mtl</strong> material file. The end result should look like this:</p>
            <p><img src="https://cdn-images-1.medium.com/max/1600/1*62s3moLx4zQyoudEb66Kkw.png" alt="Code screenshot of obj-model path specification in AR.js"></p>
            <p><h4>For glTF models:</h4></p>
            <p>This one’s even easier, because it’s just one path! Swap out the obj-model prop for gtlf-model and supply the path to your model as the value:</p>
            <p><img src="https://cdn-images-1.medium.com/max/1600/1*xuE0S9Qjds07I0tTPaKkOQ.png" alt="Code screenshot of gltf-model path specification in AR.js"></p>
            <p>&nbsp;</p>
            <p><h3>Animate an object's properties</h3></p>
            <p>While using the a-frame version of AR.js you can implement and use its associated components. Using a-frame’s <a href="https://aframe.io/docs/0.8.0/core/animations.html" class="color-red" target="_blank">Animations API</a> we’re able to rotate, scale, and otherwise manipulate our models and their properties pretty easily.</p>
            <p>For this example we’re going to be making our imported model blink slowly, by changing the material’s opacity back and forth from 0 to 1, and back to 0, an infinite amount of times. In order to add this in, we just insert an {{'<a-animation>'}} tag between the {{'<a-entity>'}} closing and opening tags. Setting the attribute prop to material.opacity lets a-frame know that we want to animate the opacity, from and to props are the values that we’re animating between.</p>
            <p>Setting the direction prop to “alternate” means that once we’ve gone from the initial value to the new value, instead of popping directly back to the initial value and starting over again, the animation switches direction and instead animates back to the initial value. Finally, we set the repeat prop to “indefinite”, meaning that we want this animation to run forever.</p>
            <p><img src="https://cdn-images-1.medium.com/max/1600/1*CO-q1CNJ0YY_GqwvamBNDw.png" alt="Code screenshot showing how to animate an a-frame object"></p>
            <p>&nbsp;</p>
            <p><h3>Create an event listener for the markers</h3></p>
            <p>Just a quick warning, this will require you to dig into the source code of AR.js, and then re-compile the scripts using make. If you’re comfortable with that, let’s continue!</p>
            <p>So, why would we want an event listener in the first place? I can give you a real-world example: My client wanted to display a simple block of content whenever a marker was active on a user’s device. The content was supposed to disappear whenever there was not a marker currently active. In order to implement this we needed to add in an event listener that would fire whenever a marker was found/lost, and then we’d hook into that in our main site’s JavaScript bundle and display/hide the content whenever that event was fired.</p>
            <p>Thanks to nikolaymihaylov’s <a href="https://github.com/jeromeetienne/AR.js/pull/303" class="color-red" target="_blank">pull request</a>, we can see exactly where to add these edits. There’s only one file that needs to be modified, <a href="https://github.com/jeromeetienne/AR.js/pull/303/files#diff-d6e4c48405c28cfbbe2952ef505ed7f6" class="color-red" target="_blank"><strong>aframe/src/component-anchor.js</strong></a>, but it does so in a couple of different places. If you click on that link, you’ll see in green the lines that should be added to the current <strong>component-anchor.js</strong> file. Once that’s been changed, navigate to the root aframe directory and run make build && make minify to produce and overwrite the .js and .min.js scripts for your projects.</p>
            <p>Then, back on your actual project, to implement the event listeners you’ll have to register an aframe component and then set the event listeners for markerFound and markerLost. Inside their respective callback functions, write any JS you want that’ll be fired when a marker is found or lost.</p>
            <p><img src="https://cdn-images-1.medium.com/max/1600/1*DDBk985LRyE8G_9blxnoCg.png" alt="Code screenshot displaying event listeners added in to an AR.js project"></p>
            <p>&nbsp;</p>
            <p><strong>That’s all for now!</strong> If you have any questions or would like to give me some suggestions for AR.js article #3, feel free to drop me a line on <a href="https://twitter.com/aschmelyun" class="color-red" target="_blank">Twitter</a>.</p>
        </main>
    </div>
@endsection