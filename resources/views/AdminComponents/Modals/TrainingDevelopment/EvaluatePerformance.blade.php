<div id="evaluate-performance-{{$employee->id}}" class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto pointer-events-none" role="dialog" tabindex="-1" aria-labelledby="hs-scale-animation-modal-label">
    <div class="hs-overlay-animation-target hs-overlay-open:scale-100 hs-overlay-open:opacity-100 scale-95 opacity-0 ease-in-out transition-all duration-200 sm:max-w-2xl sm:w-full m-3 sm:mx-auto min-h-[calc(100%-3.5rem)] flex items-center">
        <div class="w-full flex flex-col bg-white border shadow-sm rounded-xl pointer-events-auto dark:bg-neutral-800 dark:border-neutral-700 dark:shadow-neutral-700/70">
            <div class="flex justify-between items-center py-3 px-4 border-b dark:border-neutral-700">
                <h3 id="hs-scale-animation-modal-label" class="font-bold text-gray-800 dark:text-white">
                    Evaluate Employee Performance
                </h3>
                <button type="button" class="size-8 inline-flex justify-center items-center gap-x-2 rounded-full border border-transparent bg-gray-100 text-gray-800 hover:bg-gray-200 focus:outline-none focus:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-700 dark:hover:bg-neutral-600 dark:text-neutral-400 dark:focus:bg-neutral-600" aria-label="Close" data-hs-overlay="#evaluate-performance-{{$employee->id}}">
                    <span class="sr-only">Close</span>
                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M18 6 6 18"></path>
                        <path d="m6 6 12 12"></path>
                    </svg>
                </button>
            </div>
            <div class="p-4 overflow-y-auto">
                <div class="flex justify-end pb-4">
                    <button id="add-set-btn" type="button" class="mt-4 py-2 px-4 bg-blue-500 text-white rounded-lg">Add Another Set</button>
                </div>
                <form id="evaluate_performance" action="{{url('evaluate-employee-performance/'.$employee->id)}}" method="POST">
                    @csrf
                    <div class="grid grid-cols-1 sm:grid-cols-3 w-full gap-4">
                        <label for="criteria" class="hidden text-sm font-medium mb-2 dark:text-white sm:block">Criteria</label>
                        <label for="ratings" class="hidden text-sm font-medium mb-2 dark:text-white sm:block">Ratings (1 to 5)</label>
                        <label for="comments" class="hidden text-sm font-medium mb-2 dark:text-white sm:block">Comments</label>
                    </div>
                    <div id="form-container">
                        <!-- Initial Set of Inputs -->
                        <div class="form-set">
                            <div class="grid grid-cols-1 sm:grid-cols-3 w-full gap-4">
                                <div class="space-y-3">
                                    <label for="criteria" class="block text-sm font-medium mb-2 dark:text-white sm:hidden">Criteria</label>
                                    <input type="text" required name="criteria[]" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" placeholder="Criteria">
                                </div>
                                <div class="space-y-3">
                                    <label for="ratings" class="block text-sm font-medium mb-2 dark:text-white sm:hidden">Ratings (1 to 5)</label>
                                    <input type="number" required name="ratings[]" min="1" max="5" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" placeholder="Ratings">
                                </div>
                                <div class="space-y-3">
                                    <label for="comments" class="block text-sm font-medium mb-2 dark:text-white sm:hidden">Comments</label>
                                    <textarea name="comments[]" required class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" rows="3" placeholder="Comments"></textarea>
                                </div>
                            </div>
                            <button type="button" class="w-full remove-btn py-2 px-4 bg-red-500 text-white rounded-lg mt-2">Remove</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="flex justify-end items-center gap-x-2 py-3 px-4 border-t dark:border-neutral-700">
                <button type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700" data-hs-overlay="#evaluate-performance-{{$employee->id}}">
                    Close
                </button>
                <button type="submit" form="evaluate_performance" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                    Evaluate
                </button>
            </div>
        </div>
    </div>
</div>
<script>
  // Add event listener to "Add Another Set" button
  const addSetButton = document.getElementById('add-set-btn');
    addSetButton.addEventListener('click', function () {
        const formContainer = document.getElementById('form-container');
        
        // Create a new form set
        const newFormSet = document.createElement('div');
        newFormSet.classList.add('form-set');
        newFormSet.innerHTML = `
            <hr class="my-3 border-neutral-700" />
            <div class="grid grid-cols-1 sm:grid-cols-3 w-full gap-4">
                <div class="space-y-3">
                    <label for="criteria" class="block text-sm font-medium mb-2 dark:text-white sm:hidden">Criteria</label>
                    <input type="text" required name="criteria[]" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" placeholder="Criteria">
                </div>
                <div class="space-y-3">
                    <label for="ratings" class="block text-sm font-medium mb-2 dark:text-white sm:hidden">Ratings (1 to 5)</label>
                    <input type="number" required name="ratings[]" min="1" max="5" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" placeholder="Ratings">
                </div>
                <div class="space-y-3">
                    <label for="comments" class="block text-sm font-medium mb-2 dark:text-white sm:hidden">Comments</label>
                    <textarea name="comments[]" required class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" rows="3" placeholder="Comments"></textarea>
                </div>
            </div>
            <button type="button" class="w-full remove-btn py-2 px-4 bg-red-500 text-white rounded-lg mt-2">Remove</button>
        `;
        
        // Append the new form set to the container
        formContainer.appendChild(newFormSet);
    });

    // Event listener for form submission
    const form = document.getElementById('evaluate_performance');
    form.addEventListener('submit', function (e) {
        let isValid = true;

        // Check each form set for required fields and valid ratings
        const formSets = document.querySelectorAll('.form-set');
        formSets.forEach(function (set) {
            const criteria = set.querySelector('input[name="criteria[]"]');
            const ratings = set.querySelector('input[name="ratings[]"]');
            const comments = set.querySelector('textarea[name="comments[]"]');

            // Check if required fields are empty
            if (!criteria.value || !ratings.value || !comments.value) {
                isValid = false;
                // Highlight the empty fields
                if (!criteria.value) criteria.classList.add('border-red-500');
                else criteria.classList.remove('border-red-500');
                
                if (!ratings.value) ratings.classList.add('border-red-500');
                else ratings.classList.remove('border-red-500');
                
                if (!comments.value) comments.classList.add('border-red-500');
                else comments.classList.remove('border-red-500');
            }

            // Check if ratings are within range (1 to 5)
            if (ratings.value < 1 || ratings.value > 5) {
                isValid = false;
                ratings.classList.add('border-red-500');
            } else {
                ratings.classList.remove('border-red-500');
            }
        });

        // Prevent form submission if invalid
        if (!isValid) {
            e.preventDefault();
            alert('Please fill in all required fields with valid values (Ratings must be between 1 and 5).');
        }
    });
</script>