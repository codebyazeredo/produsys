<div class="form-group mb-4">
    <label for="name" class="block text-sm font-medium text-gray-700">Nome</label>
    <input type="text" id="name" name="name" value="{{ old('name', $supplier->name ?? '') }}" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md text-gray-800" required>
    @error('name')
    <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
    @enderror
</div>

<div class="form-group mb-4 flex space-x-4">
    <div class="w-1/2">
        <label for="cnpj" class="block text-sm font-medium text-gray-700">CNPJ</label>
        <input type="text" id="cnpj" name="cnpj" value="{{ old('cnpj', $supplier->cnpj ?? '') }}" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md text-gray-800" required>
        @error('cnpj')
        <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
        @enderror
    </div>

    <div class="w-1/2">
        <label for="phone" class="block text-sm font-medium text-gray-700">Telefone</label>
        <input type="text" id="phone" name="phone" value="{{ old('phone', $supplier->phone ?? '') }}" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md text-gray-800" required>
        @error('phone')
        <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="form-group mb-4">
    <label for="address" class="block text-sm font-medium text-gray-700">Endereço</label>
    <input type="text" id="address" name="address" value="{{ old('address', $supplier->address ?? '') }}" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md text-gray-800" required>
    @error('address')
    <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
    @enderror
</div>
