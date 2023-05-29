@extends('Admin.layouts.master')
@section('content')

<div class="admin_dashboard_inner px-5 py-5">
    <div class="row">
        <div class="col-lg-3 mb-4">
            <div class="data_cards d-flex justify-content-between">
                <div class="data">
                    <p class="mb-0 title">Provider</p>
                    <p class="mb-0 data">{{ $provider_count }}</p>
                </div>
                <div class="data_icon">
                    <img src="{{asset('Admin/images/provider.svg') }}" />
                </div>
            </div>
        </div>
        <div class="col-lg-3 mb-4">
            <div class="data_cards d-flex justify-content-between">
                <div class="data_content">
                    <p class="mb-0 title">Practice</p>
                    <p class="mb-0 data">{{ $practice_count }}</p>
                </div>
                <div class="data_icon">
                    <img src="{{asset('Admin/images/practice_icon.svg') }}" />
                </div>
            </div>
        </div>
        
        <div class="col-lg-3 mb-4">
            <div class="data_cards d-flex justify-content-between">
                <div class="data">
                    <p class="mb-0 title">Total Revenue</p>
                    <p class="mb-0 data">$0</p>
                </div>
                <div class="data_icon">
                    <img src="{{asset('Admin/images/total_revenue_icon.svg') }}" />
                </div>
            </div>
        </div>
        <div class="col-lg-3 mb-4">
            <div class="data_cards d-flex justify-content-between">
                <div class="data">
                    <p class="mb-0 title">Active Jobs</p>
                    <p class="mb-0 data">{{$active_job_count}}</p>
                </div>
                <div class="data_icon">
                    <img src="{{asset('Admin/images/active_jobs_icon.svg') }}" />
                </div>
            </div>
        </div>
        <div class="col-lg-3 mb-4">
            <div class="data_cards d-flex justify-content-between">
                <div class="data">
                    <p class="mb-0 title">Completed Jobs</p>
                    <p class="mb-0 data">35</p>
                </div>
                <div class="data_icon">
                    <img src="{{asset('Admin/images/expried_jobs.svg') }}" />
                </div>
            </div>
        </div>
        <div class="col-lg-3 mb-4">
            <div class="data_cards d-flex justify-content-between">
                <div class="data">
                    <p class="mb-0 title">Total Jobs</p>
                    <p class="mb-0 data">{{$practice_count + $provider_count}}</p>
                </div>
                <div class="data_icon">
                    <img src="{{asset('Admin/images/total_jobs.svg') }}" />
                </div>
            </div>
        </div>
    </div>
    <!-- reports -->
    <div class="row mx-0 mb-5">
        <div class="col-lg-12 px-0 chart_header">
            <p class="mb-2">Reports</p>
        </div>
    </div>

    <!-- bar chart -->
    <div class="row">
        <div class="col-xl-6 mb-4">
            <div class="card_wrapper h-100">
                <div class="d-flex justify-content-between align-items-baseline">
                    <div class="chart_heading">
                        <p class="bar_title mb-1">Your earning overview of this year</p>
                        <p class="bar_sub_title">Last updated Thursday, August 22 at 12:00 AM (PT)</p>
                    </div>
                    <div class="earning d-flex align-items-center">
                        <div class="chart_bar_color  me-2">
                        </div>
                        <p class="mb-0">Earnings</p>
                    </div>
                </div>
                <div id="chart_div">
                </div>
            </div>
        </div>
        <div class="col-xl-6 mb-4">
            <div class="card_wrapper h-100">
                <div id="piechart" style="width: 100%; height: 300px;"></div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-7 mb-sm-3 mb-lg-0">
            <div class="recently_job_post_wrapper card_wrapper p-0 h-100">
                <div class="row mx-0">
                    <div class="col-lg-12 p-3 px-3 table_header">
                        <p class="mb-0">Recent Job Post</p>
                    </div>
                    <div class="col-lg-12 px-0">
                        <table class="table table-borderless text-center">
                            <thead>
                                <div>
                                    <tr>
                                        <th scope="col">S.No.</th>
                                        <th scope="col">Practitioner Type</th>
                                        <th scope="col">Clinic</th>
                                        <th scope="col">Experience</th>
                                    </tr>
                                </div>
                            </thead>
                            <tbody>
                                @foreach($recent_provider_data as $recent_provider)
                                <tr>
                                    <td scope="row">{{$loop->iteration}}</td>
                                    <td>{{ucwords($recent_provider->practitioner_Type)}}</td>
                                    <td>{{ucwords($recent_provider->clinicName)}}</td>
                                    <td>{{$recent_provider->professional_Experience}} Years</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-5 mb-sm-3 mb-lg-0">
            <div class="recently_activity_wrapper card_wrapper p-0 h-100">
                <div class="row mx-4">
                    <div class="col-lg-12  py-3 table_header">
                        <p class="mb-0">Recently Activity</p>
                    </div>
                    <div class="col-lg-12 px-0">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Abc company paid his premium</li>
                            <li class="list-group-item">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
                            <li class="list-group-item">Lorem ipsum dolor sit amet, consectetur adipiscing elit.Sed
                                porttitor eros a risus aliquam suscipit. Etiam turpis mauris, ultrices non</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script> -->
<!-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> -->
<!-- <srcipt src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.2.1/chart.min.js"></srcipt> -->

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script type="text/javascript">
google.charts.load('current', {
    'packages': ['corechart']
});
const drawChart = () => {
    var data = google.visualization.arrayToDataTable([
        ['Task', 'Hours per Day'],
        ['North VA', 11],
        ['South West VA', 2],
        ['Eastern Shore', 2],
        ['Central VA', 2],
        ['DC', 7]
    ]);

    var options = {
        width: 650,
        title: 'Earning',
        legend: {
            position: 'bottom',
            alignment: 'center',
            maxLines: 5
        },
        //   colors: ['#e0440e', '#e6693e', '#ec8f6e', '#f3b49f', '#f6c7b6'],
        colors: ['#a8d1fc', '#38bcc0', '#7992c8', '#358ba7', '#2e2d76']
    };

    var chart = new google.visualization.PieChart(document.getElementById('piechart'));

    chart.draw(data, options);
}
google.charts.setOnLoadCallback(drawChart);
</script>

<script type="text/javascript">
google.charts.load('current', {
    'packages': ['bar']
});
google.charts.setOnLoadCallback(drawStuff);

function drawStuff() {

    var data = new google.visualization.arrayToDataTable([
        ['Month', 'Amount'],
        ["Jan", 3000],
        ["Feb", 400],
        ["Mar", 300],
        ["Apr", 2500],
        ["May", 2000],
        ["Jun", 1500],
        ["Jul", 1000],
        ["Aug", 500],
        ["Sept", 500],
        ["Oct", 500],
        ["Nov", 500],
        ["Dec", 500],
    ]);

    var options = {
        width: 650,
        pieSliceText: 'value',
        vAxis: {
            format: 'currency'
        },
        legend: {
            position: 'none'
        },
        colors: '#2E2D76',
        axes: {
            x: {
                0: {
                    side: 'bottom'
                } // Top x-axis.
            }
        },
        bar: {
            groupWidth: "35%"
        }
    };

    var chart = new google.charts.Bar(document.getElementById('chart_div'));
    // Convert the Classic options to Material options.
    chart.draw(data, google.charts.Bar.convertOptions(options));
};
</script>
<!-- <script
    src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@0.4.0/dist/chartjs-plugin-datalabels.min.js"></script> -->
@endsection