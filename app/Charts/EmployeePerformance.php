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

    public function build($data): \ArielMejiaDev\LarapexCharts\BarChart
    {
         // Extract values from the array
            $evaluated_performance = $data['evaluated_performance'];
            $title = $data['title'];
            $subtitle = $data['subtitle'];
            $colors = $data['colors'];
            $criteria = [];
            $ratings = [];

            foreach ($evaluated_performance as $evaluation) {
                $criteria[] = $evaluation->criteria;  // Get the criteria (e.g., "Job Knowledge")
                $ratings[] = $evaluation->ratings;    // Get the ratings (e.g., 4, 5, etc.)
            }

        return $this->chart->barChart()
            ->setTitle($title)
            ->setSubtitle($subtitle)
            ->addData('Ratings', $ratings)  // Set ratings as the chart data
            ->setColors($colors)
            ->setXAxis($criteria);  
    }
}
