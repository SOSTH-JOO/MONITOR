<x-filament-panels::page>
    <div> {{-- ✅ Un seul élément racine --}}
        <div class="space-y-6 p-6 bg-white shadow-md rounded-xl">

            <h1 class="text-2xl font-bold text-gray-800">UVC Recharge Management</h1>

            <section>
                <h2 class="text-xl font-semibold text-gray-700">📌 HotCardFlag Value Meaning</h2>
                <ul class="list-disc list-inside text-gray-700 mt-2 space-y-1">
                    <li><strong>0</strong> – Active but not used</li>
                    <li><strong>1</strong> – Used</li>
                    <li><strong>2</strong> – Not used in MTN</li>
                    <li><strong>3</strong> – Loaded or generated</li>
                    <li><strong>4</strong> – Locked</li>
                    <li><strong>5</strong> – Issued</li>
                    <li><strong>6</strong> – Permanent lock</li>
                </ul>
            </section>

            <section>
                <h2 class="text-xl font-semibold text-gray-700">📂 VMP Logs & Paths (10.100.1.76)</h2>
                <ul class="list-disc list-inside text-gray-700 space-y-1">
                    <li><code>/tellin/smp/uvcsmp/sms_run/log/debug</code></li>
                    <li><code>/tellin/smp/uvcsmp/sms_run/serplus/uin/uvc/smpser/log</code></li>
                </ul>
            </section>

            <section>
                <h2 class="text-xl font-semibold text-gray-700">🛠️ Database Access</h2>
                <ul class="list-disc list-inside text-gray-700 space-y-1">
                    <li>VMP (10.100.1.76): <code>dbaccess uvcsmpdb -</code></li>
                    <li>VCP (10.100.1.71): <code>dbaccess uvcscpdb -</code></li>
                </ul>
            </section>

            <section>
                <h2 class="text-xl font-semibold text-gray-700">📥 SQL Commands</h2>
                <div class="bg-gray-100 p-4 rounded text-sm font-mono space-y-2 text-gray-800">
                    <div>
                        unload to <strong>UVC_09072012.unl</strong><br>
                        <code>
                            select sequence,facevalue,hotcardflag from u_uvc_supplyment<br>
                            where sequence between '730582397393800' and '730582397394799';
                        </code>
                    </div>
                    <div>
                        <code>
                            select hotcardflag,count(*) from u_uvc_supplyment<br>
                            where sequence between '730582397393800' and '730582397394799'<br>
                            group by hotcardflag;
                        </code>
                    </div>
                    <div>
                        <code>
                            update u_uvc_supplyment set hotcardflag=4<br>
                            where sequence between '670882486491317' and '670882486491399'<br>
                            and hotcardflag='0';
                        </code>
                    </div>
                    <div>
                        <code>select * from u_uvc_batchinfo where batch='73058';</code><br>
                        <code>select * from u_uvc_distribute where batch='73058';</code><br>
                        <code>select * from u_uvc_distribute where stop_sequence &gt;='730582397406999'<br>
                        and start_sequence &lt;='730582397410000';</code>
                    </div>
                </div>
            </section>

            <section>
                <h2 class="text-xl font-semibold text-gray-700">📊 Batch Information</h2>
                <div class="bg-gray-50 p-4 rounded text-sm text-gray-700 font-mono">
                    batch: <strong>73058</strong><br>
                    startserialno: 0000000000<br>
                    stopserialno: 9999999999<br>
                    start_sequence: 730582397300000<br>
                    stop_sequence: 730582397499999<br>
                    status: 3<br>
                    <br>
                    cardbrandid: 0<br>
                    cardareano:<br>
                    issueprovinceno:<br>
                    issueareano:<br>
                    issuedate: 20121231<br>
                    quantity: 199999<br>
                    dl_id: Migrate<br>
                    shippedstatus: 1<br>
                    shippeddate: 20121231<br>
                    payrate:<br>
                    paymny: 0
                </div>
            </section>

            <section>
                <h2 class="text-xl font-semibold text-red-700">🚨 PLAGE VOLÉE</h2>
                <div class="bg-red-50 p-4 rounded text-sm text-red-800 font-mono">
                    select hotcardflag,count(*) from u_uvc_supplyment<br>
                    where sequence between '026720000274000' and '026720000274999'<br>
                    group by hotcardflag;<br><br>

                    select hotcardflag,count(*) from u_uvc_supplyment<br>
                    where sequence between '023420000917250' and '023420000917374'<br>
                    group by hotcardflag;<br><br>

                    select hotcardflag,count(*) from u_uvc_supplyment<br>
                    where sequence between '023420000917875' and '023420000917999'<br>
                    group by hotcardflag;
                </div>
            </section>

            <section>
                <h2 class="text-xl font-semibold text-gray-700">📈 Résultat</h2>
                <div class="bg-gray-100 p-3 rounded text-sm font-mono">
                    hotcardflag (count(*))<br>
                    4 → 914<br>
                    1 → 86<br>
                    <br>
                    2 row(s) retrieved.
                </div>
            </section>

            <section>
                <h2 class="text-xl font-semibold text-gray-700">✏️ Modifications</h2>
                <div class="bg-gray-100 p-3 rounded text-sm font-mono">
                    select sequence, hotcardflag from u_uvc_supplyment<br>
                    where sequence between '023420000917250' and '023420000917374';<br><br>

                    update u_uvc_supplyment set hotcardflag = '0'<br>
                    where sequence between '730582397370000' and '730582397370999';
                </div>
            </section>

            
        </div>
    </div>
</x-filament-panels::page>
