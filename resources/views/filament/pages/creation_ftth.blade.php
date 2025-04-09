<x-filament-panels::page>

        <div>
            <h1 class="text-3xl font-bold text-gray-800 mb-2">📡 Création FTTH</h1>
            <p class="text-gray-600">Procédure pas à pas pour la création FTTH sur le serveur <code class="bg-gray-100 px-2 py-1 rounded">svrairbi01 (10.102.129.17)</code> avec le profil <strong>amsrw</strong>.</p>
        </div>

        {{-- Étapes initiales --}}
        <div class="space-y-2">
            <h2 class="text-xl font-semibold text-gray-700">🔧 Étapes initiales</h2>
            <div class="bg-gray-100 p-4 rounded-md font-mono text-sm text-gray-800">
<pre>
cd /ftth                     # Aller dans le dossier ftth
vi list_ftth_$date_.txt     # Créer un fichier avec la nomenclature
(i pour insérer, puis coller les numéros)
Échap + :wq!                # Enregistrer et quitter
</pre>
            </div>
        </div>

        {{-- Requêtes à exécuter --}}
        <div class="space-y-4">
            <h2 class="text-xl font-semibold text-gray-700">📥 Exécution des requêtes</h2>

            {{-- Étape 1 --}}
            <div>
                <h3 class="text-lg font-semibold text-gray-600">1. Extraction des numéros non existants</h3>
                <div class="bg-gray-100 p-4 rounded-md font-mono text-sm text-gray-800 overflow-x-auto">
<pre>
for i in $(cat list_ftth_$date_.txt); do
    sudo /opt/af/bin/AFLookup -nai $i |
    awk '/Performing lookup on nai/ { ligne_sup = $0 }
         /NXDOMAIN/ { print ligne_sup }' |
    awk -F' ' '{print $5}'
done > list_ftth_$date.txt

rm list_ftth_$date_.txt
</pre>
                </div>
            </div>

            {{-- Étape 2 --}}
            <div>
                <h3 class="text-lg font-semibold text-gray-600">2. Ajout sur AF</h3>
                <div class="bg-gray-100 p-4 rounded-md font-mono text-sm text-gray-800 overflow-x-auto">
<pre>
for i in $(cat list_ftth_$date.txt); do
    sudo ../ftth.sh $i
done
</pre>
                </div>
            </div>

            {{-- Étape 3 --}}
            <div>
                <h3 class="text-lg font-semibold text-gray-600">3. Vérification des numéros créés</h3>
                <div class="bg-gray-100 p-4 rounded-md font-mono text-sm text-gray-800 overflow-x-auto">
<pre>
for i in $(cat list_ftth_$date.txt); do
    sudo /opt/af/bin/AFLookup -nai $i | grep "nai"
done
</pre>
                </div>
            </div>
        </div>

        {{-- Ajout d’un numéro unique --}}
        <div class="space-y-2">
            <h2 class="text-xl font-semibold text-gray-700">➕ Ajout d’un seul numéro</h2>
            <div class="bg-gray-100 p-4 rounded-md font-mono text-sm text-gray-800">
<pre>
sudo ./ftth.sh 2536084797@mtn.ci
</pre>
            </div>
        </div>
</x-filament-panels::page>
