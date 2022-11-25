@extends('layouts.beranda')

@section('content')
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Dashboard</h4>
            </div>
            <div class="row">
                <div class="col-sm-6 col-md-4">
                    <div class="card card-stats card-round">
                        <div class="card-body ">
                            <div class="row align-items-center">
                                <div class="col-icon">
                                    <div class="icon-big text-center icon-primary bubble-shadow-small">
                                        <i class="fas fa-users"></i>
                                    </div>
                                </div>
                                <div class="col col-stats ml-3 ml-sm-0">
                                    <a href="/user">
                                        <div class="numbers">
                                            <p class="card-category">Data Supplier</p>
                                            <h4 class="card-title">{{ $supplier }}</h4>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4">
                    <div class="card card-stats card-round">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-icon">
                                    <div class="icon-big text-center icon-info bubble-shadow-small">
                                        <i class="far fa-newspaper"></i>
                                    </div>
                                </div>
                                <div class="col col-stats ml-3 ml-sm-0">
                                    <div class="numbers">
                                        <p class="card-category">Data Kategori</p>
                                        <h4 class="card-title">{{ $kategori }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4">
                    <div class="card card-stats card-round">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-icon">
                                    <div class="icon-big text-center icon-success bubble-shadow-small">
                                        <i class="far fa-chart-bar"></i>
                                    </div>
                                </div>
                                <div class="col col-stats ml-3 ml-sm-0">
                                    <div class="numbers">
                                        <p class="card-category">Data Barang</p>
                                        <h4 class="card-title">{{ $barang }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-head-row">
                                <div class="card-title">User Statistics</div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div id="chart-container" style="min-height: 350px">
                                <canvas id="multipleBarChart"></canvas>
                            </div>
                            <div id="myChartLegend"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-secondary bg-secondary-gradient">
                        <div class="card-header">
                            <div class="card-title">Barang Masuk</div>
                            <div class="card-category">{{ date('Y-m-d') }}</div>
                        </div>
                        <div class="card-body pb-0">
                            <div class="mb-4 mt-2">
                                <h1 class="text-center">{{ $barang_masuk_today }}</h1>
                            </div>
                        </div>
                    </div>
                    <div class="card card-info bg-info-gradient">
                        <div class="card-header">
                            <div class="card-title">Pemasukan</div>
                            <div class="card-category">{{ date('Y-m-d') }}</div>
                        </div>
                        <div class="card-body pb-0">
                            <div class="mb-4 mt-2">
                                <h1 class="text-center">Rp. {{ number_format($total) }}</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js" integrity="sha512-ElRFoEQdI5Ht6kZvyzXhYG9NqjtkmlkfYk0wr6wHxU9JEHakS7UJZNeml5ALk+8IKlU6jDgMabC3vkumRokgJA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    var multipleBarChart = document.getElementById('multipleBarChart').getContext('2d');

var myMultipleBarChart = new Chart(multipleBarChart, {
	type: 'bar',
	data: {
		labels: ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"],
		datasets : [{
			label: "Barang Masuk",
			backgroundColor: '#59d05d',
			borderColor: '#59d05d',
			data: [95, 100, 112, 101, 144, 159, 178, 156, 188, 190, 210, 245],
		},{
			label: "Barang Keluar",
			backgroundColor: '#fdaf4b',
			borderColor: '#fdaf4b',
			data: [145, 256, 244, 233, 210, 279, 287, 253, 287, 299, 312,356],
		}],
	},
	options: {
		responsive: true,
		maintainAspectRatio: false,
		legend: {
			position : 'bottom'
		},
		title: {
			display: true,
			text: 'Traffic Stats'
		},
		tooltips: {
			mode: 'index',
			intersect: false
		},
		responsive: true,
		scales: {
			xAxes: [{
				stacked: true,
			}],
			yAxes: [{
				stacked: true
			}]
		}
	}
});
</script>
@endsection
