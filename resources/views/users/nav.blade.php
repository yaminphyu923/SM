<div class="container-fluid nav-body">

    <div class="d-flex justify-content-around">

        <a class="@yield('home')" href="{{ route('home') }}"><i class="fa-solid fa-house fa-xl"></i></a>


        <a class="" href="#"><i class="fa-solid fa-tv fa-xl"></i></a>


        <a class="" href="#"><i class="fa-solid fa-users fa-xl"></i></a>


        <a class="" href="#"><i class="fa-solid fa-user fa-xl"></i></a>


        <a class="" href="#"><i class="fa-solid fa-bell fa-xl"></i></a>


        <a class="@yield('bar-active')" href="#" data-bs-toggle="dropdown" aria-expanded="false"><i
                class="fa-solid fa-bars fa-xl"></i></a>

        <ul class="dropdown-menu">

            <li><a href="{{ route('profile') }}" class="dropdown-item">Profile</a></li>
            <li><a class="dropdown-item" onclick="signOut()">Logout</a></li>

            <form action="{{ route('logout') }}" method="POST" id="sign-out">
                @csrf
            </form>
        </ul>

    </div>
</div>
