<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="{{ url('./user/logged')}}">
            <span class="align-middle">Eatery Restaurant</span>
        </a>

        <ul class="sidebar-nav">
            <li class="sidebar-header">
                content
            </li>

            {{-- <li class="sidebar-item">
                <a class="sidebar-link" href="#">
                    <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
                </a>
            </li> --}}

            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('user_table') }}">
                    <i class="align-middle" data-feather="users"></i> <span class="align-middle">User's Data</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('add_menu') }}">
                    <i class="align-middle" data-feather="coffee"></i> <span class="align-middle">Add Menu</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('menu_table') }}">
                    <i class="align-middle" data-feather="coffee"></i> <span class="align-middle">Menu</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('add_chef') }}">
                    <i class="align-middle" data-feather="user-plus"></i> <span class="align-middle">Add Chef</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('chef_table') }}">
                    <i class="align-middle" data-feather="users"></i> <span class="align-middle">Chef Data</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{route('reserve_data')}}">
                    <i class="align-middle" data-feather="book-open"></i> <span class="align-middle">Reservations</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{route('complete_reservation_table')}}">
                    <i class="align-middle" data-feather="check"></i> <span class="align-middle">Completed Reservations</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{route('trash_reservation')}}">
                    <i class="align-middle" data-feather="trash"></i> <span class="align-middle">Trash Reservations</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{route('add_category')}}">
                    <i class="align-middle" data-feather="clipboard"></i> <span class="align-middle">Add Category</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{route('category_table')}}">
                    <i class="align-middle" data-feather="bookmark"></i> <span class="align-middle">Category Table</span>
                </a>
            </li>
        </ul>
    </div>
</nav>