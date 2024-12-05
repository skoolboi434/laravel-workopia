<x-layout>
  <div
    class="bg-blue-900 h-24 px-4 mb-4 flex justify-center items-center rounded">
    <x-search />
  </div>

  {{-- Back Button --}}
  @if (request()->has('keywords') || request()->has('location'))
  <a href="{{route('jobs.index')}}"
    class="bg-gray-700 text-white px-4 py-2 rounded mb-4 inline-block">
    <i class="fa fa-arrow-left mr-1"></i> Back
  </a>
  @endif
  <x-slot name="title">Workopia - All Jobs</x-slot>
  <h2 class="text-center text-3xl mb-4 font-bold border border-gray-300 p-3">
    All Jobs</h2>
  <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
    @forelse($jobs as $job)
    <div>
      <x-job-card :job="$job" />

    </div>
    @empty
    <p>No jobs available</p>
    @endforelse
  </div>
  {{-- Pagination links --}}
  {{$jobs->links()}}
</x-layout>