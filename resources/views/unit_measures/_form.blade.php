<div class="form-group mb-4 flex space-x-4">
    <div class="w-3/4">
        <label for="name" class="block text-sm font-medium text-gray-700">Nome</label>
        <input type="text" id="name" name="name" value="{{ old('name', $unitMeasure->name ?? '') }}" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md" required>
        @error('name')
        <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
        @enderror
    </div>

    <div class="w-1/4">
        <label for="abbreviation" class="block text-sm font-medium text-gray-700">Sigla</label>
        <input type="text" id="abbreviation" name="abbreviation" value="{{ old('abbreviation', $unitMeasure->abbreviation ?? '') }}" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md" required>
        @error('abbreviation')
        <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
        @enderror
    </div>
</div>
