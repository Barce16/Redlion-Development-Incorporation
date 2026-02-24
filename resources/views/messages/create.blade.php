<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create New Message') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('messages.store') }}" method="POST" class="space-y-6">
                        @csrf

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Customer</label>
                                <select name="customer_id" class="block w-full px-4 py-2 border border-gray-300
                                    dark:border-gray-600 rounded-lg dark:bg-gray-700 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                                    <option value="">Select Customer</option>
                                    @foreach($customers as $customer)
                                        <option value="{{ $customer->id }}" {{ old('customer_id') == $customer->id ? 'selected' : '' }}>
                                            {{ $customer->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('customer_id')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">User</label>
                                <select name="user_id" class="block w-full px-4 py-2 border border-gray-300
                                    dark:border-gray-600 rounded-lg dark:bg-gray-700 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                                    <option value="">Select User</option>
                                    @foreach($users as $user)
                                        <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>
                                            {{ $user->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('user_id')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Subject</label>
                            <input type="text" name="subject" value="{{ old('subject') }}"
                                class="block w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg
                                dark:bg-gray-700 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                            @error('subject')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Message</label>
                            <textarea name="body" rows="6"
                                class="block w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg
                                dark:bg-gray-700 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('body') }}</textarea>
                            @error('body')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Status</label>
                            <select name="status" class="block w-full px-4 py-2 border border-gray-300
                                dark:border-gray-600 rounded-lg dark:bg-gray-700 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                                <option value="unread" {{ old('status') == 'unread' ? 'selected' : '' }}>Unread</option>
                                <option value="read" {{ old('status') == 'read' ? 'selected' : '' }}>Read</option>
                                <option value="answered" {{ old('status') == 'answered' ? 'selected' : '' }}>Answered</option>
                                <option value="archived" {{ old('status') == 'archived' ? 'selected' : '' }}>Archived</option>
                            </select>
                            @error('status')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                        </div>

                        <div class="flex gap-4 justify-end">
                            <a href="{{ route('message') }}" class="px-6 py-2 border border-gray-300 dark:border-gray-600
                                text-gray-700 dark:text-gray-300 rounded-lg font-medium hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                                Cancel
                            </a>
                            <button type="submit" class="px-6 py-2 bg-blue-500 text-white rounded-lg font-medium
                                hover:bg-blue-600 transition">
                                Create Message
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
