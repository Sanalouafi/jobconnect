<x-dashboard>

    <!-- component -->
    <div class=" w-full my-48 mx-auto max-w-6xl">
        <div
            class="lg:col-start-2 col-span-12 lg:col-span-10 grid grid-cols-6 gap-x-8 gap-y-10 border-b border-gray-900/10 pb-12 mx-auto">
            <div class="p-4 col-span-6 md:col-span-2 ">
                <div class="grid grid-cols-5">
                    <div for="personal-information" id="personal-information-button"
                        class="md:col-span-5 group relative flex items-left gap-x-6 rounded-lg p-3 text-sm leading-6 hover:bg-violet-300">
                        <div style="text-align: center;"
                            class="flex h-11 w-11 flex-none items-center justify-center rounded-lg bg-gray-50 group-hover:bg-violet-500 mx-auto md:mx-0">
                            <svg class="mx-auto items-center justify-center h-6 w-6 text-gray-600 group-hover:text-indigo-600"
                                fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M10.5 6a7.5 7.5 0 107.5 7.5h-7.5V6z" />
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M13.5 10.5H21A7.5 7.5 0 0013.5 3v7.5z" />
                            </svg>
                        </div>
                        <div class="flex-auto hidden md:block">
                            <a href="#" class="block font-semibold text-white">
                                Personal Information
                                <span class="absolute inset-0"></span>
                            </a>
                            <p class="mt-1 text-gray-600">{{ $user->email }}</p>
                        </div>
                    </div>
                    <div for="experience" id="experience-button"
                        class="md:col-span-5 group relative flex items-left justify-left gap-x-6 rounded-lg p-3 text-sm leading-6 hover:bg-violet-300">
                        <div
                            class="flex h-11 w-11 flex-none items-center justify-center rounded-lg bg-gray-50 group-hover:bg-violet-500  mx-auto md:mx-0">
                            <svg class="h-6 w-6 text-gray-600 group-hover:text-indigo-600" fill="none"
                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15.042 21.672L13.684 16.6m0 0l-2.51 2.225.569-9.47 5.227 7.917-3.286-.672zM12 2.25V4.5m5.834.166l-1.591 1.591M20.25 10.5H18M7.757 14.743l-1.59 1.59M6 10.5H3.75m4.007-4.243l-1.59-1.59" />
                            </svg>
                        </div>
                        <div class="flex-auto  hidden md:block">
                            <a href="#" class="block font-semibold text-white">
                                Experiences
                                <span class="absolute inset-0"></span>
                            </a>
                            <p class="mt-1 text-gray-600">Add your experiences</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="p-4 col-span-6 md:col-span-4" id="personal-information-section">
                <form method="POST" action="{{ route('representative.update', $user->id) }}"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mx-auto grid grid-cols-2 gap-x-8 gap-y-10">
                        <div class="col-span-2 mx-auto">
                            <label for="image-input" class="cursor-pointer">
                                <img id="preview-image"
                                    class="h-40 w-40 rounded-full shadow-xl border-2 border-gray-400"
                                    src="{{ $user->getFirstMediaUrl('user') }}" alt="user image">
                            </label>
                            <input type="file" id="image-input" name="image" class="hidden"
                                onchange="previewImage(event)">
                        </div>
                        <div class="col-span-2">
                            <label for="fullname"
                                class="block text-sm font-medium leading-6 text-white">Fullname</label>
                            <div class="mt-2">
                                <input type="text" name="fullname" id="fullname" value="{{ $user->fullname }}"
                                    autocomplete="given-name"
                                    class="block w-full rounded-md border-0 py-1.5 text-black shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="phone" class="block text-sm font-medium leading-6 text-white">Phone</label>
                            <div class="mt-2">
                                <input type="text" name="phone" id="phone" value="{{ $user->phone }}"
                                    autocomplete="given-phone-number"
                                    class="block w-full rounded-md border-0 py-1.5 text-black shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                        </div>

                        <div class="col-span-2 sm:col-span-1">
                            <label for="address" class="block text-sm font-medium leading-6 text-white">address</label>
                            <div class="mt-2">
                                <input type="text" name="address" id="address" value="{{ $user->address }}"
                                    autocomplete="address"
                                    class="block w-full rounded-md border-0 py-1.5 text-black shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                        </div>

                        <div class="col-span-2">
                            <label for="email" class="block text-sm font-medium leading-6 text-white">Email
                                address</label>
                            <div class="mt-2">
                                <input id="email" name="email" type="email" value="{{ $user->email }}"
                                    autocomplete="email"
                                    class="block w-full rounded-md border-0 py-1.5 text-black shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                        </div>
                    </div>
                    <div class="mt-6 flex items-center justify-end gap-x-6">
                        <button type="button" class="text-sm font-semibold leading-6 text-white">Cancel</button>
                        <button type="submit"
                            class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
                    </div>
                </form>
            </div>
            <div class="p-4 col-span-6 md:col-span-4" id="experience-section" style="display: none">
                {{-- start modal --}}

                <!-- Modal toggle -->
                <button data-modal-target="experience-modal" data-modal-toggle="experience-modal"
                    class="block text-white bg-violet-700 hover:bg-violet-800 focus:ring-4 focus:outline-none focus:ring-violet-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-violet-600 dark:hover:bg-violet-700 dark:focus:ring-violet-800"
                    type="button">
                    Add Experience
                </button>

                <!-- Main modal -->
                <div id="experience-modal" tabindex="-1" aria-hidden="true"
                    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative p-4 w-full max-w-md max-h-full">
                        <!-- Modal content -->
                        <div class="relative bg-violet-400 rounded-lg shadow dark:bg-violet-800">
                            <!-- Modal header -->
                            <div
                                class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                <h3 class="text-xl font-semibold text-gray-900 dark:text-black">
                                    Add new experience </h3>
                                <button type="button"
                                    class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                    data-modal-hide="experience-modal">
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                            </div>
                            <!-- Modal body -->
                            <div class="p-4 md:p-5">
                                <form class="space-y-4" action="{{ route('representativeExperience.store') }}"
                                    method="POST">
                                    @csrf
                                    <input type="hidden" name="user_id" value="{{ $user->id }}">
                                    <div>
                                        <label for="name"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Your
                                            name</label>
                                        <input type="text" name="name" id="name"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-black"
                                            placeholder="name" required />
                                    </div>
                                    <div>
                                        <label for="company_name"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Your
                                            company name</label>
                                        <input type="text" name="company_name" id="company_name"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-black"
                                            placeholder="company name" required />
                                    </div>
                                    <div>
                                        <label for="description"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Your
                                            description</label>
                                        <textarea name="description" id="description" rows="5"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-black"></textarea>
                                    </div>
                                    <div>
                                        <label for="start_date"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Your
                                            start date</label>
                                        <input type="date" name="start_date" id="start_date"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-gray"
                                            required />
                                    </div>
                                    <div>
                                        <label for="end_date"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Your
                                            end date</label>
                                        <input type="date" name="end_date" id="end_date"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-gray"
                                            required />
                                    </div>
                                    <div>
                                        <label for="task"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Your
                                            task</label>
                                        <input type="text" name="task" id="task"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-black"
                                            placeholder="task" required />
                                    </div>

                                    <button type="submit"
                                        class="w-full text-white bg-violet-950 hover:bg-violet-800 focus:ring-4 focus:outline-none focus:ring-violet-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-violet-950 dark:hover:bg-violet-700 dark:focus:ring-violet-800">
                                        save
                                    </button>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>


                {{-- end modal --}}
                @foreach ($experiences as $experience)
                    {{-- card --}}
                    <div
                        class="relative py-5 flex w-full max-w-[26rem] flex-col rounded-xl bg-transparent bg-clip-border text-gray-700 shadow-none">
                        <div
                            class="relative flex items-center gap-4 pt-0 pb-8 mx-0 mt-4 overflow-hidden text-gray-700 bg-transparent shadow-none rounded-xl bg-clip-border">
                            <div class="flex w-full flex-col gap-0.5">
                                <div class="flex items-center justify-between">
                                    <h5
                                        class="block font-sans text-xl antialiased font-semibold leading-snug tracking-normal text-blue-gray-900">
                                        {{ $experience->name }}
                                    </h5>
                                    <div class="flex items-center gap-5">
                                        <span>{{ $experience->start_date }} | {{ $experience->end_date }}</span>
                                        <!-- Edit Icon -->
                                        <!-- Modal toggle -->
                                        <a href="#"
                                            data-modal-target="edit-experience-modal{{ $experience->id }}"
                                            data-modal-toggle="edit-experience-modal{{ $experience->id }}">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="h-6 w-6 text-violet-500 hover:text-violet-700"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M15.41 4.41a2 2 0 0 0-2.82 0L5 12.17V14h1.83l7.76-7.77a2 2 0 0 0 0-2.83l-1.41-1.42zm-9.05 9.05L4 15v1h1l6.54-6.53-1.41-1.42L5.36 12.04zm9.19-9.18L15 3a1 1 0 0 0-1 1l.03.26 1.41 1.41.26.03a1 1 0 0 0 1-1l-.03-.26-.63-.63zM8.83 13H4v-4.83l6.17-6.17 4.24 4.24L8.83 13z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </a>

                                        <!-- Main modal -->
                                        <div id="edit-experience-modal{{ $experience->id }}" tabindex="-1"
                                            aria-hidden="true"
                                            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100% - 1rem)] max-h-full">
                                            <div class="relative p-4 w-full max-w-md max-h-full">
                                                <!-- Modal content -->
                                                <div
                                                    class="relative bg-violet-400 rounded-lg shadow dark:bg-violet-800">
                                                    <!-- Modal header -->
                                                    <div
                                                        class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                                        <h3
                                                            class="text-xl font-semibold text-gray-900 dark:text-black">
                                                            edit your experience </h3>
                                                        <button type="button"
                                                            class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                            data-modal-hide="edit-experience-modal{{ $experience->id }}">
                                                            <svg class="w-3 h-3" aria-hidden="true"
                                                                xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                viewBox="0 0 14 14">
                                                                <path stroke="currentColor" stroke-linecap="round"
                                                                    stroke-linejoin="round" stroke-width="2"
                                                                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                            </svg>
                                                            <span class="sr-only">Close modal</span>
                                                        </button>
                                                    </div>
                                                    <!-- Modal body -->
                                                    <div class="p-4 md:p-5">
                                                        <form class="space-y-4"
                                                            action="{{ route('representativeExperience.update', $experience->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('PUT')
                                                            <input type="hidden" name="id"
                                                                value="{{ $experience->id }}"> <input type="hidden"
                                                                name="user_id" value="{{ $user->id }}">
                                                            <div>
                                                                <label for="name"
                                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Your
                                                                    name</label>
                                                                <input type="text" name="name" id="name"
                                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-black"
                                                                    placeholder="name"
                                                                    value="{{ $experience->name }}" required />
                                                            </div>
                                                            <div>
                                                                <label for="company_name"
                                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Your
                                                                    company name</label>
                                                                <input type="text" name="company_name"
                                                                    id="company_name"
                                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-black"
                                                                    placeholder="company name"
                                                                    value="{{ $experience->company_name }}"
                                                                    required />
                                                            </div>
                                                            <div>
                                                                <label for="description"
                                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Your
                                                                    description</label>
                                                                <textarea name="description" id="description" rows="5"
                                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-black">{{ $experience->description }}</textarea>
                                                            </div>
                                                            <div>
                                                                <label for="start_date"
                                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Your
                                                                    start date</label>
                                                                <input type="date" name="start_date"
                                                                    id="start_date"
                                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-gray"
                                                                    value="{{ $experience->start_date }}" required />
                                                            </div>
                                                            <div>
                                                                <label for="end_date"
                                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Your
                                                                    end date</label>
                                                                <input type="date" name="end_date" id="end_date"
                                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-gray"
                                                                    value="{{ $experience->end_date }}" required />
                                                            </div>
                                                            <div>
                                                                <label for="task"
                                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Your
                                                                    task</label>
                                                                <input type="text" name="task" id="task"
                                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-black"
                                                                    placeholder="task"
                                                                    value="{{ $experience->task }}" required />
                                                            </div>

                                                            <button type="submit"
                                                                class="w-full text-white bg-violet-950 hover:bg-violet-800 focus:ring-4 focus:outline-none focus:ring-violet-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-violet-950 dark:hover:bg-violet-700 dark:focus:ring-violet-800">
                                                                save
                                                            </button>

                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <!-- Delete Icon -->
                                        <form
                                            action="{{ route('representativeExperience.destroy', $experience->id) }}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <input type="hidden" name="id" value="{{ $experience->id }}">
                                            <button type="submit"
                                                onclick="return confirm('Are you sure you want to delete this experience?')">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="h-6 w-6 text-gray-500 hover:text-gray-700"
                                                    viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd"
                                                        d="M6 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v1h2a1 1 0 0 1 0 2h-.42l-.44 13.31A2 2 0 0 1 13.16 20H6.84a2 2 0 0 1-1.98-1.69L4.42 7H4a1 1 0 0 1 0-2h2V3zm2 2v10h2V5H8zm4 0v10h2V5h-2z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                                <p
                                    class="block font-sans text-base antialiased font-light leading-relaxed text-blue-gray-900">
                                    {{ $experience->company_name }}
                                </p>
                                <p
                                    class="block font-sans text-base antialiased font-light leading-relaxed text-blue-gray-900">
                                    {{ $experience->task }}
                                </p>
                            </div>
                        </div>
                        <div class="p-0 mb-4">
                            <p class="block font-sans text-base antialiased font-light leading-relaxed text-inherit">
                                {{ $experience->description }}
                            </p>
                        </div>
                    </div>
                    {{-- end-card --}}
                @endforeach


            </div>
        </div>
        <script>
            const personalInformationButton = document.getElementById('personal-information-button');
            const experienceButton = document.getElementById('experience-button');
            const personalInformationSection = document.getElementById('personal-information-section');
            const experienceSection = document.getElementById('experience-section');

            personalInformationButton.addEventListener('click', () => {
                personalInformationSection.style.display = 'block';
                experienceSection.style.display = 'none';
                personalInformationButton.classList.add('bg-violet-300');
                experienceButton.classList.remove('bg-violet-300');
            });

            experienceButton.addEventListener('click', () => {
                personalInformationSection.style.display = 'none';
                experienceSection.style.display = 'block';
                experienceButton.classList.add('bg-violet-300');
                personalInformationButton.classList.remove('bg-violet-300');
            });
        </script>

</x-dashboard>
