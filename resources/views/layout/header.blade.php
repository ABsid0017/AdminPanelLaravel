<nav >
        <div class="logo">
            <img class="navLogo" src="{{ URL::asset('img/logo.png') }}" alt="logo">
        </div>
        <div class="toggle">
            <a href="#"></a>
        </div>
        <ul class="menu">
            <li> <a href="{{ url('/dashboard') }}">Dashboard</a></li>
            <li> <a href="{{ url('/products') }}">Product Management</a></li>
            <li> <a href="{{ url('/users') }}">Seller Management</a></li>
            <li> <a href="{{ url('/complains') }}">Complaints</a></li>
            <li> <a href="{{ url('/policies') }}">Policies</a></li>
            <li> <a href="{{ url('/admins') }}">Admins</a></li>
            <li> <a class="btn btn-light" href="{{ url('/') }}" role="button" style="background: #0e1a35; color: #fff;">Logout</a></li>
        </ul>
    </nav>