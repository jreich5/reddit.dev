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
                <li ><a href="{{ action('UsersController@index') }}">Users</a> </li>
                @if(Auth::check()) 
                    <li> <a href="{{ action('PostsController@create') }}">Create Post</a> </li>
                    <li> <a href="{{ action('UsersController@show', Auth::id()) }}">{{ Auth::user()->name }}</a> </li>
                    <li> <a href="{{ action('Auth\AuthController@getLogout') }}">Logout</a> </li>
                @else
                    <li> <a href="{{ action('Auth\AuthController@getLogin') }}">Login</a> </li>
                    <li> <a href="{{ action('Auth\AuthController@getRegister') }}">Register</a> </li>
                @endif
                <li class="navSearch">
                    <form method="GET" action="{{ action('PostsController@index') }}">
                        <input type="text" placeholder="Search Posts" name="search">    
                        <button type="submit">Go!</button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav> 
  

