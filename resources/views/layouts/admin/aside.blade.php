<aside class="relative bg-purple-300 h-screen w-64 hidden sm:block sticky top-0">
	<div class="p-6">
			<a href="{{ route('admin.dashboard') }}" class="text-violet-950 text-3xl font-semibold uppercase hover:opacity-75">L'Image</a>
	</div>
	<nav class="text-white text-base font-semibold pt-3 px-3">
			<a href="{{ route('admin.citas') }}" class="flex items-center text-white opacity-100 bg-violet-950 hover:opacity-75 py-4 pl-6 nav-item my-4 rounded-md">
					<i class="fas fa-calendar mr-3"></i>
					Citas Programadas
			</a>
			<a href="{{ route('admin.promociones') }}" class="flex items-center text-white opacity-100 bg-violet-950 hover:opacity-75 py-4 pl-6 nav-item rounded-md">
					<i class="fas fa-table mr-3"></i>
					Promociones
			</a>
			<a href="{{ route('admin.transaccion.create') }}" class="flex items-center text-white opacity-100 bg-violet-950 hover:opacity-75 py-4 pl-6 nav-item my-4 rounded-md">
				<i class="fa-solid fa-money-bill mr-3"></i>
					Transacciones
			</a>
			<a href="{{ route('admin.comprobante') }}" class="flex items-center text-white opacity-100 bg-violet-950 hover:opacity-75 py-4 pl-6 nav-item my-4 rounded-md">
				<i class="fa-solid fa-ticket mr-3"></i>
				Comprobante
		</a>
			<a href="{{ route('admin.reporte') }}" class="flex items-center text-white opacity-100 bg-violet-950 hover:opacity-75 py-4 pl-6 nav-item my-4 rounded-md">
					<i class="fas fa-tablet-alt mr-3"></i>
					Reporte
			</a>
			<a href="{{ route('admin.servicio.create') }}" class="flex items-center text-white opacity-100 bg-violet-950 hover:opacity-75 py-4 pl-6 nav-item rounded-md">
					<i class="fa-solid fa-cart-shopping mr-3"></i>
					Servicios
			</a>
	</nav>
</aside>
