<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;

class EmployeePerformancePolarArea
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build($evaluated_performance): \ArielMejiaDev\LarapexCharts\PolarAreaChart
    {

        $criteria = [];
        $ratings = [];

        foreach ($evaluated_performance as $evaluation) {
            $criteria[] = $evaluation->criteria;  // Get the criteria (e.g., "Job Knowledge")
            $ratings[] = $evaluation->ratings;    // Get the ratings (e.g., 4, 5, etc.)
        }


        return $this->chart
            ->polarAreaChart()
            ->setTitle('Employee Performance Polar Area Type')
            ->setSubtitle('Ratings of Employee Performance')
            ->addData($ratings)
            ->setLabels($criteria);
    }
}
