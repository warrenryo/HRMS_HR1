<div id="jobOffer-schedule-{{$applicant->id}}" class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto pointer-events-none" role="dialog" tabindex="-1" aria-labelledby="hs-scale-animation-modal-label">
    <div class="hs-overlay-animation-target hs-overlay-open:scale-100 hs-overlay-open:opacity-100 scale-95 opacity-0 ease-in-out transition-all duration-200 sm:max-w-lg sm:w-full m-3 sm:mx-auto min-h-[calc(100%-3.5rem)] flex items-center">
        <div class="w-full flex flex-col bg-white border shadow-sm rounded-xl pointer-events-auto dark:bg-neutral-800 dark:border-neutral-700 dark:shadow-neutral-700/70">
            <div class="flex justify-between items-center py-3 px-4 border-b dark:border-neutral-700">
                <h3 id="hs-scale-animation-modal-label" class="font-bold text-gray-800 dark:text-white">
                    Schedule Job Offer
                </h3>
                <button type="button" class="size-8 inline-flex justify-center items-center gap-x-2 rounded-full border border-transparent bg-gray-100 text-gray-800 hover:bg-gray-200 focus:outline-none focus:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-700 dark:hover:bg-neutral-600 dark:text-neutral-400 dark:focus:bg-neutral-600" aria-label="Close" data-hs-overlay="#jobOffer-schedule-{{$applicant->id}}">
                    <span class="sr-only">Close</span>
                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M18 6 6 18"></path>
                        <path d="m6 6 12 12"></path>
                    </svg>
                </button>
            </div>
            <div class="p-4 overflow-y-auto">
                <form id="initial_interview_form" action="{{url('schedule-job-offer/'.$applicant->applicantInitial->id)}}" method="POST">
                    @csrf
                    <div x-data="form">
                        <label for="role">Date</label>
                        <input type="date" id="datepicker" name="date" required class="form-input" placeholder="Select Close Date">
                    </div>
                    <div x-data="form" class="mt-4">
                        <label for="role">Time</label>
                        <input id="preloading-time" x-model="date4" name="time" required class="form-input" />
                    </div>
                </form>
            </div>
            <div class="flex justify-end items-center gap-x-2 py-3 px-4 border-t dark:border-neutral-700">
                <button type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700" data-hs-overlay="#jobOffer-schedule-{{$applicant->id}}">
                    Close
                </button>
                <button type="submit" form="initial_interview_form" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                    Schedule JobOffer
                </button>
            </div>
        </div>
    </div>
</div>
<script>
    //DATE PICKER
    document.addEventListener('DOMContentLoaded', function() {
        flatpickr("#datepicker", {
            // Options go here
            dateFormat: "Y-m-d", // Format of the date
        });
    });

    document.addEventListener("alpine:init", () => {
        Alpine.data("form", () => ({
            date4: '24:00',
            init() {
                flatpickr(document.getElementById('preloading-time'), {
                    defaultDate: this.date4,
                    noCalendar: true,
                    enableTime: true,
                    dateFormat: 'H:i'
                })
            }
        }));
    });
</script>