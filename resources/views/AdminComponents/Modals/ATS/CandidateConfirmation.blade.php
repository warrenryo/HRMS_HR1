<div id="hs-stacked-overlays-2" class="hs-overlay hs-overlay-backdrop-open:bg-gray-900/70 hidden size-full fixed top-0 start-0 z-[70] overflow-x-hidden overflow-y-auto pointer-events-none" role="dialog" tabindex="-1" aria-labelledby="hs-stacked-overlays-2-label">
    <div class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto">
        <div class="flex flex-col bg-white border shadow-sm rounded-xl pointer-events-auto dark:bg-neutral-800 dark:border-neutral-700 dark:shadow-neutral-700/70">

            <div class="p-4 overflow-y-auto">
                <div class="flex justify-center">
                    <img src="{{asset('assets/images/confirmation.png')}}" class="p-6 w-[20rem]" />
                </div>
                <p class="text-center text-xl">Are you sure you want to add this applicant to Candidates?</p>
            </div>

            <form id="add_candidate_form" action="{{ url('add-candidate/'.$applicant->id) }}" method="POST">
                @csrf
            </form>

            <div class="flex justify-end items-center gap-x-2 py-3 px-4 border-t dark:border-neutral-700">
                <button type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700" data-hs-overlay="#hs-stacked-overlays-2" data-hs-overlay-options='{
                                                                "isClosePrev": false
                                                                }'>
                    Cancel
                </button>
                <button type="submit" form="add_candidate_form" class="btn btn-success">
                    Add as Candidate
                </button>
            </div>
        </div>
    </div>
</div>