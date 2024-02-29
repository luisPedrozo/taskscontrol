<x-app-layout>

<div class="relative overflow-x-auto shadow-md sm:rounded-lg p-6">
  <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
      <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
          <tr>
              <th scope="col" class="px-6 py-3">
                  Title
              </th>
              <th scope="col" class="px-6 py-3">
                  Description
              </th>
              <th scope="col" class="px-6 py-3">
                  Status
              </th>
              <th scope="col" class="px-6 py-3">
                  <span class="sr-only">Edit</span>
              </th>
          </tr>
      </thead>
      <tbody>
        @foreach ($tasks as $task)
        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
          <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
              {{$task->title}}
          </th>
          <td class="px-6 py-4">
            {{$task->description}}
          </td>
          <td class="px-6 py-4">
            {{$task->status}}
          </td>
          <td class="px-6 py-4 text-right">
              <a href="{{route('tasks.edit', $task)}}"  class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
              <form action="{{route('tasks.destroy', $task)}}" method="post" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="">Eliminar</button>
            </form>
            </td>
        </tr> 
        @endforeach
          
          
          
      </tbody>

  </table>



</div>
<div class="mt-10 text-center">
  <a class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow" href="{{route('tasks.create') }}">Create</a>
</div>

</x-app-layout>