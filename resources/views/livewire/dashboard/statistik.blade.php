<div>
    <div class="widget widget-one">
        <div class="widget-heading">
            <h6 class="">{{ $heading }}</h6>
        </div>
        <div class="w-chart" wire:poll="fetchData">
            <div class="w-chart-section">
                <div class="w-detail">
                    <p class="w-title">Total Visits</p>
                    <p class="w-stats animate__animated animate__pulse animate__infinite">{{ $totalVisit }}</p>
                </div>
                <div class="w-chart-render-one">
                    <div id="total-users"></div>
                </div>
            </div>

            <div class="w-chart-section">
                <div class="w-detail">
                    <p class="w-title">Paid Visits</p>
                    <p class="w-stats animate__animated animate__pulse animate__infinite">{{ $paidVisit }}</p>
                </div>
                <div class="w-chart-render-one">
                    <div id="paid-visits"></div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    @if(config('app.env') === 'local' || config('app.env') === 'development')
        <script src="{{asset('plugins/apex/apexcharts.min.js')}}"></script>
    @endif
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script>
        {{--let totalVisit = @json($total_visit);--}}
        // console.log(totalVisit);
        let spark1 = {
            chart: {
                id: 'unique-visits',
                group: 'sparks2',
                type: 'line',
                animations : {
                    enabled : false
                },
                height: 80,
                sparkline: {
                    enabled: true
                },
                dropShadow: {
                    enabled: true,
                    top: 1,
                    left: 1,
                    blur: 2,
                    color: '#e2a03f',
                    opacity: 0.7,
                }
            },
            series: [{
                data: @json($total_visit)
            }],
            stroke: {
                curve: 'smooth',
                width: 2,
            },
            markers: {
                size: 0
            },
            grid: {
                padding: {
                    top: 35,
                    bottom: 0,
                    left: 40
                }
            },
            colors: ['#e2a03f'],
            tooltip: {
                x: {
                    show: false
                },
                y: {
                    title: {
                        formatter: function formatter(val) {
                            return '';
                        }
                    }
                }
            },
            responsive: [{
                breakpoint: 1351,
                options: {
                    chart: {
                        height: 95,
                    },
                    grid: {
                        padding: {
                            top: 35,
                            bottom: 0,
                            left: 0
                        }
                    },
                },
            },
                {
                    breakpoint: 1200,
                    options: {
                        chart: {
                            height: 80,
                        },
                        grid: {
                            padding: {
                                top: 35,
                                bottom: 0,
                                left: 40
                            }
                        },
                    },
                },
                {
                    breakpoint: 576,
                    options: {
                        chart: {
                            height: 95,
                        },
                        grid: {
                            padding: {
                                top: 45,
                                bottom: 0,
                                left: 0
                            }
                        },
                    },
                }

            ]
        }

        let spark2 = {
            chart: {
                id: 'total-users',
                group: 'sparks1',
                type: 'line',
                animations : {
                    enabled : false
                },
                height: 80,
                sparkline: {
                    enabled: true
                },
                dropShadow: {
                    enabled: true,
                    top: 3,
                    left: 1,
                    blur: 3,
                    color: '#009688',
                    opacity: 0.7,
                }
            },
            series: [{
                data: @json($paid_visit)
            }],
            stroke: {
                curve: 'smooth',
                width: 2,
            },
            markers: {
                size: 0
            },
            grid: {
                padding: {
                    top: 35,
                    bottom: 0,
                    left: 40
                }
            },
            colors: ['#009688'],
            tooltip: {
                x: {
                    show: false
                },
                y: {
                    title: {
                        formatter: function formatter(val) {
                            return '';
                        }
                    }
                }
            },
            responsive: [{
                breakpoint: 1351,
                options: {
                    chart: {
                        height: 95,
                    },
                    grid: {
                        padding: {
                            top: 35,
                            bottom: 0,
                            left: 0
                        }
                    },
                },
            },
                {
                    breakpoint: 1200,
                    options: {
                        chart: {
                            height: 80,
                        },
                        grid: {
                            padding: {
                                top: 35,
                                bottom: 0,
                                left: 40
                            }
                        },
                    },
                },
                {
                    breakpoint: 576,
                    options: {
                        chart: {
                            height: 95,
                        },
                        grid: {
                            padding: {
                                top: 35,
                                bottom: 0,
                                left: 0
                            }
                        },
                    },
                }
            ]
        }

        // Total Visits
        d_1C_1 = new ApexCharts(document.querySelector("#total-users"), spark1);
        d_1C_1.render();

        // Paid Visits
        d_1C_2 = new ApexCharts(document.querySelector("#paid-visits"), spark2);
        d_1C_2.render();
        document.addEventListener('livewire:load',() => {
            @this.on('refreshStatistik', (chartData) =>{
                d_1C_1.updateSeries([{
                    data : chartData.seriesData['totVisit']
                }]);
                d_1C_2.updateSeries([{
                    data : chartData.seriesData['paidVisit']
                }]);
            })
        });
    </script>
@endpush
