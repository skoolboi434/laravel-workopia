<x-layout>
  <main class="container mx-auto p-4 mt-4">
    <section class="flex flex-col md:flex-row gap-6">
      <!-- Profile Info -->
      <div class="bg-white p-8 rounded-lg shadow-md w-full md:w-1/2">
        <h3 class="text-3xl text-center font-bold mb-4">
          Profile Info
        </h3>
        @if ($user->avatar)
        <img class="w-32 h-32 object-cover rounded-full"
          src="{{asset('storage/' . $user->avatar)}}" alt="{{$user->name}}">

        @else
        <img class="w-32 h-32 object-cover rounded-full"
          src="{{asset('storage/avatars/default-avatar.png')}}"
          alt="{{$user->name}}">
        @endif
        <form method="POST" action="{{route('profile.update')}}"
          enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <x-inputs.text label="Name" id="name" type="text" name="name"
            value="{{$user->name}}" />
          <x-inputs.text label="Email" id="email" type="email" name="email"
            value="{{$user->email}}" />
          <x-inputs.file id="avatar" name="avatar" label="Upload Avatar" />

          <button type="submit"
            class="w-full bg-green-500 hover:bg-green-600 text-white px-4 py-2 my-3 rounded focus:outline-none">
            Save
          </button>
        </form>
      </div>

      <!-- My Job Listings -->
      <div class="bg-white p-8 rounded-lg shadow-md w-full">
        <h3 class="text-3xl text-center font-bold mb-4">
          My Job Listings
        </h3>
        @forelse($jobs as $job)
        <!-- Listing -->
        <div
          class="flex justify-between items-center border-b-2 border-gray-200 py-2">
          <div>
            <h3 class="text-xl font-semibold">{{$job->title}}</h3>
            <p class="text-gray-700">{{$job->job_type}}</p>
          </div>
          <div class="flex gap-3">
            <a href="{{route('jobs.edit', $job->id)}}"
              class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded text-sm">Edit</a>
            <form method="POST"
              action="{{route('jobs.destroy', $job->id)}}?from=dashboard"
              onsubmit="return confirm('Are you sure that you want to delete this job listing?')">
              @csrf
              @method('DELETE')
              <button type="submit"
                class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded text-sm">
                Delete
              </button>
            </form>
          </div>
        </div>
        @empty
        <p>No jobs available</p>
        @endforelse

      </div>
    </section>
    <x-bottom-banner />
  </main>
</x-layout>