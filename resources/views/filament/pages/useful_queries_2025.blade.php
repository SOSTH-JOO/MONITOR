<x-filament-panels::page>
    <div class="max-w-5xl mx-auto p-6 space-y-8 bg-white rounded-xl shadow-md">

        <div>
            <h1 class="text-3xl font-bold text-gray-800 mb-4">📊 Requêtes SQL pour l'Analyse ERS</h1>
            <p class="text-gray-600">Voici les différentes requêtes pour l'analyse des données ERS (E-Reseller Service) et des informations liées à FTTH, abonnements, et détails d'appels.</p>
        </div>

        {{-- Balance ERS --}}
        <div class="space-y-4">
            <h2 class="text-xl font-semibold text-gray-700">1. Balance ERS</h2>
            <div class="bg-gray-100 p-4 rounded-md font-mono text-sm text-gray-800 overflow-x-auto">
<pre>
SELECT calculatedtime, resellertype, count(*) AS nbre, sum(resellerbal) AS resellerbal
FROM (
    SELECT resellerid, resellermsisdn, accountid, resellerbalance,
           try_cast(replace(replace(resellerbalance, '.', ''), ',', '.') AS double) AS resellerbal,
           calculatedtime, resellertype, date_key, tbl_dt
    FROM hive.feeds.e_ers_balance_dump
    WHERE calculatedtime = (
        SELECT DISTINCT calculatedtime
        FROM hive.feeds.e_ers_balance_dump
        WHERE calculatedtime <> 'calculatedTime'
        AND tbl_dt = CAST("date_format"((current_date + INTERVAL '-2' DAY), '%Y%m%d') AS int)
        ORDER BY calculatedtime DESC
        LIMIT 1
    )
    ORDER BY calculatedtime DESC
)
GROUP BY calculatedtime, resellertype
ORDER BY resellerbal DESC;
</pre>
            </div>
        </div>

        {{-- ERS Hourly TX Count --}}
        <div class="space-y-4">
            <h2 class="text-xl font-semibold text-gray-700">2. ERS Hourly TX Count</h2>
            <div class="bg-gray-100 p-4 rounded-md font-mono text-sm text-gray-800 overflow-x-auto">
