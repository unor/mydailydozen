<x-master>
  <!-- Page header -->
  <div class="bg-white shadow">
    <div class="px-4 sm:px-6 lg:max-w-6xl lg:mx-auto lg:px-8">
      <div class="py-6 md:flex md:items-center md:justify-between lg:border-t lg:border-cool-gray-200">
        <div class="flex-1 min-w-0">
          <!-- Profile -->
          <div class="flex items-center">
            <img src="{{ $user->profile_photo_url }}" alt="{{ $user->name }}"
              class="hidden h-15 w-15 rounded-full sm:block">
            <div>
              <div class="flex items-center">
                <img class="h-15 w-15 rounded-full sm:hidden" src="{{ $user->profile_photo_url }}"
                  alt="{{ $user->name }}">
                <h1 class="ml-3 text-2xl font-bold leading-7 text-cool-gray-900 sm:leading-9 sm:truncate">
                  Customize Groups
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
      <h2 class="text-lg leading-6 font-medium text-cool-gray-900">Customize Groups</h2>
      <button @click="axios.put('/settings/all').then(() => { location.reload() })">Select All</button>
      <button @click="axios.put('/settings/none').then(() => { location.reload() })">Unselect All</button>
      @if($groups->count() > 0)
      <div class="mt-2 grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-3">
        @foreach($groups as $group)
        <livewire:card-toggle :group="$group" />
        @endforeach
      </div>
      @else
      <p>No groups here</p>
      @endif

    </div>
  </div>
</x-master>