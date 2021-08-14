<div>
    <div class="widget widget-chart-three">
        <div class="widget-heading">
            <div class="">
                <h5 class="">{{ $title }}</h5>
            </div>

            <div class="dropdown  custom-dropdown">
                <a class="dropdown-toggle" href="#" role="button" id="uniqueVisitors" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                         stroke-linejoin="round" class="feather feather-more-horizontal">
                        <circle cx="12" cy="12" r="1"></circle>
                        <circle cx="19" cy="12" r="1"></circle>
                        <circle cx="5" cy="12" r="1"></circle>
                    </svg>
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="uniqueVisitors">
                    <a class="dropdown-item" href="javascript:void(0);">View</a>
                    <a class="dropdown-item" href="javascript:void(0);">Update</a>
                    <a class="dropdown-item" href="javascript:void(0);">Download</a>
                </div>
            </div>
        </div>
        <div class="widget-content" wire:poll.6000ms="fetchData">
            <div id="uniqueVisits"></div>
        </div>
    </div>
</div>

@push('scripts')
    @if(config('app.env') === 'local' || config('app.env') === 'development')
        <script src="{{asset('plugins/apex/apexcharts.min.js')}}"></script>
    @endif
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script>
        let d_1options1 = {
            chart: {
                height: 350,
                type: 'bar',
                animations: {
                    enabled: false
                },
                toolbar: {
                    show: false,
                },
                dropShadow: {
                    enabled: true,
                    top: 1,
                    left: 1,
                    blur: 2,
                    color: '#acb0c3',
                    opacity: 0.7,
                }
            },
            colors: ['#5c1ac3', '#ffbb44'],
            plotOptions: {
                bar: {
                    horizontal: false,
                    columnWidth: '55%',
                    endingShape: 'rounded'
                },
            },
            dataLabels: {
                enabled: false
            },
            legend: {
                position: 'bottom',
                horizontalAlign: 'center',
                fontSize: '14px',
                markers: {
                    width: 10,
                    height: 10,
                },
                itemMargin: {
                    horizontal: 0,
                    vertical: 8
                }
            },
            stroke: {
                show: true,
                width: 2,
                colors: ['transparent']
            },
            series: @json($series),
            xaxis: {
                categories: @json($category),
            },
            fill: {
                type: 'gradient',
                gradient: {
                    shade: 'light',
                    type: 'vertical',
                    shadeIntensity: 0.3,
                    inverseColors: false,
                    opacityFrom: 1,
                    opacityTo: 0.8,
                    stops: [0, 100]
                }
            },
            tooltip: {
                y: {
                    formatter: function (val) {
                        return val
                    }
                }
            }
        }

        let d_1C_3 = new ApexCharts(
            document.querySelector("#uniqueVisits"),
            d_1options1
        );
        d_1C_3.render();
        document.addEventListener('livewire:load', () => {
        @this.on('refreshChart', (chartData) => {
                d_1C_3.updateSeries(chartData.seriesData);
            })
        });
    </script>
@endpush
