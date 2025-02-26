@php
use App\Charts\EmployeePerformance;
use App\Charts\EmployeePerformancePolarArea;
use App\Models\Interviews\EvaluateInitialInterview;
use App\Models\TraningDevelopment\PerformanceEvaluation;

$evaluated_performance = EvaluateInitialInterview::where('applicanit_d', $applicant->id)->get();
$employeePerformance = new EmployeePerformance(new \ArielMejiaDev\LarapexCharts\LarapexChart());
$employeePerformancePolarArea = new EmployeePerformancePolarArea(new \ArielMejiaDev\LarapexCharts\LarapexChart());
$data = [
    'evaluated_performance' => $evaluated_performance,  // Ensure this variable is correctly defined and available
    'title' => 'Initial Interview Performance',
    'subtitle' => 'Ratings for initial performance',
    'colors' => ['#D84040']
];
$chart = $employeePerformance->build($data);
$chartPolarArea = $employeePerformancePolarArea->build($evaluated_performance);
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
                    <div class="overflow-x-auto">
                        <div class="min-w-full inline-block align-middle">
                            <div class="border rounded-lg overflow-hidden dark:border-neutral-700">
                                <!-- Table Header -->
                                <div class="flex bg-gray-50 dark:bg-neutral-700 text-xs font-medium text-gray-500 uppercase dark:text-neutral-400">
                                    <div class="px-6 py-3 flex-1 text-start">Performance Criteria</div>
                                    <div class="px-6 py-3 flex-1 text-start">Rating</div>
                                    <div class="px-6 py-3 flex-1 text-start">Comments</div>
                                </div>
                                <!-- Table Body -->
                                <div class="divide-y divide-gray-200 dark:divide-neutral-700">
                                    @foreach($evaluated_performance as $evaluation)
                                    <!-- Row 1 -->
                                    <div class="flex flex-col sm:flex-row text-sm font-medium text-gray-800 dark:text-neutral-200">
                                        <div class="px-6 py-4 flex-1 whitespace-nowrap">{{ $evaluation->criteria }}</div>
                                        <div class="px-6 py-4 flex-1">
                                            <div class="max-w-sm space-y-3">
                                                <!-- Display Rating as Stars -->
                                                <div class="flex items-center">
                                                    @for ($i = 1; $i <= 5; $i++)
                                                        <button type="button" class="size-5 inline-flex justify-center items-center text-2xl rounded-full 
                                    @if($evaluation->ratings >= $i) text-yellow-400 dark:text-yellow-500 @else text-gray-300 dark:text-neutral-600 @endif
                                    disabled:opacity-50 disabled:pointer-events-none">
                                                        <svg class="shrink-0 size-5" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>
                                                        </svg>
                                                        </button>
                                                        @endfor
                                                </div>
                                            </div>
                                        </div>
                                        <div class="px-6 py-4 flex-1">
                                            <div class="max-w-sm space-y-3">
                                                <!-- Display the comments -->
                                                <textarea rows="3" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" disabled>{{ $evaluation->comments }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4">
                        <!-- {!! $chart->container() !!}
                        <script src="{{ $chart->cdn() }}"></script>

                        {{ $chart->script() }} -->
                        <div class="mt-4">
                            {!! $chartPolarArea->container() !!}
                            <script src="{{ $chartPolarArea->cdn() }}"></script>

                            {{ $chartPolarArea->script() }}
                        </div>
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