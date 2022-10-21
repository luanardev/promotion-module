<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="{{route('promotion.home')}}" class="brand-link">
        <span class="brand-text font-weight-light">{{config('promotion.name')}}</span>
    </a>
    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                @include("promotion::layouts.menu")
            </ul>
        </nav>
    </div>

</aside>