<pre>
SELECT dates, heure, resultcode, count(*) AS nb, sum(requestamountvalue) AS amount
FROM (
    SELECT substr(ENDTIME, 1, 10) AS dates,
           substr(ENDTIME, 12, 2) AS heure,
           CASE WHEN resultcode = '0' THEN 'SUCCESS' ELSE 'FAILURE' END AS resultcode,
           cast(replace(replace(requestamountvalue, '.', ''), ',', '.') AS DOUBLE) AS requestamountvalue
    FROM hive.feeds.e_ers_transaction_cdr
    WHERE CAST("date_format"(cast(substring(ENDTIME, 1, 10) AS date), '%Y%m%d') AS int)
          BETWEEN CAST("date_format"((current_date + INTERVAL '-57' DAY), '%Y%m%d') AS int)
          AND CAST("date_format"((current_date + INTERVAL '-57' DAY), '%Y%m%d') AS int)
          AND TRANSACTIONTYPE = 'TOPUP'
) A
GROUP BY dates, heure, resultcode
ORDER BY dates, heure, resultcode;
</pre>
            </div>
        </div>

        {{-- Souscription avec le nom du bundle et le nom puis l'ID du profil --}}
        <div class="space-y-4">
            <h2 class="text-xl font-semibold text-gray-700">3. Souscription avec le Nom du Bundle et le Profil</h2>
            <div class="bg-gray-100 p-4 rounded-md font-mono text-sm text-gray-800 overflow-x-auto">
<pre>
SELECT product_name AS bundle_name, subcosid AS code_profil, profil, a.*
FROM hive.mtncibi.tb_cs16_bundle_subscript_d_v2 a
LEFT JOIN mtncibi.dim_cs16_bundle_package b ON offer_id = usage_offer_id
LEFT JOIN (
    SELECT DISTINCT msisdn, subcosid, product_name AS profil
    FROM mtncibi.tb_dw_cs16_subs_info_v2
    LEFT JOIN mtncibi.dim_cs16_bundle_package ON usage_offer_id = CAST(subcosid AS varchar)
    WHERE data_day BETWEEN 20250120 AND 20250127
) c ON debited_msisdn = c.msisdn
WHERE data_day BETWEEN 20250120 AND 20250127
AND recipient_msisdn = '0506002107'
ORDER BY a.timestamp;
</pre>
            </div>
        </div>

        {{-- Détails des appels --}}
        <div class="space-y-4">
            <h2 class="text-xl font-semibold text-gray-700">4. Détails des Appels</h2>
            <div class="bg-gray-100 p-4 rounded-md font-mono text-sm text-gray-800 overflow-x-auto">
<pre>
SELECT *
FROM hive.mtncibi.fact_billed_cdr_cs16
WHERE charged_msisdn = '2250506002107'
AND dw_date_key = 20250129
ORDER BY CHARGESTOPTIME;
</pre>
            </div>
        </div>

        {{-- Revenu Bundle par SDP --}}
        <div class="space-y-4">
            <h2 class="text-xl font-semibold text-gray-700">5. Revenu Bundle par SDP</h2>
            <div class="bg-gray-100 p-4 rounded-md font-mono text-sm text-gray-800 overflow-x-auto">
<pre>
SELECT heure, deal_date, SDP, SUM(COALESCE(b.total_amt, 0)) AS total_amt
FROM (
    SELECT DISTINCT ('225' || subscriberid) AS msisdn,
           substr(split_part(split_part(split_part(file_name, '/', 8), '_', 2), '.', 1), 1, 10) AS SDP
    FROM hive.feeds.e_cs16_subs_dump
    WHERE tbl_dt BETWEEN 20241215 AND 20241229
) A
LEFT JOIN (
    SELECT msisdn, SUM(total_amt) AS total_amt
    FROM hive.feeds.e_cs16_subs_dump
    GROUP BY msisdn
) B ON A.msisdn = B.msisdn
GROUP BY heure, deal_date, SDP
ORDER BY heure;
</pre>
            </div>
        </div>

        {{-- Bundle par Numéro et Heure --}}
        <div class="space-y-4">
            <h2 class="text-xl font-semibold text-gray-700">6. Bundle par Numéro et Heure</h2>
            <div class="bg-gray-100 p-4 rounded-md font-mono text-sm text-gray-800 overflow-x-auto">
<pre>
SELECT data_day AS deal_date, heure,
       ROUND(SUM(COALESCE(souscp_amount, 0) + COALESCE(loan_da, 0))) AS total_amt
FROM hive.mtncibi.tb_cs16_bundle_subscript_d_v2
WHERE data_day IN (20241215, 20241222, 20241229)
GROUP BY data_day, heure
ORDER BY heure;
</pre>
            </div>
        </div>

        {{-- Node Migration List Extraction --}}
        <div class="space-y-4">
            <h2 class="text-xl font-semibold text-gray-700">7. Node Migration List Extraction</h2>
            <div class="bg-gray-100 p-4 rounded-md font-mono text-sm text-gray-800 overflow-x-auto">
<pre>
SELECT c.*, subcosid, product_name
FROM (
    SELECT msisdn, SDP, totalflux,
           dense_rank() OVER (ORDER BY totalflux DESC) AS rang
    FROM (
        SELECT a.msisdn, SDP, COALESCE(totalflux, 0) AS totalflux
        FROM (
            SELECT DISTINCT subscriberid AS msisdn,
                   substr(split_part(split_part(split_part(file_name, '/', 8), '_', 2), '.', 1), 1, 10) AS SDP
            FROM hive.feeds.e_cs16_subs_dump
            WHERE tbl_dt = 20250119 AND
                  (split_part(split_part(file_name, '/', 10), '_', 2) LIKE '%svrsdpbi03%')
        ) a
        LEFT JOIN (
            SELECT msisdn, SUM(totalflux) / 1024 / 1024 / 1024 AS totalflux
            FROM hive.mtncibi.tb_cs16_data_users_v2
            WHERE data_day BETWEEN 20250124 AND 20250126
            GROUP BY msisdn
        ) b ON a.msisdn = b.msisdn
    ) c
    JOIN (
        SELECT msisdn, subcosid, product_name
        FROM hive.mtncibi.tb_dw_cs16_subs_info_v2
        LEFT JOIN hive.mtncibi.dim_cs16_bundle_package
        ON TRY_CAST(subcosid AS varchar) = usage_offer_id
        WHERE data_day = 20250125 AND subcosid IN (101, 102, 103, 104)
    ) d ON d.msisdn = c.msisdn
WHERE rang <= 3000000
ORDER BY totalflux DESC;
</pre>
            </div>
        </div>

        {{-- Liste des Abonnés par SDP --}}
        <div class="space-y-4">
            <h2 class="text-xl font-semibold text-gray-700">8. Liste des Abonnés par SDP</h2>
            <div class="bg-gray-100 p-4 rounded-md font-mono text-sm text-gray-800 overflow-x-auto">
<pre>
SELECT DISTINCT ('225' || subscriberid) AS msisdn
FROM hive.feeds.e_cs16_subs_dump
WHERE tbl_dt = 20250204 AND base_file_name LIKE '%svrsdpya02%';
</pre>
            </div>
        </div>

    </div>
</x-filament-panels::page>
