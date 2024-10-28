<x-app-layout>
    @section('title', 'Dashboard')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="panel">
        <div class="flex justify-end">
            <button class="btn btn-primary" data-hs-overlay="#hs-scale-animation-modal">Create Company</button>
        </div>
        <div class="table-responsive mt-8">
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Website</th>
                        <th>Industry</th>
                        <th>Location</th>
                        <th>IsActive</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $company_data)
                    <tr>
                        <td>{{$company_data->id}}</td>
                        <td>{{$company_data->name}}</td>
                        <td>
                            <a href="https://{{ $company_data->website }}" target="_blank" rel="noopener noreferrer">
                                {{ $company_data->website }}
                            </a>
                        </td>
                        <td>{{$company_data->industry}}</td>
                        <td>{{$company_data->location}}</td>
                        <td>
                            <input name="isActive" value="1" {{ $company_data->isActive ? 'checked' : '' }} type="checkbox" id="hs-basic-usage-{{ $company_data->id }}" class="relative w-[3.25rem] h-7 p-px bg-gray-100 border-transparent text-transparent rounded-full cursor-pointer transition-colors ease-in-out duration-200 focus:ring-blue-600 disabled:opacity-50 disabled:pointer-events-none checked:bg-none checked:text-blue-600 checked:border-blue-600 focus:checked:border-blue-600 dark:bg-neutral-800 dark:border-neutral-700 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-600
                            before:inline-block before:size-6 before:bg-white checked:before:bg-blue-200 before:translate-x-0 checked:before:translate-x-full before:rounded-full before:shadow before:transform before:ring-0 before:transition before:ease-in-out before:duration-200 dark:before:bg-neutral-400 dark:checked:before:bg-blue-200">
                            <label for="hs-basic-usage-{{ $company_data->id }}" class="sr-only">switch</label>
                            <script>
                                document.getElementById(`hs-basic-usage-{{ $company_data->id }}`).addEventListener('change', function() {
                                    const isActive = this.checked ? 1 : 0;

                                    fetch(`/company/manage/isActive/{{ $company_data->id }}`, {
                                            method: 'PATCH',
                                            headers: {
                                                'Content-Type': 'application/json',
                                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                            },
                                            body: JSON.stringify({
                                                isActive
                                            })
                                        })
                                        .then(response => {
                                            if (!response.ok) {
                                                throw new Error('Network response was not ok');
                                            }
                                            return response.json();
                                        })
                                        .then(data => {
                                            console.log(data.message);
                                            // Optionally show a success message to the user
                                        })
                                        .catch(error => console.error('Error:', error));
                                });
                            </script>
                        </td>
                        <td class="flex gap-3">
                            <button type="button" data-hs-overlay="#edit-company-{{$company_data->id}}" class="text-white bg-[#5DFFA2] hover:bg-[#26de74] py-2 px-3 rounded-md">
                                <i class="fa-solid fa-pen"></i>
                            </button>
                            <button type="button" data-hs-overlay="#delete-company-{{$company_data->id}}" class="text-white bg-[#FF5F5F] hover:bg-[#fa2020] py-2 px-3 rounded-md">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                            @include('AdminComponents.Modals.Company.EditDeleteCompany')
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @include('AdminComponents.Modals.Company.AddCompany')
</x-app-layout>