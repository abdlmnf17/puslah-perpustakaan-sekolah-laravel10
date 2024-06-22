
    <div class="p-2 bg-red-800 items-center text-red-100 leading-none lg:rounded-full flex lg:inline-flex"
        role="alert-error">
        <span class="flex rounded-full bg-red-500 uppercase px-2 py-1 text-xs font-bold mr-3">GAGAL</span>
        <span class="font-semibold mr-2 text-left flex-auto">{{ $message }}</span>
        <button type="button" class="text-red-500 hover:text-indigo-600 focus:outline-none focus:text-white-600"
            onclick="this.parentElement.style.display='none'">
            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                <path
                    d="M14.95 5.05a.75.75 0 0 1 1.06 1.06L11.06 10l5.95 5.95a.75.75 0 1 1-1.06 1.06L10 11.06l-5.95 5.95a.75.75 0 0 1-1.06-1.06L8.94 10 3.99 4.05a.75.75 0 0 1 1.06-1.06L10 8.94l5.95-5.95z" />
            </svg>
        </button>
    </div>
    <br />

