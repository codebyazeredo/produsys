<div class="mb-4">
    <label class="block text-gray-700 font-bold mb-2">Nome</label>
    <input type="text" name="name" value="{{ old('name', $category->name ?? '') }}" class="w-full px-4 py-2 border rounded">
    @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
</div>

<div class="mb-4">
    <label class="block text-gray-700 font-bold mb-2">Descrição</label>
    <textarea name="description" class="w-full px-4 py-2 border rounded">{{ old('description', $category->description ?? '') }}</textarea>
    @error('description') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
</div>
