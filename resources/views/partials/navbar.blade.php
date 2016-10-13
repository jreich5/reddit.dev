<nav class="navbar  navbar-inverse  navbar-fixed-top">
    <div class="container">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only"> Toggle navigation</span>
            <span class="icon-bar"> </span>
            <span class="icon-bar"> </span>
            <span class="icon-bar"> </span>
        </button>
  
    <a class="navbar-brand" href="/">Reddit Clone</a>
   
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li ><a href="{{ action('PostsController@index') }}">Posts</a> </li>
                <li> <a href="{{ action('PostsController@create') }}">Create Post</a> </li>
                <li> <a href="#">Account</a> </li>
                <li> <a href="#">Register</a> </li>
                <li> <a href="#">Login</a> </li>
                <li> <a href="#">Logout</a> </li>
            </ul>
        </div>
    </div>
</nav> 
  

