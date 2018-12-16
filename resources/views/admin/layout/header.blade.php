<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" >Trang quản trị</a>
    </div>
    <!-- /.navbar-header -->
    @if(Auth('admin')->check())
    <ul class="nav navbar-top-links navbar-right">
        <!-- /.dropdown -->
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
            {{Auth('admin')->user()->name}}</a>
            <ul class="dropdown-menu dropdown-user">                
                <li><a href="admin/edit/{{ Auth('admin')->user()->id }}"><i class="fa fa-refresh fa-fw"></i> Thông tin</a>
                </li>
                <li class="divider"></li>
                <li><a href="admin/logout"><i class="fa fa-sign-out fa-fw"></i> Thoát</a>
                </li>
                
            </ul>
            <!-- /.dropdown-user -->
        </li>
        <!-- /.dropdown -->
    </ul>
    <!-- /.navbar-top-links -->
    @endif
    @include('admin.layout.menu')
    <!-- /.navbar-static-side -->
</nav>