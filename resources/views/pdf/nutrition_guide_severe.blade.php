<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Plan Nutritionnel Personnalisé - Obésité Sévère</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
            color: #333;
            line-height: 1.5;
        }

        h1 {
            color: #2c3e50;
            border-bottom: 2px solid #3498db;
            padding-bottom: 10px;
            margin-top: 30px;
            text-transform: uppercase;
        }

        h2 {
            color: #2980b9;
            margin-top: 20px;
            border-bottom: 1px solid #ddd;
            padding-bottom: 5px;
        }

        h3 {
            color: #16a085;
            margin-top: 15px;
        }

        .section {
            margin-bottom: 25px;
        }

        .info-grid {
            display: table;
            width: 100%;
            margin-bottom: 15px;
        }

        .info-row {
            display: table-row;
        }

        .info-cell {
            display: table-cell;
            padding: 5px;
            width: 50%;
        }

        .label {
            font-weight: bold;
            color: #555;
        }

        .highlight {
            background-color: #ecf0f1;
            padding: 10px;
            border-radius: 5px;
            border-left: 4px solid #3498db;
        }

        .warning {
            color: #c0392b;
            font-weight: bold;
        }

        .qa-item {
            margin-bottom: 15px;
            border-bottom: 1px dashed #eee;
            padding-bottom: 10px;
        }

        .qa-question {
            font-weight: bold;
            color: #2c3e50;
            margin-bottom: 5px;
        }

        .qa-response {
            margin-left: 15px;
            color: #333;
        }

        .qa-recommendation {
            margin-left: 15px;
            color: #d35400;
            font-style: italic;
        }

        .regulatory-box {
            border: 2px solid #e74c3c;
            padding: 15px;
            margin: 20px 0;
            background-color: #fff5f5;
            page-break-inside: avoid;
        }

        .regulatory-title {
            color: #c0392b;
            font-weight: bold;
            text-transform: uppercase;
            margin-bottom: 10px;
        }

        .page-break {
            page-break-after: always;
        }
    </style>
</head>

<body>

    <div style="text-align: center; margin-bottom: 30px;">
        <h1 style="border: none;">Structure Du Plan Nutritionnel Personnalisé – Obésité sévère</h1>
        <p style="font-size: 14px; color: #7f8c8d;">Généré par votre Assistant Nutritionnel</p>
    </div>

    <!-- 1. Profil du patient -->
    <div class="section">
        <h1>Profil du patient</h1>
        <div class="info-grid">
            <div class="info-row">
                <div class="info-cell"><span class="label">Nom :</span> {{ $user->nom }}</div>
                <div class="info-cell"><span class="label">Prénom :</span> {{ $user->prenom }}</div>
            </div>
            <div class="info-row">
                <div class="info-cell"><span class="label">Sexe :</span> {{ $user->sexe }}</div>
                <div class="info-cell"><span class="label">Âge :</span> {{ $user->age }} ans</div>
            </div>
            <div class="info-row">
                <div class="info-cell"><span class="label">Poids actuel :</span> {{ $user->poids }} kg</div>
                <div class="info-cell"><span class="label">Taille actuel :</span> {{ $user->taille }} m</div>
            </div>
            <div class="info-row">
                <div class="info-cell"><span class="label">Tour de taille :</span> {{ $user->tour_de_taille }} cm</div>
                <div class="info-cell"><span class="label">Tour de hanche :</span> {{ $user->tour_de_hanche }} cm</div>
            </div>
            <div class="info-row">
                <div class="info-cell"><span class="label">Tour de cou :</span> {{ $user->tour_du_cou ?? 'N/A' }} cm
                </div>
                <div class="info-cell"><span class="label">Niveau d’activité :</span>
                    {{ $user->niveau_d_activite_physique }} (@php
                        $factors = [
                            'Sédentaire' => 1.2,
                            'Légèrement actif' => 1.375,
                            'Modérément actif' => 1.55,
                            'Très actif' => 1.725,
                            'Extrêmement actif' => 1.9
                        ];
                        echo $factors[$user->niveau_d_activite_physique] ?? 1.2;
                    @endphp)</div>
            </div>
        </div>
    </div>

    <!-- 2. Collecte des données complètes -->
    <div class="section">
        <h1>Collecte des données complètes sur le patient</h1>
        <div class="highlight">
            <ul>
                <li><span class="label">Indice de masse corporelle (IMC) :</span> {{ $metrics['imc'] }} kg/m²
                    ({{ $metrics['interpretation_imc'] }})</li>
                <li><span class="label">Rapport tour de taille/ tour de hanche (RTH) :</span> {{ $metrics['rth'] }} cm
                </li>
                <li><span class="label">Indice de Masse Grasse (IMG) :</span> {{ $metrics['img'] }} %</li>
            </ul>
        </div>
    </div>

    <!-- 3. Évaluation personnalisée (Questions & Réponses) -->
    <div class="section">
        <h1>Votre évaluation personnalisé en fonction de vos réponses aux questions</h1>
        @foreach($qa as $item)
            <div style="margin-bottom: 15px; border-bottom: 1px dashed #eee; padding-bottom: 10px;">
                <div style="font-weight: bold; color: #2c3e50; margin-bottom: 5px;">{{ $item['question'] }}</div>
                <div style="margin-left: 15px;">
                    <span style="color: #7f8c8d;">Votre réponse :</span> <strong>{{ $item['reponse'] }}</strong>
                </div>
                <div
                    style="margin-left: 15px; margin-top: 6px; padding: 8px 12px; background-color: #f0f7ff; border-left: 3px solid #3498db; border-radius: 3px; font-size: 11px; color: #2c3e50;">
                    <span style="font-weight: bold; color: #2980b9;">Recommandation </span> <br>
                    {!! !empty($item['recommandation']) && strtolower(trim($item['recommandation'])) !== 'aucun' ? nl2br(e($item['recommandation'])) : 'Aucun' !!}
                </div>
            </div>
        @endforeach
    </div>

    <!-- 4. Notifications réglementaires -->
    <div class="section">
        <div class="regulatory-box">
            <div class="regulatory-title">Notifications réglementaires :</div>
            <ul>
                <li>
                    Le plan nutritionnel proposé est un plan nutritionnel à titre éducatif et informatif et ne remplace
                    en aucun cas l'avis d'un médecin, d'un diététicien ou d'un professionnel de santé qualifié. Toute
                    personne souffrant d'obésité sévère doit être suivie par une équipe médicale pluridisciplinaire.
                </li>
                <br>

                <li>
                    Certaines recommandations du système suites à vos réponses aux questions peuvent inclure des
                    propositions de repas journaliers. Ces repas ont un rôle éducatif, informatif et illustratif :
                    l’utilisateur n’est pas tenu de les suivre
                </li>
            </ul>
        </div>
    </div>

</body>

</html>