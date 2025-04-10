<x-filament-panels::page>
    <x-filament::card>
        <h2 class="text-xl font-semibold text-gray-800">Liste des Mémos</h2>

        @if($memos->isEmpty())
            <p class="text-gray-500">Aucun memo enregistré.</p>
        @else
            @foreach($memos as $memo)
                <div class="my-4 p-4 border border-gray-200 rounded-lg">
                    <h3 class="text-lg font-semibold">{{ $memo->titre }}</h3>
                    <p class="text-gray-600">{{ $memo->explication_titre }}</p>

                    <div class="mt-4">
                        <h4 class="text-md font-medium">Étapes :</h4>
                        <ul class="list-disc pl-6">
                            @foreach($memo->etapes as $etape)
                                <li class="mt-2">
                                    <strong>{{ $etape->nom_etape }}:</strong> {{ $etape->texte_etape }}

                                    <div class="mt-2">
                                        <h5 class="text-sm font-medium">Commandes :</h5>
                                        <ul class="list-inside">
                                            @foreach($etape->commandes as $commande)
                                                <li class="ml-4">{{ $commande->commande }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endforeach
        @endif

    </x-filament::card>
</x-filament-panels::page>
