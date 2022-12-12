
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
            @php
            $userDetail = session()->get('user');
            if($userDetail['role']==1){
            @endphp
            <li> <a href="{{ url('/admins') }}">Admins</a></li>
            @php
            }
            @endphp
            <li> 
            <div class="dropdown">
                <button class="dropbtn">
                    <span style="padding-right: 10px;" >Hi  !</span>
                @php
                $userDetail = session()->get('user');
                print($userDetail['name']);
                @endphp
                </button>
                <div class="dropdown-content">
                    <a href="{{ route('admin.logout') }}">Logout</a>
                </div>
            </div>
            </li>
        </ul>
    </nav>