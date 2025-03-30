<div class="bg-white shadow-md rounded-lg p-4 max-w-full">
    <h3 class="text-gray-700 text-lg font-semibold mb-4">Últimas Movimentações</h3>
    <div class="overflow-x-auto">
        <div class="max-h-[500px] overflow-y-auto">
            <table class="w-full border border-gray-300 rounded-lg">
                <thead>
                <tr class="bg-gray-800 text-white">
                    <th class="border border-gray-300 px-4 py-2 text-left">Produto</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Tipo</th>
                    <th class="border border-gray-300 px-4 py-2 text-right">Quantidade</th>
                    <th class="border border-gray-300 px-4 py-2 text-right">Data</th>
                    <th class="border border-gray-300 px-4 py-2 text-right">Responsável</th>
                </tr>
                </thead>
                <tbody>
                @foreach($latestMovements as $move)
                    <tr class="border border-gray-300 text-gray-800 hover:bg-gray-800 hover:text-white">
                        <td class="border border-gray-300 px-4 py-2">{{ $move->product->name }}</td>
                        <td class="border border-gray-300 px-4 py-2">
                            @if($move->movement_type === 'add')
                                <span class="text-green-600 font-semibold">Entrada</span>
                            @else
                                <span class="text-red-600 font-semibold">Saída</span>
                            @endif
                        </td>
                        <td class="border border-gray-300 px-4 py-2 text-right">{{ $move->quantity }}</td>
                        <td class="border border-gray-300 px-4 py-2 text-right">{{ \Carbon\Carbon::parse($move->movement_date)->format('d/m/Y H:i') }}</td>
                        <td class="border border-gray-300 px-4 py-2 text-right">{{ $move->user->name }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
