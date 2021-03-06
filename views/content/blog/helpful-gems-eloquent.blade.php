@extends('layout.blog')
@section('content')
    <div class="container wrap is-blog">
        <div class="nav-back mb-4">
            <a href="/blog" class="font-bold mt-2 font-x-small color-red hover--color-red-dark">&larr; ALL POSTS</a>
        </div>
        <header class="title">
            <h1 class="is-blog-title font-normal">A few helpful gems tucked away in Laravel Eloquent</h1>
            <h5 class="is-blog-meta font-normal font-regular color-half-clear-black mt-2">~ 4 minutes - Published on Jul 5, 2018</h5>
        </header>
        <main class="content font-alt mt-8 line-height-4">
            <p>Over the last year or so, I’ve been collecting and (sometimes) <a href="https://twitter.com/aschmelyun" class="color-red" target="_blank">tweeting</a> about methods and helpers I’ve stumbled across in Laravel’s Eloquent ORM. Most of these aren’t that obvious in the documentation, but have made a huge impact as my applications have grown in both size and complexity.</p>
            <p>Here's five of the best examples.</p>
            <p>&nbsp;</p>
            <p><h3>Building a query based on conditionals</h3></p>
            <p><img src="https://cdn-images-1.medium.com/max/1600/0*twZNSBnt8I8eaZm3.png" alt="Code screenshot of building a query based on conditionals"></p>
            <p>Let’s say you need to query a set of models and rely on external variables to determine what you’re gathering. At first glance you might write a whole query under each of those if statements, which might work but gets a little sloppy and tricky when both (or none) return true. You’d end up with 4 separate eloquent calls for this particular function.</p>
            <p>Instead, you can use <span class="inline-block plr-1 line-height-2 font-small bg-very-clear-black font-bold font-code">->where()</span> on any query after you’ve initially created it. After determining all the conditionals you need to account for, just run <span class="inline-block plr-1 line-height-2 font-small bg-very-clear-black font-bold font-code">->get()</span> to return the final collection.</p>
            <p>&nbsp;</p>
            <p><h3>Using hasOne to return a single object in a hasMany relationship</h3></p>
            <p><img src="https://cdn-images-1.medium.com/max/1600/1*-y5XxHnE3ZSkzKwxzkB4oQ.png" alt="Code screenshot of using hasOne to return a single object in a hasMany relationship"></p>
            <p>Have a <span class="inline-block plr-1 line-height-2 font-small bg-very-clear-black font-bold font-code">hasMany()</span> relationship but also need to be able to quickly grab just one item instead of a whole collection? Create a function in your model’s class file that returns <span class="inline-block plr-1 line-height-2 font-small bg-very-clear-black font-bold font-code">hasOne()</span> instead! You can also append additional methods to the call if you want to put any constraints on what you’re returning.</p>
            <p>Using <span class="inline-block plr-1 line-height-2 font-small bg-very-clear-black font-bold font-code">->latest()</span> on the example above returns the item that’s been created most recently.</p>
            <p>&nbsp;</p>
            <p><h3>Use where() on a with() by using whereHas()</h3></p>
            <p><img src="https://cdn-images-1.medium.com/max/1600/0*kEillWKkS03lIYZ8.png" alt="Code screenshot of using where() on a with() by using whereHas()"></p>
            <p>This one has a ton of searches for, and articles about, on StackOverflow and other forums. You want to be able to put a constraint on a model’s relationship, and then only return those models whose relationships match that constraint.</p>
            <p>The most elegant solution I’ve found to accomplish this is by using <span class="inline-block plr-1 line-height-2 font-small bg-very-clear-black font-bold font-code">whereHas()</span>. This checks that:</p>
            <p>
                <ol>
                    <li>The relationship actually exists, and</li>
                    <li>Allows you to pass a closure that you can use to add constraints to the query being called</li>
                </ol>
            </p>
            <p>In the example above, what ends up getting returned is a collection of User models and their transactions. However, it’s <span class="font-bold">only</span> users who both have transactions, and whose transactions are of the income type.</p>
            <p>&nbsp;</p>
            <p><h3>Query date columns using the shorter whereMonth method</h3></p>
            <p><img src="https://cdn-images-1.medium.com/max/1600/1*ee_Cl87an4VQTgGAJOxILg.png" alt="Code screenshot of querying date columns using the shorter whereMonth method"></p>
            <p>Pretty self-explanatory but helpful nonetheless! Instead of using some nested where clauses or looping through the returned collection to breakdown the date and grab only ones from a particular month, eloquent includes a few of these conditional date methods. There’s:</p>
            <p>
                <ul>
                    <li><span class="inline-block plr-1 line-height-2 font-small bg-very-clear-black font-bold font-code">whereDate('created_at', '12-31-2017')</span></li>
                    <li><span class="inline-block plr-1 line-height-2 font-small bg-very-clear-black font-bold font-code">whereMonth('created_at', '12')</span></li>
                    <li><span class="inline-block plr-1 line-height-2 font-small bg-very-clear-black font-bold font-code">whereYear('created_at', '2017')</span></li>
                    <li><span class="inline-block plr-1 line-height-2 font-small bg-very-clear-black font-bold font-code">whereDay('created_at', '31')</span></li>
                </ul>
            </p>
            <p>All of these filter out a collection depending on the date column entered as the first parameter.</p>
            <p>&nbsp;</p>
            <p><h3>Only return models if they have a particular relationship using has()</h3></p>
            <p><img src="https://cdn-images-1.medium.com/max/1600/1*1db7McGjfHeAXQkkNEOpEQ.png" alt="Code screenshot of only returning models if they have a particular relationship using has()"></p>
            <p>By using <span class="inline-block plr-1 line-height-2 font-small bg-very-clear-black font-bold font-code">->with()</span> you can call relationship models and lazy-load them alongside the models you’re querying for in the first place. However, if you’d only like to return those models whose relationship <em>actually</em> exists you’ll want to add in the <span class="inline-block plr-1 line-height-2 font-small bg-very-clear-black font-bold font-code">->has()</span> method before your with call.</p>
            <p>Additionally, you can drill down into child and grandchild relationships, as long as they’re separated with a period. For example, if the <span class="font-bold">PostImage</span> model in the above screenshot had a relationship called <span class="font-bold">PostImageComment</span> and I wanted to only return posts that had images and <em>whose images had comments</em>, I’d change the line in the example above to <span class="inline-block plr-1 line-height-2 font-small bg-very-clear-black font-bold font-code">->has(‘postImages.postImageComments’)</span>.</p>
            <p>That’s all for now! I’ll be keeping my eyes peeled for more (slightly) hidden helpers scattered around eloquent and Laravel in general.</p>
            <p>&nbsp;</p>
        </main>
    </div>
@endsection