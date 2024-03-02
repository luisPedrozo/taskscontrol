<x-app-layout>
    <form action="{{ route('tasks.update', $task) }}" method="POST" class="max-w-sm mx-auto">
        @method('PUT')
        @csrf
        <div class="mb-5">
            <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
            <input type="text" id="title" name="title" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="{{$task->title}}" required />
          </div>
          <div class="mb-5">
            <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
            <textarea type="" id="description" name="description" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="{{$task->description}}" required></textarea>
          </div>
          <div class="mb-5 text-center">
            <label for="status" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status</label>
            <select name="status" name="status" class="form-select" id="status">
              <option value="">-- Elige el status --</option>
              <option value="Completa">Completa</option>
              <option value="En Progreso">En Progreso</option>
              <option value="Pendiente">Pendiente</option>
          </select>
          </div>
          <div class="mb-5 text-center">
            <label for="user_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">User</label>
            <select name="user_id" class="form-select" id="user_id">
              <option value="{{auth()->id()}}">{{auth()->user()->name}}</option>
            </select>
        </div>
          <div class="mb-5">
              <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="grid-city">
                  Start Time
              </label>
              <input class="w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="start_time" name="start_time" type="datetime-local" placeholder="{{$task->start_time}}">
          </div>
          <div class="mb-5">
              <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="grid-city">
                  Finish Time
              </label>
              <input class="w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="finish_time" name="finish_time" type="datetime-local" placeholder="{{$task->finish_time}}">
          </div>
            <div class="text-center" style="">
                <button type="submit" class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow">Update</button>
                <a class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow"" href="{{route('tasks.index') }}">Volver</a>
            </div>
        </div>
    </form>
            
</x-app-layout>