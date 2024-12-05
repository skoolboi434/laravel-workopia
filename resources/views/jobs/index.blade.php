<x-layout>
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