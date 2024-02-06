<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Kelas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <form method="post" action="{{ route('petugas.update', $petugas->id) }}" class="mt-6 space-y-6">
                        @csrf
                        @method('patch')
                        <input type="hidden" name="id" value="{{ $petugas->id }}">

                        <div>
                            <x-input-label for="nama" :value="__('Nama')"/>
                            <x-text-input id="nama" name="nama" type="text" class="mt-1 block w-full"
                                          :value="old('nama', $petugas->nama)" autofocus/>
                            <x-input-error class="mt-2" :messages="$errors->get('nama')"/>
                        </div>

                        <div>
                            <x-input-label for="username" :value="__('Username')"/>
                            <x-text-input id="username" name="username" type="text" class="mt-1 block w-full"
                                          :value="old('username', $petugas->username)"/>
                            <x-input-error class="mt-2" :messages="$errors->get('username')"/>
                        </div>

                        <p
                            class="text-sm text-gray-600 mb-4"
                        >{{ __('Anda tidak dapat mengganti password dari akun petugas.') }}</p>

                        <div class="flex items-center gap-4">
                            <x-primary-button>{{ __('Simpan') }}</x-primary-button>

                            @if (in_array(session('status'), ['success', 'failed']))
                                <p
                                    x-data="{ show: true }"
                                    x-show="show"
                                    x-transition
                                    x-init="setTimeout(() => show = false, 2000)"
                                    class="text-sm text-gray-600 mb-4"
                                >{{ session('message') }}</p>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
