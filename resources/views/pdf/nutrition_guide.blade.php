<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Guide Nutritionnel Personnalisé</title>
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

        .value {
            color: #000;
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

        .note {
            color: #7f8c8d;
            font-style: italic;
            font-size: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
            color: #333;
        }

        .page-break {
            page-break-after: always;
        }

        .menu-day {
            margin-bottom: 20px;
            border: 1px solid #eee;
            padding: 10px;
            border-radius: 5px;
        }

        .menu-day h4 {
            margin: 0 0 10px 0;
            background: #f9f9f9;
            padding: 5px;
        }

        .meal {
            margin-bottom: 10px;
        }

        .meal-title {
            font-weight: bold;
            color: #d35400;
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
    </style>
</head>

<body>

    <div style="text-align: center; margin-bottom: 30px;">
        <h1 style="border: none;">PLAN NUTRITIONNEL PERSONNALISÉ – Obésité Modérée</h1>
        <p style="font-size: 14px; color: #7f8c8d;">Généré par votre Assistant Nutritionnel</p>
    </div>

    <!-- 1. Profil du patient -->
    <div class="section">
        <h1>Profil du Patient</h1>
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
                <div class="info-cell"><span class="label">Taille :</span> {{ $user->taille }} m</div>
            </div>
            <div class="info-row">
                <div class="info-cell"><span class="label">Tour de taille :</span> {{ $user->tour_de_taille }} cm</div>
                <div class="info-cell"><span class="label">Tour de hanches :</span> {{ $user->tour_de_hanche }} cm</div>
            </div>
            <div class="info-row">
                <div class="info-cell"><span class="label">Tour de cou :</span> {{ $user->tour_du_cou ?? 'N/A' }} cm
                </div>
                <div class="info-cell"><span class="label">Niveau d'activité :</span>
                    {{ $user->niveau_d_activite_physique }}</div>
            </div>
        </div>
    </div>

    <!-- 2. Données de Santé -->
    <div class="section">
        <h1>Collecte des données complètes sur le patient</h1>
        <ul>
            <li><strong>Indice de Masse Corporelle (IMC) :</strong> {{ $metrics['imc'] }} kg/m²
                ({{ $metrics['interpretation_imc'] }})</li>
            <li><strong>Rapport Taille/Hanche (RTH) :</strong> {{ $metrics['rth'] }} cm</li>
            <li><strong>Métabolisme de Base (BMR) :</strong> {{ $metrics['bmr'] }} kcal/jour</li>
            <li><strong>Dépense Énergétique Totale (TDEE) :</strong> {{ $metrics['tdee'] }} kcal/jour</li>
            <li><strong>Indice de Masse Grasse (IMG) :</strong> {{ $metrics['img'] }} %</li>
        </ul>
    </div>

    <!-- 3. Objectifs et Recommandations -->
    <div class="section">
        <h1>Recommandation calorique pour le patient</h1>
        <div class="highlight">
            <p><strong>Objectif :</strong> {{ $goals['objectif'] }}</p>
            <p><strong>Perte souhaitée :</strong> {{ $goals['perte_poids'] }}</p>
            @if(stripos($goals['objectif'], 'Perte') !== false || stripos($goals['objectif'], 'Perdre') !== false)
                <p><strong>Niveau d'engagement :</strong> {{ $goals['niveau_changement'] }}</p>
            @endif
            <hr style="border: 0; border-top: 1px solid #ccc; margin: 10px 0;">
            <p style="font-size: 14px;"><strong>Apport Calorique Recommandé : {{ $recommendations['calories'] }}
                    kcal/jour</strong></p>
        </div>

        <h2>Répartition des macronutriments adapté au patient</h2>
        <p>Pour atteindre vos objectifs, voici comment répartir vos apports quotidiens :</p>
        <table>
            <thead>
                <tr>
                    <th>Macronutriment</th>
                    <th>Pourcentage</th>
                    <th>Quantité (Grammes)</th>
                    <th>Énergie (kcal)</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><strong>Protéines</strong></td>
                    <td>{{ $recommendations['macros_p_percent'] }} %</td>
                    <td>{{ $recommendations['macros_p_grams'] }} g</td>
                    <td>{{ $recommendations['macros_p_grams'] * 4 }} kcal</td>
                </tr>
                <tr>
                    <td><strong>Glucides</strong></td>
                    <td>{{ $recommendations['macros_g_percent'] }} %</td>
                    <td>{{ $recommendations['macros_g_grams'] }} g</td>
                    <td>{{ $recommendations['macros_g_grams'] * 4 }} kcal</td>
                </tr>
                <tr>
                    <td><strong>Lipides</strong></td>
                    <td>{{ $recommendations['macros_l_percent'] }} %</td>
                    <td>{{ $recommendations['macros_l_grams'] }} g</td>
                    <td>{{ $recommendations['macros_l_grams'] * 9 }} kcal</td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="page-break"></div>

    <!-- 4. Plan d'Intervention Détaillé -->
    @if(isset($plan_intervention) && is_array($plan_intervention) && count($plan_intervention) > 0)
        <div class="section">
            <h1>Votre évaluation personnalisée en fonction de vos réponses aux questions</h1>

            @foreach($plan_intervention as $block)
                @if(isset($block['titre']) && isset($block['contenu']))
                    <div style="margin-bottom: 20px;">
                        <h3>{{ $block['titre'] }}</h3>
                        <div style="background-color: #fcfcfc; border: 1px solid #eee; padding: 10px; border-radius: 5px;">
                            {!! nl2br(e($block['contenu'])) !!}
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    @endif

    <!-- 5. Vos Réponses et Notre Analyse (Q&A) -->
    <div class="section">
        <h1>Votre évaluation personnalisée en fonction de vos réponses aux questions</h1>

        @foreach($qa as $item)
            <div style="margin-bottom: 15px; border-bottom: 1px dashed #eee; padding-bottom: 10px;">
                <div style="font-weight: bold; color: #2c3e50; margin-bottom: 5px;">{{ $item['question'] }}</div>
                <div style="margin-left: 15px;">
                    <span style="color: #7f8c8d;">Votre réponse :</span> <strong>{{ $item['reponse'] }}</strong>
                </div>
                <div
                    style="margin-left: 15px; margin-top: 6px; padding: 8px 12px; background-color: #f0f7ff; border-left: 3px solid #3498db; border-radius: 3px; font-size: 11px; color: #2c3e50;">
                    <span style="font-weight: bold; color: #2980b9;">Recommandation </span><br>
                    {!! !empty($item['recommandation']) && strtolower(trim($item['recommandation'])) !== 'Aucun' ? nl2br(e($item['recommandation'])) : 'Aucun' !!}
                </div>
            </div>
        @endforeach
    </div>

    @if($show_diabetes_fitness_extras)
        <div class="page-break"></div>
        <div class="section">
            <h1>Conseils transversaux</h1>
            <div class="highlight" style="padding: 15px;">
                <ol style="line-height: 1.8;">
                    <li><strong>Individualisation :</strong> Adapter selon VOTRE niveau activité, préférences, contraintes
                    </li>
                    <li><strong>Progression :</strong> Changements graduels (pas révolution)</li>
                    <li><strong>Soutenabilité :</strong> Alimentation viable À VIE</li>
                    <li><strong>Équilibre :</strong> Macro selon Tableau 1 (voir section Recommandation calorique), variété
                        aliments</li>
                    <li><strong>Activité physique :</strong> Non-négociable, quotidienne</li>
                    <li><strong>Sommeil :</strong> 7-8h (hormone régulation)</li>
                    <li><strong>Gestion stress :</strong> Techniques non-alimentaires</li>
                    <li><strong>Suivi :</strong> Marqueurs santé réguliers (glycémie, poids, tension)</li>
                    <li><strong>Support :</strong> Professionnel santé + entourage</li>
                    <li><strong>Patience :</strong> Résultats durables prennent temps</li>
                </ol>
            </div>

            <h1>Surveillance médicale essentielle</h1>
            <div class="regulatory-box">
                <ul style="line-height: 1.8;">
                    <li>Consultation mensuelle premiers 3 mois</li>
                    <li>Puis trimestrielle</li>
                    <li>Ajustements médicaments selon évolution</li>
                    <li>Examens réguliers (HbA1c, lipides, microalbuminurie)</li>
                </ul>
                <p style="font-weight: bold; margin-top: 15px; text-align: center; font-size: 14px; color: #16a085;">
                    Bonne chance dans votre parcours vers une meilleure santé !
                </p>
            </div>
        </div>
    @endif

    @if($show_hypertension_fitness_extras)
        <div class="page-break"></div>
        <div class="section">
            <h1>Conseils transversaux</h1>
            <p>Ce guide alimentaire complet pour obésité modérée avec hypertension vise une transformation durable vers
                santé optimale. Les principes directeurs :</p>
            <h3>Piliers Fondamentaux</h3>
            <div class="highlight" style="padding: 15px;">
                <ol style="line-height: 1.8;">
                    <li><strong>Nutrition adaptée :</strong> Plans béninois culturellement pertinents, macronutriments
                        optimisés selon activité</li>
                    <li><strong>Activité physique progressive :</strong> De sédentaire à actif (150-300 min/semaine)</li>
                    <li><strong>Sommeil réparateur :</strong> 7-9h/nuit (régulation hormonale, récupération)</li>
                    <li><strong>Gestion stress :</strong> Techniques relaxation, alimentation consciente</li>
                    <li><strong>Suivi médical :</strong> Collaboration médecin/nutritionniste, réévaluation régulière</li>
                </ol>
            </div>

            <h3>Mindset Succès</h3>
            <div class="highlight" style="padding: 15px;">
                <ul style="line-height: 1.8;">
                    <li><strong>Progrès > Perfection :</strong> Chaque petit changement compte</li>
                    <li><strong>Long terme :</strong> Style de vie permanent, pas régime temporaire</li>
                    <li><strong>Bienveillance :</strong> Auto-compassion lors rechutes (apprendre, pas culpabiliser)</li>
                    <li><strong>Curiosité :</strong> Découvrir nouvelles saveurs, nouvelles sensations de vitalité</li>
                    <li><strong>Responsabilité :</strong> Vous êtes l'acteur principal de votre santé</li>
                </ul>
                <p style="font-weight: bold; margin-top: 15px; text-align: center; font-size: 14px; color: #16a085;">
                    Une santé cardiovasculaire transformée et un poids équilibré sont à votre portée. Ce guide est votre
                    feuille de route, mais l'engagement quotidien est votre moteur. Vous pouvez le faire !
                </p>
            </div>
        </div>
    @endif

    @if($show_cardio_fitness_extras)
        <div class="page-break"></div>
        <div class="section">
            <h1>Conseils transversaux pour améliorer la forme physique</h1>
            <p>Indépendamment des réponses spécifiques, voici des conseils universels :</p>

            <div class="highlight" style="padding: 15px;">
                <ul style="line-height: 1.8;">
                    <li><strong>1. HYDRATATION</strong>
                        <ul>
                            <li>Objectif : 2-3L eau/jour (climat tropical béninois)</li>
                            <li>Timing : Verre au réveil, avant chaque repas, pendant et après activité</li>
                            <li>Signes déshydratation : Urine foncée, fatigue, maux de tête</li>
                            <li>Boissons béninoises hydratantes : Eau, eau de coco, bissap sans sucre, infusions</li>
                        </ul>
                    </li>
                    <li style="margin-top: 10px;"><strong>2. SOMMEIL</strong>
                        <ul>
                            <li>Objectif : 7-8h/nuit</li>
                            <li>Routine : Horaires réguliers, obscurité, fraîcheur, pas d'écrans 1h avant</li>
                            <li>Impact : Perte de poids, récupération, hormones régulées</li>
                        </ul>
                    </li>
                    <li style="margin-top: 10px;"><strong>3. GESTION DU STRESS</strong>
                        <ul>
                            <li>Techniques : Respiration, méditation, prière, nature, activité physique, social</li>
                            <li>Impact : Cortisol ↓ = moins de stockage abdominal, moins de compulsions</li>
                        </ul>
                    </li>
                    <li style="margin-top: 10px;"><strong>4. SOUTIEN SOCIAL</strong>
                        <ul>
                            <li>Impliquer : Famille, amis dans démarche</li>
                            <li>Groupes : Marche collective, sport en équipe</li>
                            <li>Professionnel : Nutritionniste, psychologue si besoin</li>
                        </ul>
                    </li>
                    <li style="margin-top: 10px;"><strong>5. SUIVI ET AJUSTEMENTS</strong>
                        <ul>
                            <li>Pesée : Hebdomadaire, même jour, même heure, mêmes conditions</li>
                            <li>Mesures : Tour de taille, hanches, cuisses (mensuel)</li>
                            <li>Photos : Mensuel (progrès visibles)</li>
                            <li>Énergie/Bien-être : Suivi subjectif quotidien</li>
                            <li>Ajustements : Si stagnation > 4 semaines ou perte trop rapide (> 1,5 kg/semaine après mois
                                1)</li>
                        </ul>
                    </li>
                    <li style="margin-top: 10px;"><strong>6. PATIENCE ET PERSÉVÉRANCE</strong>
                        <ul>
                            <li>Perte durable : 0,5-1 kg/semaine MAXIMUM</li>
                            <li>Plateaux : Normaux, temporaires</li>
                            <li>Rechutes : Apprentissage, pas échec</li>
                            <li>Vision : Mode de vie permanent, pas régime temporaire</li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    @endif

    @if(isset($show_weight_loss_under_5_diabetes_extras) && $show_weight_loss_under_5_diabetes_extras)
        <div class="page-break"></div>
        <div class="section"
            style="background-color: #fcfcfc; padding: 20px; border-radius: 8px; border: 1px solid #e0e0e0; margin-bottom: 30px;">
            <h2 style="color: #27ae60; text-align: center; border-bottom: 2px solid #27ae60; padding-bottom: 10px;">
                CONSEILS TRANSVERSAUX - PERTE DE POIDS (< 5KG) & DIABÈTE </h2>

                    <!-- Synthèse personnalisée -->
                    <div
                        style="background-color: #e8f8f5; border-left: 4px solid #1abc9c; padding: 15px; margin-top: 20px; border-radius: 4px;">
                        <h4 style="color: #16a085; margin-top: 0;">SYNTHÈSE PERSONNALISÉE :</h4>
                        <p><strong>Conseil à retenir :</strong><br>
                            Faites une synthèse sur le cadre d’analyse en dessus enfin de comprendre ce qui a marché pour
                            vous dans votre régime précédent et comment vous pouvez l’appliquer dans votre plan nutritionnel
                            actuel.</p>
                        <p><strong>SI NON - Premier essai structuré</strong><br>
                            Si vous êtes dans ce cas, alors ce sera votre première utilisation de régime alimentaire ; alors
                            nous vous souhaitons une bonne expérience.</p>
                    </div>

                    <!-- Conseils Généraux -->
                    <div style="margin-top: 20px;">
                        <h3 style="color: #2c3e50;">CONSEILS GÉNÉRAUX TRANSVERSAUX</h3>

                        <h4 style="color: #34495e; margin-bottom: 5px;">Aliments à privilégier :</h4>
                        <ul style="margin-top: 0;">
                            <li><strong>Protéines :</strong> Poissons locaux, légumineuses, œufs</li>
                            <li><strong>Glucides :</strong> Fonio, igname, patate douce, riz local complet</li>
                            <li><strong>Légumes :</strong> Épinards, okra, gombo, tomates, aubergines locales</li>
                            <li><strong>Fruits :</strong> Mangue verte, papaye, oranges locales (avec modération)</li>
                        </ul>

                        <h4 style="color: #34495e; margin-bottom: 5px;">Préparations à éviter/limiter :</h4>
                        <ul style="margin-top: 0;">
                            <li>Fritures excessives</li>
                            <li>Sucre ajouté dans boissons</li>
                            <li>Sel en excès</li>
                            <li>Portions trop importantes</li>
                        </ul>

                        <h4 style="color: #34495e; margin-bottom: 5px;">Techniques de cuisson recommandées :</h4>
                        <ul style="margin-top: 0;">
                            <li>Cuisson vapeur</li>
                            <li>Grillades</li>
                            <li>Mijotés avec peu d'huile</li>
                            <li>Préparations en papillote</li>
                        </ul>

                        <h4 style="color: #34495e; margin-bottom: 5px;">Hydratation :</h4>
                        <ul style="margin-top: 0;">
                            <li>2-3L d'eau/jour</li>
                            <li>Tisanes locales sans sucre</li>
                            <li>Eau de coco occasionnellement</li>
                            <li>Bissap sans sucre ajouté</li>
                        </ul>
                    </div>

                    <!-- Conseils Nutritionnels & Activité Physique -->
                    <div style="margin-top: 20px;">
                        <h4 style="color: #34495e; margin-bottom: 5px;">Conseils nutritionnels :</h4>
                        <ul style="margin-top: 0;">
                            <li><strong>Réduire les sucres rapides :</strong> Éviter les sodas, pâtisseries, confiseries,
                                pain blanc.</li>
                            <li><strong>Privilégier les glucides complexes :</strong> Consommer du riz complet, des
                                légumineuses, du pain complet, etc.</li>
                            <li><strong>Limiter les portions</strong> pour contrôler l’apport calorique total.</li>
                            <li><strong>Manger à heures fixes :</strong> Cela aide à stabiliser la glycémie, surtout si
                                traitement avec sulfonylurées ou insuline.</li>
                            <li><strong>Riche en fibres :</strong> Fruits (non sucrés), légumes, avoine, graines de chia –
                                cela aide à ralentir l’absorption du sucre.</li>
                            <li><strong>Limiter les graisses saturées et trans :</strong> Réduire les fritures, les viandes
                                grasses, le beurre.</li>
                            <li><strong>Favoriser les bonnes graisses :</strong> Avocat, huile d’olive, poissons gras
                                (sardines, maquereaux, saumon).</li>
                            <li><strong>Limiter l’alcool et boire suffisamment d’eau</strong> (surtout si traitement comme
                                les inhibiteurs SGLT2).</li>
                        </ul>

                        <h4 style="color: #34495e; margin-bottom: 5px;">Activité physique :</h4>
                        <ul style="margin-top: 0;">
                            <li><strong>Objectif :</strong> au moins 150 minutes par semaine d’activité modérée (marche
                                rapide, vélo, natation…).</li>
                            <li><strong>Aide à :</strong>
                                <ul style="margin-top: 5px;">
                                    <li>Améliorer la sensibilité à l’insuline</li>
                                    <li>Perdre du poids progressivement</li>
                                    <li>Baisser la tension artérielle</li>
                                </ul>
                            </li>
                        </ul>

                        <h4 style="color: #34495e; margin-bottom: 5px;">Surveillance & traitement :</h4>
                        <ul style="margin-top: 0;">
                            <li>Surveiller sa glycémie régulièrement, surtout en cas de traitement hypoglycémiant.</li>
                            <li>Prendre ses médicaments correctement selon les indications.</li>
                            <li>Attention aux hypoglycémies si traitement type insuline ou sulfonylurées.</li>
                            <li>Contrôler son poids, car chaque perte de 5-10 % du poids corporel améliore la glycémie.</li>
                            <li>Suivi médical régulier : Bilan sanguin, tension, complications possibles (yeux, reins,
                                pieds…).</li>
                        </ul>

                        <h4 style="color: #34495e; margin-bottom: 5px;">Conseils généraux :</h4>
                        <ul style="margin-top: 0;">
                            <li><strong>Bien dormir (7 à 9 h par nuit) :</strong> le manque de sommeil peut déséquilibrer la
                                glycémie.</li>
                            <li><strong>Réduire le stress :</strong> car il peut augmenter la glycémie (pratique :
                                respiration, méditation, marche…).</li>
                            <li><strong>Éviter l’automédication :</strong> surtout en cas de complications métaboliques ou
                                de prise de plusieurs médicaments.</li>
                        </ul>
                    </div>

                    <!-- Tableau Collations -->
                    <div class="regulatory-box" style="margin-top: 25px; margin-bottom: 20px;">
                        <h4 style="color: #c0392b; margin-top: 0;">Guide des collations</h4>
                        <table style="width: 100%; text-align: left; margin-top: 10px; border-collapse: collapse;">
                            <thead>
                                <tr style="background-color: #ecf0f1;">
                                    <th style="padding: 8px; border: 1px solid #bdc3c7;">Niveau d’activité</th>
                                    <th style="padding: 8px; border: 1px solid #bdc3c7;">Nombre de collations / jour</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="padding: 8px; border: 1px solid #bdc3c7;">Sédentaire</td>
                                    <td style="padding: 8px; border: 1px solid #bdc3c7;">0 – 1</td>
                                </tr>
                                <tr>
                                    <td style="padding: 8px; border: 1px solid #bdc3c7;">Légèrement actif</td>
                                    <td style="padding: 8px; border: 1px solid #bdc3c7;">1</td>
                                </tr>
                                <tr>
                                    <td style="padding: 8px; border: 1px solid #bdc3c7;">Modérément actif</td>
                                    <td style="padding: 8px; border: 1px solid #bdc3c7;">1 – 2</td>
                                </tr>
                                <tr>
                                    <td style="padding: 8px; border: 1px solid #bdc3c7;">Très actif</td>
                                    <td style="padding: 8px; border: 1px solid #bdc3c7;">2</td>
                                </tr>
                                <tr>
                                    <td style="padding: 8px; border: 1px solid #bdc3c7;">Extrêmement actif</td>
                                    <td style="padding: 8px; border: 1px solid #bdc3c7;">2 (nécessaires)</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
        </div>
    @endif

    @if($show_weight_loss_under_5_hypertension_extras)
        <div class="page-break"></div>
        <div class="section">
            <h2 style="color: #c0392b; border-bottom: 2px solid #e74c3c; padding-bottom: 10px; font-size: 20px;">
                <i class="fas fa-heartbeat"></i>CONSEILS transversaux
            </h2>

            <p style="font-size: 14px; margin-bottom: 20px;">Indépendamment de vos réponses spécifiques, voici des conseils
                universels essentiels :</p>

            <div style="background-color: #fcebeb; padding: 15px; border-left: 4px solid #c0392b; margin-bottom: 20px;">
                <h4 style="color: #c0392b; margin-bottom: 5px; margin-top: 0;">Principes Universels Tous Niveaux :</h4>
                <ul style="margin-top: 0;">
                    <li><strong>Hydratation :</strong> 2-3L eau/jour minimum (plus si activité/chaleur). Urine jaune clair =
                        bien hydraté.</li>
                    <li><strong>Sommeil :</strong> 7-8h/nuit minimum. Régularité horaires et qualité prioritaire.</li>
                    <li><strong>Gestion Stress :</strong> Techniques de relaxation, activité physique, support social. Ne
                        pas compenser par la nourriture.</li>
                    <li><strong>Suivi Médical :</strong> Consultation régulière (tous les 2-3 mois), bilan sanguin tous les
                        6 mois, communication avec le médecin.</li>
                </ul>

                <h4 style="color: #c0392b; margin-bottom: 5px;">Patience, Réalisme & Support Social :</h4>
                <ul style="margin-top: 0;">
                    <li>Perte saine : 0.5-1kg/semaine. Pas linéaire (plateaux normaux). Focus santé.</li>
                    <li>Informer sa famille/proches, éviter les saboteurs.</li>
                    <li>Flexibilité 90-10 : 90% du temps plan alimentaire ; 10% occasions spéciales.</li>
                </ul>
            </div>

            <div style="margin-top: 20px;">
                <h4 style="color: #34495e; margin-bottom: 5px;">Ressources Béninoises (Aliments Locaux Excellents) :</h4>
                <ul style="margin-top: 0;">
                    <li><strong>Poissons :</strong> maquereau, sardines, tilapia, carpe</li>
                    <li><strong>Légumes :</strong> gombo, gboma, kpété, aubergines, tomates, carottes, chou</li>
                    <li><strong>Féculents IG modéré :</strong> igname, patate douce, riz rouge, fonio</li>
                    <li><strong>Fruits :</strong> orange, papaye, banane, ananas, mangue (saison)</li>
                    <li><strong>Légumineuses & Oléagineux :</strong> haricots rouges/blancs, pois, noix de cajou, arachides
                    </li>
                </ul>

                <h4 style="color: #34495e; margin-bottom: 5px;">Tisanes Santé Locales :</h4>
                <ul style="margin-top: 0;">
                    <li><strong>Kinkeliba :</strong> digetion, glycémie</li>
                    <li><strong>Bissap/hibiscus :</strong> TA, antioxydants</li>
                    <li><strong>Gingembre :</strong> anti-inflammatoire, digestion</li>
                    <li><strong>Citronnelle :</strong> relaxation</li>
                </ul>
            </div>

            <div style="background-color: #ecf0f1; padding: 15px; border-radius: 5px; margin-top: 20px;">
                <h4 style="color: #2c3e50; margin-top: 0; text-align: center;">Message Final d'Encouragement</h4>
                <p style="font-style: italic; text-align: justify;">
                    Vous avez pris la décision de changer votre vie. C'est courageux et admirable. Le chemin ne sera pas
                    toujours facile, il y aura des hauts et des bas, mais chaque petit pas compte. Rappelez-vous que vous le
                    faites pour votre SANTÉ, votre ÉNERGIE, votre QUALITÉ DE VIE. Chaque kilo perdu réduit votre tension,
                    améliore votre glycémie et protège votre cœur. Vous méritez de vous sentir bien dans votre corps !
                    Avancez à votre rythme. Vous pouvez le faire !
                </p>
            </div>
        </div>
    @endif

    @if($show_weight_loss_under_5_no_pathology_extras || $show_weight_loss_5_10_no_pathology_extras)
        <div class="page-break"></div>
        <div class="section">
            <h2 style="color: #27ae60; text-align: center; border-bottom: 2px solid #27ae60; padding-bottom: 10px;">
                CONSEILS transversaux
                ({{ $show_weight_loss_under_5_no_pathology_extras ? '< 5kg' : '5-10kg' }})
            </h2>
            <div class="highlight" style="padding: 15px;">
                <h3 style="color: #16a085;">PRIORISATION DES ACTIONS</h3>
                <p>Si multiples problématiques, commencer par TOP 3 :</p>
                <ul style="line-height: 1.8;">
                    <li><strong>Priorité 1 - Impact majeur perte poids :</strong>
                        <ol>
                            <li>Supprimer boissons sucrées (si consommation quotidienne)</li>
                            <li>Augmenter légumes à 5-7 portions/jour</li>
                            <li>Initier/augmenter activité physique</li>
                        </ol>
                    </li>
                    <li><strong>Priorité 2 - Santé globale :</strong>
                        <ul>
                            <li>4. Améliorer sommeil (7-9h)</li>
                            <li>5. Gérer stress sans nourriture</li>
                            <li>6. Traiter apnée sommeil (si présente)</li>
                        </ul>
                    </li>
                    <li><strong>Priorité 3 - Optimisation :</strong>
                        <ul>
                            <li>7. Arrêter grignotage émotionnel</li>
                            <li>8. Écouter satiété</li>
                            <li>9. Réduire temps assis</li>
                        </ul>
                    </li>
                </ul>
                <p><strong>Progression :</strong><br>
                    • Semaine 1-2 : 1-2 changements (priorité 1)<br>
                    • Semaine 3-4 : Ajouter 1-2 changements (priorité 2)<br>
                    • Mois 2+ : Peaufiner et optimiser (priorité 3)</p>
            </div>

            <h3 style="color: #16a085;">SUIVI ET AJUSTEMENTS</h3>
            <div class="highlight" style="padding: 15px;">
                <p>Indicateurs succès (suivre hebdomadairement) :</p>
                <ul style="line-height: 1.8;">
                    <li><strong>Poids/mensurations :</strong> Pesée hebdomadaire, tour de taille (objectif : -0.5 à
                        -1kg/semaine).</li>
                    <li><strong>Énergie/Humeur :</strong> Niveau énergie stable, meilleure qualité sommeil.</li>
                    <li><strong>Glycémie :</strong> Stabilité des glycémies à jeun et post-prandiales (si applicable).</li>
                </ul>
            </div>
        </div>
    @endif

    @if($show_weight_loss_over_10_no_pathology_extras)
        <div class="page-break"></div>
        <div class="section">
            <h2 style="color: #2980b9; text-align: center; border-bottom: 2px solid #2980b9; padding-bottom: 10px;">
                Conseils transversaux
            </h2>
            <div class="highlight" style="padding: 15px;">
                <p>Félicitations d’avoir complété ce questionnaire ! Vous disposez maintenant d’un guide alimentaire complet
                    adapté à : votre niveau d’activité, vos antécédents médicaux, vos habitudes actuelles et votre contexte
                    béninois.</p>
                <h3 style="color: #2980b9;">PROCHAINES ÉTAPES :</h3>
                <ol style="line-height: 1.8;">
                    <li>Identifier votre niveau d’activité (Partie 1)</li>
                    <li>Suivre le plan de repas correspondant (2 jours fournis, à répéter/varier)</li>
                    <li>Appliquer TOUTES les adaptations selon vos réponses au questionnaire (Partie 2)</li>
                    <li>Commencer progressivement (pas tout d’un coup)</li>
                    <li>Suivre vos progrès (poids, mesures, photos)</li>
                    <li>Ajuster selon résultats (après 4 semaines)</li>
                    <li>Consulter professionnels si besoin (médecin, nutritionniste)</li>
                </ol>
                <div class="regulatory-box" style="border: 2px solid #2980b9; background-color: #f0f7ff;">
                    <p style="color: #2c3e50;"><strong>RAPPEL : Perte saine 0.5 - 1 kg / semaine.</strong> La patience et la
                        régularité sont vos meilleures alliées pour une transformation durable !</p>
                </div>
            </div>
        </div>
    @endif


    @if($show_fitness_no_pathology_extras)
        <div class="page-break"></div>
        <div class="section">
            <h1 class="section-title">Conseils transversaux</h1>
            <p style="color: #2c3e50; font-weight: bold;">
                Ce guide complet de 21 questions couvre tous les aspects nécessaires à un rééquilibrage alimentaire
                personnalisé pour une personne souffrant d'obésité modérée.
            </p>

            <div class="summary-box"
                style="background-color: #f9f9f9; padding: 20px; border: 1px solid #ddd; border-radius: 8px;">
                <h4 style="color: #27ae60; margin-top: 0;">Points clés à retenir :</h4>
                <ol style="line-height: 1.6;">
                    <li><strong>Alimentation adaptée</strong> au niveau d'activité (Sédentaire → Extrêmement actif).</li>
                    <li><strong>Personnalisation</strong> selon les antécédents médicaux (Diabète, HTA, maladies
                        cardiovasculaires).</li>
                    <li><strong>Ajustements médicamenteux</strong> (Interactions aliments-médicaments).</li>
                    <li><strong>Correction des habitudes</strong> (Portions fruits/légumes, grignotages, boissons).</li>
                    <li><strong>Optimisation du sommeil</strong> (7-8h/nuit essentiel).</li>
                    <li><strong>Gestion de l'apnée du sommeil</strong> (Si présente).</li>
                    <li><strong>Activité physique progressive</strong> (Marche → Diversification).</li>
                    <li><strong>Réduction du temps assis</strong> (<6h /jour idéalement).</li>
                    <li><strong>Gestion de l'alimentation émotionnelle</strong> (Stress, ennui).</li>
                    <li><strong>Écoute des signaux</strong> de faim et de satiété (Arrêt avant l'assiette vide).</li>
                    <li><strong>Apprentissage des échecs</strong> régimes passés (Approche durable).</li>
                </ol>
                <p style="margin-top: 15px; font-weight: bold; color: #16a085;">Tous les repas proposés sont béninois,
                    accessibles et culturellement adaptés.</p>
            </div>

            <p class="final-encouragement"
                style="background-color: #f1f8e9; padding: 15px; border-left: 5px solid #4caf50; font-style: italic; margin-top: 20px;">
                "Votre transformation n'est pas un sprint, c'est un marathon. Chaque petit changement quotidien est une
                victoire vers une meilleure santé."
            </p>
        </div>
    @endif

    <div class="page-break"></div>

    <!-- 5. Guide Alimentaire 90 Jours -->
    <div class="section">
        <h1>Guide Alimentaire sur 90 Jours</h1>
        <p>Ce plan est conçu pour être suivi sur 3 mois. Il respecte vos besoins caloriques et vos préférences.</p>

        <!-- Affichage des menus (Groupé par semaine ou jour selon l'espace) -->
        <!-- Pour éviter un PDF de 500 pages, on peut afficher un modèle type ou la liste complète. Ici affichons les 14 premiers jours en détail et résumons le reste si besoin, ou tout si demandé. -->
        <!-- Vu la demande "Guide complet de 90 jours", on génère tout. -->

        @foreach($menu as $day)
            <div class="menu-day">
                <h4>Jour {{ $day['jour'] }} @if(isset($day['type']) && $day['type'] != 'Ajusté') <span
                class="warning">({{ $day['type'] }})</span> @endif</h4>

                @if(isset($day['repas']) && isset($day['repas']['Petit-déjeuner']))
                    <div class="info-grid">
                        <div class="info-row">
                            <div class="info-cell">
                                <div class="meal-title">Petit-déjeuner</div>
                                @foreach($day['repas']['Petit-déjeuner'] as $item)
                                    <div>- {{ $item['nom'] ?? 'N/A' }} ({{ $item['portion_recommandee'] ?? '' }})</div>
                                @endforeach
                            </div>
                            <div class="info-cell">
                                <div class="meal-title">Déjeuner</div>
                                @if(isset($day['repas']['Déjeuner']))
                                    @foreach($day['repas']['Déjeuner'] as $item)
                                        <div>- {{ $item['nom'] ?? 'N/A' }} ({{ $item['portion_recommandee'] ?? '' }})</div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="info-row">
                            <div class="info-cell">
                                <div class="meal-title">Collation(s)</div>
                                @if(!empty($day['collations']))
                                    @foreach($day['collations'] as $item)
                                        <div>- {{ $item['nom'] ?? 'N/A' }} ({{ $item['portion'] ?? 'Standard' }})</div>
                                    @endforeach
                                @else
                                    <div>Aucune</div>
                                @endif
                            </div>
                            <div class="info-cell">
                                <div class="meal-title">Dîner</div>
                                @if(isset($day['repas']['Dîner']))
                                    @foreach($day['repas']['Dîner'] as $item)
                                        <div>- {{ $item['nom'] ?? 'N/A' }} ({{ $item['portion_recommandee'] ?? '' }})</div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                @else
                    <p>{{ $day['repas']['Note'] ?? 'Détails du menu non disponibles pour ce jour.' }}</p>
                @endif
            </div>

            @if($loop->iteration % 3 == 0)
                <div class="page-break"></div>
            @endif
        @endforeach

    </div>

    <div class="page-break"></div>

    <!-- 6. Notifications Réglementaires -->
    <div class="section">
        <div class="regulatory-box">
            <div class="regulatory-title">Notifications Réglementaires</div>
            <ul>
                <li>Le plan nutritionnel proposé est prévu pour une durée maximale de 3 mois, soit 90 jours.</li>
                <li>Pour les personnes ayant des antécédents médicaux et prenant des médicaments, ne cessez jamais votre
                    traitement. Continuez de suivre votre prescription tout en respectant nos recommandations. En cas de
                    problème avec le guide alimentaire et vos prescriptions, veuillez consulter votre médecin traitant.
                </li>
                <li>Pour pouvoir suivre le guide alimentaire proposé en fonction de vos données personnelles appuyées de
                    l’ensemble du système de Healing Nutrition, vous devez vous servir d’un outil pour peser les
                    aliments comme celui de la balance alimentaire. En cas échéant, vous pouvez utiliser la technique du
                    pesage de la mesures domestique approximatives.</li>
                <li>Les valeurs nutritionnelles sont basées sur des aliments crus sauf indication contraire.</li>
                <li>Les valeurs nutritionnelles indiquées dans ce guide sont basées sur le poids des aliments crus (sauf
                    mention explicite). Pour les aliments cuits, la cuisson modifie le poids sans changer le contenu
                    énergétique : il faut donc ajuster la portion en fonction du poids cru.</li>
                <li>Suivez scrupuleusement le plan nutritionnel et respectez les recommandations nutritionnelles
                    indiquées dans le guide alimentaire personnalisé ainsi que les recommandations du système suites à
                    vos réponses aux questions.</li>
                <li>Certaines recommandations du système suites à vos réponses aux questions peuvent inclure des
                    propositions de repas journaliers. Ces repas ont un rôle éducatif et illustratif : l’utilisateur
                    n’est pas tenu de les suivre. La validité du plan nutritionnel repose sur le respect des apports
                    journaliers en macronutriments définis dans le guide alimentaire et les recommandations du système
                    suites aux réponses obtenues des questions.</li>
                <li>Les repas journaliers inclus dans certaines recommandations ne conditionnent pas la pertinence du
                    plan nutritionnel. L’essentiel est de respecter les apports en protéines, glucides et lipides
                    définis pour chaque jour dans le guide alimentaire personnalisé.</li>
                <li>Les vidéos proposées ne correspondent pas toutes à tous les repas, mais elles aident à comprendre la
                    préparation des aliments et d’autres plus complexes. Il peut être nécessaire de compléter ces
                    informations par des recherches personnelles plus spécifiques.</li>
                <li>Pour les collations indiquées dans le guide alimentaire, suivez les instructions selon votre niveau
                    d’activité :
                    <ul>
                        <li>Sédentaire : 0 – 1 collation/jour</li>
                        <li>Légèrement actif : 1 collation/jour</li>
                        <li>Modérément actif : 1 – 2 collations/jour</li>
                        <li>Très actif : 2 collations/jour</li>
                        <li>Extrêmement actif : 2 collations/jour (nécessaires)</li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>

    <!-- 7. Vidéos et Ressources -->
    <div class="section">
        <h1>Ressources et Vidéos Explicatives</h1>
        <p>Afin de vous accompagner au mieux dans la préparation de vos plats, voici une sélection de vidéos
            explicatives :</p>
        <ul style="list-style-type: none; padding-left: 0; margin-bottom: 0;">
            <!-- Recettes Détaillées -->
            <li style="margin-bottom: 20px; padding-bottom: 15px; border-bottom: 1px dashed #ccc;">
                <h3 style="margin-top: 0; color: #2c3e50;"><span style="font-size: 18px;">🍲</span> Recettes de Plats de
                    Base</h3>
                <ul style="list-style-type: none; padding-left: 10px;">
                    <li style="margin-bottom: 8px;">
                        <a href="https://youtu.be/KHCq7fp_Wi8?si=_wcZUrbzPuZ71i6U"
                            style="color: #c0392b; text-decoration: none; font-weight: bold;">🔗 Bouillie de maïs sans
                            sucre ajouté + 2 œufs durs + 1 avocat</a>
                    </li>
                    <li style="margin-bottom: 8px;">
                        <a href="https://youtu.be/4jGMhBq7idI?si=3p7zInSBDYnv5JqQ"
                            style="color: #c0392b; text-decoration: none; font-weight: bold;">🔗 150g d'akassa + 100g de
                            poisson grillé (maquereau) + Salade de tomates/concombres</a>
                    </li>
                    <li style="margin-bottom: 8px;">
                        <a href="https://youtu.be/g2ol7AZE8GY?si=vZ6j848tPV3miK3j"
                            style="color: #c0392b; text-decoration: none; font-weight: bold;">🔗 100g d'akassa + Sauce
                            graine légère + 120g poisson fumé + Épinards purs (200g)</a>
                    </li>
                    <li style="margin-bottom: 8px;">
                        <a href="https://youtu.be/Bw8HSsQVElQ?si=I4aJ7QBj_f3E11rT"
                            style="color: #c0392b; text-decoration: none; font-weight: bold;">🔗 150g d'amiwo (pâte
                            rouge) + 150g poulet + Sauce tomate maison + Salade verte</a>
                    </li>
                    <li style="margin-bottom: 8px;">
                        <a href="https://www.youtube.com/results?search_query=p%C3%A2te+ma%C3%AFs+haricots+rouges+recette"
                            style="color: #c0392b; text-decoration: none; font-weight: bold;">🔗 Recette ciblée : Pâte
                            de maïs et Haricots rouges</a>
                    </li>
                    <li style="margin-bottom: 8px;">
                        <a href="https://www.youtube.com/results?search_query=sauce+feuilles+viande+ch%C3%A8vre+tubercules"
                            style="color: #c0392b; text-decoration: none; font-weight: bold;">🔗 Recette ciblée : Sauce
                            feuilles au chèvre et tubercules</a>
                    </li>
                    <li style="margin-bottom: 8px;">
                        <a href="https://www.youtube.com/results?search_query=jus+bissap+maison+sans+sucre"
                            style="color: #c0392b; text-decoration: none; font-weight: bold;">🔗 Recette ciblée : Jus de
                            Bissap maison sans sucre</a>
                    </li>
                    <li style="margin-bottom: 8px;">
                        <a href="https://www.youtube.com/results?search_query=riz+complet+l%C3%A9gumineuses+l%C3%A9gumes+recette"
                            style="color: #c0392b; text-decoration: none; font-weight: bold;">🔗 Recette ciblée : Riz
                            complet, légumineuses et légumes</a>
                    </li>
                </ul>
            </li>

            <!-- Base de Données Additionnelle (Capsules) -->
            <li style="margin-bottom: 20px; padding-bottom: 15px; border-bottom: 1px dashed #ccc;">
                <h3 style="margin-top: 0; color: #2c3e50;"><span style="font-size: 18px;">▶️</span> Base de Données
                    Vidéos Additionnelle</h3>
                <p style="font-size: 11px; color: #7f8c8d; margin-top: -10px; margin-bottom: 10px;">Cliquez sur un
                    bouton pour visionner d'autres méthodes ou variantes de cuisson sur YouTube :</p>
                <div style="line-height: 2;">
                    <a href="https://youtu.be/Yxs-cdPOmto?si=Cuarlu0bkCmuw_1y"
                        style="display: inline-block; padding: 4px 8px; margin: 2px; background-color: #f2dede; color: #a94442; text-decoration: none; border-radius: 3px; font-size: 11px; border: 1px solid #ebccd1;">▶
                        Vidéo 1</a>
                    <a href="https://youtu.be/Q6mu83MnSXA?si=xBghIW0r5nYFMydp"
                        style="display: inline-block; padding: 4px 8px; margin: 2px; background-color: #f2dede; color: #a94442; text-decoration: none; border-radius: 3px; font-size: 11px; border: 1px solid #ebccd1;">▶
                        Vidéo 2</a>
                    <a href="https://youtu.be/jZC8r_tTVXo?si=6yfX8cgeWCezs6I6"
                        style="display: inline-block; padding: 4px 8px; margin: 2px; background-color: #f2dede; color: #a94442; text-decoration: none; border-radius: 3px; font-size: 11px; border: 1px solid #ebccd1;">▶
                        Vidéo 3</a>
                    <a href="https://youtu.be/d7H86Zb5CPQ?si=ZKINn95j_92fgHla"
                        style="display: inline-block; padding: 4px 8px; margin: 2px; background-color: #f2dede; color: #a94442; text-decoration: none; border-radius: 3px; font-size: 11px; border: 1px solid #ebccd1;">▶
                        Vidéo 4</a>
                    <a href="https://youtu.be/TJ-Olo4zc-0?si=yfn1a43ZcQotQWEX"
                        style="display: inline-block; padding: 4px 8px; margin: 2px; background-color: #f2dede; color: #a94442; text-decoration: none; border-radius: 3px; font-size: 11px; border: 1px solid #ebccd1;">▶
                        Vidéo 5</a>
                    <a href="https://youtu.be/FKAlir2_dE4?si=CWNMnSm6-WGQILLq"
                        style="display: inline-block; padding: 4px 8px; margin: 2px; background-color: #f2dede; color: #a94442; text-decoration: none; border-radius: 3px; font-size: 11px; border: 1px solid #ebccd1;">▶
                        Vidéo 6</a>
                    <a href="https://youtu.be/GyoNAGPR9YM?si=qL-DaQD9fCh307Mo"
                        style="display: inline-block; padding: 4px 8px; margin: 2px; background-color: #f2dede; color: #a94442; text-decoration: none; border-radius: 3px; font-size: 11px; border: 1px solid #ebccd1;">▶
                        Vidéo 7</a>
                    <a href="https://youtu.be/SI0A7FnvWVE?si=l397fTWvNF3jDiM5"
                        style="display: inline-block; padding: 4px 8px; margin: 2px; background-color: #f2dede; color: #a94442; text-decoration: none; border-radius: 3px; font-size: 11px; border: 1px solid #ebccd1;">▶
                        Vidéo 8</a>
                    <a href="https://youtu.be/Bw8HSsQVElQ?si=44VHsPh2cX81zMMP"
                        style="display: inline-block; padding: 4px 8px; margin: 2px; background-color: #f2dede; color: #a94442; text-decoration: none; border-radius: 3px; font-size: 11px; border: 1px solid #ebccd1;">▶
                        Vidéo 9</a>
                    <a href="https://youtu.be/IGEBhL5DKTk?si=z2mia9z3Qh_Bf99o"
                        style="display: inline-block; padding: 4px 8px; margin: 2px; background-color: #f2dede; color: #a94442; text-decoration: none; border-radius: 3px; font-size: 11px; border: 1px solid #ebccd1;">▶
                        Vidéo 10</a>
                    <a href="https://youtube.com/shorts/Cx0_PyYEaRE?si=WiyUDRggL7arKzEz"
                        style="display: inline-block; padding: 4px 8px; margin: 2px; background-color: #fce4ec; color: #ad1457; text-decoration: none; border-radius: 3px; font-size: 11px; border: 1px solid #f8bbd0;">▶
                        Courte Vidéo 1</a>
                    <a href="https://youtu.be/J1obNM0Gl94?si=garAuMfxA2ZzW1qP"
                        style="display: inline-block; padding: 4px 8px; margin: 2px; background-color: #f2dede; color: #a94442; text-decoration: none; border-radius: 3px; font-size: 11px; border: 1px solid #ebccd1;">▶
                        Vidéo 11</a>
                    <a href="https://youtu.be/l7RoiNDHyvo?si=XMnupBF6jXsFQpPb"
                        style="display: inline-block; padding: 4px 8px; margin: 2px; background-color: #f2dede; color: #a94442; text-decoration: none; border-radius: 3px; font-size: 11px; border: 1px solid #ebccd1;">▶
                        Vidéo 12</a>
                    <a href="https://youtu.be/fla_m3N6ha4?si=x72Ayy9FkaYQquuX"
                        style="display: inline-block; padding: 4px 8px; margin: 2px; background-color: #f2dede; color: #a94442; text-decoration: none; border-radius: 3px; font-size: 11px; border: 1px solid #ebccd1;">▶
                        Vidéo 13</a>
                    <a href="https://youtu.be/KHCq7fp_Wi8?si=xSx-zC6bw3dgFzu3"
                        style="display: inline-block; padding: 4px 8px; margin: 2px; background-color: #f2dede; color: #a94442; text-decoration: none; border-radius: 3px; font-size: 11px; border: 1px solid #ebccd1;">▶
                        Vidéo 14</a>
                    <a href="https://youtu.be/OcvgVhkH_WA?si=nUC9x_VBeWSbs0Eh"
                        style="display: inline-block; padding: 4px 8px; margin: 2px; background-color: #f2dede; color: #a94442; text-decoration: none; border-radius: 3px; font-size: 11px; border: 1px solid #ebccd1;">▶
                        Vidéo 15</a>
                    <a href="https://youtu.be/AVZyF5GOfS8?si=Ikjg9KreYDtorHqo"
                        style="display: inline-block; padding: 4px 8px; margin: 2px; background-color: #f2dede; color: #a94442; text-decoration: none; border-radius: 3px; font-size: 11px; border: 1px solid #ebccd1;">▶
                        Vidéo 16</a>
                    <a href="https://youtu.be/LWcgX1gQ1kk?si=eppkakBcALQfaK2P"
                        style="display: inline-block; padding: 4px 8px; margin: 2px; background-color: #f2dede; color: #a94442; text-decoration: none; border-radius: 3px; font-size: 11px; border: 1px solid #ebccd1;">▶
                        Vidéo 17</a>
                    <a href="https://youtu.be/OISsHOh9Nbs?si=X5B_nhBudYTdDXpv"
                        style="display: inline-block; padding: 4px 8px; margin: 2px; background-color: #f2dede; color: #a94442; text-decoration: none; border-radius: 3px; font-size: 11px; border: 1px solid #ebccd1;">▶
                        Vidéo 18</a>
                    <a href="https://youtu.be/r0ZiwP7c1jI?si=tDTswqi_A1O-NiNo"
                        style="display: inline-block; padding: 4px 8px; margin: 2px; background-color: #f2dede; color: #a94442; text-decoration: none; border-radius: 3px; font-size: 11px; border: 1px solid #ebccd1;">▶
                        Vidéo 19</a>
                    <a href="https://youtu.be/LU7McMoh7pU?si=f9N_oAEzkM3axI_Q"
                        style="display: inline-block; padding: 4px 8px; margin: 2px; background-color: #f2dede; color: #a94442; text-decoration: none; border-radius: 3px; font-size: 11px; border: 1px solid #ebccd1;">▶
                        Vidéo 20</a>
                    <a href="https://youtu.be/dRhj54zFKdE?si=ZgD3QZTH1ei2EAIN"
                        style="display: inline-block; padding: 4px 8px; margin: 2px; background-color: #f2dede; color: #a94442; text-decoration: none; border-radius: 3px; font-size: 11px; border: 1px solid #ebccd1;">▶
                        Vidéo 21</a>
                    <a href="https://youtu.be/ctv597WtqMs?si=WcwZ0GwiIerHPRSk"
                        style="display: inline-block; padding: 4px 8px; margin: 2px; background-color: #f2dede; color: #a94442; text-decoration: none; border-radius: 3px; font-size: 11px; border: 1px solid #ebccd1;">▶
                        Vidéo 22</a>
                    <a href="https://youtu.be/-WezOLctZgg?si=mCdKZNe9hOMwLEPI"
                        style="display: inline-block; padding: 4px 8px; margin: 2px; background-color: #f2dede; color: #a94442; text-decoration: none; border-radius: 3px; font-size: 11px; border: 1px solid #ebccd1;">▶
                        Vidéo 23</a>
                    <a href="https://youtu.be/r0ZiwP7c1jI?si=fPBjSeqo0UcMeoIr"
                        style="display: inline-block; padding: 4px 8px; margin: 2px; background-color: #f2dede; color: #a94442; text-decoration: none; border-radius: 3px; font-size: 11px; border: 1px solid #ebccd1;">▶
                        Vidéo 24</a>
                    <a href="https://youtu.be/X7t2z-NXHmI?si=hGAUfOkbClCU0C0l"
                        style="display: inline-block; padding: 4px 8px; margin: 2px; background-color: #f2dede; color: #a94442; text-decoration: none; border-radius: 3px; font-size: 11px; border: 1px solid #ebccd1;">▶
                        Vidéo 25</a>
                    <a href="https://www.tiktok.com/@sisiolojuede/video/7170357133911919877?is_from_webapp=1&sender_device=pc"
                        style="display: inline-block; padding: 4px 8px; margin: 2px; background-color: #fce4ec; color: #ad1457; text-decoration: none; border-radius: 3px; font-size: 11px; border: 1px solid #f8bbd0;">▶
                        Courte Vidéo 2</a>
                    <a href="https://youtu.be/uyZt-vmOFfs?si=r5ATxI9B9QfQkZEf"
                        style="display: inline-block; padding: 4px 8px; margin: 2px; background-color: #f2dede; color: #a94442; text-decoration: none; border-radius: 3px; font-size: 11px; border: 1px solid #ebccd1;">▶
                        Vidéo 26</a>
                    <a href="https://youtu.be/-_VoMkdMHS8?si=MITxeMG4HwvA_HU5"
                        style="display: inline-block; padding: 4px 8px; margin: 2px; background-color: #f2dede; color: #a94442; text-decoration: none; border-radius: 3px; font-size: 11px; border: 1px solid #ebccd1;">▶
                        Vidéo 27</a>
                </div>
            </li>

            <!-- Pesage / Quantités -->
            <li style="margin-bottom: 5px;">
                <h3 style="margin-top: 0; color: #d35400;"><span style="font-size: 18px;">⚖️</span> Outils : Peser et
                    Quantifier</h3>
                <ul style="list-style-type: none; padding-left: 10px;">
                    <li
                        style="background-color: #fff8e1; border-left: 3px solid #f39c12; padding: 8px 10px; border-radius: 3px;">
                        <a href="https://youtu.be/TjLycHnzRQo?si=0hAfXM2t2xa7Y9Gs"
                            style="color: #d35400; text-decoration: none; font-weight: bold;">
                            🔗 Tutoriel clé : Apprendre à peser et quantifier ses aliments
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
    <p class="note" style="margin-top: 10px;">Note : Les vidéos ne correspondent pas forcément à 100% de votre menu
        exact, mais elles sont essentielles pour comprendre les techniques de préparation recommandées par notre
        système.</p>
    </div>
    @if($show_weight_loss_5_10_diabetes_extras)
        <div class="page-break"></div>
        <div class="section">
            <h1 style="color: #2c3e50; border-bottom: 2px solid #e67e22;">CONSEILS FINAUX TRANSVERSAUX (Profil Perte 5-10kg
                + Diabète)</h1>

            <div class="highlight" style="border-left: 4px solid #e67e22; margin-bottom: 20px;">
                <h2 style="color: #d35400; margin-top: 0;">💧 HYDRATATION (Tous profils)</h2>
                <p><strong>Objectif:</strong> 2-3L/jour (climat chaud Bénin)</p>
                <p><strong>Répartition:</strong></p>
                <ul>
                    <li><strong>Réveil:</strong> 500ml eau tiède citronnée</li>
                    <li><strong>Entre repas:</strong> 1,5-2L</li>
                    <li><strong>Pendant repas:</strong> 200ml maximum (pas noyer digestion)</li>
                    <li><strong>Avant coucher:</strong> 200ml (pas trop, réveils nocturnes)</li>
                </ul>
                <p><strong>Signes déshydratation:</strong> Urine foncée, Bouche sèche, Fatigue, Maux de tête, Constipation
                </p>
                <p><strong>Boissons à privilégier:</strong> Eau pure, Bissap sans sucre, Eau citronnée/gingembre, Infusions
                    (citronnelle, menthe), Thé vert (modération)</p>
                <p><strong>À limiter/éviter:</strong> Sodas (jamais), Jus industriels (jamais), Alcool (occasionnel
                    uniquement), Café (max 2/jour, avant 14h)</p>
            </div>

            <div class="highlight" style="border-left: 4px solid #27ae60;">
                <h2 style="color: #1e8449; margin-top: 0;">🧺 PRÉPARATION ET ORGANISATION</h2>
                <p><strong>Batch Cooking (dimanche):</strong></p>
                <ul>
                    <li>Cuire riz/fonio/igname pour 3-4 jours</li>
                    <li>Bouillir œufs (6-8) pour semaine</li>
                    <li>Laver/couper légumes</li>
                    <li>Préparer bissap sans sucre (2L)</li>
                    <li>Griller arachides/plantain portions</li>
                </ul>
                <p><strong>Courses hebdomadaires:</strong></p>
                <ul>
                    <li>Liste structurée (évite achats impulsifs)</li>
                    <li>Marché local: Légumes saison, poissons frais, noix</li>
                    <li>Éviter rayons produits transformés</li>
                </ul>
                <p><strong>Portions pré-mesurées:</strong></p>
                <ul>
                    <li>Utiliser petits sachets/boîtes pour collations (20g noix, 30g arachides)</li>
                    <li>Évite de manger directement dans le grand sac</li>
                </ul>
            </div>
        </div>
    @endif

    @if($show_weight_loss_5_10_hypertension_extras)
        <div class="page-break"></div>
        <div class="section">
            <h1 style="color: #2c3e50; border-bottom: 2px solid #2980b9;">SYNTHÈSE FINALE & RECOMMANDATIONS GÉNÉRALES
                (Profil Perte 5-10kg + HTA)</h1>

            <div class="highlight" style="border-left: 4px solid #2980b9;">
                <h2 style="color: #2471a3; margin-top: 0;">🎯 PRINCIPES CLÉS RÉUSSITE</h2>
                <ul>
                    <li><strong>PROGRESSIVITÉ :</strong> Changements graduels (1-2 nouvelles habitudes/semaine). Perte poids
                        0,5-1 kg/semaine. Activité physique intensification progressive. Patience (résultats durables =
                        mois, pas jours).</li>
                    <li><strong>PERSONNALISATION :</strong> Adapter selon réponses questionnaire. Écouter corps (signes
                        faim, satiété, fatigue). Ajuster si résultats stagnent/régressent. Pas de "one-size-fits-all".</li>
                    <li><strong>DURABILITÉ :</strong> Mode vie PERMANENT (pas régime temporaire). Plaisir alimentaire
                        préservé (culture, goût). Aliments locaux accessibles économiquement. Soutenabilité sociale
                        (famille, amis).</li>
                    <li><strong>GLOBALITÉ :</strong> Nutrition + Activité + Sommeil + Stress + Social. Tous interconnectés.
                        Négliger un aspect = limiter résultats globaux.</li>
                    <li><strong>BIENVEILLANCE :</strong> Accepter écarts (10-20% repas). Pas de culpabilité destructrice.
                        Reprendre après écart sans attendre lundi. Focus progrès, pas perfection.</li>
                </ul>
            </div>
        </div>
    @endif

    @if($show_weight_loss_5_10_cardio_extras)
        <div class="page-break"></div>
        <div class="section">
            <h1 style="color: #2c3e50; border-bottom: 2px solid #e74c3c;">CONSEILS GÉNÉRAUX TRANSVERSAUX (Profil Perte
                5-10kg + Cardiovasculaire)</h1>

            <div class="highlight" style="border-left: 4px solid #e74c3c; margin-bottom: 20px;">
                <h2 style="color: #c0392b; margin-top: 0;">🥗 PRÉPARATIONS CULINAIRES SANTÉ</h2>
                <ul>
                    <li><strong>Cuissons recommandées :</strong> Bouilli, vapeur, grillé, braisé, en sauce légère.</li>
                    <li><strong>À ÉVITER :</strong> Friture, huiles réutilisées, graisses brûlées (noirs/fumées).</li>
                    <li><strong>Aromates naturels :</strong> Ail, gingembre, piment, oignon, basilic africain, poivre,
                        citron, vinaigre, tomate fraîche.</li>
                    <li><strong>Sel :</strong> ZÉRO sel ajouté (les aromates compensent naturellement).</li>
                </ul>
                <h2 style="color: #c0392b; margin-top: 20px;">📏 CONTRÔLE DES PORTIONS (Méthode de la main)</h2>
                <ul>
                    <li><strong>Protéines :</strong> Taille de la paume.</li>
                    <li><strong>Féculents :</strong> Taille du poing fermé.</li>
                    <li><strong>Légumes :</strong> 2 poignées ouvertes minimum.</li>
                    <li><strong>Assiette divisée :</strong> 1/2 légumes, 1/4 protéines, 1/4 féculents.</li>
                </ul>
            </div>
        </div>
    @endif

    @if($show_weight_loss_over_10_diabetes_extras)
        <div class="page-break"></div>
        <div class="section">
            <h1 style="color: #2c3e50; border-bottom: 2px solid #27ae60;">CONSEILS TRANSVERSAUX (Profil Perte >10kg +
                Diabète)</h1>

            <div class="highlight" style="border-left: 4px solid #27ae60; margin-bottom: 20px;">
                <h2 style="color: #1e8449; margin-top: 0;">🍯 GESTION DES SUCRES ET GLUCIDES</h2>
                <ul>
                    <li><strong>Réduire les sucres rapides :</strong> Éliminer sodas, jus industriels, pâtisseries,
                        confitures, bonbons.</li>
                    <li><strong>Favoriser les fibres :</strong> Légumineuses (haricots), légumes verts (épinards, gombo),
                        céréales complètes (riz complet), fonio. Les fibres ralentissent l'absorption des sucres.</li>
                    <li><strong>Fractionnement :</strong> Répartir les glucides sur 3 repas et éventuellement 1 à 2
                        collations pour éviter les pics de glycémie.</li>
                    <li><strong>Manger lentement :</strong> Mastiquer au moins 20 fois chaque bouchée pour donner le temps
                        au cerveau de recevoir les signaux de satiété.</li>
                </ul>
                <h2 style="color: #1e8449; margin-top: 20px;">🏃 ACTIVITÉ PHYSIQUE RÉGULIÈRE</h2>
                <ul>
                    <li>Objectif : 30 minutes de marche rapide après le repas principal (améliore la sensibilité à
                        l'insuline).</li>
                </ul>
            </div>
        </div>
    @endif

    @if($show_weight_loss_over_10_hypertension_extras)
        <div class="page-break"></div>
        <div class="section">
            <h2 style="color: #c0392b; border-bottom: 2px solid #e74c3c; padding-bottom: 10px; font-size: 20px;">
                <i class="fas fa-heartbeat"></i> RÉCAPITULATIF FINAL & CONSEILS GLOBAUX (>10kg + HTA)
            </h2>

            <div style="background-color: #fcebeb; padding: 15px; border-left: 4px solid #c0392b; margin-bottom: 20px;">
                <h4 style="color: #c0392b; margin-bottom: 5px; margin-top: 0;">Principes Universels Réussite :</h4>
                <ul>
                    <li><strong>HYDRATATION :</strong> 2-3L eau/jour minimum (climat chaud). Urine jaune clair = bien
                        hydraté.</li>
                    <li><strong>SOMMEIL :</strong> 7-8h/nuit minimum. Un manque de sommeil augmente le cortisol et favorise
                        le stockage des graisses.</li>
                    <li><strong>ZÉRO SEL AJOUTÉ :</strong> Supprimer le sel de table et les bouillons industriels. Utiliser
                        les épices locales pour le goût.</li>
                    <li><strong>DURABILITÉ :</strong> Ne pas viser un régime temporaire mais un style de vie permanent.
                        Accepter les écarts occasionnels et reprendre immédiatement.</li>
                </ul>
            </div>
        </div>
    @endif

    @if($show_weight_loss_over_10_cardio_extras)
        <div class="page-break"></div>
        <div class="section">
            <h1 style="color: #2c3e50; border-bottom: 2px solid #e74c3c;">CONSEILS GÉNÉRAUX TRANSVERSAUX (>10kg +
                Cardiovasculaire)</h1>

            <div class="highlight" style="border-left: 4px solid #e74c3c; margin-bottom: 20px;">
                <h2 style="color: #c0392b; margin-top: 0;">🛡️ PROTECTION CARDIO-VASCULAIRE</h2>
                <ul>
                    <li><strong>Lipides :</strong> Privilégier les graisses polyinsaturées (poissons gras localement
                        disponibles : sardines, maquereau). Limiter drastiquement l'huile de palme et les beurres.</li>
                    <li><strong>ZÉRO Friture :</strong> Ne jamais réutiliser les huiles de cuisson. Privilégier
                        systématiquement vapeur et grillé.</li>
                    <li><strong>Fibres solubles :</strong> Consommer quotidiennement des haricots, du niébé ou de l'avoine
                        pour aider à capturer le cholestérol alimentaire.</li>
                    <li><strong>Arrêt Alcool :</strong> L'alcool augmente les triglycérides et la tension artérielle. En
                        phase de perte importante (>10kg), l'abstinence est fortement recommandée.</li>
                </ul>
            </div>
        </div>
    @endif
</body>

</html>