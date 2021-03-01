 <div class="divide-y divide-gray-200">
     <div class="py-8 text-base leading-6 space-y-4 text-gray-700 sm:text-lg sm:leading-7">

         {{ $slot }}

         <footer class="pt-4 flex items-center space-x-4">
             <a href="{{ url($routeForCancel) }}"
                 class="flex justify-center items-center w-full text-gray-900 px-4 py-3 rounded-md focus:outline-none">
                 <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                     xmlns="http://www.w3.org/2000/svg">
                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                     </path>
                 </svg> Cancelar
             </a>
             <button type="submit"
                 class="bg-blue-500 flex justify-center items-center w-full text-white px-4 py-3 rounded-md focus:outline-none">Guardar</button>
         </footer>

     </div>
