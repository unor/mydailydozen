@section('header', 'Edit food groups on the site.')
<x-master>
  <!-- Page header -->
  <div class="bg-white shadow">
    <div class="px-4 sm:px-6 lg:max-w-6xl lg:mx-auto lg:px-8">
      <div class="py-6 md:flex md:items-center md:justify-between lg:border-t lg:border-cool-gray-200">
        <div class="flex-1 min-w-0">
          <div class="flex items-center">
            <div>
              <div class="flex items-center">
                <h1 class="ml-3 text-2xl font-bold leading-7 text-cool-gray-900 sm:leading-9 sm:truncate">
                  Edit Group
                </h1>
              </div>
            </div>
          </div>
        </div>
        <div class="mt-6 flex space-x-3 md:mt-0 md:ml-4">
          <span class="shadow-sm rounded-md">
          </span>
          <span class="shadow-sm rounded-md">
          </span>
        </div>
      </div>
    </div>
  </div>

  <div class="mt-8">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
      <form action="/groups/{{$group->id}}" method="POST">
        @method('PUT')
        @csrf
        <div>
          <label for="name" class="block text-md font-medium leading-5 text-gray-700">Name</label>
          <div class="my-5 relative rounded-md shadow-sm">
            <input id="name" name="name" class="form-input block w-full sm:text-sm sm:leading-5"
              value="{{ $group->name }}">
          </div>
          <label for="subtitle" class="block text-md font-medium leading-5 text-gray-700">Subtitle</label>
          <div class="my-5 relative rounded-md shadow-sm">
            <input id="subtitle" name="subtitle" class="form-input block w-full sm:text-sm sm:leading-5"
              value="{{ $group->subtitle }}">
          </div>
          <label for="icon_location" class="block text-md font-medium leading-5 text-gray-700">Icon
            Location</label>
          <div class="my-5 relative rounded-md shadow-sm">
            <input id="icon_location" name="icon_location" class="form-input block w-full sm:text-sm sm:leading-5"
              value="{{ $group->icon_location }}">
          </div>
          <label for="banner_location" class="block text-md font-medium leading-5 text-gray-700">Banner
            Location</label>
          <div class="my-5 relative rounded-md shadow-sm">
            <input id="banner_location" name="banner_location" class="form-input block w-full sm:text-sm sm:leading-5"
              value="{{ $group->banner_location }}">
          </div>
          <label for="per_day" class="block text-md font-medium leading-5 text-gray-700">Per Day</label>
          <div class="my-5 relative rounded-md shadow-sm">
            <input id="per_day" name="per_day" class="form-input block w-full sm:text-sm sm:leading-5"
              value="{{ $group->per_day }}">
          </div>


          <span class="inline-flex rounded-md shadow-sm">
            <button type="submit"
              class="inline-flex items-center px-5 py-3 border border-transparent text-lg leading-4 font-medium rounded text-white bg-teal-600 hover:bg-teal-500 focus:outline-none focus:border-teal-700 focus:shadow-outline-teal active:bg-teal-700 transition ease-in-out duration-150">
              Submit
            </button>
          </span>
        </div>
      </form>
      <div class="mt-6">
        <label class="block text-md font-medium leading-5 text-gray-700">Serving sizes</label>
        <table class="table-fixed">
          <thead>
            <tr class="border-b-2 border-gray-300 text-left leading-4 text-pine-500">
              <th class="px-6 py-3">Metric
              </th>
              <th class="px-6 py-3">Imperial
              </th>
              <th class="px-6 py-3 text-center">Edit
              </th>
              <th class="px-6 py-3 text-center">Delete
              </th>
            </tr>
          </thead>
          <tbody>
            @foreach($group->servingSizes as $servingSize)
            <tr class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 text-black-500">
              <td class="px-6 py-3">
                {{ $servingSize->size_metric }}
              </td>
              <td class="px-6 py-3">
                {{ $servingSize->size_imperial }}
              </td>
              <td class="cursor-pointer text-blue-600 text-center">
                <a href="/groups/{{$group->id}}/serving-sizes/{{$servingSize->id}}/edit">
                  <img src="/assets/icon-pencil.svg" class="w-6 h-6 mx-auto" />
                </a>

              </td>
              <td class="cursor-pointer text-red-600 text-center">
                <form id="delete-form-{{$servingSize->id}}"
                  action="/groups/{{$group->id}}/serving-sizes/{{$servingSize->id}}" method="POST">
                  @method("DELETE")
                  @csrf
                  <button type="submit">
                    <x-icons.trash />

                  </button>
                </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
        <a href="/groups/{{$group->id}}/serving-sizes/create" class="block py-2 text-blue-500 cursor-pointer">Add a new
          serving size...</a>
      </div>
    </div>
  </div>
</x-master>