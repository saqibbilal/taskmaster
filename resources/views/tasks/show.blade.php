<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Task Details</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="font-sans text-gray-900 antialiased">
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-2xl font-semibold">Task Details</h2>
                        <div class="space-x-2">
                            <a href="{{ route('tasks.index') }}"
                               class="px-4 py-2 bg-gray-100 text-gray-700 rounded-md hover:bg-gray-200 dark:bg-gray-700 dark:text-gray-300 dark:hover:bg-gray-600">
                                Back to Tasks
                            </a>
                            <a href="{{ route('tasks.edit', $task) }}"
                               class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 dark:bg-indigo-700 dark:hover:bg-indigo-600">
                                Edit Task
                            </a>
                        </div>
                    </div>

                    @if (session('success'))
                        <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative dark:bg-green-900 dark:border-green-600 dark:text-green-100" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-6 space-y-6">
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">
                                {{ $task->title }}
                            </h3>
                            <div class="mt-2 flex items-center space-x-4">
                                <span class="px-3 py-1 rounded-full text-sm
                                    @if($task->status === 'completed')
                                        bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200
                                    @elseif($task->status === 'in_progress')
                                        bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200
                                    @else
                                        bg-gray-100 text-gray-800 dark:bg-gray-600 dark:text-gray-200
                                    @endif">
                                    {{ ucfirst(str_replace('_', ' ', $task->status)) }}
                                </span>
                                <span class="px-3 py-1 rounded-full text-sm
                                    @if($task->priority === 'high')
                                        bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200
                                    @elseif($task->priority === 'medium')
                                        bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-200
                                    @else
                                        bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200
                                    @endif">
                                    Priority: {{ ucfirst($task->priority) }}
                                </span>
                            </div>
                        </div>

                        <div class="border-t border-gray-200 dark:border-gray-600 pt-4">
                            <h4 class="text-sm font-medium text-gray-500 dark:text-gray-400">Description</h4>
                            <p class="mt-2 text-gray-700 dark:text-gray-300 whitespace-pre-line">
                                {{ $task->description ?: 'No description provided.' }}
                            </p>
                        </div>

                        <div class="border-t border-gray-200 dark:border-gray-600 pt-4">
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <h4 class="text-sm font-medium text-gray-500 dark:text-gray-400">Created By</h4>
                                    <p class="mt-2 text-gray-700 dark:text-gray-300">
                                        {{ $task->user->name }}
                                    </p>
                                </div>
                                <div>
                                    <h4 class="text-sm font-medium text-gray-500 dark:text-gray-400">Created At</h4>
                                    <p class="mt-2 text-gray-700 dark:text-gray-300">
                                        {{ $task->created_at->format('M d, Y H:i') }}
                                    </p>
                                </div>
                                <div>
                                    <h4 class="text-sm font-medium text-gray-500 dark:text-gray-400">Last Updated</h4>
                                    <p class="mt-2 text-gray-700 dark:text-gray-300">
                                        {{ $task->updated_at->format('M d, Y H:i') }}
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="border-t border-gray-200 dark:border-gray-600 pt-4">
                            <form action="{{ route('tasks.destroy', $task) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 dark:bg-red-700 dark:hover:bg-red-600"
                                        onclick="return confirm('Are you sure you want to delete this task?')">
                                    Delete Task
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
