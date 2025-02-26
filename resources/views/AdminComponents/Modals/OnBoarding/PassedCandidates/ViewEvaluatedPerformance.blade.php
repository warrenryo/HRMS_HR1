@php
use App\Charts\EmployeePerformance;
use App\Charts\EmployeePerformancePolarArea;
use App\Models\Interviews\EvaluateFinalIntervieww;
use App\Models\Interviews\EvaluateInitialInterview;

$evaluated_performance = EvaluateFinalIntervieww::where('applicant_id', $applicant->id)->get();
$evaluated_performance2 = EvaluateInitialInterview::where('applicanit_d', $applicant->id)->get();
$employeePerformance = new EmployeePerformance(new \ArielMejiaDev\LarapexCharts\LarapexChart());

$data = [
    'evaluated_performance' => $evaluated_performance,  // Ensure this variable is correctly defined and available
    'title' => 'Final Interview Performance',
    'subtitle' => 'Ratings for final performance',
    'colors' => ['#D84040']
];


$data2 = [
    'evaluated_performance' => $evaluated_performance2,  // Ensure this variable is correctly defined and available
    'title' => 'Initial Interview Performance',
    'subtitle' => 'Ratings for initial performance',
    'colors' => ['#D69ADE']
];

$chart_final = $employeePerformance->build($data);
$chart_initial = $employeePerformance->build($data2);
@endphp
<div id="view-evaluate-performance-{{$applicant->id}}" class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto pointer-events-none" role="dialog" tabindex="-1" aria-labelledby="hs-scale-animation-modal-label">
    <div class="hs-overlay-animation-target hs-overlay-open:scale-100 hs-overlay-open:opacity-100 scale-95 opacity-0 ease-in-out transition-all duration-200 sm:max-w-4xl xl:max-w-7xl sm:w-full m-3 sm:mx-auto min-h-[calc(100%-3.5rem)] flex items-center">
        <div class="w-full flex flex-col bg-white border shadow-sm rounded-xl pointer-events-auto dark:bg-neutral-800 dark:border-neutral-700 dark:shadow-neutral-700/70">
            <div class="flex justify-between items-center py-3 px-4 border-b dark:border-neutral-700">

                <button type="button" class="size-8 inline-flex justify-center items-center gap-x-2 rounded-full border border-transparent bg-gray-100 text-gray-800 hover:bg-gray-200 focus:outline-none focus:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-700 dark:hover:bg-neutral-600 dark:text-neutral-400 dark:focus:bg-neutral-600" aria-label="Close" data-hs-overlay="#view-evaluate-performance-{{$applicant->id}}">
                    <span class="sr-only">Close</span>
                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M18 6 6 18"></path>
                        <path d="m6 6 12 12"></path>
                    </svg>
                </button>
            </div>
            <div class="p-4 ">
                <div class="grid grid-cols-1 xl:grid-cols-2 gap-10">
                    <div class="mt-4">
                    {!! $chart_initial->container() !!}
                        <script src="{{ $chart_initial->cdn() }}"></script>

                        {{ $chart_initial->script() }}
                    </div>
                    <div class="mt-4">
                    {!! $chart_final->container() !!}
                        <script src="{{ $chart_final->cdn() }}"></script>

                        {{ $chart_final->script() }}
                    </div>
                </div>

            </div>
            <div class="flex justify-end items-center gap-x-2 py-3 px-4 border-t dark:border-neutral-700">
                <button type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700" data-hs-overlay="#view-evaluate-performance-{{$applicant->id}}">
                    Close
                </button>
            </div>
        </div>
    </div>
</div>