<div id="add-question-{{$job->id}}" class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto pointer-events-none" role="dialog" tabindex="-1" aria-labelledby="hs-scale-animation-modal-label">
    <div class="hs-overlay-animation-target hs-overlay-open:scale-100 hs-overlay-open:opacity-100 scale-95 opacity-0 ease-in-out transition-all duration-200 sm:max-w-lg sm:w-full m-3 sm:mx-auto min-h-[calc(100%-3.5rem)] flex items-center">
        <div class="w-full flex flex-col bg-white border shadow-sm rounded-xl pointer-events-auto dark:bg-neutral-800 dark:border-neutral-700 dark:shadow-neutral-700/70">
            <div class="flex justify-between items-center py-3 px-4 border-b dark:border-neutral-700">
                <h3 id="hs-scale-animation-modal-label" class="font-bold text-gray-800 dark:text-white">
                    Add Questions to Applicants
                </h3>
                <button type="button" class="size-8 inline-flex justify-center items-center gap-x-2 rounded-full border border-transparent bg-gray-100 text-gray-800 hover:bg-gray-200 focus:outline-none focus:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-700 dark:hover:bg-neutral-600 dark:text-neutral-400 dark:focus:bg-neutral-600" aria-label="Close" data-hs-overlay="#add-question-{{$job->id}}">
                    <span class="sr-only">Close</span>
                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M18 6 6 18"></path>
                        <path d="m6 6 12 12"></path>
                    </svg>
                </button>
            </div>
            <div class="p-4 overflow-y-auto">
                <form id="questionForm" method="POST" action="{{url('add-employer-questions/'.$job->id)}}">
                    @csrf
                    <div id="questionContainer">
                        <div class="questionSet border rounded-lg p-3">
                            <div>
                                <label for="input-label" class="block text-sm font-medium mb-2 dark:text-white">Question Type</label>
                                <select name="q_type[]" class="questionType py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                                    <option selected value="input">Text Input</option>
                                    <option value="checkbox">Checkbox</option>
                                    <option value="textarea">Textarea</option>
                                    <option value="radio">Radio</option>
                                </select>
                            </div>

                            <div class="mt-4">
                                <div>
                                    <label for="input-label" class="block text-sm font-medium mb-2 dark:text-white">Question</label>
                                    <input type="text" name="questions[]" id="input-label" class="questionText py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" placeholder="Enter Question">
                                </div>
                            </div>

                            <div class="optionsContainer mt-4" style="display: none;">
                                <label for="input-label" class="block text-sm font-medium mb-2 dark:text-white">Options</label>
                                <div class="optionsList "></div>
                                <div class="flex gap-4">
                                    <input type="text" class="optionInput py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" name="checkbox_answer[]" placeholder="Add option">
                                    <button type="button" class="addOption btn btn-secondary">Add Option</button>
                                </div>
                            </div>

                            <div class="flex justify-end">
                                <button type="button" class="removeQuestionSet btn btn-danger mt-4 w-full">Remove this question</button>
                            </div>
                        </div>
                    </div>

                    <button type="button" id="addQuestionSet" class=" mt-4 w-full btn btn-success">Add Another Question Set</button>
                    <!-- <button type="submit" id="submitQuestions">Submit All Questions</button> -->
                </form>

            </div>
            <div class="flex justify-end items-center gap-x-2 py-3 px-4 border-t dark:border-neutral-700">
                <button type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700" data-hs-overlay="#add-question-{{$job->id}}">
                    Close
                </button>
                <button type="submit" form="questionForm" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                    Save changes
                </button>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    let optionsArray = [];

    function toggleOptionsContainer(select) {
        const selectedType = $(select).val();
        const optionsContainer = $(select).closest('.questionSet').find('.optionsContainer');
        if (selectedType === 'checkbox' || selectedType === 'radio') {
            optionsContainer.show();
        } else {
            optionsContainer.hide();
            optionsContainer.find('.optionsList').empty();
            optionsArray = [];
        }
    }

    // Change event for question type
    $(document).on('change', '.questionType', function() {
        toggleOptionsContainer(this);
    });

    // Add option
    $(document).on('click', '.addOption', function() {
        const optionValue = $(this).siblings('.optionInput').val().trim();
        const optionsList = $(this).closest('.optionsContainer').find('.optionsList');
        const questionSetIndex = $(this).closest('.questionSet').index(); // Get the index of the current question set

        if (optionValue) {
            // Create a new option item
            optionsList.append(`
            <div class="flex justify-between items-center my-2 mx-2">
                <input type="hidden" name="checkbox_answer[]" class="" value="${optionValue}"> 
                ${optionValue} 
                <button type="button" class="removeOption btn btn-danger"><i class="fa-solid fa-trash"></i></button>
            </div>
        `);
            $(this).siblings('.optionInput').val(''); // Clear the input field
        }
    });

    // Remove option
    $(document).on('click', '.removeOption', function() {
        const optionText = $(this).parent().text().replace(' Remove', '');
        optionsArray = optionsArray.filter(option => option !== optionText);
        $(this).parent().remove();
    });

    // Add another question set
    $('#addQuestionSet').click(function() {
        const newQuestionSet = `
        <div class="questionSet border rounded-lg p-3 mt-4">
            <div>
                <label for="input-label" class="block text-sm font-medium mb-2 dark:text-white">Question Type</label>
                <select name="q_type[]" class="questionType py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                    <option selected value="input">Text Input</option>
                    <option value="checkbox">Checkbox</option>
                    <option value="textarea">Textarea</option>
                    <option value="radio">Radio</option>
                </select>
            </div>

            <div class="mt-4">
                <div>
                    <label for="input-label" class="block text-sm font-medium mb-2 dark:text-white">Question</label>
                    <input type="text" name="questions[]" id="input-label" class="questionText py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" placeholder="Enter Question">
                </div>
            </div>

            <div class="optionsContainer mt-4" style="display: none;">
                <label for="input-label" class="block text-sm font-medium mb-2 dark:text-white">Options</label>
                <div class="optionsList "></div>
                <div class="flex gap-4">
                    <input type="text" class="optionInput py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" name="checkbox_answer[]" placeholder="Add option">
                    <button type="button" class="addOption btn btn-secondary">Add Option</button>
                </div>
            </div>

            <div class="flex justify-end">
                <button type="button" class="removeQuestionSet btn btn-danger mt-4 w-full">Remove this question</button>
            </div>
        </div>`;

        $('#questionContainer').append(newQuestionSet);
    });

    // Remove a question set
    $(document).on('click', '.removeQuestionSet', function() {
        $(this).closest('.questionSet').remove();
    });

    // Submit all questions
    $('#submitQuestions').click(function() {
        const allQuestions = [];
        $('.questionSet').each(function() {
            const questionType = $(this).find('.questionType').val();
            const questionText = $(this).find('.questionText').val();
            const options = (questionType === 'checkbox' || questionType === 'radio') ?
                $(this).find('.optionsList').children().map(function() {
                    return $(this).text().replace(' Remove', '');
                }).get() : [];

            allQuestions.push({
                type: questionType,
                question: questionText,
                options: options
            });
        });

        // AJAX call to send the data to your Laravel backend
        $.ajax({
            url: '/add-questions', // Your route for handling the question addition
            method: 'POST',
            data: {
                questions: allQuestions,
                _token: '{{ csrf_token() }}' // CSRF token for Laravel
            },
            success: function(response) {
                alert('Questions added successfully!');
                $('#questionContainer').empty(); // Clear the questions
            },
            error: function() {
                alert('Error occurred while adding the questions.');
            }
        });
    });
</script>