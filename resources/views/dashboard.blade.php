<x-layout>

    <div class="container">
        <h1>Task Manager</h1>
        <form id="task-form">
            <input type="text" id="task-input" placeholder="Enter a new task" required />
            <button type="submit">Add Task</button>
        </form>

        <ul class="task-list">
            <!-- Example Task Item -->
            <li class="task-item">
                <input type="checkbox" />
                <span>Sample Task</span>
                <button class="delete-btn">✕</button>
            </li>
        </ul>
    </div>

</x-layout>
