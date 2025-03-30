{{--<div class="bg-white shadow-md rounded-lg p-4 max-w-full">--}}
{{--    <h3 class="text-gray-700 text-lg font-semibold mb-4">Últimas Movimentações</h3>--}}
{{--    <div class="overflow-x-auto">--}}
{{--        <div class="max-h-[500px] overflow-y-auto">--}}
{{--            <table class="w-full border-collapse">--}}
{{--                <thead>--}}
{{--                <tr class="bg-gray-200 text-gray-700">--}}
{{--                    <th class="px-4 py-2 text-left">Produto</th>--}}
{{--                    <th class="px-4 py-2 text-left">Tipo</th>--}}
{{--                    <th class="px-4 py-2 text-right">Quantidade</th>--}}
{{--                    <th class="px-4 py-2 text-right">Data</th>--}}
{{--                </tr>--}}
{{--                </thead>--}}
{{--                <tbody>--}}
{{--                @foreach($movimentacoes->take(30) as $movimentacao)--}}
{{--                    <tr class="border-t">--}}
{{--                        <td class="px-4 py-2">{{ $movimentacao->product->name }}</td>--}}
{{--                        <td class="px-4 py-2">--}}
{{--                            @if($movimentacao->movement_type === 'in')--}}
{{--                                <span class="text-green-600 font-semibold">Entrada</span>--}}
{{--                            @else--}}
{{--                                <span class="text-red-600 font-semibold">Saída</span>--}}
{{--                            @endif--}}
{{--                        </td>--}}
{{--                        <td class="px-4 py-2 text-right">{{ $movimentacao->quantity }}</td>--}}
{{--                        <td class="px-4 py-2 text-right">{{ $movimentacao->movement_date->format('d/m/Y H:i') }}</td>--}}
{{--                    </tr>--}}
{{--                @endforeach--}}
{{--                </tbody>--}}
{{--            </table>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
<div class="bg-white shadow-md rounded-lg p-4 max-w-full">
    <h3 class="text-gray-700 text-lg font-semibold mb-4">Últimas Movimentações</h3>
    <div class="overflow-x-auto">
        <div class="max-h-[500px] overflow-y-auto">
            <table class="w-full border-collapse">
                <thead>
                <tr class="bg-gray-200 text-gray-700">
                    <th class="px-4 py-2 text-left">Produto</th>
                    <th class="px-4 py-2 text-left">Tipo</th>
                    <th class="px-4 py-2 text-right">Quantidade</th>
                    <th class="px-4 py-2 text-right">Data</th>
                </tr>
                </thead>
                <tbody>
                    <tr class="border-t">
                        <td class="px-4 py-2"></td>
                        <td class="px-4 py-2">
                            @if(true)
                                <span class="text-green-600 font-semibold">Entrada</span>
                            @else
                                <span class="text-red-600 font-semibold">Saída</span>
                            @endif
                        </td>
                        <td class="px-4 py-2 text-right"></td>
                        <td class="px-4 py-2 text-right"></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
