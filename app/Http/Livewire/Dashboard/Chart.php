<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;

class Chart extends Component
{
    public string $title = 'Unique Visitors';

    public array $category = [];
    public array $series = [];
    public array $series1 = [];
    public array $series2 = [];
    public int $totalVisit = 0;
    public int $paidVisit = 0;

    public function mount()
    {
        $this->category = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
        $this->series1 = ['name' => 'Total Visit', 'data' => [58, 44, 55, 57, 56, 61, 58, 63, 60, 66, 56, 63]];
        $this->series2 = ['name' => 'Paid Visit', 'data' => [91, 76, 85, 101, 98, 87, 105, 91, 114, 94, 66, 70]];

        $this->series = [$this->series1, $this->series2];
    }

    public function fetchData()
    {
        $this->totalVisit += rand(10, 100);
        $this->paidVisit += rand(10, 100);

        $totVisit = array_replace($this->series1['data'], [10 => $this->totalVisit, 1 => $this->totalVisit]);
        $paidVisit = array_replace($this->series2['data'], [10 => $this->paidVisit, 1 => $this->paidVisit]);

//        dd($totVisit,$paidVisit);

        $this->series = [$totVisit, $paidVisit];
//        dd($this->series);

        $this->emit('refreshChart', ['seriesData' => [$totVisit, $paidVisit]]);
    }

    public function render()
    {
        return view('livewire.dashboard.chart')->extends('layouts.app');
    }
}
