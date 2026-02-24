<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Message: ' . $message->subject) }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <div class="lg:col-span-2">
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 space-y-6">
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Message Details</h3>
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <p class="text-gray-500 dark:text-gray-400 text-sm">From</p>
                                    <p class="text-gray-900 dark:text-white font-semibold">{{ $message->customer->name }}</p>
                                </div>
                                <div>
                                    <p class="text-gray-500 dark:text-gray-400 text-sm">To</p>
                                    <p class="text-gray-900 dark:text-white font-semibold">{{ $message->user->name }}</p>
                                </div>
                                <div class="col-span-2">
                                    <p class="text-gray-500 dark:text-gray-400 text-sm">Subject</p>
                                    <p class="text-gray-900 dark:text-white font-semibold text-lg">{{ $message->subject }}</p>
                                </div>
                                <div>
                                    <p class="text-gray-500 dark:text-gray-400 text-sm">Status</p>
                                    <span class="inline-block px-3 py-1 rounded text-sm font-semibold
                                        {{ $message->status == 'answered' ? 'bg-green-100 text-green-700 dark:bg-green-900' :
                                           ($message->status == 'read' ? 'bg-blue-100 text-blue-700 dark:bg-blue-900' :
                                           ($message->status == 'unread' ? 'bg-yellow-100 text-yellow-700 dark:bg-yellow-900' :
                                           'bg-gray-100 text-gray-700 dark:bg-gray-700')) }}">
                                        {{ ucfirst($message->status) }}
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div>
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Message</h3>
                            <div class="p-4 bg-gray-50 dark:bg-gray-700 rounded">
                                <p class="text-gray-600 dark:text-gray-400 whitespace-pre-wrap">{{ $message->body }}</p>
                            </div>
                        </div>

                        @if($message->reply)
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Reply</h3>
                            <div class="p-4 bg-green-50 dark:bg-green-900/20 rounded border border-green-200 dark:border-green-800">
                                <p class="text-gray-600 dark:text-gray-400 whitespace-pre-wrap">{{ $message->reply }}</p>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>

                <div class="space-y-4">
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Actions</h3>
                        <div class="space-y-2">
                            <a href="{{ route('messages.edit', $message) }}" class="block w-full px-4 py-2 bg-yellow-500 text-white rounded-lg
                                font-medium hover:bg-yellow-600 transition text-center text-sm">
                                Reply/Edit
                            </a>
                            <form action="{{ route('messages.destroy', $message) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="w-full px-4 py-2 bg-red-500 text-white rounded-lg font-medium
                                    hover:bg-red-600 transition text-sm" onclick="return confirm('Are you sure?')">
                                    Delete Message
                                </button>
                            </form>
                            <a href="{{ route('messages.index') }}" class="block w-full px-4 py-2 bg-gray-500 text-white rounded-lg
                                font-medium hover:bg-gray-600 transition text-center text-sm">
                                Back to Messages
                            </a>
                        </div>
                    </div>

                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 text-sm text-gray-600 dark:text-gray-400">
                        <p><strong>Created:</strong> {{ $message->created_at->format('M d, Y H:i') }}</p>
                        @if($message->read_at)
                        <p><strong>Read:</strong> {{ $message->read_at->format('M d, Y H:i') }}</p>
                        @endif
                        @if($message->replied_at)
                        <p><strong>Replied:</strong> {{ $message->replied_at->format('M d, Y H:i') }}</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
