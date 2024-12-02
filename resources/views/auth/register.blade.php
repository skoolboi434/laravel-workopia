<x-layout>
  <div
    class="bg-white rounded-lg shadow-md w-full md:max-w-xl mx-auto mt-12 p-8 py-12">
    <h2 class="text-4xl text-center font-bold mb-4">Register</h2>
    <form action="{{route('register.store')}}" method="POST">
      @csrf
      <x-inputs.text id="name" name="name" placeholder="Full Name" />
      <x-inputs.text id="email" name="email" type="email"
        placeholder="Email Address" />
      <x-inputs.text id="password" name="password" type="password"
        placeholder="Enter Password" />
      <x-inputs.text id="password_confirmation" type="password"
        name="password_confirmation" placeholder="Confirm Password" />

      <button type="submit"
        class="w-full bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded focus:outline-none">Register</button>

      <p class="mt-4 text-gray-500">Already have an account? <a
          href="{{route('login')}}" class="text-blue-900">Login</a></p>
    </form>
  </div>
</x-layout>