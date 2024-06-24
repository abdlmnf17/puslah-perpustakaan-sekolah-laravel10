<div x-data="{ isOpen: false }">
    <template x-if="isOpen">
        <div class="fixed z-10 inset-0 overflow-y-auto" x-show="isOpen" x-cloak>
            <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                <!-- Background overlay -->
                <div class="fixed inset-0 transition-opacity" aria-hidden="true"
                    x-show="isOpen" x-cloak>
                    <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                </div>

                <!-- Modal -->
                <div class="inline-block align-bottom bg-white dark:bg-gray-800 rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full"
                    role="dialog" aria-modal="true" aria-labelledby="modal-headline" x-show="isOpen" x-cloak>
                    <!-- Modal Header -->
                    <div class="bg-white dark:bg-gray-900 px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                        <div class="sm:flex sm:items-start">
                            <div class="mt-3 text-center sm:mt-0 sm:text-left">
                                <h3 class="text-lg leading-6 font-medium text-gray-900 dark:text-gray-200"
                                    id="modal-headline">
                                    {{ $title }}
                                </h3>
                            </div>
                        </div>
                    </div>

                    <!-- Modal Body -->
                    <div class="bg-white dark:bg-gray-900 text-white px-4 pt-4 pb-4 sm:p-6 sm:pb-4">
                        {{ $content }}
                    </div>

                    <!-- Modal Footer -->
                    <div class="bg-gray-50 dark:bg-gray-800 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                        {{ $footer }}
                    </div>
                </div>
            </div>
        </div>
    </template>

    <!-- Trigger Button -->
    {{ $trigger }}
</div>
