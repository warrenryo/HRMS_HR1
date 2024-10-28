<div id="edit-company-{{$company_data->id}}" class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto pointer-events-none" role="dialog" tabindex="-1" aria-labelledby="hs-scale-animation-modal-label">
    <div class="hs-overlay-animation-target hs-overlay-open:scale-100 hs-overlay-open:opacity-100 scale-95 opacity-0 ease-in-out transition-all duration-200 sm:max-w-lg sm:w-full m-3 sm:mx-auto min-h-[calc(100%-3.5rem)] flex items-center">
        <div class="w-full flex flex-col bg-white border shadow-sm rounded-xl pointer-events-auto dark:bg-neutral-800 dark:border-neutral-700 dark:shadow-neutral-700/70">
            <div class="flex justify-between items-center py-3 px-4 border-b dark:border-neutral-700">
                <h3 id="hs-scale-animation-modal-label" class="font-bold text-gray-800 dark:text-white">
                    Edit {{$company_data->name}} Company
                </h3>
                <button type="button" class="size-8 inline-flex justify-center items-center gap-x-2 rounded-full border border-transparent bg-gray-100 text-gray-800 hover:bg-gray-200 focus:outline-none focus:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-700 dark:hover:bg-neutral-600 dark:text-neutral-400 dark:focus:bg-neutral-600" aria-label="Close" data-hs-overlay="#edit-company-{{$company_data->id}}">
                    <span class="sr-only">Close</span>
                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M18 6 6 18"></path>
                        <path d="m6 6 12 12"></path>
                    </svg>
                </button>
            </div>
            <div class="p-4 overflow-y-auto">
                <form class="space-y-5" id="submit_form" method="POST" action="{{ url('company/manage/edit-company/id='.$company_data->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label for="cName">Company Name</label>
                            <input id="cName" type="text" placeholder="Enter Company Name" value="{{$company_data->name}}" name="name" class="form-input" required />
                        </div>
                        <div>
                            <label for="website">Website</label>
                            <input id="website" type="text" placeholder="Enter Website (optional)" value="{{$company_data->website}}" name="website" class="form-input" />
                        </div>
                    </div>
                    <div>
                        <label for="industry">Industry</label>
                        <input id="industry" type="text" placeholder="Enter Company Industry" name="industry" value="{{$company_data->industry}}" class="form-input" required />
                    </div>
                    <div>
                        <label for="location">Location</label>
                        <input id="location" type="text" placeholder="Enter Company Location" name="location" value="{{$company_data->location}}" class="form-input" required />
                    </div>
                    <div>
                        <label for="ctnTextarea">Company Description</label>
                        <textarea id="ctnTextarea" rows="3" class="form-textarea" name="description" placeholder="Company Description" required>{{$company_data->description}}</textarea>
                    </div>
                </form>
            </div>
            <div class="flex justify-end items-center gap-x-2 py-3 px-4 border-t dark:border-neutral-700">
                <button type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700" data-hs-overlay="#edit-company-{{$company_data->id}}">
                    Close
                </button>
                <button type="submit" form="submit_form" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                    Save changes
                </button>
            </div>
        </div>
    </div>
</div>



<div id="delete-company-{{$company_data->id}}" class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto" role="dialog" tabindex="-1" aria-labelledby="hs-danger-alert-label">
  <div class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all md:max-w-2xl md:w-full m-3 md:mx-auto">
    <div class="relative flex flex-col bg-white border shadow-sm rounded-xl overflow-hidden dark:bg-neutral-900 dark:border-neutral-800">
      <div class="absolute top-2 end-2">
        <button type="button" class="size-8 inline-flex justify-center items-center gap-x-2 rounded-full border border-transparent bg-gray-100 text-gray-800 hover:bg-gray-200 focus:outline-none focus:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-700 dark:hover:bg-neutral-600 dark:text-neutral-400 dark:focus:bg-neutral-600" aria-label="Close" data-hs-overlay="#delete-company-{{$company_data->id}}">
          <span class="sr-only">Close</span>
          <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
        </button>
      </div>

      <div class="p-4 sm:p-10 overflow-y-auto">
        <div class="flex gap-x-4 md:gap-x-7">
          <!-- Icon -->
          <span class="shrink-0 inline-flex justify-center items-center size-[46px] sm:w-[62px] sm:h-[62px] rounded-full border-4 border-red-50 bg-red-100 text-red-500 dark:bg-red-700 dark:border-red-600 dark:text-red-100">
            <svg class="shrink-0 size-5" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
              <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
            </svg>
          </span>
          <!-- End Icon -->
            <form id="form_submit" action="{{ url('company/manage/delete-company/id='.$company_data->id)}}" method="POST">
                @csrf
                @method('DELETE')
            </form>
          <div class="grow">
            <h3 id="hs-danger-alert-label" class="mb-2 text-xl font-bold text-gray-800 dark:text-neutral-200">
              Delete Company {{$company_data->name}}
            </h3>
            <p class="text-gray-500 dark:text-neutral-500">
              Permanently remove company {{$company_data->name}} and all of its contents from this system. This action is not reversible, so please continue with caution.
            </p>
          </div>
        </div>
      </div>

      <div class="flex justify-end items-center gap-x-2 py-3 px-4 bg-gray-50 border-t dark:bg-neutral-950 dark:border-neutral-800">
        <button type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-50 dark:bg-transparent dark:border-neutral-700 dark:text-neutral-300 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800" data-hs-overlay="#delete-company-{{$company_data->id}}">
          Cancel
        </button>
        <button type="submit" form="form_submit" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-red-500 text-white hover:bg-red-600 disabled:opacity-50 disabled:pointer-events-none" >
          Delete Company
        </button>
      </div>
    </div>
  </div>
</div>