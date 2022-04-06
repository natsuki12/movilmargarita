<nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
	<!-- Left navbar links -->
	<ul class="navbar-nav">
		<li class="nav-item">
			<a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars" style="padding-right: 1100px;"></i></a>
		</li>
		<li class="nav-item has-treeview">
					<a href="{{ route('admin.setting.index') }}" class="nav-link {{ Request::is('admin/setting') ? 'active' : '' }}">
						<i class="fa fa-cogs"></i>
						
					
						
					</a>
				</li>
                             <li class="nav-link"><a href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                       document.getElementById('logout-form').submit();">
                        <i class="nav-icon fa fa--cogs"></i>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
	</ul>
</nav>
