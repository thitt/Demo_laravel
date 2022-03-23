<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="index.html">
                <i class="mdi mdi-home menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <i class="mdi mdi-circle-outline menu-icon"></i>
                <span class="menu-title">Category</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('listCategory') }}">List</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('createCategory') }}">Create</a></li>
                </ul>
            </div>
        </li>
{{--        <li class="nav-item">--}}
{{--            <a class="nav-link" href="pages/forms/basic_elements.html">--}}
{{--                <i class="mdi mdi-view-headline menu-icon"></i>--}}
{{--                <span class="menu-title">Form elements</span>--}}
{{--            </a>--}}
{{--        </li>--}}
{{--        <li class="nav-item">--}}
{{--            <a class="nav-link" href="pages/charts/chartjs.html">--}}
{{--                <i class="mdi mdi-chart-pie menu-icon"></i>--}}
{{--                <span class="menu-title">Charts</span>--}}
{{--            </a>--}}
{{--        </li>--}}
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#posts" aria-expanded="false" aria-controls="posts">
                <i class="mdi mdi-grid-large menu-icon"></i>
                <span class="menu-title">Posts</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="posts">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('listPosts') }}"> List </a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('createPosts') }}"> Create </a></li>
                </ul>
            </div>
        </li>
{{--        <li class="nav-item">--}}
{{--            <a class="nav-link" href="pages/icons/mdi.html">--}}
{{--                <i class="mdi mdi-emoticon menu-icon"></i>--}}
{{--                <span class="menu-title">Icons</span>--}}
{{--            </a>--}}
{{--        </li>--}}
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#user" aria-expanded="false" aria-controls="user">
                <i class="mdi mdi-account menu-icon"></i>
                <span class="menu-title">User Pages</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="user">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('listUser') }}"> List </a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('createUser') }}"> Create </a></li>
                </ul>
            </div>
        </li>
{{--        <li class="nav-item">--}}
{{--            <a class="nav-link" href="documentation/documentation.html">--}}
{{--                <i class="mdi mdi-file-document-box-outline menu-icon"></i>--}}
{{--                <span class="menu-title">Documentation</span>--}}
{{--            </a>--}}
{{--        </li>--}}
    </ul>
</nav>
