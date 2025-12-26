@extends('layouts.admin')

@section('title', 'Edit Rule')

@section('content')
    <div class="max-w-4xl mx-auto bg-white shadow-lg rounded-lg overflow-hidden">
        <div class="p-6 border-b">
            <h2 class="text-xl font-bold text-gray-800">Edit Rule</h2>
        </div>
        <div class="p-6">
            <form action="{{ route('admin.rule.update', $rule->id) }}" method="POST">
                @csrf
                @method('PUT')

                @if($errors->has('msg'))
                    <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative">
                        {{ $errors->first('msg') }}
                    </div>
                @endif

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Penyakit</label>
                    <select name="penyakit_id"
                        class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        required>
                        @foreach($penyakits as $p)
                            <option value="{{ $p->id }}" {{ $rule->penyakit_id == $p->id ? 'selected' : '' }}>{{ $p->kode }} -
                                {{ $p->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Gejala</label>
                    <select name="gejala_id"
                        class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        required>
                        @foreach($gejalas as $g)
                            <option value="{{ $g->id }}" {{ $rule->gejala_id == $g->id ? 'selected' : '' }}>{{ $g->kode }} -
                                {{ $g->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">CF Pakar (0.0 - 1.0)</label>
                    <input type="number" step="0.01" min="0" max="1" name="cf_pakar"
                        value="{{ old('cf_pakar', $rule->cf_pakar) }}"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        required>
                </div>
                <div class="flex items-center justify-end">
                    <a href="{{ route('admin.rule.index') }}"
                        class="bg-gray-500 text-white font-bold py-2 px-4 rounded mr-2 hover:bg-gray-600">Batal</a>
                    <button type="submit"
                        class="bg-indigo-600 text-white font-bold py-2 px-4 rounded hover:bg-indigo-700 focus:outline-none focus:shadow-outline">
                        Update
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection