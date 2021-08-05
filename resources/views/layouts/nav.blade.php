<div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
                          <a class="navbar-brand" href="{{ url('/') }}">Home</a>
                          
                          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                          </button>   
                            <div class="collapse navbar-collapse" id="navbarsExampleDefault">
                              <ul class="navbar-nav mr-auto">
                                {{-- @auth
                                  <li class="nav-item">
                                    <a class="nav-link" href="{{ route('users.edit',Auth::user()->id)}}">User Profile</a>
                                  </li>
                                  @endauth --}}
                                  @auth
                                  @if (Auth::user()->isAdmin())
                                  <li class="nav-item">
                                    <a class="nav-link" href="{{ route('users.index')}} ">All Users</a>
                                  </li>    
                                  @endif 
                                  @endauth
                                
                              @auth
                              @if (Auth::user()->isAdmin())
                                  </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Categories</a>
                                    <div class="dropdown-menu" aria-labelledby="dropdown01">
                                      <a class="dropdown-item" href="{{ route('categories.index') }}">All Categories</a>
                                      <a class="dropdown-item" href="{{ route('categories.create') }}">Create Categories</a>
                                    </div>
                                  </li>
                                  <li class="nav-item">
                                    <a class="nav-link" href="{{ route('tags.index')}} ">Tags</a>
                                  </li>
                                <li class="nav-item dropdown">
                                  <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Posts</a>
                                  <div class="dropdown-menu" aria-labelledby="dropdown01">
                                    <a class="dropdown-item" href="{{ route('posts.index') }}">All posts</a>
                                    <a class="dropdown-item" href="{{ route('posts.create') }}">Create Post</a>
                                    <a class="dropdown-item" href="{{ route('trashed.index') }}">Trashed</a>
                                  </div>
                                </li>
                                @endauth
                                @endif 
                              </ul>
                              {{-- <form class="form-inline my-2 my-lg-0">
                                <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
                                <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
                              </form> --}}
                                <!-- Right Side Of Navbar -->