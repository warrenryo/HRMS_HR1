
<div id="evaluate-{{$applicant->id}}" class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto" role="dialog" tabindex="-1" aria-labelledby="hs-task-created-alert-label">
  <div class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-4xl sm:w-full m-3 sm:mx-auto">
    <div class="relative flex flex-col bg-white shadow-lg rounded-xl dark:bg-neutral-800">
      <div class="absolute top-2 end-2">
        <button type="button" class="size-8 inline-flex justify-center items-center gap-x-2 rounded-full border border-transparent bg-gray-100 text-gray-800 hover:bg-gray-200 focus:outline-none focus:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-700 dark:hover:bg-neutral-600 dark:text-neutral-400 dark:focus:bg-neutral-600" aria-label="Close" data-hs-overlay="#evaluate-{{$applicant->id}}">
          <span class="sr-only">Close</span>
          <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
        </button>
      </div>
      <div class="p-4 sm:p-10 text-center overflow-y-auto">
      <div class="overflow-x-auto">
            <form id="mark_as_done"  method="POST" action="{{ url('evaluate-final/'.$applicant->id) }}">
                @csrf
                <div class="min-w-full inline-block align-middle">
                    <div class="border rounded-lg overflow-hidden dark:border-neutral-700">
                        <!-- Table Header -->
                        <div class="flex bg-gray-50 dark:bg-neutral-700 text-xs font-medium text-gray-500 uppercase dark:text-neutral-400">
                            <div class="px-6 py-3 flex-1 text-start">Performance Criteria</div>
                            <div class="px-6 py-3 flex-1 text-start">Rating 1 - 5</div>
                            <div class="px-6 py-3 flex-1 text-start">Comments</div>
                        </div>
                        <!-- Table Body -->
                        <div class="divide-y divide-gray-200 dark:divide-neutral-700">
                            <!-- Row 1 -->
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

                            <!-- Row 2 -->
                            <div class="flex flex-col sm:flex-row text-sm font-medium text-gray-800 dark:text-neutral-200">
                                <div class="px-6 py-4 flex-1 whitespace-nowrap">Technical Knowledge</div>
                                <input type="hidden" value="Technical Knowledge" name="criteria[]" />
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
                                <div class="px-6 py-4 flex-1 whitespace-nowrap">Problem Solving Abilities</div>
                                <input type="hidden" value="Problem Solving Abilities" name="criteria[]" />
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
                                <div class="px-6 py-4 flex-1 whitespace-nowrap">Teamwork Abilities</div>
                                <input type="hidden" value="Teamwork Abilities" name="criteria[]" />
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
                                <div class="px-6 py-4 flex-1 whitespace-nowrap">Leadership Skills</div>
                                <input type="hidden" value="Leadership Skills" name="criteria[]" />
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
                                <div class="px-6 py-4 flex-1 whitespace-nowrap">Time Management</div>
                                <input type="hidden" value="Time Management" name="criteria[]" />
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
                                <div class="px-6 py-4 flex-1 whitespace-nowrap">Analytical Thinking</div>
                                <input type="hidden" value="Analytical Thinking" name="criteria[]" />
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
                                <div class="px-6 py-4 flex-1 whitespace-nowrap">Decision Making Skills</div>
                                <input type="hidden" value="Decision Making Skills" name="criteria[]" />
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
                                <div class="px-6 py-4 flex-1 whitespace-nowrap">Presentation Skills</div>
                                <input type="hidden" value="Presentation Skills" name="criteria[]" />
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
            </form>
        </div>
        <div class="mt-6 flex justify-center gap-x-4">
          <button type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-50 dark:bg-transparent dark:border-neutral-700 dark:text-neutral-300 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800" data-hs-overlay="#evaluate-{{$applicant->id}}">
            Cancel
          </button>
          <button type="submit" form="mark_as_done" class="btn btn-success">
            Submit Evaluation
          </button>
        </div>
      </div>
    </div>
  </div>
</div>

