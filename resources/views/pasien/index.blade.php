<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Pasien') }}
        </h2>
    </x-slot>

    <head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>DataTables </title>
	<meta name="description" content="">
	<meta name="keywords" content="">
	<link href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css" rel=" stylesheet">
	<!--Replace with your tailwind.css once created-->


	<!--Regular Datatables CSS-->
	<link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
	<!--Responsive Extension Datatables CSS-->
	<link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet">

	<style>
		/*Overrides for Tailwind CSS */

		/*Form fields*/
		.dataTables_wrapper select,
		.dataTables_wrapper .dataTables_filter input {
			color: #4a5568;
			/*text-gray-700*/
			padding-left: 1rem;
			/*pl-4*/
			padding-right: 1rem;
			/*pl-4*/
			padding-top: .5rem;
			/*pl-2*/
			padding-bottom: .5rem;
			/*pl-2*/
			line-height: 1.25;
			/*leading-tight*/
			border-width: 2px;
			/*border-2*/
			border-radius: .25rem;
			border-color: #edf2f7;
			/*border-gray-200*/
			background-color: #edf2f7;
			/*bg-gray-200*/
		}

		/*Row Hover*/
		table.dataTable.hover tbody tr:hover,
		table.dataTable.display tbody tr:hover {
			background-color: #ebf4ff;
			/*bg-indigo-100*/
		}

		/*Pagination Buttons*/
		.dataTables_wrapper .dataTables_paginate .paginate_button {
			font-weight: 700;
			/*font-bold*/
			border-radius: .25rem;
			/*rounded*/
			border: 1px solid transparent;
			/*border border-transparent*/
		}

		/*Pagination Buttons - Current selected */
		.dataTables_wrapper .dataTables_paginate .paginate_button.current {
			color: #fff !important;
			/*text-white*/
			box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06);
			/*shadow*/
			font-weight: 700;
			/*font-bold*/
			border-radius: .25rem;
			/*rounded*/
			background: #667eea !important;
			/*bg-indigo-500*/
			border: 1px solid transparent;
			/*border border-transparent*/
		}

		/*Pagination Buttons - Hover */
		.dataTables_wrapper .dataTables_paginate .paginate_button:hover {
			color: #fff !important;
			/*text-white*/
			box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06);
			/*shadow*/
			font-weight: 700;
			/*font-bold*/
			border-radius: .25rem;
			/*rounded*/
			background: #667eea !important;
			/*bg-indigo-500*/
			border: 1px solid transparent;
			/*border border-transparent*/
		}

		/*Add padding to bottom border */
		table.dataTable.no-footer {
			border-bottom: 1px solid #e2e8f0;
			/*border-b-1 border-gray-300*/
			margin-top: 0.75em;
			margin-bottom: 0.75em;
		}

		/*Change colour of responsive icon*/
		table.dataTable.dtr-inline.collapsed>tbody>tr>td:first-child:before,
		table.dataTable.dtr-inline.collapsed>tbody>tr>th:first-child:before {
			background-color: #667eea !important;
			/*bg-indigo-500*/
		}
	</style>



</head>

<body class="bg-gray-100 text-gray-900 tracking-wider leading-normal">
	<!--Container-->
	<div class="w-full px-2">

		<!--Title-->
		<div class="flex items-center font-sans font-bold break-normal text-indigo-500 px-2 py-8 text-xl md:text-2xl">
	</div>

		<!--Card-->
		<div id='recipients' class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">

			<!--upload ecel-->
			<div class="container mt-5 text-center">
				<form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
					@csrf
					<div class="flex justify-center">
						<div class="mb-3 w-96">
							<input class="form-control
								block
								w-full
								px-3
								py-1.5
								text-base
								font-normal
								text-gray-700
								bg-white bg-clip-padding
								border border-solid border-gray-300
								rounded
								transition
								ease-in-out
								m-0
								focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" 
								type="file" name="file" id="customFile">
						</div>
					</div>
					<button class="mr-5 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Import Users</button>
					<a class="mr-5 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" href="{{ route('export-users') }}">Export Users</a>
					<a href="{{ route('pasien.create') }}" class="mr-5 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Input Pasien </a>
				</form>
				<form action="/" method="GET">
                        <div class="input-group mb-3 py-5">
                            <input type="date" class="form-control" name="start_date">
                            <input type="date" class="form-control" name="end_date">
                            <button class="mr-5 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" type="submit">GET</button>
							<a href="{{ route('pasien.index') }}" class="mr-5 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Refresh </a>
                        </div>
                    </form>
			</div>	

                
                    
          
			


			<table id="example" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
				<thead>
					
					<tr>
						<th data-priority="1">No</th>
						<th data-priority="2">Nama</th>
						<th data-priority="3">NIK</th>
						<th data-priority="4">Alamat</th>
						<th data-priority="5">Jenis Kelamin</th>
						<th data-priority="6">Riwayat Keluarga</th>
						<th data-priority="7">Faskes</th>
						<th data-priority="8">Berat Badan</th>
						<th data-priority="9">Tinggi Badan</th>
						<th data-priority="10">Tekanan Darah</th>
						<th data-priority="11">GDS</th>
						<th data-priority="12">Kolestrol</th>
						<th data-priority="13">Aksi</th>
					</tr>
				</thead>
				<tbody>
					@php
                    @endphp
				</tr>

                    @forelse ($pasiens as $key => $pasien)
					
                        <tr>
							<th class="border px-4 py-2">{{ ++$key }}</th>
                            <td class="border px-4 py-2">{{ $pasien->nama }}</td>
                            <td class="border px-4 py-2">{{ $pasien->nik }}</td>
                            <td class="border px-4 py-2">{{ $pasien->alamat }}</td>
                            <td class="border px-4 py-2">{{ $pasien->jenis_kelamin }}</td>
                            <td class="border px-4 py-2">{{ $pasien->riwayat_penyakit }}</td>
                            <td class="border px-4 py-2">{{ $pasien->faskes }}</td>
                            <td class="border px-4 py-2">{{ $pasien->berat_badan }}</td>
                            <td class="border px-4 py-2">{{ $pasien->tinggi_badan }}</td>
                            <td class="border px-4 py-2">{{ $pasien->tekanan_darah }}</td>
                            <td class="border px-4 py-2">{{ $pasien->gds }}</td>
                            <td class="border px-4 py-2">{{ $pasien->kolestrol }}</td>
                            <td class="border px-4 py-2">
                                <a href="{{ route('pasien.show', $pasien->id) }}">View</a>
                                <form action="{{ route('pasien.destroy',$pasien->id) }}" method="POST" class="inLine block">
                                    @csrf
                                    @method('delete')
                                    <button type="Delete"> 
                                    delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="13" class="border px-4 py-2 text-center"> Tidak ada data</td>
                        </tr>
                    @endforelse
				</tbody>

			</table>


		</div>
		<!--/Card-->


	</div>
	<!--/container-->





	<!-- jQuery -->
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

	<!--Datatables -->
	<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
	<script>
		$(document).ready(function() {

			var table = $('#example').DataTable({
					responsive: true
				})
				.columns.adjust()
				.responsive.recalc();
		});
	</script>

</body>

</x-app-layout>
  