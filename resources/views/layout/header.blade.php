    <header id="header">
        <div class="container box_1170 main-menu">
            <div class="row align-items-center justify-content-center d-flex">
                <nav id="nav-menu-container">
                    <ul class="nav-menu">
                        <li class="menu-active"><a href="/home">Home</a></li>
                        <li class="menu-has-children"><a href="">Category</a>
                            <ul>
                                @foreach ($categories as $category)
                                <li><a href="{{ route('category', $category->id) }}">{{ $category->name }} </a></li> 
                                @endforeach
                            </ul>
                        </li>
                        @if (Auth::user())
                        <li class="menu-has-children"><a href="">My Post</a>
                            <ul>
                                <li><a href="{{ route('listPost', Auth::user()->id) }}">List Post</a></li>
                                <li><a href="{{ route('addPost') }}">Add Post</a></li>
                            </ul>
                        </li>
                        <li class="menu-has-children"><a href="">Chào {{ Auth::user()->name }}</a>
                            <ul>
                                <li><a href="{{ route('userProfile', Auth::user()->id) }}"><i class="lnr lnr-user"></i> <span>My Profile</span></a></li>
                                <li><a href="{{ route('userLogout') }}"><i class="lnr lnr-exit"></i>Logout</a></li>
                            </ul>
                        </li>
                        <!-- <li><a href="{{ route('userLogout') }}">Logout</a></li> -->
                        @elseif (!Auth::user())
                        <li><a href="{{ route('userLogin') }}">Login</a></li>
                        <li><a href="{{ route('userRegister') }}">Register</a></li>
                        @endif
                    </ul>
                </nav>
            </div>
        </div>
        <div class="search_input" id="search_input_box">
            <div class="container box_1170">
                <form class="d-flex justify-content-between">
                    <input type="text" class="form-control" id="search_input" placeholder="Search Here">
                    <button type="submit" class="btn"></button>
                    <span class="lnr lnr-cross" id="close_search" title="Close Search"></span>
                </form>
            </div>
        </div>
</header>

