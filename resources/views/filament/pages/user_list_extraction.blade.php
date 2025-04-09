<x-filament-panels::page>

        <h1 class="text-2xl font-bold text-gray-800">User List Extraction Method</h1>

        <p class="text-gray-700">
            This guide explains how to extract the list of users for both GUI (SDP and AIR) and CLI on all Linux OS nodes.
        </p>

        <div class="border-l-4 border-yellow-500 pl-4 bg-yellow-50 text-yellow-800 rounded-md">
            <strong>Note:</strong> The script is currently only available on the <strong>test SDP node (10.102.199.8)</strong>.
        </div>

        <div class="mt-6">
            <h2 class="text-xl font-semibold text-gray-800">🖥️ GUI User List for SDP and AIR</h2>
            <ol class="list-decimal list-inside text-gray-700 mt-2 space-y-1">
                <li>Login to the node</li>
                <li>Navigate to <code class="bg-gray-100 px-1 py-0.5 rounded text-sm">/home/Esupport</code></li>
                <li>Run <code class="bg-gray-100 px-1 py-0.5 rounded text-sm">sh GUI_USER.sh</code></li>
                <li>The output will be generated in <code class="bg-gray-100 px-1 py-0.5 rounded text-sm">gui_user_list.csv</code> in the same path</li>
                <li>Output file header:
                    <span class="block font-mono bg-gray-100 p-2 rounded mt-1 text-sm">
                        User Name, Group, Service Account, Status, Hostname, Last Login Date
                    </span>
                </li>
            </ol>
        </div>

        <div class="mt-8">
            <h2 class="text-xl font-semibold text-gray-800">🧑‍💻 CLI User List for All Linux Nodes</h2>
            <ol class="list-decimal list-inside text-gray-700 mt-2 space-y-1">
                <li>Login to the node</li>
                <li>Navigate to <code class="bg-gray-100 px-1 py-0.5 rounded text-sm">/home/Esupport</code></li>
                <li>Run <code class="bg-gray-100 px-1 py-0.5 rounded text-sm">sh CLI_User.sh</code></li>
                <li>The output will be generated in <code class="bg-gray-100 px-1 py-0.5 rounded text-sm">cli_user_info.csv</code> in the same path</li>
                <li>Output file header:
                    <span class="block font-mono bg-gray-100 p-2 rounded mt-1 text-sm">
                        Hostname, Account Type, Account Name, User Profile, Status, Last Login
                    </span>
                </li>
            </ol>
        </div>

    
</x-filament-panels::page>
