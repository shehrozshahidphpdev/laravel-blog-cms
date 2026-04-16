<x-layouts.admin-layout title="Admin home page">
  <div class="">
    <div class="flex gap-4  flex-wrap p-8 pt-20">
      <div class="relative p-6 rounded-2xl bg-white shadow dark:bg-gray-800 w-[30%]">
        <div class="space-y-2">
          <div
            class="flex items-center space-x-2 rtl:space-x-reverse text-sm font-medium text-gray-500 dark:text-gray-400">
            <span>Role</span>
          </div>

          <div class="text-3xl dark:text-gray-100">
            {{ Auth::user()->role }}
          </div>


        </div>
      </div>
      <div class="relative p-6 rounded-2xl bg-white shadow dark:bg-gray-800 w-[30%]">
        <div class="space-y-2">
          <div
            class="flex items-center space-x-2 rtl:space-x-reverse text-sm font-medium text-gray-500 dark:text-gray-400">
            <span>Total Posts</span>
          </div>

          <div class="text-3xl dark:text-gray-100">
            {{ count($posts) }}
          </div>


        </div>
      </div>

      <div class="relative p-6 rounded-2xl bg-white shadow dark:bg-gray-800 w-[30%]">
        <div class="space-y-2">
          <div
            class="flex items-center space-x-2 rtl:space-x-reverse text-sm font-medium text-gray-500 dark:text-gray-400">
            <span>Total Comments</span>
          </div>

          <div class="text-3xl dark:text-gray-100">
            {{ count($comments) }}
          </div>
        </div>
      </div>

    </div>
  </div>
</x-layouts.admin-layout>