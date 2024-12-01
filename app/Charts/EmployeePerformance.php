<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;

class EmployeePerformance
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build($evaluated_performance): \ArielMejiaDev\LarapexCharts\BarChart
    {

        $criteria = [];
        $ratings = [];

        foreach ($evaluated_performance as $evaluation) {
            $criteria[] = $evaluation->criteria;  // Get the criteria (e.g., "Job Knowledge")
            $ratings[] = $evaluation->ratings;    // Get the ratings (e.g., 4, 5, etc.)
        }

        return $this->chart->barChart()
        ->setTitle('Employee Performance Evaluation')
            ->setSubtitle('Ratings for Each Criterion')
            ->addData('Ratings', $ratings)  // Set ratings as the chart data
            ->setColors(['#ffc63b', '#ff6384'])
            ->setXAxis($criteria);  
    }
}
