<x-app-layout>
	<aside class="relative bg-purple-300 h-screen w-64 hidden sm:block shadow-xl">
		<div class="p-6">
			<a href="index.html" class="text-neutral-900 text-3xl font-semibold uppercase hover:text-violet-950">L'Image</a>
		</div>
		<nav class="text-white text-base font-semibold pt-3 px-3">
			<a href="#" class="flex items-center text-white opacity-75 bg-violet-950 hover:opacity-100 py-4 pl-6 nav-item my-4 rounded-md" data-page="citas">
				<i class="fas fa-sticky-note mr-3"></i>
				Citas Programadas
			</a>
			<a href="#" class="flex items-center text-white opacity-75 bg-violet-950 hover:opacity-100 py-4 pl-6 nav-item rounded-md" data-page="promociones">
				<i class="fas fa-table mr-3"></i>
				Promociones
			</a>
			<a href="#" class="flex items-center text-white opacity-75 bg-violet-950 hover:opacity-100 py-4 pl-6 nav-item my-4 rounded-md" data-page="transacciones">
				<i class="fas fa-align-left mr-3"></i>
				Transacciones
			</a>
			<a href="#" class="flex items-center text-white opacity-75 bg-violet-950 hover:opacity-100 py-4 pl-6 nav-item rounded-md" data-page="reporte">
				<i class="fas fa-tablet-alt mr-3"></i>
				Reporte
			</a>
			<a href="#" class="flex items-center text-white opacity-75 bg-violet-950 hover:opacity-100 py-4 pl-6 nav-item my-4 rounded-md" data-page="calendar">
				<i class="fas fa-calendar mr-3"></i>
				Calendar
			</a>
		</nav>
	</aside>

	<div class="w-full flex flex-col h-screen overflow-y-hidden">
		<div class="w-full overflow-x-hidden border-t flex flex-col">
			<main class="w-full flex-grow p-4">
				<div id="contenido">
					<div class="w-full mt-12">
						<h1 class="text-xl pb-3 flex items-center">
							<i class="fas fa-list mr-3"></i> Latest Reports
						</h1>
						<div class="bg-white overflow-auto">
							<table class="min-w-full bg-white">
								<thead class="bg-gray-800 text-white">
									<tr>
										<th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Name</th>
										<th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Last name</th>
										<th class="text-left py-3 px-4 uppercase font-semibold text-sm">Phone</th>
										<th class="text-left py-3 px-4 uppercase font-semibold text-sm">Email</th>
									</tr>
								</thead>
								<tbody class="text-gray-700">
									<tr>
										<td class="w-1/3 text-left py-3 px-4">Lian</td>
										<td class="w-1/3 text-left py-3 px-4">Smith</td>
										<td class="text-left py-3 px-4"><a class="hover:text-blue-500" href="tel:622322662">622322662</a></td>
										<td class="text-left py-3 px-4"><a class="hover:text-blue-500" href="mailto:jonsmith@mail.com">jonsmith@mail.com</a></td>
									</tr>
									<tr class="bg-gray-200">
										<td class="w-1/3 text-left py-3 px-4">Emma</td>
										<td class="w-1/3 text-left py-3 px-4">Johnson</td>
										<td class="text-left py-3 px-4"><a class="hover:text-blue-500" href="tel:622322662">622322662</a></td>
										<td class="text-left py-3 px-4"><a class="hover:text-blue-500" href="mailto:jonsmith@mail.com">jonsmith@mail.com</a></td>
									</tr>
									<tr>
										<td class="w-1/3 text-left py-3 px-4">Oliver</td>
										<td class="w-1/3 text-left py-3 px-4">Williams</td>
										<td class="text-left py-3 px-4"><a class="hover:text-blue-500" href="tel:622322662">622322662</a></td>
										<td class="text-left py-3 px-4"><a class="hover:text-blue-500" href="mailto:jonsmith@mail.com">jonsmith@mail.com</a></td>
									</tr>
									<tr class="bg-gray-200">
										<td class="w-1/3 text-left py-3 px-4">Isabella</td>
										<td class="w-1/3 text-left py-3 px-4">Brown</td>
										<td class="text-left py-3 px-4"><a class="hover:text-blue-500" href="tel:622322662">622322662</a></td>
										<td class="text-left py-3 px-4"><a class="hover:text-blue-500" href="mailto:jonsmith@mail.com">jonsmith@mail.com</a></td>
									</tr>
									<tr>
										<td class="w-1/3 text-left py-3 px-4">Lian</td>
										<td class="w-1/3 text-left py-3 px-4">Smith</td>
										<td class="text-left py-3 px-4"><a class="hover:text-blue-500" href="tel:622322662">622322662</a></td>
										<td class="text-left py-3 px-4"><a class="hover:text-blue-500" href="mailto:jonsmith@mail.com">jonsmith@mail.com</a></td>
									</tr>
									<tr class="bg-gray-200">
										<td class="w-1/3 text-left py-3 px-4">Emma</td>
										<td class="w-1/3 text-left py-3 px-4">Johnson</td>
										<td class="text-left py-3 px-4"><a class="hover:text-blue-500" href="tel:622322662">622322662</a></td>
										<td class="text-left py-3 px-4"><a class="hover:text-blue-500" href="mailto:jonsmith@mail.com">jonsmith@mail.com</a></td>
									</tr>
									<tr>
										<td class="w-1/3 text-left py-3 px-4">Oliver</td>
										<td class="w-1/3 text-left py-3 px-4">Williams</td>
										<td class="text-left py-3 px-4"><a class="hover:text-blue-500" href="tel:622322662">622322662</a></td>
										<td class="text-left py-3 px-4"><a class="hover:text-blue-500" href="mailto:jonsmith@mail.com">jonsmith@mail.com</a></td>
									</tr>
									<tr class="bg-gray-200">
										<td class="w-1/3 text-left py-3 px-4">Isabella</td>
										<td class="w-1/3 text-left py-3 px-4">Brown</td>
										<td class="text-left py-3 px-4"><a class="hover:text-blue-500" href="tel:622322662">622322662</a></td>
										<td class="text-left py-3 px-4"><a class="hover:text-blue-500" href="mailto:jonsmith@mail.com">jonsmith@mail.com</a></td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</main>
		</div>
	</div>
</x-app-layout>