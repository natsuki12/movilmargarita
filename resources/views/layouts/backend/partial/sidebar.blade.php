
<style type="text/css">
	.nav-sidebar .menu-open>.nav-link .right {
    -ms-transform: rotate(-90deg);
    transform: rotate(
90deg
);
}
</style>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
	<!-- Brand Logo -->
	
	<!-- Sidebar -->
	<div class="sidebar">
		<!-- Sidebar user panel (optional) -->
		<div class="user-panel mt-3 pb-3 mb-3 d-flex">
			<div class="image">
				<img src="{{ asset('assets/backend/img/logo.png') }}" class="img-circle elevation-2" alt="User Image">
			</div>
			<div class="info">
				<a href="#" class="d-block">{{ Auth::user()->name }}</a>
			</div>
		</div>

		<!-- Sidebar Menu -->
		<nav class="mt-2">
			<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

				

				<!-- Add icons to the links using the .nav-icon class
					 with font-awesome or any other icon font library -->
				<li class="nav-item has-treeview">
					<a href="{{ route('admin.dashboard') }}" class="nav-link {{ Request::is('admin/dashboard') ? 'active' : '' }}">
						<i class="fa fa-tachometer-alt"></i>
						<p>
							Panel de inicio
						</p>
					</a>
				</li>
				@if(auth()->user()->hasRole('admin') || auth()->user()->hasRole('caja'))
				<li class="nav-item has-treeview">
					<a href="{{ route('admin.pos.index') }}" class="nav-link {{ Request::is('admin/pos') ? 'active' : '' }}">
						<i class="nav-icon fa fa-upload"></i>
						<p>
							Cargo De Pedido
						</p>
					</a>
				</li>
				@endif

				@if(auth()->user()->hasRole('admin'))
				<li class="nav-item has-treeview {{ Request::is('admin/employee*') ? 'menu-open' : '' }}">
					<a href="#" class="nav-link {{ Request::is('admin/employee*') ? 'active' : '' }}">
						<i class="nav-icon fa fa-user"></i>
						<p>
							Empleados
							<i class="right fa fa-angle-right"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="{{ route('admin.employee.create') }}" class="nav-link {{ Request::is('admin/employee/create') ? 'active' : '' }}">
								<i class="fa fa-user-plus"></i>
								<p>Agregar empleados</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="{{ route('admin.employee.index') }}" class="nav-link {{ Request::is('admin/employee') ? 'active' : '' }}">
								<i class="fas fa-users"></i>
								<p>Todos los empleados</p>
							</a>
						</li>
					</ul>
				</li>
				<li class="nav-item has-treeview {{ Request::is('admin/attendance*') ? 'menu-open' : '' }}">
					<a href="#" class="nav-link {{ Request::is('admin/attendance*') ? 'active' : '' }}">
						<i class="nav-icon fa fa-clipboard-check"></i>
						<p>
							Asistencia
							<i class="right fa fa-angle-right"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="{{ route('admin.attendance.create') }}" class="nav-link {{ Request::is('admin/attendance/create') ? 'active' : '' }}">
								<i class="fa fa-calendar-check-o"></i>
								<p>Marcar asistencia</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="{{ route('admin.attendance.index') }}" class="nav-link {{ Request::is('admin/attendance') ? 'active' : '' }}">
								<i class="fa fa-clipboard-list"></i>
								<p>Todas las asistencias</p>
							</a>
						</li>
					</ul>
				</li>
				<li class="nav-item has-treeview {{ Request::is('admin/customer*') ? 'menu-open' : '' }}">
					<a href="#" class="nav-link {{ Request::is('admin/customer*') ? 'active' : '' }}">
						<i class="nav-icon fa fa-male"></i>
						<p>
							Persona autorizada
							<i class="right fa fa-angle-right"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="{{ route('admin.customer.create') }}" class="nav-link {{ Request::is('admin/customer/create') ? 'active' : '' }}">
								<i class="fas fa-user-o"></i>
								<p>Agregar persona</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="{{ route('admin.customer.index') }}" class="nav-link {{ Request::is('admin/customer') ? 'active' : '' }}">
								<i class="fa fa-users"></i>
								<p>Lista de autorizados</p>
							</a>
						</li>
					</ul>
				</li>
				<li class="nav-item has-treeview {{ Request::is('admin/supplier*') ? 'menu-open' : '' }}">
					<a href="#" class="nav-link {{ Request::is('admin/supplier*') ? 'active' : '' }}">
						<i class="nav-icon fa fa-box"></i>
						<p>
							Proveedor
							<i class="right fa fa-angle-right"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="{{ route('admin.supplier.create') }}" class="nav-link {{ Request::is('admin/supplier/create') ? 'active' : '' }}">
								<i class="fa fa-box-open"></i>
								<p>Agregar proveedor</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="{{ route('admin.supplier.index') }}" class="nav-link {{ Request::is('admin/supplier') ? 'active' : '' }}">
								<i class="fa fa-boxes"></i>
								<p>Todos los proveedores</p>
							</a>
						</li>
					</ul>
				</li>
				

				<li class="nav-item has-treeview {{ Request::is('admin/category*') ? 'menu-open' : '' }}">
					<a href="#" class="nav-link {{ Request::is('admin/category*') ? 'active' : '' }}">
						<i class="nav-icon fas fa-sitemap"></i>
						<p>
							Categoria
							<i class="right fa fa-angle-right"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="{{ route('admin.category.create') }}" class="nav-link {{ Request::is('admin/category/create') ? 'active' : '' }}">
								<i class="fas fa-plus-circle nav-icon"></i>
								<p>Agregar categoria</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="{{ route('admin.category.index') }}" class="nav-link {{ Request::is('admin/category') ? 'active' : '' }}">
								<i class="fas fa-sitemap nav-icon"></i>
								<p>Todas categorias</p>
							</a>
						</li>
					</ul>
				</li>
				<li class="nav-item has-treeview {{ Request::is('admin/product*') ? 'menu-open' : '' }}">
					<a href="#" class="nav-link {{ Request::is('admin/product*') ? 'active' : '' }}">
						<i class="nav-icon fa fa-shopping-basket"></i>
						<p>
							Productos
							<i class="right fa fa-angle-right"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="{{ route('admin.product.create') }}" class="nav-link {{ Request::is('admin/product/create') ? 'active' : '' }}">
								<i class="fa fa-cart-plus nav-icon"></i>
								<p>Agregar productos</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="{{ route('admin.product.index') }}" class="nav-link {{ Request::is('admin/product') ? 'active' : '' }}">
								<i class="fa shopping-basket nav-icon"></i>
								<p>Todos los productos</p>
							</a>
						</li>
					</ul>
				</li>
				@endif

				@if(auth()->user()->hasRole('admin') || auth()->user()->hasRole('contador'))
				<li class="nav-item has-treeview {{ Request::is('admin/expense*') ? 'menu-open' : '' }}">
					<a href="#" class="nav-link {{ Request::is('admin/expense*') ? 'active' : '' }}">
						<i class="nav-icon fa fa-calculator"></i>
						<p>
							Gastos
							<i class="right fa fa-angle-right"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="{{ route('admin.expense.create') }}" class="nav-link {{ Request::is('admin/expense/create') ? 'active' : '' }}">
								<i class="fa fa-circle-o nav-icon"></i>
								<p>Agregar gastos</p>
							</a>
						</li>
						
						<li class="nav-item">
							<a href="{{ route('admin.expense.month') }}" class="nav-link {{ Request::is('admin/expense-month*') ? 'active' : '' }}">
								<i class="fa fa-circle-o nav-icon"></i>
								<p>Gastos del mes</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="{{ route('admin.expense.yearly') }}" class="nav-link {{ Request::is('admin/expense-yearly*') ? 'active' : '' }}">
								<i class="fa fa-circle-o nav-icon"></i>
								<p>Gastos del año</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="{{ route('admin.expense.index') }}" class="nav-link {{ Request::is('admin/expense') ? 'active' : '' }}">
								<i class="fa fa-circle-o nav-icon"></i>
								<p>Todos los gastos</p>
							</a>
						</li>
					</ul>
				</li>
				@endif

				@if(auth()->user()->hasRole('admin'))
				<li class="nav-item has-treeview {{ Request::is('admin/order*') ? 'menu-open' : '' }}">
					<a href="#" class="nav-link {{ Request::is('admin/order*') ? 'active' : '' }}">
						<i class="nav-icon fa fa-list"></i>
						<p>
							Ordenes
							<i class="right fa fa-angle-right"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="{{ route('admin.order.pending') }}" class="nav-link {{ Request::is('admin/order/pending') ? 'active' : '' }}">
								<i class="fa fa-clipboard nav-icon"></i>
								<p>Orden pendiente</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="{{ route('admin.order.approved') }}" class="nav-link {{ Request::is('admin/order/approved') ? 'active' : '' }}">
								<i class="fa fa-clipboard-check nav-icon"></i>
								<p>Orden confirmada</p>
							</a>
						</li>
					</ul>
				</li>

				<li class="nav-item has-treeview {{ Request::is('admin/sales*') ? 'menu-open' : '' }}">
					<a href="#" class="nav-link {{ Request::is('admin/sales*') ? 'active' : '' }}">
						<i class="nav-icon fa fa-file-invoice"></i>
						<p>
							Reporte de pedidos
							<i class="right fa fa-angle-right"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="{{ route('admin.sales.today') }}" class="nav-link {{ Request::is('admin/sales-today') ? 'active' : '' }}">
								<i class="fa fa-file-alt"></i>
								<p>Reportes de hoy</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="{{ route('admin.sales.monthly') }}" class="nav-link {{ Request::is('admin/sales-monthly*') ? 'active' : '' }}">
								<i class="fa fa-file-alt"></i>
								<p>Reportes del mes</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="{{ route('admin.sales.total') }}" class="nav-link {{ Request::is('admin/sales-total') ? 'active' : '' }}">
								<i class="fa fa-file-alt"></i>
								<p>Total reportes</p>
							</a>
						</li>
					</ul>
				</li>

				
				@endif
				
				</a>
			</ul>
						</li>
			</ul>
		</nav>
		<!-- /.sidebar-menu -->
	</div>
	<!-- /.sidebar -->
</aside>
