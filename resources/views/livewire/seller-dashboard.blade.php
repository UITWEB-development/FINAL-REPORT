<div class="px-5 mb-6">
    <div class="mb-6" >
      <div class="border-b-2 border-black">
         <h2 class="mb-2 text-3xl font-semibold">Dashboard</h2>
         <h3 class="mb-8 text-sm font-medium text-slate-500">
            Welcome {{auth()->user()->name}}, everything looks great!
         </h3>
      </div>
    <div class="grid grid-cols-1 ">
      <div class="container mx-auto lg:px-4 py-8 md:px-36 sm:px-24 px-20">
          <div class="grid gap-8 lg:grid-cols-5 grid-cols-1  ">
                  <div class="flex items-center justify-center p-4 bg-[#ffefd5] shadow-md shadow-slate-400">
                      <div class=" text-center">
                          <p class=" font-bold  text-[2.3cqmin] md:text-[3cqmin] sm:text-[2.5cqmin] lg:text-[2.5cqmin]">
                              Total Menus
                          </p>
                          <p class=" text-[5cqmin] md:text-[5cqmin] sm:text-[5cqmin] lg:text-[6cqmin] font-semibold">
                              10
                          </p>
                      </div>
                  </div>
                  <div class="flex items-center justify-center p-4 bg-[#ffefd5] shadow-md shadow-slate-400">
                      <div class="text-center">
                          <p class=" font-bold  text-[2.3cqmin] md:text-[3cqmin] sm:text-[2.5cqmin] lg:text-[2.5cqmin]">
                              Total Orders
                          </p>
                          <p class=" text-[5cqmin] md:text-[5cqmin] sm:text-[5cqmin] lg:text-[6cqmin] font-semibold">
                              10
                          </p>
                      </div>
                  </div>
                  <div class="flex items-center justify-center p-4 bg-[#ffefd5] shadow-md shadow-slate-400">
                      <div class=" text-center">
                          <p class=" font-bold  text-[2.3cqmin] md:text-[3cqmin] sm:text-[2.5cqmin] lg:text-[2.5cqmin]">
                              Total Customers
                          </p>
                          <p class=" text-[5cqmin] md:text-[5cqmin] sm:text-[5cqmin] lg:text-[6cqmin] font-semibold">
                              10
                          </p>
                      </div>
                  </div>
                  <div class="flex items-center justify-center p-4 bg-[#ffefd5] shadow-md shadow-slate-400">
                      <div class="text-center">
                          <p class=" font-bold  text-[2.3cqmin] md:text-[3cqmin] sm:text-[2.5cqmin] lg:text-[2.5cqmin]">
                              Total Revenue
                          </p>
                          <p class=" text-[5cqmin] md:text-[5cqmin] sm:text-[5cqmin] lg:text-[6cqmin] font-semibold">
                              10
                          </p>
                      </div>
                  </div>
                  <div class="flex items-center justify-center p-4 bg-[#ffefd5] shadow-md shadow-slate-400">
                      <div class="text-center">
                          <p class=" font-bold  text-[2.3cqmin] md:text-[3cqmin] sm:text-[2.5cqmin] lg:text-[2.5cqmin]">
                              Unpaid Amount
                          <p class=" text-[5cqmin] md:text-[5cqmin] sm:text-[5cqmin] lg:text-[6cqmin] font-semibold">
                              10
                          </p>
                      </div>
                  </div>
          </div>
      </div>
      <div class="flex flex-col gap-6 col-span-3 items-center justify-center ">
      <div class="w-full h-[30vh] border-2 border-[#CD853F]">
          revenue
      </div>
      <div class="w-full h-[30vh] border-2 border-[#CD853F]">
          Order
      </div>
      </div>
    </div>
    </div>
      <div class="flex lg:flex-row flex-col gap-6 lg:gap-2"> 
        <div class="bg-[#FFEFD5] border-2 lg:w-[50vw] border-[#CD853F] flex items-center justify-center p-5 md:pt-0  lg:min-h-[60vh] md:min-h-[70vh] min-h-screen">
          <div class="container mx-auto px-4 ">
              <h1 class="font-bold text-5xl text-center">Top best customers</h1>
              <div class="flex flex-col md:flex-row md:flex-wrap justify-center items-center">
                  <!-- Avatar, tên và số của Vu Minh Sang -->
                  <div class="pt-10 md:pt-16 w-full md:w-4/12 px-4 text-center">
                      <div class="relative flex flex-col items-center transition-transform transform hover:scale-110 cursor-pointer mb-10 md:mb-0">
                          <img src="https://images.pexels.com/photos/56866/garden-rose-red-pink-56866.jpeg" alt="Avatar Vu Minh Sang" class="w-24 h-24 rounded-full shadow-custom-heavy mb-6">
                          <h6 class="text-xl font-semibold">Vu Minh Sang</h6>
                          <p class="mt-2 mb-4 text-blueGray-500">10.000.000</p>
                      </div>
                  </div>
                  <!-- Avatar, tên và số của Nguyen Duong Tung -->
                  <div class="pt-10 w-full md:w-4/12 px-4 text-center">
                      <div class="relative flex flex-col items-center transition-transform transform hover:scale-110 cursor-pointer mb-10 md:mb-0">
                          <img src="https://images.pexels.com/photos/56866/garden-rose-red-pink-56866.jpeg" alt="Avatar Nguyen Duong Tung" class="w-32 h-32 rounded-full shadow-custom-heavy mb-4">
                          <h6 class="text-xl font-semibold">Nguyen Duong Tung</h6>
                          <p class="mt-2 mb-4 text-blueGray-500">20.000.000</p>
                      </div>
                  </div>
                  <!-- Avatar, tên và số của Vu Phuoc Thinh -->
                  <div class="pt-10 md:pt-16 w-full md:w-4/12 px-4 text-center">
                      <div class="relative flex flex-col items-center transition-transform transform hover:scale-110 cursor-pointer mb-10 md:mb-0">
                          <img src="https://images.pexels.com/photos/56866/garden-rose-red-pink-56866.jpeg" alt="Avatar Vu Phuoc Thinh" class="w-20 h-20 rounded-full shadow-custom-heavy mb-6">
                          <h6 class="text-xl font-semibold">Vu Phuoc Thinh</h6>
                          <p class="mt-2 mb-4 text-blueGray-500">5.000.000</p>
                      </div>
                  </div>
              </div>
          </div>
        </div>
    
        <div class="bg-[#FFEFD5] border-2 lg:w-[50vw] border-[#CD853F] flex items-center justify-center p-5 md:pt-0  lg:min-h-[60vh] md:min-h-[70vh] min-h-screen">
          <div class="container mx-auto px-4 ">
              <h1 class="font-bold text-5xl text-center">Top best customers</h1>
              <div class="flex flex-col md:flex-row md:flex-wrap justify-center items-center">
                  <!-- Avatar, tên và số của Vu Minh Sang -->
                  <div class="pt-10 md:pt-16 w-full md:w-4/12 px-4 text-center">
                      <div class="relative flex flex-col items-center transition-transform transform hover:scale-110 cursor-pointer mb-10 md:mb-0">
                          <img src="https://images.pexels.com/photos/56866/garden-rose-red-pink-56866.jpeg" alt="Avatar Vu Minh Sang" class="w-24 h-24 rounded-full shadow-custom-heavy mb-6">
                          <h6 class="text-xl font-semibold">Vu Minh Sang</h6>
                          <p class="mt-2 mb-4 text-blueGray-500">10.000.000</p>
                      </div>
                  </div>
                  <!-- Avatar, tên và số của Nguyen Duong Tung -->
                  <div class="pt-10 w-full md:w-4/12 px-4 text-center">
                      <div class="relative flex flex-col items-center transition-transform transform hover:scale-110 cursor-pointer mb-10 md:mb-0">
                          <img src="https://images.pexels.com/photos/56866/garden-rose-red-pink-56866.jpeg" alt="Avatar Nguyen Duong Tung" class="w-32 h-32 rounded-full shadow-custom-heavy mb-4">
                          <h6 class="text-xl font-semibold">Nguyen Duong Tung</h6>
                          <p class="mt-2 mb-4 text-blueGray-500">20.000.000</p>
                      </div>
                  </div>
                  <!-- Avatar, tên và số của Vu Phuoc Thinh -->
                  <div class="pt-10 md:pt-16 w-full md:w-4/12 px-4 text-center">
                      <div class="relative flex flex-col items-center transition-transform transform hover:scale-110 cursor-pointer mb-10 md:mb-0">
                          <img src="https://images.pexels.com/photos/56866/garden-rose-red-pink-56866.jpeg" alt="Avatar Vu Phuoc Thinh" class="w-20 h-20 rounded-full shadow-custom-heavy mb-6">
                          <h6 class="text-xl font-semibold">Vu Phuoc Thinh</h6>
                          <p class="mt-2 mb-4 text-blueGray-500">5.000.000</p>
                      </div>
                  </div>
              </div>
          </div>
        </div>
      
      </div>
    </div>

