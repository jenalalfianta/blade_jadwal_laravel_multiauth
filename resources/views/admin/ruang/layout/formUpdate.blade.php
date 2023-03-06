<nav class="px-5 flex" aria-label="Breadcrumb">
    <ol class="inline-flex items-center space-x-1 md:space-x-3">
      <li>
        <div class="flex items-center">
          <svg aria-hidden="true" class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>
          <a href="{{route('admin.ruang.index')}}" class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2 dark:text-gray-400 dark:hover:text-white">Ruang</a>
        </div>
      </li>
      <li aria-current="page">
        <div class="flex items-center">
          <svg aria-hidden="true" class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
          <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2 dark:text-gray-400">Edit Data Ruang</span>
        </div>
      </li>
    </ol>
</nav>

<div class="px-5 py-5 w-2/4">
    <form id="jadwalEditForm" method="post" class="space-y-6" action="{{route('admin.ruang.update', $ruang->id)}}">
    @csrf
    @method('put')
        <div>
            <label for="kode_ruang" class="flex-grow block font-medium text-sm text-gray-700">Kode Ruang</label>
            <input disabled name="kode_ruang" value="{{ $ruang->kode_ruang }}" id="kode_ruang" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukan kode ruang..">
        </div>

        <div>
            <label for="nama_ruang" class="flex-grow block font-medium text-sm text-gray-700">Nama Ruang</label>
            <input name="nama_ruang" value="{{old('nama_ruang') != null ? old('nama_ruang') : $ruang->nama_ruang }}" id="nama_ruang" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukan nama ruang..">
            <x-input-error :messages="$errors->create->get('nama_ruang')" />
        </div>

        <div>
            <label for="lantai_ruang" class="flex-grow block font-medium text-sm text-gray-700">Lantai Ruang</label>
            <select name="lantai_ruang" id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option disabled selected>Pilih Lantai</option>
            @for ($i=1; $i<6; $i++)
              <option {{old('lantai_ruang') == $i ? "selected" : ""}} {{$ruang->lantai == $i ? "selected" : ""}} value="{{ $ruang  }}">{{ $i }}</option>
            @endfor
            </select>
            <x-input-error :messages="$errors->create->get('lantai_ruang')" class="mt-2" />
        </div>
   
        <button id="submitData" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Simpan Data</button>
        {{-- <button type="" id="saveDate" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Simpan Data</button> --}}
    </form>
</div>