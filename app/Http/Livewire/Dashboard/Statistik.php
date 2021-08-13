<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;

class Statistik extends Component
{
    public string $heading = 'Realtime Statistik';

    public array $total_visit = [];
    public array $paid_visit = [];
    public int $totalVisit = 0;
    public int $paidVisit = 0;


    public function mount()
    {

        $this->total_visit = [21, 9, 36, 12, 44, 25, 59, 41, 66, 25];
        $this->paid_visit = [22, 19, 30, 47, 32, 44, 34, 55, 41, 69];
    }

    public function fetchData()
    {
        $this->totalVisit += rand(0,10);
        $this->paidVisit += rand(0,10);

        $totVisit = array_replace($this->total_visit,[10 => $this->totalVisit]);
        $paidVisit = array_replace($this->paid_visit,[10 => $this->paidVisit]);

        $this->emit('refreshStatistik', ['seriesData' => ['totVisit' => $totVisit, 'paidVisit' => $paidVisit]]);

    }

    public function render()
    {
        return view('livewire.dashboard.statistik');
    }
}
