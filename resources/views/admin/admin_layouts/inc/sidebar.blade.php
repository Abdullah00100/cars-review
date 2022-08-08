<div class="sidebar" data-color="purple" data-image="{{asset('admin/img/sidebar-5.jpg')}}">

    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="/dashbord" class="simple-text">
                    
                    <img style="height:40px;width:100px; margin-left:10px;" src="{{asset('images/logo.png')}}" alt="">

                </a>
            </div>

            <ul class="nav">
                <li class="{{request()->is('dashbord') ? 'active' : ''}}">
                    <a href="/dashbord">
                        <i class="pe-7s-graph"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="{{request()->is('dashbord/user/{$id}') ? 'active' : ''}}">
                    <a href="/dashbord/user/{{Auth::user()->id}}">
                        <i class="pe-7s-user"></i>
                        <p>User Profile</p>
                    </a>
                </li>
                @if(Auth::user()->role_as == 1)
                <li class="{{request()->is('dashbord/users') ? 'active' : ''}}">
                    <a href="/dashbord/users">
                        <i class="pe-7s-users"></i>
                        <p>Users List</p>
                    </a>
                </li>
                @endif
                <li class="{{request()->is('dashbord/cars') ? 'active' : ''}}">
                    <a href="/dashbord/cars">
                        <i class="pe-7s-car"></i>
                        <p>cars</p>
                    </a>
                </li>
                <li class="{{request()->is('dashbord/models') ? 'active' : ''}}">
                    <a href="/dashbord/models">
                        <i class="pe-7s-ball"></i>
                        <p>Models</p>
                    </a>
                </li>
                <li class="{{request()->is('dashbord/engines') ? 'active' : ''}}">
                    <a href="/dashbord/engines">
                        <i class="pe-7s-diamond"></i>
                        <p>Engines</p>
                    </a>
                </li>
                <li class="{{request()->is('dashbord/products') ? 'active' : ''}}">
                    <a href="/dashbord/products">
                        <i class="pe-7s-diamond"></i>
                        <p>Products</p>
                    </a>
                </li>
               
            </ul>
    	</div>
    </div>