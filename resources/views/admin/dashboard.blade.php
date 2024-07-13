@extends('layouts.admin')
@section('title', 'Admin Dashboard')
@section('content')
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
@endsection