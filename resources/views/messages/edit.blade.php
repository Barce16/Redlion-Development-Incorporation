<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Reply to Message') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="mb-6 p-4 bg-gray-50 dark:bg-gray-700 rounded">
                        <p class="text-sm font-semibold text-gray-600 dark:text-gray-400 mb-2">Original Message:</p>
                        <p class="text-gray-900 dark:text-white">{{ $message->body }}</p>
                    </div>

                    <form action="{{ route('messages.update', $message) }}" method="POST" class="space-y-6">
                        @csrf
                        @method('PUT')

                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Reply</label>
                            <textarea name="reply" rows="6"
                                class="block w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg
                                dark:bg-gray-700 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('reply', $message->reply) }}</textarea>
                            @error('reply')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Status</label>
                            <select name="status" class="block w-full px-4 py-2 border border-gray-300
                                dark:border-gray-600 rounded-lg dark:bg-gray-700 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                                <option value="unread" {{ old('status', $message->status) == 'unread' ? 'selected' : '' }}>Unread</option>
                                <option value="read" {{ old('status', $message->status) == 'read' ? 'selected' : '' }}>Read</option>
                                <option value="answered" {{ old('status', $message->status) == 'answered' ? 'selected' : '' }}>Answered</option>
                                <option value="archived" {{ old('status', $message->status) == 'archived' ? 'selected' : '' }}>Archived</option>
                            </select>
                            @error('status')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                        </div>

                        <div class="flex gap-4 justify-end">
                            <a href="{{ route('messages.show', $message) }}" class="px-6 py-2 border border-gray-300 dark:border-gray-600
                                text-gray-700 dark:text-gray-300 rounded-lg font-medium hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                                Cancel
                            </a>
                            <button type="submit" class="px-6 py-2 bg-blue-500 text-white rounded-lg font-medium
                                hover:bg-blue-600 transition">
                                Send Reply
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
