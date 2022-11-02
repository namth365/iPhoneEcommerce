<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">
        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active">
                    <a href="index.html"><i class="menu-icon fa fa-laptop"></i>Dashboard </a>
                </li>
                <li class="menu-title">UI elements</li><!-- /.menu-title -->
                <li class="menu-item-has-children dropdown">
                    <a href="{{route('categories.index')}}" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Categories</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-table"></i><a href="{{route('categories.create')}}">Add</a></li>
                        <li><i class="fa fa-table"></i><a href="{{route('categories.index')}}">List</a></li>
                    </ul>
                </li>
                <li class="menu-item-has-children dropdown">
                    <a href="{{route('products.index')}}" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Products</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-table"></i><a href="{{route('products.create')}}">Add</a></li>
                        <li><i class="fa fa-table"></i><a href="{{route('products.index')}}">List</a></li>
                    </ul>
                </li>
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Orders</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-table"></i><a href="tables-basic.html">Add</a></li>
                        <li><i class="fa fa-table"></i><a href="tables-data.html">List</a></li>
                    </ul>
                </li>
                <li class="menu-item-has-children dropdown">
                    <a href="{{route('coupons.index')}}" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Coupons</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-table"></i><a href="{{route('coupons.create')}}">Add</a></li>
                        <li><i class="fa fa-table"></i><a href="{{route('coupons.index')}}">List</a></li>
                    </ul>
                </li>
                <li class="menu-item-has-children dropdown">
                    <a href="{{route('users.index')}}" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Users</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-table"></i><a href="{{route('users.create')}}">Add</a></li>
                        <li><i class="fa fa-table"></i><a href="{{route('users.index')}}">List</a></li>
                    </ul>
                </li>
                <li class="menu-item-has-children dropdown">
                    <a href=" {{route('roles.index')}} " class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Roles</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-table"></i><a href="{{route('roles.create')}}">Add</a></li>
                        <li><i class="fa fa-table"></i><a href="{{route('roles.index')}}">List</a></li>
                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside>