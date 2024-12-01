<div id="evaluate-performance-{{$employee->id}}" class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto pointer-events-none" role="dialog" tabindex="-1" aria-labelledby="hs-scale-animation-modal-label">
    <div class="hs-overlay-animation-target hs-overlay-open:scale-100 hs-overlay-open:opacity-100 scale-95 opacity-0 ease-in-out transition-all duration-200 sm:max-w-4xl sm:w-full m-3 sm:mx-auto min-h-[calc(100%-3.5rem)] flex items-center">
        <div class="w-full flex flex-col bg-white border shadow-sm rounded-xl pointer-events-auto dark:bg-neutral-800 dark:border-neutral-700 dark:shadow-neutral-700/70">
            <div class="flex justify-between items-center py-3 px-4 border-b dark:border-neutral-700">
                <h3 id="hs-scale-animation-modal-label" class="font-bold text-gray-800 dark:text-white">
                    Evaluate Performance for {{$employee->EmployeeTraining->firstname}} {{$employee->EmployeeTraining->lastname}}
                </h3>
                <button type="button" class="size-8 inline-flex justify-center items-center gap-x-2 rounded-full border border-transparent bg-gray-100 text-gray-800 hover:bg-gray-200 focus:outline-none focus:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-700 dark:hover:bg-neutral-600 dark:text-neutral-400 dark:focus:bg-neutral-600" aria-label="Close" data-hs-overlay="#evaluate-performance-{{$employee->id}}">
                    <span class="sr-only">Close</span>
                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M18 6 6 18"></path>
                        <path d="m6 6 12 12"></path>
                    </svg>
                </button>
            </div>
            <div class="p-4 ">
                <div class="overflow-x-auto">
                    <form  method="POST" action="{{ url('evaluate-performance/'.$employee->id)}}">
                        @csrf
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
                                    <!-- Row 1 -->
                                    <div class="flex flex-col sm:flex-row text-sm font-medium text-gray-800 dark:text-neutral-200">
                                        <div class="px-6 py-4 flex-1 whitespace-nowrap">Job Knowledge & Skills</div>
                                        <input type="hidden" value="Job Knowledge & Skills" name="criteria[]" />
                                        <div class="px-6 py-4 flex-1">
                                            <div class="max-w-sm space-y-3">
                                                <input type="number" required min="1" max="5" name="ratings[]" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                                            </div>
                                        </div>
                                        <div class="px-6 py-4 flex-1">
                                            <div class="max-w-sm space-y-3">
                                                <textarea name="comments[]" required class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" rows="3"></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Row 2 -->
                                    <div class="flex flex-col sm:flex-row text-sm font-medium text-gray-800 dark:text-neutral-200">
                                        <div class="px-6 py-4 flex-1 whitespace-nowrap">Customer Service</div>
                                        <input type="hidden" value="Customer Service" name="criteria[]" />
                                        <div class="px-6 py-4 flex-1">
                                            <div class="max-w-sm space-y-3">
                                                <input type="number" min="1" required max="5" name="ratings[]" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                                            </div>
                                        </div>
                                        <div class="px-6 py-4 flex-1">
                                            <div class="max-w-sm space-y-3">
                                                <textarea name="comments[]" required class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" rows="3"></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="flex flex-col sm:flex-row text-sm font-medium text-gray-800 dark:text-neutral-200">
                                        <div class="px-6 py-4 flex-1 whitespace-nowrap">Efficiency and Productivitys</div>
                                        <input type="hidden" value="Efficiency and Productivity" name="criteria[]" />
                                        <div class="px-6 py-4 flex-1">
                                            <div class="max-w-sm space-y-3">
                                                <input type="number" required min="1" max="5" name="ratings[]" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                                            </div>
                                        </div>
                                        <div class="px-6 py-4 flex-1">
                                            <div class="max-w-sm space-y-3">
                                                <textarea name="comments[]" required class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" rows="3"></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="flex flex-col sm:flex-row text-sm font-medium text-gray-800 dark:text-neutral-200">
                                        <div class="px-6 py-4 flex-1 whitespace-nowrap">Teamwork and Collaboration</div>
                                        <input type="hidden" value="Teamwork and Collaboration" name="criteria[]" />
                                        <div class="px-6 py-4 flex-1">
                                            <div class="max-w-sm space-y-3">
                                                <input type="number" required min="1" max="5" name="ratings[]" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                                            </div>
                                        </div>
                                        <div class="px-6 py-4 flex-1">
                                            <div class="max-w-sm space-y-3">
                                                <textarea name="comments[]" required class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" rows="3"></textarea>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="flex flex-col sm:flex-row text-sm font-medium text-gray-800 dark:text-neutral-200">
                                        <div class="px-6 py-4 flex-1 whitespace-nowrap">Communication Skills</div>
                                        <input type="hidden" value="Communication Skills" name="criteria[]" />
                                        <div class="px-6 py-4 flex-1">
                                            <div class="max-w-sm space-y-3">
                                                <input type="number" required min="1" max="5" name="ratings[]" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                                            </div>
                                        </div>
                                        <div class="px-6 py-4 flex-1">
                                            <div class="max-w-sm space-y-3">
                                                <textarea name="comments[]" required class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" rows="3"></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="flex flex-col sm:flex-row text-sm font-medium text-gray-800 dark:text-neutral-200">
                                        <div class="px-6 py-4 flex-1 whitespace-nowrap">Compliance & Safety</div>
                                        <input type="hidden" value="Compliance & Safety" name="criteria[]" />
                                        <div class="px-6 py-4 flex-1">
                                            <div class="max-w-sm space-y-3">
                                                <input type="number" required min="1" max="5" name="ratings[]" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                                            </div>
                                        </div>
                                        <div class="px-6 py-4 flex-1">
                                            <div class="max-w-sm space-y-3">
                                                <textarea name="comments[]" required class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" rows="3"></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="flex flex-col sm:flex-row text-sm font-medium text-gray-800 dark:text-neutral-200">
                                        <div class="px-6 py-4 flex-1 whitespace-nowrap">Adaptability</div>
                                        <input type="hidden" value="Adaptability" name="criteria[]" />
                                        <div class="px-6 py-4 flex-1">
                                            <div class="max-w-sm space-y-3">
                                                <input type="number" required min="1" max="5" name="ratings[]" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                                            </div>
                                        </div>
                                        <div class="px-6 py-4 flex-1">
                                            <div class="max-w-sm space-y-3">
                                                <textarea name="comments[]" required class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" rows="3"></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="flex flex-col sm:flex-row text-sm font-medium text-gray-800 dark:text-neutral-200">
                                        <div class="px-6 py-4 flex-1 whitespace-nowrap">Professionalism & Attitude</div>
                                        <input type="hidden" value="Professionalism & Attitude" name="criteria[]" />
                                        <div class="px-6 py-4 flex-1">
                                            <div class="max-w-sm space-y-3">
                                                <input type="number" required min="1" max="5" name="ratings[]" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                                            </div>
                                        </div>
                                        <div class="px-6 py-4 flex-1">
                                            <div class="max-w-sm space-y-3">
                                                <textarea name="comments[]" required class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" rows="3"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
            <div class="flex justify-end items-center gap-x-2 py-3 px-4 border-t dark:border-neutral-700">
                <button type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700" data-hs-overlay="#evaluate-performance-{{$employee->id}}">
                    Close
                </button>
                <button type="submit" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                    Evaluate Performance
                </button>
            </div>
            </form>

        </div>
    </div>
</div>