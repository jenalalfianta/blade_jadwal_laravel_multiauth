<p>
    <a href="{{ route('admin.ruang.create') }}" class="focus:outline-none text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-7 py-3 mr-1 mb-1 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Tambah Data</a>
</p>

<form class="float-right mt-[-34px]" method="GET">
    <div class="relative">
        <label class="inline-block">Filter</label>
        <input value="{{$filter}}" type="text" 
        class="inline-block bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" 
        name="filter" 
        placeholder="Cari ruang.. (Enter)">
    </div>
</form>

<table class="my-8 w-full text-sm text-left text-gray-500 dark:text-gray-400">
    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
            <th scope="col" class="px-6 py-3">
                @sortablelink ('kode_ruang', 'Kode Ruang')
            </th>
            <th scope="col" class="px-6 py-3">
                @sortablelink ('nama_ruang', 'Nama Ruang')
            </th>
            <th scope="col" class="px-6 py-3">
                @sortablelink ('lantai_ruang', 'Lantai')
            </th>
            <th scope="col" class="px-6 py-3">
                Action
            </th>
        </tr>
    </thead>
    <tbody>
        @if ($ruangs->count() == 0)
        <tr>
            <td class="px-6 py-4" colspan="4">Tidak ada data ruang untuk ditampilkan.</td>
        </tr>
        @endif

        @foreach ($ruangs as $ruang)
        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
            <td class="px-6 py-4">{{ $ruang->kode_ruang }}</td>
            <td class="px-6 py-4">{{ $ruang->nama_ruang }}</td>
            <td class="px-6 py-4">{{ $ruang->lantai_ruang }}</td>
            <td class="px-6 py-4">
                <a href="{{ route('admin.ruang.edit', $ruang->id) }}" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-3 py-2 mr-1 mb-1 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Edit</a>
                <form style="display:inline-block" action="{{ route('admin.ruang.update', $ruang->id) }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button onclick="return confirm('Hapus ruang ini ?')" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-3 py-2 mr-1 mb-1 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{!! $ruangs->appends(Request::except('page'))->render() !!}