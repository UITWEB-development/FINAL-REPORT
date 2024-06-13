<div>
  <h2 class="mb-2 text-3xl font-semibold">Customers</h2>
  <h3 class="text-sm font-medium text-slate-500">
      Welcome {{ auth()->user()->name }}, everything looks great!
  </h3>

  <div class="flex justify-between my-5 items-center">
      <div class="pt-1 w-fit relative text-gray-600">
          <input wire:model.live='search' @input.prevent.debounce.300ms="$wire.update()" class="border-2 border-gray-300 bg-white h-10 px-5 pr-16 rounded-lg text-sm" placeholder="Search customer name">
          <button type="submit" class="absolute right-0 top-0 mt-4 mr-4">
              <svg class="text-gray-600 h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg"
                  xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px"
                  viewBox="0 0 56.966 56.966" style="enable-background:new 0 0 56.966 56.966;" xml:space="preserve"
                  width="512px" height="512px">
                  <path
                      d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z" />
              </svg>
          </button>
      </div>
      <div class="flex justify-center items-center">{{ $customers->links(data: ['scrollTo' => false]) }}
      </div>
  </div>

  <div >
      <table class="min-w-full table-auto">
          <thead>
              <tr class="bg-[#cd853f] text-white uppercase  leading-normal ">
                  <th class="py-3 px-6 text-center">Customer</th>
                  <th class="py-3 px-6 text-center">Date joined</th>
                  <th class="py-3 px-6 text-center">Total completed order</th>
                  <th class="py-3 px-6 text-center">Action</th>
              </tr>
          </thead>
          <tbody class="text-gray-600 text-sm font-light">
              @foreach ($customers as $customer)
                  <tr
                      class="border-b border-gray-200 hover:bg-[#f1d2b3] {{ $loop->index % 2 == 0 ? 'bg-[#ffefd5]' : 'bg-[#e4c085]' }}">

                      {{-- Customer Name --}}
                      <td class="py-3 px-4 text-left whitespace-nowrap">
                          <div class="flex items-center justify-center">
                              <span
                                  class="font-bold">{{ $customer->name }}</span>
                          </div>
                      </td>
                      {{-- Date joined --}}
                      <td class="py-3 px-6 text-left whitespace-nowrap">
                          <div class="flex items-center justify-center">
                              <span
                                  class="font-bold">{{ \Carbon\Carbon::parse($customer->created_at)->format('d/m/Y') }}</span>
                          </div>
                      </td>

                      {{-- Total order --}}
                      <td class="py-3 px-6 text-left">
                          <div class="flex items-center justify-center">
                              <span class="font-bold">{{ $customer->orders->where('status', 'Completed')->count() }}</span>
                          </div>
                      </td>

                      {{-- Action --}}
                      <td x-data="{ isOpen: false, openedWithKeyboard: false }" @keydown.esc.prevent="isOpen = false, openedWithKeyboard = false"
                          class="relative flex items-center justify-center py-3">
                          <!-- Toggle Button -->
                          <button type="button" aria-label="context menu" @click="isOpen = ! isOpen"
                              @keydown.space.prevent="openedWithKeyboard = true"
                              @keydown.enter.prevent="openedWithKeyboard = true"
                              @keydown.down.prevent="openedWithKeyboard = true"
                              class="inline-flex cursor-pointer items-center bg-transparent transition hover:opacity-75 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-slate-800 active:opacity-100 dark:focus-visible:outline-slate-300"
                              :class="isOpen || openedWithKeyboard ? 'text-black dark:text-white' :
                                  'text-slate-700 dark:text-slate-300'"
                              :aria-expanded="isOpen || openedWithKeyboard" aria-haspopup="true">
                              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true"
                                  fill="currentColor" class="w-8 h-8">
                                  <path fill-rule="evenodd"
                                      d="M4.5 12a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0zm6 0a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0zm6 0a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0z"
                                      clip-rule="evenodd" />
                              </svg>
                          </button>
                          <!-- Dropdown Menu -->
                          <div x-cloak x-show="isOpen || openedWithKeyboard" x-transition x-trap="openedWithKeyboard"
                              @click.outside="isOpen = false, openedWithKeyboard = false"
                              @keydown.down.prevent="$focus.wrap().next()"
                              @keydown.up.prevent="$focus.wrap().previous()"
                              class="absolute z-10 top-8 flex w-3/4 flex-col divide-y divide-slate-300 overflow-hidden rounded-xl border border-slate-300 bg-slate-100 dark:divide-slate-700 dark:border-slate-700 dark:bg-slate-800"
                              role="menu">
                              <!-- Dropdown Section -->
                              <ul class="flex flex-col py-1.5" role="none">
                                  @foreach ($actions as $key => $value)
                                      <li @click="isOpen = false; {{ '$wire.' . $value . "('$customer->id')" }} "
                                          class="flex font-bold cursor-pointer items-center gap-2 bg-slate-100 px-4 py-2 text-sm text-slate-700 hover:bg-slate-800/5 hover:text-black focus-visible:bg-slate-800/10 focus-visible:text-black focus-visible:outline-none dark:bg-slate-800 dark:text-slate-300 dark:hover:bg-slate-100/5 dark:hover:text-white dark:focus-visible:bg-slate-100/10 dark:focus-visible:text-white"
                                          role="menuitem" tabindex="0">
                                          {{ $key }}
                                      </li>
                                  @endforeach

                              </ul>

                          </div>
                      </td>


                  </tr>
              @endforeach

          </tbody>
      </table>

  </div>
</div>
