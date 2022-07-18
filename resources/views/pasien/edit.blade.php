<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Update') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class=" mx-auto sm:px-6 lg:px-10">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-5">
            <div class="flex justify-end">
            <a href="{{ route('pasien.show', $pasien->id) }}" class="mr-5 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Back
                </a>
            </div>  
                <form action="{{ route('pasien.update', $pasien->id) }}" method="POST">
                    @csrf
                    @method('put')
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                            Nama
                        </label>
                        <input class="appearance-none block w-full bg-gray-200 
                        text-gray-700 border border-gray-500 rounded py-3 px-4 mb-3 
                        leading-tight focus:outline-none focus:bg-white" 
                        name="nama" type="text" value="{{ $pasien->nama }}" >
                         </div>
                        <div class="w-full md:w-1/2 px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                            NIK
                        </label>
                        <input class="appearance-none block w-full bg-gray-200 
                        text-gray-700 border border-gray-200 rounded py-3 px-4 
                        leading-tight focus:outline-none focus:bg-white 
                        focus:border-gray-500" type="text" name="nik" value="{{ $pasien->nik }}">
                        </div>
                    </div>

                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                            Alamat
                        </label>
                        <input class="appearance-none block w-full bg-gray-200 
                        text-gray-700 border border-gray-500 rounded py-3 px-4 mb-3 
                        leading-tight focus:outline-none focus:bg-white" 
                        type="text" name="alamat" value="{{ $pasien->alamat }}">
                        </div>
                        <div class="w-full md:w-1/2 px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                            Jenis Kelamin
                        </label>
                        <input class="appearance-none block w-full bg-gray-200 text-gray-700 
                        border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none 
                        focus:bg-white focus:border-gray-500" type="text" name="jenis_kelamin" value="{{ $pasien->jenis_kelamin }}">
                        </div>
                    </div>

                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                            Riwayat Keluarga
                        </label>
                        <input class="appearance-none block w-full bg-gray-200 text-gray-700 
                        border border-gray-500 rounded py-3 px-4 mb-3 leading-tight 
                        focus:outline-none focus:bg-white" type="text" name="riwayat_penyakit" value="{{ $pasien->riwayat_penyakit }}">
                        </div>
                        <div class="w-full md:w-1/2 px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                            Faskes
                        </label>
                        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border 
                        border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white 
                        focus:border-gray-500" type="text" name="faskes" value="{{ $pasien->faskes }}">
                        </div>
                    </div>

                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                            Berat Badan
                        </label>
                        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border 
                        border-gray-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none 
                        focus:bg-white" type="text" name="berat_badan" value="{{ $pasien->berat_badan }}" >
                        </div>
                        <div class="w-full md:w-1/2 px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                            Tinggi Badan
                        </label>
                        <input class="appearance-none block w-full bg-gray-200 text-gray-700 
                        border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none 
                        focus:bg-white focus:border-gray-500" type="text" name="tinggi_badan" value="{{ $pasien->tinggi_badan }}">
                        </div>
                    </div>

                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                            Tekanan Darah
                        </label>
                        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border 
                        border-gray-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none 
                        focus:bg-white" type="text" name="tekanan_darah" value="{{ $pasien->tekanan_darah }}">
                        </div>
                        <div class="w-full md:w-1/2 px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                            Guladarah Sewaktu
                        </label>
                        <input class="appearance-none block w-full bg-gray-200 text-gray-700 
                        border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none 
                        focus:bg-white focus:border-gray-500" id="grid-last-name" name="gds" value="{{ $pasien->gds }}" >
                        </div>
                    </div>
            
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                        Kolestrol
                        </label>
                        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border 
                        border-gray-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none 
                        focus:bg-white" type="text" name="kolestrol" value="{{ $pasien->kolestrol }}">
                        </div>
                    </div>

                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" type="submit" >
                            Save
                        </button>

                </form>

                
            </div>
        </div>
    </div>
</x-app-layout>
  