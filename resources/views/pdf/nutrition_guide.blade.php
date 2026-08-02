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
        <h1 style="border: none;">PLAN NUTRITIONNEL PERSONNALISE – Obésité Modérée</h1>
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

        <h2>Répartition des macronutriments adaptée au patient</h2>
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
            <h2 style="color: #0da52e; border-bottom: 2px solid #3ce789; padding-bottom: 10px; font-size: 20px;">
                <i class="fas fa-heartbeat"></i>CONSEILS GÉNÉRAUX TRANSVERSAUX - AMÉLIORATION DE LA FORME PHYSIQUE (DIABÈTE DE TYPE 2)
            </h2>
            <div class="highlight" style="padding: 15px;">
                <ol style="line-height: 1.8;">
                    <li><strong>Individualisation :</strong> Adapter selon VOTRE niveau d'activité, préférences, contraintes
                    </li>
                    <li><strong>Progression :</strong> Changements graduels (pas révolution)</li>
                    <li><strong>Soutenabilité :</strong> Alimentation viable À VIE</li>
                    <li><strong>Activité physique :</strong> Non-négociable, quotidienne</li>
                    <li><strong>Sommeil :</strong> 7-8h (régulation hormonale)</li>
                    <li><strong>Gestion du stress :</strong> Techniques non alimentaires</li>
                    <li><strong>Suivi :</strong> Marqueurs de santé réguliers (glycémie, poids, tension)</li>
                    <li><strong>Soutien :</strong> Entourage</li>
                    <li><strong>Patience :</strong> Les résultats durables prennent du temps</li>
                </ol>
            </div>

            <h1>Surveillance médicale essentielle</h1>
            <div class="regulatory-box">
                <ul style="line-height: 1.8;">
                    <li>Consultation mensuelle les 3 premiers mois</li>
                    <li>Puis trimestrielle</li>
                    <li>Ajustements des médicaments selon l'évolution</li>
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
            <h2 style="color: #a50d0d; border-bottom: 2px solid #e73c3c; padding-bottom: 10px; font-size: 20px;">
                <i class="fas fa-heartbeat"></i>CONSEILS GÉNÉRAUX TRANSVERSAUX - AMÉLIORATION DE LA FORME PHYSIQUE (HYPERTENSION)
            </h2>
            <h3>Piliers Fondamentaux</h3>

            <div class="highlight" style="padding: 15px;">

                <ol style="line-height: 1.8;">

                    <li>
                        <strong>Nutrition adaptée :</strong>
                        Plans béninois culturellement pertinents, macronutriments optimisés selon l'activité.
                    </li>

                    <li>
                        <strong>Activité physique progressive :</strong>
                        De sédentaire à actif (150 à 300 min/semaine).
                    </li>

                    <li>
                        <strong>Sommeil réparateur :</strong>
                        7 à 9 h/nuit (régulation hormonale, récupération).
                    </li>

                    <li>
                        <strong>Gestion du stress :</strong>
                        Techniques de relaxation et alimentation consciente.
                    </li>

                    <li>
                        <strong>Suivi médical :</strong>
                        Réévaluation régulière.
                    </li>

                </ol>

            </div>

            <h3>Mindset Succès</h3>

            <div class="highlight" style="padding: 15px;">

                <ul style="line-height: 1.8;">

                    <li>
                        <strong>Progrès > Perfection :</strong>
                        Chaque petit changement compte.
                    </li>

                    <li>
                        <strong>Long terme :</strong>
                        Style de vie permanent, pas un régime temporaire.
                    </li>

                    <li>
                        <strong>Bienveillance :</strong>
                        Auto-compassion lors des rechutes (apprendre, pas culpabiliser).
                    </li>

                    <li>
                        <strong>Célébrations :</strong>
                        Reconnaître les victoires (poids, énergie, tension artérielle, performances).
                    </li>

                </ul>

                <h4 style="color: #16a085; margin-top: 20px;">
                    Rappels Critiques
                </h4>

                <ul style="line-height: 1.8;">

                    <li><strong>Sodium :</strong> &lt; 2000 mg/jour (HTA).</li>

                    <li><strong>Potassium :</strong> 3500 à 4700 mg/jour (protection cardiovasculaire).</li>

                    <li><strong>Fibres :</strong> 30 à 35 g/jour (satiété et santé intestinale).</li>

                    <li><strong>Hydratation :</strong> 2 à 2,5 L d'eau par jour.</li>

                    <li><strong>Activité physique :</strong> Quotidienne (non négociable).</li>

                    <li><strong>Médicaments :</strong> Adhésion stricte au traitement et consultations régulières.</li>

                    <li><strong>Surveillance :</strong> Poids hebdomadaire, tension artérielle 2 à 3 fois par semaine et analyses sanguines tous les 3 à 6 mois.</li>

                </ul>

                <p style="font-weight: bold; margin-top: 15px; text-align: center; font-size: 14px; color: #16a085;">

                    Vous avez toutes les connaissances et les outils nécessaires. Le succès dépend désormais de l'application constante, patiente et bienveillante de ces principes.

                    Bonne chance dans votre transformation vers une santé optimale ! 🌟

                </p>

            </div>

        </div>
    @endif

    @if($show_cardio_fitness_extras)
        <div class="page-break"></div>
        <div class="section">
            <h2 style="color: #2b89c0; border-bottom: 2px solid #3ca3e7; padding-bottom: 10px; font-size: 20px;">
                <i class="fas fa-heartbeat"></i>CONSEILS GÉNÉRAUX TRANSVERSAUX - AMÉLIORATION DE LA FORME PHYSIQUE (MALADIE CARDIOVASCULAIRE)
            </h2>
             <p>Indépendamment des réponses spécifiques, voici des conseils universels :</p>
            <div class="highlight" style="padding: 15px;">
                <ul style="line-height: 1.8;">
                    <li><strong>1. HYDRATATION</strong>
                        <ul>
                            <li>Objectif : 2-3L eau/jour (climat tropical béninois)</li>
                            <li>Timing : Un verre au réveil, avant chaque repas, pendant et après l'activité</li>
                            <li>Signes de déshydratation : Urine foncée, fatigue, maux de tête</li>
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
                            <li>Impliquer : Famille, amis dans la démarche</li>
                            <li>Groupes : Marche collective, sport en équipe</li>
                        </ul>
                    </li>
                    <li style="margin-top: 10px;"><strong>5. SUIVI ET AJUSTEMENTS</strong>
                        <ul>
                            <li>Pesée : Hebdomadaire, même jour, même heure, mêmes conditions</li>
                            <li>Mesures : Tour de taille, hanches, cuisses (mensuel)</li>
                            <li>Photos : Mensuel (progrès visibles)</li>
                            <li>Énergie/Bien-être : Suivi subjectif quotidien</li>
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
                CONSEILS GÉNÉRAUX TRANSVERSAUX - PERTE DE POIDS (&lt;5KG) & DIABÈTE DE TYPE 2 </h2>

                    <!-- Conseils Généraux -->
                    <div style="margin-top: 20px;">
                        <h3 style="color: #2c3e50;">CONSEILS TRANSVERSAUX</h3>

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
                            <li>Sucre ajouté dans les boissons</li>
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
                            <li><strong>Limiter les portions</strong> pour contrôler l'apport calorique total.</li>
                            <li><strong>Manger à heures fixes :</strong> Cela aide à stabiliser la glycémie, surtout en cas de
                                traitement par sulfonylurées ou insuline.</li>
                            <li><strong>Riche en fibres :</strong> Fruits (non sucrés), légumes, avoine, graines de chia –
                                cela aide à ralentir l'absorption du sucre.</li>
                            <li><strong>Limiter les graisses saturées et trans :</strong> Réduire les fritures, les viandes
                                grasses, le beurre.</li>
                            <li><strong>Favoriser les bonnes graisses :</strong> Avocat, huile d'olive, poissons gras
                                (sardines, maquereaux, saumon).</li>
                            <li><strong>Limiter l'alcool et boire suffisamment d'eau</strong> (surtout en cas de traitement par
                                inhibiteurs SGLT2).</li>
                        </ul>

                        <h4 style="color: #34495e; margin-bottom: 5px;">Activité physique :</h4>
                        <ul style="margin-top: 0;">
                            <li><strong>Objectif :</strong> au moins 150 minutes par semaine d'activité modérée (marche
                                rapide, vélo, natation…).</li>
                            <li><strong>Aide à :</strong>
                                <ul style="margin-top: 5px;">
                                    <li>Améliorer la sensibilité à l'insuline</li>
                                    <li>Perdre du poids progressivement</li>
                                    <li>Baisser la tension artérielle</li>
                                </ul>
                            </li>
                        </ul>

                        <h4 style="color: #34495e; margin-bottom: 5px;">Surveillance & traitement :</h4>
                        <ul style="margin-top: 0;">
                            <li>Surveiller sa glycémie régulièrement, surtout en cas de traitement hypoglycémiant.</li>
                            <li>Prendre ses médicaments correctement selon les indications.</li>
                            <li>Attention aux hypoglycémies en cas de traitement par insuline ou sulfonylurées.</li>
                            <li>Suivi médical régulier : Bilan sanguin, tension, complications possibles (yeux, reins,
                                pieds…).</li>
                        </ul>

                        <h4 style="color: #34495e; margin-bottom: 5px;">Conseils généraux :</h4>
                        <ul style="margin-top: 0;">
                            <li><strong>Bien dormir (7 à 9 h par nuit) :</strong> le manque de sommeil peut déséquilibrer la
                                glycémie.</li>
                            <li><strong>Réduire le stress :</strong> car il peut augmenter la glycémie (pratique :
                                respiration, méditation, marche…).</li>
                            <li><strong>Éviter l'automédication :</strong> surtout en cas de complications métaboliques ou
                                de prise de plusieurs médicaments.</li>
                        </ul>
                    </div>
        </div>
    @endif

    @if($show_weight_loss_under_5_hypertension_extras)
        <div class="page-break"></div>
        <div class="section">
            <h2 style="color: #c0392b; border-bottom: 2px solid #e74c3c; padding-bottom: 10px; font-size: 20px;">
                <i class="fas fa-heartbeat"></i> CONSEILS TRANSVERSAUX - PERTE DE POIDS (&lt;5KG) & HYPERTENSION
            </h2>

            <p style="font-size: 14px; margin-bottom: 20px;">Indépendamment de vos réponses spécifiques, voici des conseils
                universels essentiels :</p>

            <div style="background-color: #fcebeb; padding: 15px; border-left: 4px solid #c0392b; margin-bottom: 20px;">
                <h4 style="color: #c0392b; margin-bottom: 5px; margin-top: 0;">Principes Universels Tous Niveaux :</h4>
                <ul style="margin-top: 0;">
                    <li><strong>Hydratation :</strong> 2-3L eau/jour minimum (plus si activité/chaleur). Urine jaune clair =
                        bien hydraté.</li>
                    <li><strong>Sommeil :</strong> 7-8h/nuit minimum. Régularité des horaires et qualité prioritaire.</li>
                    <li><strong>Gestion du Stress :</strong> Techniques de relaxation, activité physique, soutien social. Ne
                        pas compenser par la nourriture.
                        <br>Soutien Social :
                        <ul>
                            <li>Informer la famille/les proches de la démarche</li>
                            <li>Demander du soutien</li>
                            <li>Éviter les saboteurs</li>
                            <li>Trouver un partenaire de motivation (ami, conjoint)</li>
                        </ul>
                        8. Mesures & Suivi : Hebdomadaire :
                        <ul>
                            <li>Poids (lundi matin)</li>
                            <li>Tour de taille</li>
                            <li>Noter l'alimentation et l'activité</li>
                        </ul>
                        Mensuel :
                        <ul>
                            <li>Photos (face, profil, dos)</li>
                            <li>Mesures (bras, cuisses, hanches)</li>
                            <li>Évaluation de l'énergie et du bien-être</li>
                        </ul>
                    </li>
                </ul>
            </div>

            <div style="margin-top: 20px;">
                <h4 style="color: #34495e; margin-bottom: 5px;">Ressources Béninoises (Aliments Locaux Excellents) :</h4>
                <ul style="margin-top: 0;">
                    <li><strong>Poissons :</strong> maquereau, sardines, tilapia, carpe</li>
                    <li><strong>Légumes :</strong> gombo, gboma, kpété, aubergines, tomates, carottes, chou</li>
                    <li><strong>Féculents à IG modéré :</strong> igname, patate douce, riz rouge, fonio</li>
                    <li><strong>Fruits :</strong> orange, papaye, banane, ananas, mangue (de saison)</li>
                    <li><strong>Légumineuses & Oléagineux :</strong> haricots rouges/blancs, pois, noix de cajou, arachides
                    </li>
                </ul>

                <h4 style="color: #34495e; margin-bottom: 5px;">Tisanes Santé Locales :</h4>
                <ul style="margin-top: 0;">
                    <li><strong>Kinkeliba :</strong> digestion, glycémie</li>
                    <li><strong>Bissap/hibiscus :</strong> tension artérielle, antioxydants</li>
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

    @if($show_weight_loss_under_5_cardio_extras)
        <div class="page-break"></div>
        <div class="section">
            <h2 style="color: #842bc0; border-bottom: 2px solid #7e3ce7; padding-bottom: 10px; font-size: 20px;">
                <i class="fas fa-heartbeat"></i>CONSEILS GÉNÉRAUX TRANSVERSAUX - PERTE DE POIDS (&lt;5KG) & MALADIE CARDIOVASCULAIRE
            </h2>

            <p style="font-size: 14px; margin-bottom: 20px;"> PRINCIPES ABSOLUS POUR OBÉSITÉ + MALADIE
                CARDIOVASCULAIRE</p>

            <div style="background-color: #fcebeb; padding: 15px; border-left: 4px solid #c0392b; margin-bottom: 20px;">
                <h4 style="color: #c0392b; margin-bottom: 5px; margin-top: 0;">1. SEL : &lt;5g/jour (idéalement &lt;2g si
                    hypertension sévère)</h4>
                <ul style="margin-top: 0;">
                    <li>Bannir : bouillons cubes, poissons trop fumés, sel de table</li>
                    <li>Remplacer par : épices, herbes, citron, gingembre, ail, oignon, piment</li>
                </ul>

                <h4 style="color: #c0392b; margin-bottom: 5px;">2. GRAISSES SATURÉES : Limiter drastiquement</h4>
                <ul style="margin-top: 0;">
                    <li>Limiter : huile de palme, viandes grasses, peau de volaille, fritures</li>
                    <li>Privilégier : huile d'olive, huile d'arachide (avec modération), poissons gras, avocat, noix</li>
                </ul>

                <h4 style="color: #c0392b; margin-bottom: 5px;">3. SUCRES SIMPLES : Éviter totalement</h4>
                <ul style="margin-top: 0;">
                    <li>Bannir : sucre ajouté, sodas, jus sucrés, pâtisseries, bonbons</li>
                    <li>Remplacer par : fruits frais entiers, eau, tisanes</li>
                </ul>

                <h4 style="color: #c0392b; margin-bottom: 5px;">4. FIBRES : Augmenter massivement (25-35g/jour)</h4>
                <ul style="margin-top: 0;">
                    <li>À CHAQUE repas : légumes verts en abondance</li>
                    <li>Privilégier : céréales complètes, légumineuses, fruits</li>
                </ul>

                <h4 style="color: #c0392b; margin-bottom: 5px;">5. HYDRATATION : 1,5-2L d'eau/jour</h4>
                <ul style="margin-top: 0;">
                    <li>Eau nature en priorité</li>
                    <li>Tisanes locales sans sucre</li>
                    <li>SURVEILLANCE RÉGULIÈRE
                        <ul>
                            <li>Poids : 1 fois par semaine (même jour, même heure, même tenue)</li>
                            <li>Tour de taille : 1 fois par mois</li>
                            <li>Tension artérielle : Selon recommandation médicale</li>
                            <li>Glycémie : Si diabétique, selon protocole médical</li>
                        </ul>
                    </li>
                </ul>
            </div>

            <div style="background-color: #ecf0f1; padding: 15px; border-radius: 5px; margin-top: 20px;">
                <h4 style="color: #2c3e50; margin-top: 0; text-align: center;">Message Final d'Encouragement</h4>
                <p style="font-style: italic; text-align: justify;">
                    Vous avez pris la décision de changer votre vie. C'est courageux et admirable. Le chemin ne sera pas
                    toujours facile, il y aura des hauts et des bas, mais chaque petit pas compte.
                </p>
                <p style="font-style: italic; text-align: justify;">
                    Rappelez-vous :
                </p>
                <ul>
                    <li>Vous ne faites pas ça pour être « parfait »</li>
                    <li>Vous le faites pour votre SANTÉ, votre ÉNERGIE, votre QUALITÉ DE VIE</li>
                    <li>Chaque kilo perdu réduit votre tension, améliore votre glycémie, protège votre cœur</li>
                    <li>Vous méritez de vous sentir bien dans votre corps</li>
                    <li>Vous êtes CAPABLE de réussir</li>
                </ul>
                <p style="font-weight: bold; margin-top: 15px; text-align: center; font-size: 14px; color: #16a085;">
                    Avancez à votre rythme, soyez bienveillant avec vous-même, et n'hésitez pas à demander de l'aide
                    quand cela est nécessaire. Vous pouvez le faire !
                </p>
            </div>
        </div>
    @endif

    @if($show_weight_loss_under_5_no_pathology_extras || $show_weight_loss_5_10_no_pathology_extras)

        <div class="page-break"></div>

        <div class="section">

            <h2 style="color: #27ae60; text-align: center; border-bottom: 2px solid #27ae60; padding-bottom: 10px;">
                CONSEILS GENERAUX TRANSVERSAUX 
                ({{ $show_weight_loss_under_5_no_pathology_extras ? 'Sans pathologie pour perte de poids < 5kg' : 'Sans pathologie pour perte de poids entre 5-10 kg' }})
            </h2>

            <div class="highlight" style="padding: 15px;">
                @if($show_weight_loss_under_5_no_pathology_extras)  

                    <h3 style="color: #16a085;">PRIORISATION DES ACTIONS</h3>

                    <ul>
                        <li>
                            <strong>Priorité 1 - Impact majeur sur la perte de poids :</strong>
                            <ol>
                                <li>Supprimer les boissons sucrées</li>
                                <li>Augmenter la consommation de légumes (5-7 portions/jour)</li>
                                <li>Initier ou augmenter l'activité physique</li>
                            </ol>
                        </li>

                        <li>
                            <strong>Priorité 2 - Santé globale :</strong>
                            <ul>
                                <li>Améliorer le sommeil (7-9h)</li>
                                <li>Gérer le stress sans recourir à la nourriture</li>
                                <li>Traiter l'apnée du sommeil si elle est présente</li>
                            </ul>
                        </li>

                        <li>
                            <strong>Priorité 3 - Optimisation :</strong>
                            <ul>
                                <li>Réduire le grignotage émotionnel</li>
                                <li>Écouter sa satiété</li>
                                <li>Réduire le temps passé assis</li>
                            </ul>
                        </li>
                    </ul>

                    <p>
                        <strong>Progression :</strong><br>
                        Semaine 1–2 : 1 à 2 changements<br>
                        Semaine 3–4 : Ajout progressif
                    </p>

                    <hr>

                    <h3 style="color: #16a085;">SUIVI</h3>

                    <ul>
                        <li>Pesée hebdomadaire</li>
                        <li>Tour de taille mensuel</li>
                        <li>Énergie et sommeil</li>
                        <li>Comportements alimentaires</li>
                    </ul>
                @elseif($show_weight_loss_5_10_no_pathology_extras)

                    <h3 style="color: #16a085;">PRINCIPES FONDAMENTAUX À RETENIR</h3>

                    <ol>
                        <li>Ce n'est pas un régime temporaire, c'est votre nouvelle vie</li>
                        <li>La perte de poids saine = 2-4 kg/mois (patience !)</li>
                        <li>Tous les aliments peuvent s'intégrer (portions, préparations adaptées)</li>
                        <li>L'échec n'existe pas, seulement des apprentissages</li>
                        <li>Demandez de l'aide (famille, amis)</li>
                        <li>Célébrez TOUTES les victoires (poids, énergie, vêtements, analyses...)</li>
                        <li>Soyez bienveillant envers vous-même</li>
                    </ol>

                    <h3 style="color: #16a085;">PROCHAINES ÉTAPES</h3>

                    <ol>
                        <li>Identifier votre niveau d'activité actuel</li>
                        <li>Commencer le plan alimentaire correspondant</li>
                        <li>Intégrer les adaptations personnalisées</li>
                        <li>Suivre la progression (poids, mesures, photos, bien-être)</li>
                        <li>Ajuster après 1 mois</li>
                        <li>Persévérer pendant au moins 3 mois</li>
                    </ol>

                    <hr>

                    <h3 style="color: #16a085;">MESSAGE FINAL</h3>

                    <p>
                        VOUS POUVEZ Y ARRIVER !
                    </p>

                    <p>
                        Des milliers de personnes réussissent chaque jour. Avec ce guide personnalisé, les aliments adaptés,
                        le soutien de vos proches et votre détermination, vous allez transformer votre santé et votre vie.
                    </p>

                    <p>
                        Chaque jour est une opportunité. Chaque repas est un choix. Passez à l'action !
                    </p>

                    <p>
                        💪 Bonne chance dans votre parcours de santé !
                    </p>

                @endif

            </div>
        </div>

    @endif

    @if($show_weight_loss_over_10_no_pathology_extras)
        <div class="page-break"></div>
        <div class="section">
            <h2 style="color: #2b89c0; border-bottom: 2px solid #3ca3e7; padding-bottom: 10px; font-size: 20px;">
                <i class="fas fa-heartbeat"></i>CONSEILS GÉNÉRAUX TRANSVERSAUX - SANS PATHOLOGIE (&gt;10 KG)
            </h2>
            <div class="highlight" style="padding: 15px;">
                <p>Félicitations d'avoir complété ce questionnaire ! Vous disposez maintenant d'un guide alimentaire complet
                    adapté à : votre niveau d'activité, vos antécédents médicaux, vos habitudes actuelles et votre contexte
                    béninois.</p>
                <h3 style="color: #2980b9;">PROCHAINES ÉTAPES :</h3>
                <ol style="line-height: 1.8;">
                    <li>Commencer progressivement (pas tout d'un coup)</li>
                    <li>Suivre vos progrès (poids, mesures, photos)</li>
                    <li>Ajuster selon les résultats (après 4 semaines)
                        <br>Patience, persévérance et permanence sont vos alliées !<br>
                        Bonne chance dans votre parcours vers une santé optimale !
                    </li>
                </ol>
            </div>
        </div>
    @endif

    @if($show_fitness_no_pathology_extras)

        <div class="page-break"></div>

        <div class="section">

            <h1 class="section-title">CONSEILS TRANVERSAUX GENERAUX - AMELIORATION DE LA FORME PHYSIQUE </h1>

            <div class="summary-box"
                style="background-color: #f9f9f9; padding: 20px; border: 1px solid #ddd; border-radius: 8px;">

                <h4 style="color: #27ae60; margin-top: 0;">Points clés à retenir :</h4>

                <ol style="line-height: 1.6;">

                    <li>
                        <strong>Adopter une alimentation équilibrée</strong><br>
                        Privilégier les aliments peu transformés.<br>
                        Consommer quotidiennement des légumes variés.<br>
                        Intégrer des fruits frais en quantité modérée.<br>
                        Choisir des céréales complètes (riz complet, pain complet, avoine, maïs complet).<br>
                        Privilégier les protéines maigres (poisson, poulet sans peau, œufs, légumineuses).<br>
                        Réduire la consommation d'aliments riches en sucres ajoutés.<br>
                        Limiter les aliments riches en graisses saturées et en graisses trans.<br>
                        Éviter les repas trop copieux.
                    </li>

                    <li>
                        <strong>Contrôler les portions alimentaires</strong><br>
                        Utiliser des assiettes de taille modérée.<br>
                        Manger lentement.<br>
                        Respecter les sensations de faim et de satiété.<br>
                        Éviter de se resservir systématiquement.<br>
                        Éviter de manger devant la télévision ou le téléphone.
                    </li>

                    <li>
                        <strong>Structurer les repas</strong><br>
                        Maintenir des horaires de repas réguliers.<br>
                        Éviter de sauter des repas.<br>
                        Prendre un petit-déjeuner équilibré.<br>
                        Prévoir des collations saines si nécessaire.
                    </li>

                    <li>
                        <strong>S'hydrater correctement</strong><br>
                        Boire suffisamment d'eau tout au long de la journée.<br>
                        Privilégier l'eau comme boisson principale.<br>
                        Limiter les boissons sucrées (sodas, jus industriels, boissons énergisantes).<br>
                        Réduire la consommation d'alcool.
                    </li>

                    <li>
                        <strong>Augmenter progressivement l'activité physique</strong><br>
                        Pratiquer une activité physique adaptée à ses capacités :<br>
                        Marche rapide.<br>
                        Vélo.<br>
                        Natation.<br>
                        Danse.<br>
                        Exercices de renforcement musculaire légers.<br><br>

                        Objectif :<br>
                        Au moins 150 minutes d'activité physique modérée par semaine.<br>
                        Répartir les séances sur plusieurs jours.<br>
                        Réduire le temps passé assis.
                    </li>

                    <li>
                        <strong>Améliorer la qualité du sommeil</strong><br>
                        Dormir entre 7 et 9 heures par nuit.<br>
                        Maintenir des horaires de coucher réguliers.<br>
                        Limiter l'utilisation des écrans avant le coucher.<br>
                        Créer un environnement propice au sommeil.
                    </li>

                    <li>
                        <strong>Gérer le stress</strong><br>
                        Identifier les situations de stress.<br>
                        Pratiquer des techniques de relaxation.<br>
                        Faire des exercices de respiration.<br>
                        Pratiquer une activité agréable et régulière.<br>
                        Éviter de compenser le stress par la nourriture.
                    </li>

                    <li>
                        <strong>Adopter des objectifs réalistes</strong><br>
                        Éviter les régimes très restrictifs.<br>
                        Privilégier des changements durables des habitudes de vie.<br>
                        Se concentrer sur les progrès plutôt que sur la rapidité des résultats.
                    </li>

                    <li>
                        <strong>Surveiller régulièrement son évolution</strong><br><br>

                        Suivre périodiquement :<br>
                        Le poids.<br>
                        Le tour de taille.<br>
                        L'indice de masse corporelle (IMC).<br>
                        Le niveau d'activité physique.
                    </li>

                    <li>
                        <strong>Prévenir l'apparition des maladies chroniques</strong><br><br>

                        Même en l'absence d'antécédents pathologiques :<br>
                        Effectuer des bilans de santé réguliers.<br>
                        Contrôler la glycémie selon les recommandations médicales.<br>
                        Surveiller la tension artérielle.<br>
                        Vérifier périodiquement le bilan lipidique (cholestérol et triglycérides).
                    </li>

                </ol>

            </div>

            <p class="final-encouragement"
                style="background-color: #f1f8e9; padding: 15px; border-left: 5px solid #4caf50; font-style: italic; margin-top: 20px;">

                Votre transformation n'est pas un sprint, c'est un marathon. Chaque petit changement quotidien est une
                victoire vers une meilleure santé.

            </p>

        </div>

    @endif

    @if($show_weight_loss_5_10_diabetes_extras)
        <div class="page-break"></div>
        <div class="section">
                <h2 style="color: #2b89c0; border-bottom: 2px solid #3ca3e7; padding-bottom: 10px; font-size: 20px;">
                <i class="fas fa-heartbeat"></i>CONSEILS GÉNÉRAUX TRANSVERSAUX - PERTE DE POIDS (5-10kg + Diabète de type 2)
                </h2>

            <div class="highlight" style="border-left: 4px solid #e67e22; margin-bottom: 20px;">
                <h2 style="color: #d35400; margin-top: 0;">HYDRATATION</h2>
                <p><strong>Objectif :</strong> 2-3L/jour (climat chaud du Bénin)</p>
                <p><strong>Répartition :</strong></p>
                <ul>
                    <li><strong>Réveil :</strong> 500ml d'eau tiède citronnée</li>
                    <li><strong>Entre les repas :</strong> 1,5-2L</li>
                    <li><strong>Pendant le repas :</strong> 200ml maximum (pour ne pas noyer la digestion)</li>
                    <li><strong>Avant le coucher :</strong> 200ml (pas trop, pour éviter les réveils nocturnes)</li>
                </ul>
                <p><strong>Signes de déshydratation :</strong> urine foncée, bouche sèche, fatigue, maux de tête, constipation
                </p>
                <p><strong>Boissons à privilégier :</strong> eau pure, bissap sans sucre, eau citronnée/gingembre, infusions
                    (citronnelle, menthe), thé vert (avec modération)</p>
                <p><strong>À limiter/éviter :</strong> sodas (jamais), jus industriels (jamais), alcool (occasionnel
                    uniquement), café (2 tasses maximum par jour, avant 14h)</p>
            </div>
        </div>
    @endif

    @if($show_weight_loss_5_10_hypertension_extras)
        <div class="page-break"></div>
        <div class="section">
                <h2 style="color: #2b89c0; border-bottom: 2px solid #3ca3e7; padding-bottom: 10px; font-size: 20px;">
                <i class="fas fa-heartbeat"></i>CONSEILS GÉNÉRAUX TRANSVERSAUX - PERTE DE POIDS (5-10kg + Hypertension)
                </h2>
            <div class="highlight" style="border-left: 4px solid #2980b9;">
                <h2 style="color: #2471a3; margin-top: 0;">PRINCIPES CLÉS DE RÉUSSITE</h2>
                <ul>
                    <li><strong>PROGRESSIVITÉ :</strong> Changements graduels (1-2 nouvelles habitudes/semaine). Intensification progressive de l'activité physique. Patience (les résultats durables se comptent en
                        mois, pas en jours).</li>
                    <li><strong>PERSONNALISATION :</strong> Adapter selon les réponses au questionnaire. Écouter son corps (signaux de
                        faim, satiété, fatigue). Ajuster si les résultats stagnent ou régressent. Pas de solution unique valable pour tous.</li>
                    <li><strong>DURABILITÉ :</strong> Mode de vie PERMANENT (pas un régime temporaire). Plaisir alimentaire
                        préservé (culture, goût). Aliments locaux accessibles économiquement. Soutenabilité sociale
                        (famille, amis).</li>
                    <li><strong>GLOBALITÉ :</strong> Nutrition + Activité + Sommeil + Stress + Social. Tous ces éléments sont interconnectés.
                        Négliger l'un d'eux limite les résultats globaux.</li>
                </ul>
            </div>
        </div>
    @endif

    @if($show_weight_loss_5_10_cardio_extras)
    <div class="page-break"></div>
    <div class="section">
        <h1 style="color: #2c3e50; border-bottom: 2px solid #e74c3c;">
            CONSEILS GÉNÉRAUX TRANSVERSAUX - PERTE DE POIDS (5-10kg + MALADIE CARDIOVASCULAIRE)
        </h1>
        <div class="highlight" style="border-left: 4px solid #e74c3c; margin-bottom: 20px;">

            <h2 style="color: #c0392b; margin-top: 0;">💧 HYDRATATION</h2>
            <ul>
                <li><strong>Minimum :</strong> 1,5 à 2 L d'eau par jour.</li>
                <li><strong>Augmenter les apports :</strong> en cas de chaleur, d'activité physique ou d'allaitement.</li>
                <li><strong>Signes de déshydratation :</strong> urine foncée, soif, fatigue, maux de tête.</li>
                <li><strong>Privilégier :</strong> eau plate, eau citronnée, tisanes sans sucre.</li>
                <li><strong>Limiter :</strong> café (2 tasses maximum par jour) et thé fort.</li>
            </ul>

            <h2 style="color: #c0392b; margin-top: 20px;">🥗 PRÉPARATIONS CULINAIRES</h2>
            <ul>
                <li><strong>Cuissons santé :</strong> bouilli, vapeur, grillé, braisé, en sauce légère.</li>
                <li><strong>Éviter :</strong> friture, huiles réutilisées et graisses brûlées.</li>
                <li><strong>Aromates béninois :</strong> ail, gingembre, piment, oignon, basilic africain, poivre, citron, vinaigre et tomate fraîche.</li>
                <li><strong>Sel :</strong> ZÉRO sel ajouté (les aromates compensent naturellement).</li>
            </ul>

            <h2 style="color: #c0392b; margin-top: 20px;">🎉 VIE SOCIALE</h2>
            <ul>
                <li><strong>Cérémonies et fêtes :</strong> manger avant d'y aller, choisir des options saines, prendre de petites portions et refuser poliment les excès.</li>
                <li><strong>Restaurant :</strong> demander des préparations sans sel ou avec peu d'huile, partager un plat et prendre une salade en entrée.</li>
            </ul>

            <h2 style="color: #c0392b; margin-top: 20px;">📊 SUIVI DES PROGRÈS</h2>
            <ul>
                <li><strong>Pesée :</strong> une fois par semaine, le même jour, à la même heure et avec la même balance.</li>
                <li><strong>Mesures :</strong> tour de taille mensuel (objectif : &lt; 102 cm chez l'homme et &gt; 88 cm chez la femme).</li>
                <li><strong>Journal alimentaire :</strong> une semaine par mois pour rester vigilant.</li>
                <li><strong>Bilan médical :</strong> contrôler la tension, la glycémie et le cholestérol tous les 3 à 6 mois.</li>
            </ul>

            <h2 style="color: #c0392b; margin-top: 20px;">🤝 SOUTIEN</h2>
            <ul>
                <li><strong>Impliquer la famille :</strong> partager des repas sains et s'encourager mutuellement.</li>
                <li><strong>Groupe de soutien :</strong> partager les expériences et maintenir la motivation.</li>
            </ul>

            <h2 style="color: #c0392b; margin-top: 20px;">🎯 MOTIVATION À LONG TERME</h2>
            <ul>
                <li><strong>Objectifs SMART :</strong> Spécifiques, Mesurables, Atteignables, Réalistes et Temporels.</li>
                <li><strong>Exemple :</strong> « Perdre 2 kg en 1 mois » plutôt que « maigrir ».</li>
                <li><strong>Célébrer les victoires :</strong> chaque kilo perdu et chaque habitude acquise.</li>
                <li><strong>Bienveillance :</strong> les rechutes sont normales, reprenez sans culpabilité.</li>
                <li><strong>Visualiser les bénéfices :</strong> meilleure santé, vêtements mieux ajustés et davantage d'énergie.</li>
            </ul>

            <h2 style="color: #c0392b; margin-top: 20px;">✅ RÉSUMÉ DES CLÉS DU SUCCÈS</h2>
            <ol>
                <li><strong>Alimentation :</strong> portions contrôlées, légumes en quantité, cuissons saines, ZÉRO sel ajouté et limitation des sucres et des graisses.</li>
                <li><strong>Activité physique :</strong> minimum 150 minutes d'activité modérée par semaine.</li>
                <li><strong>Sommeil :</strong> 7 à 9 heures de sommeil de qualité par nuit.</li>
                <li><strong>Stress :</strong> privilégier des stratégies de gestion autres que l'alimentation.</li>
                <li><strong>Hydratation :</strong> 1,5 à 2 L d'eau par jour.</li>
                <li><strong>Suivi :</strong> suivi médical régulier et ajustements progressifs.</li>
                <li><strong>Durabilité :</strong> changements progressifs, plaisir préservé et vie sociale maintenue.</li>
            </ol>

            <h2 style="color: #c0392b; margin-top: 20px;">💙 MESSAGE FINAL D'ENCOURAGEMENT</h2>

            <p>
                Vous avez pris la décision de changer votre vie. C'est courageux et admirable.
                Le chemin ne sera pas toujours facile, il y aura des hauts et des bas, mais chaque petit pas compte.
            </p>

            <p><strong>Rappelez-vous :</strong></p>

            <ul>
                <li>Vous ne faites pas cela pour être « parfait ».</li>
                <li>Vous le faites pour votre <strong>SANTÉ</strong>, votre <strong>ÉNERGIE</strong> et votre <strong>QUALITÉ DE VIE</strong>.</li>
                <li>Chaque kilo perdu réduit votre tension, améliore votre glycémie et protège votre cœur.</li>
                <li>Vous méritez de vous sentir bien dans votre corps.</li>
                <li>Vous êtes <strong>CAPABLE</strong> de réussir.</li>
            </ul>

            <p>
                Avancez à votre rythme, soyez bienveillant avec vous-même et n'hésitez pas à demander de l'aide lorsque cela est nécessaire.
            </p>

            <p><strong>Vous pouvez le faire !</strong></p>

        </div>
    </div>
    @endif

    @if($show_weight_loss_over_10_diabetes_extras)
        <div class="page-break"></div>
        <div class="section">
            <h1 style="color: #2c3e50; border-bottom: 2px solid #27ae60;">CONSEILS TRANSVERSAUX (Profil Perte &gt;10kg +
                Diabète)</h1>

            <div class="highlight" style="border-left: 4px solid #27ae60; margin-bottom: 20px;">
                <h2 style="color: #1e8449; margin-top: 0;">Aliments à privilégier :</h2>
                <ul>
                    <li><strong>Protéines :</strong> Poissons locaux, légumineuses, œufs</li>
                    <li><strong>Glucides :</strong> Fonio, igname, patate douce, riz local complet</li>
                    <li><strong>Légumes :</strong> Épinards, okra, gombo, tomates, aubergines locales</li>
                    <li><strong>Fruits :</strong> Mangue verte, papaye, oranges locales (avec modération)</li>
                </ul>
                <h2 style="color: #1e8449; margin-top: 20px;">Préparations à éviter/limiter :</h2>
                <ul>
                    <li>Fritures excessives</li>
                    <li>Sucre ajouté dans les boissons</li>
                    <li>Sel en excès</li>
                    <li>Portions trop importantes</li>
                </ul>
                <h2 style="color: #1e8449; margin-top: 20px;">Techniques de cuisson recommandées :</h2>
                <ul>
                    <li>Cuisson vapeur</li>
                    <li>Grillades</li>
                    <li>Mijotés avec peu d'huile</li>
                    <li>Préparations en papillote</li>
                </ul>
                <h2 style="color: #1e8449; margin-top: 20px;">Hydratation :</h2>
                <ul>
                    <li>2-3L d'eau/jour</li>
                    <li>Tisanes locales sans sucre</li>
                    <li>Eau de coco occasionnellement</li>
                    <li>Bissap sans sucre ajouté</li>
                </ul>
                <h2 style="color: #1e8449; margin-top: 20px;">Conseils nutritionnels :</h2>
                <ul>
                    <li><strong>Réduire les sucres rapides :</strong> Éviter les sodas, pâtisseries, confiseries, pain
                        blanc.</li>
                    <li><strong>Privilégier les glucides complexes :</strong> Consommer du riz complet, des
                        légumineuses, du pain complet, etc.</li>
                    <li><strong>Limiter les portions</strong> pour contrôler l'apport calorique total.</li>
                    <li><strong>Manger à heures fixes :</strong> Cela aide à stabiliser la glycémie, surtout en cas de
                        traitement par sulfonylurées ou insuline.</li>
                    <li><strong>Riche en fibres :</strong> Fruits (non sucrés), légumes, avoine, graines de chia – cela
                        aide à ralentir l'absorption du sucre.</li>
                    <li><strong>Limiter les graisses saturées et trans :</strong> Réduire les fritures, les viandes
                        grasses, le beurre.</li>
                    <li><strong>Favoriser les bonnes graisses :</strong> Avocat, huile d'olive, poissons gras (sardines,
                        maquereaux, saumon).</li>
                    <li><strong>Limiter l'alcool et boire suffisamment d'eau</strong> (surtout en cas de traitement par
                        inhibiteurs SGLT2).</li>
                </ul>
                <h2 style="color: #1e8449; margin-top: 20px;">Activité physique :</h2>
                <ul>
                    <li><strong>Objectif :</strong> au moins 150 minutes par semaine d'activité modérée (marche rapide,
                        vélo, natation…).</li>
                    <li><strong>Aide à :</strong>
                        <ul>
                            <li>Améliorer la sensibilité à l'insuline</li>
                            <li>Perdre du poids progressivement</li>
                            <li>Baisser la tension artérielle</li>
                        </ul>
                    </li>
                </ul>
                <h2 style="color: #1e8449; margin-top: 20px;">Surveillance & traitement :</h2>
                <ul>
                    <li>Surveiller sa glycémie régulièrement, surtout en cas de traitement hypoglycémiant.</li>
                    <li>Prendre ses médicaments correctement selon les indications.</li>
                    <li>Attention aux hypoglycémies en cas de traitement par insuline ou sulfonylurées.</li>
                    <li>Suivi médical régulier : Bilan sanguin, tension, complications possibles (yeux, reins,
                        pieds…).</li>
                </ul>
                <h2 style="color: #1e8449; margin-top: 20px;">Conseils généraux :</h2>
                <ul>
                    <li><strong>Bien dormir (7 à 9 h par nuit) :</strong> le manque de sommeil peut déséquilibrer la
                        glycémie.</li>
                    <li><strong>Réduire le stress</strong>, car il peut augmenter la glycémie (pratique : respiration,
                        méditation, marche…).</li>
                    <li><strong>Éviter l'automédication</strong>, surtout en cas de complications métaboliques ou de
                        prise de plusieurs médicaments.</li>
                </ul>
            </div>
        </div>
    @endif

    @if($show_weight_loss_over_10_hypertension_extras)
        <div class="page-break"></div>
        <div class="section">
            <h2 style="color: #c0392b; border-bottom: 2px solid #e74c3c; padding-bottom: 10px; font-size: 20px;">
                <i class="fas fa-heartbeat"></i> CONSEILS GENERAUX TRANSVERSAUX (&gt;10kg + HYPERTENSION)
            </h2>
            <div style="background-color: #fcebeb; padding: 15px; border-left: 4px solid #c0392b; margin-bottom: 20px;">
                <h4 style="color: #c0392b; margin-bottom: 5px; margin-top: 0;">Principes Universels Tous Niveaux/Situations :</h4>
                <ol>
                    <li><strong>Hydratation :</strong>
                        <ul>
                            <li>2-3L eau/jour minimum</li>
                            <li>Plus si activité/chaleur</li>
                            <li>Urine jaune clair = bien hydraté</li>
                        </ul>
                    </li>
                    <li><strong>Sommeil :</strong>
                        <ul>
                            <li>7-8h/nuit minimum</li>
                            <li>Régularité des horaires</li>
                            <li>Qualité prioritaire</li>
                        </ul>
                    </li>
                    <li><strong>Gestion du Stress :</strong>
                        <ul>
                            <li>Techniques de relaxation</li>
                            <li>Activité physique</li>
                            <li>Soutien social</li>
                            <li>Pas de compensation alimentaire</li>
                        </ul>
                    </li>
                    <li><strong>Suivi Médical :</strong>
                        <ul>
                            <li>Bilan sanguin tous les 6 mois</li>
                            <li>Ajustement des médicaments si nécessaire</li>
                            <li>Communication avec le médecin sur les changements alimentaires</li>
                        </ul>
                    </li>
                    <li><strong>Patience & Réalisme :</strong>
                        <ul>
                            <li>Se concentrer sur la santé, pas seulement sur le poids</li>
                            <li>Célébrer les victoires hors poids (énergie, tension baissée, vêtements, mobilité)</li>
                        </ul>
                    </li>
                    <li><strong>Soutien Social :</strong>
                        <ul>
                            <li>Informer la famille/les proches de la démarche</li>
                            <li>Demander du soutien</li>
                            <li>Éviter les saboteurs</li>
                            <li>Trouver un partenaire de motivation (ami, conjoint)</li>
                        </ul>
                    </li>
                </ol>
                8. Mesures & Suivi : Hebdomadaire :
                <ul>
                    <li>Poids (lundi matin)</li>
                    <li>Tour de taille</li>
                    <li>Noter l'alimentation et l'activité</li>
                </ul>
                Mensuel :
                <ul>
                    <li>Photos (face, profil, dos)</li>
                    <li>Mesures (bras, cuisses, hanches)</li>
                    <li>Évaluation de l'énergie et du bien-être</li>
                </ul>
                <h4 style="color: #c0392b; margin-bottom: 5px;">Ressources Béninoises :</h4>
                <p><strong>Aliments Locaux Excellents :</strong></p>
                <ul>
                    <li>Poissons : maquereau, sardines, tilapia, carpe</li>
                    <li>Légumes : gombo, gboma, kpété, aubergines, tomates, carottes, chou</li>
                    <li>Féculents à IG modéré : igname, patate douce, riz rouge, fonio</li>
                    <li>Fruits : orange, papaye, banane, ananas, mangue (de saison)</li>
                    <li>Légumineuses : haricots rouges/blancs, pois</li>
                    <li>Oléagineux : noix de cajou, arachides</li>
                </ul>
                <p><strong>Activités Gratuites :</strong></p>
                <ul>
                    <li>Marche dans les quartiers/sur les plages</li>
                    <li>Danse sur de la musique locale</li>
                    <li>Exercices à la maison</li>
                    <li>Travaux ménagers actifs</li>
                </ul>
                <p><strong>Tisanes Santé Locales :</strong></p>
                <ul>
                    <li>Kinkeliba (digestion, glycémie)</li>
                    <li>Bissap/hibiscus (tension artérielle, antioxydants)</li>
                    <li>Gingembre (anti-inflammatoire, digestion)</li>
                    <li>Citronnelle (relaxation)</li>
                </ul>
            </div>
        </div>
    @endif

    @if($show_weight_loss_over_10_cardio_extras)
        <div class="page-break"></div>
        <div class="section">
            <h1 style="color: #2c3e50; border-bottom: 2px solid #e74c3c;">CONSEILS GÉNÉRAUX TRANSVERSAUX (&gt;10kg + MALADIE CARDIOVASCULAIRE)</h1>
            <div class="highlight" style="border-left: 4px solid #e74c3c; margin-bottom: 20px;">
                <h2 style="color: #c0392b; margin-top: 0;">Hydratation :</h2>
                <ul>
                    <li>Minimum 1,5-2L d'eau/jour</li>
                    <li>Augmenter en cas de chaleur, d'activité physique, d'allaitement</li>
                    <li>Signes de déshydratation : urine foncée, soif, fatigue, maux de tête</li>
                    <li>Privilégier : eau plate, eau citronnée, tisanes sans sucre</li>
                    <li>Limiter : café (2 tasses maximum), thé fort</li>
                </ul>
                <h2 style="color: #c0392b; margin-top: 20px;">Vie sociale :</h2>
                <ul>
                    <li><strong>Cérémonies/fêtes :</strong> Manger avant d'y aller (évite la fringale), choisir des options
                        saines, prendre de petites portions, refuser poliment les excès</li>
                    <li><strong>Restaurant :</strong> Demander des préparations sans sel/avec peu d'huile, partager un plat, salade en
                        entrée</li>
                </ul>
                <h2 style="color: #c0392b; margin-top: 20px;">Suivi des progrès :</h2>
                <ul>
                    <li><strong>Pesée :</strong> 1 fois par semaine, même jour/heure, même balance</li>
                    <li><strong>Mesures :</strong> Tour de taille (mensuel) - objectif &lt;102 cm chez l'homme, &lt;88 cm chez la femme</li>
                    <li><strong>Journal alimentaire :</strong> 1 semaine par mois pour rester vigilant</li>
                    <li><strong>Bilan médical :</strong> Tension, glycémie, cholestérol tous les 3-6 mois</li>
                </ul>
                <h2 style="color: #c0392b; margin-top: 20px;">Soutien :</h2>
                <ul>
                    <li><strong>Impliquer la famille :</strong> Repas communs sains, encouragements</li>
                    <li><strong>Groupe de soutien :</strong> Partage d'expériences, motivation</li>
                    <li><strong>Professionnel :</strong> Diététicien, psychologue si difficultés</li>
                </ul>
                <h2 style="color: #c0392b; margin-top: 20px;">Motivation à long terme :</h2>
                <ul>
                    <li><strong>Objectifs SMART :</strong> Spécifiques, Mesurables, Atteignables, Réalistes,
                        Temporels</li>
                    <li>Ex : « Perdre 2 kg en 1 mois » plutôt que « maigrir »</li>
                    <li><strong>Célébrer les victoires :</strong> chaque kilo perdu, chaque habitude acquise</li>
                    <li><strong>Bienveillance :</strong> les rechutes sont normales, reprendre sans culpabilité</li>
                    <li><strong>Visualiser :</strong> santé améliorée, vêtements mieux ajustés, davantage d'énergie</li>
                </ul>
                <h2 style="color: #c0392b; margin-top: 20px;">RÉSUMÉ DES CLÉS DU SUCCÈS</h2>
                <ol>
                    <li><strong>Alimentation :</strong> Portions contrôlées, légumes ++, cuissons saines, ZÉRO sel
                        ajouté, limitation des sucres/graisses</li>
                    <li><strong>Activité :</strong> Minimum 150 min/semaine d'activité modérée</li>
                    <li><strong>Sommeil :</strong> 7-9h/nuit de qualité</li>
                    <li><strong>Stress :</strong> Stratégies de gestion alternatives (pas alimentaires)</li>
                    <li><strong>Hydratation :</strong> 1,5-2L/jour</li>
                    <li><strong>Durabilité :</strong> Changements progressifs, plaisir préservé, vie sociale
                        maintenue</li>
                </ol>
            </div>
        </div>
    @endif

    <div class="page-break"></div>

    <!-- 5. Guide Alimentaire 60 Jours -->
    <div class="section">
        <h1>Guide Alimentaire sur 60 Jours</h1>
        <p>Ce plan est conçu pour être suivi sur 2 mois. Il respecte vos besoins caloriques et vos préférences.</p>

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
                                    <div style="margin-bottom: 6px;">
                                        - {{ $item['nom'] ?? 'N/A' }} ({{ $item['portion_recommandee'] ?? '' }})
                                        @if(!empty($item['details']))
                                            <div class="note" style="margin-left: 10px;">{{ $item['details'] }}</div>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                            <div class="info-cell">
                                <div class="meal-title">Déjeuner</div>
                                @if(isset($day['repas']['Déjeuner']))
                                    @foreach($day['repas']['Déjeuner'] as $item)
                                        <div style="margin-bottom: 6px;">
                                            - {{ $item['nom'] ?? 'N/A' }} ({{ $item['portion_recommandee'] ?? '' }})
                                            @if(!empty($item['details']))
                                                <div class="note" style="margin-left: 10px;">{{ $item['details'] }}</div>
                                            @endif
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="info-row">
                            <div class="info-cell">
                                <div class="meal-title">Collation(s)</div>
                                @if(!empty($day['collations']))
                                    @foreach($day['collations'] as $item)
                                        <div style="margin-bottom: 6px;">
                                            - {{ $item['nom'] ?? 'N/A' }} ({{ $item['portion'] ?? 'Standard' }})
                                            @if(!empty($item['details']))
                                                <div class="note" style="margin-left: 10px;">{{ $item['details'] }}</div>
                                            @endif
                                        </div>
                                    @endforeach
                                @else
                                    <div>Aucune</div>
                                @endif
                            </div>
                            <div class="info-cell">
                                <div class="meal-title">Dîner</div>
                                @if(isset($day['repas']['Dîner']))
                                    @foreach($day['repas']['Dîner'] as $item)
                                        <div style="margin-bottom: 6px;">
                                            - {{ $item['nom'] ?? 'N/A' }} ({{ $item['portion_recommandee'] ?? '' }})
                                            @if(!empty($item['details']))
                                                <div class="note" style="margin-left: 10px;">{{ $item['details'] }}</div>
                                            @endif
                                        </div>
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
                <li>Le plan nutritionnel proposé est prévu pour une durée maximale de deux mois, soit 60 jours.</li>
                <li>Ce plan nutritionnel ne remplace pas un suivi professionnel, car étant un plan sans suivi,
                    il a été conçu pour renforcer votre autonomie, vous proposer une alimentation basée sur vos ressources
                    locales et culturelles, et accroître votre motivation personnelle.
                </li>
                <li>Pour les personnes ayant des antécédents médicaux et prenant des médicaments, n'arrêtez jamais votre
                    traitement. Continuez de suivre votre prescription tout en respectant nos recommandations. En cas de
                    problème entre le guide alimentaire et vos prescriptions, veuillez consulter votre médecin traitant.
                </li>
                <li>Pour pouvoir suivre le guide alimentaire proposé en fonction de vos données personnelles, appuyées par
                    l'ensemble du système de Healing Nutrition, vous devez utiliser un outil de pesée alimentaire, comme
                    une balance alimentaire. Le cas échéant, vous pouvez utiliser la technique des mesures domestiques
                    approximatives.</li>
                <li>Les valeurs nutritionnelles sont basées sur des aliments crus, sauf indication contraire.</li>
                <li>Les valeurs nutritionnelles indiquées dans ce guide sont basées sur le poids des aliments crus (sauf
                    mention explicite). Pour les aliments cuits, la cuisson modifie le poids sans changer le contenu
                    énergétique : il faut donc ajuster la portion en fonction du poids cru.</li>
                <li>Suivez scrupuleusement le plan nutritionnel et respectez les recommandations nutritionnelles
                    indiquées dans le guide alimentaire personnalisé ainsi que les recommandations du système faisant
                    suite à vos réponses aux questions.</li>
                <li>Certaines recommandations du système faisant suite à vos réponses aux questions peuvent inclure des
                    propositions de repas journaliers. Ces repas ont un rôle éducatif et illustratif : l'utilisateur
                    n'est pas tenu de les suivre. La validité du plan nutritionnel repose sur le respect des apports
                    journaliers en macronutriments définis dans le guide alimentaire et les recommandations du système
                    faisant suite aux réponses obtenues aux questions.</li>
                <li>Les repas journaliers inclus dans certaines recommandations ne conditionnent pas la pertinence du
                    plan nutritionnel. L'essentiel est de respecter les apports en protéines, glucides et lipides
                    définis pour chaque jour dans le guide alimentaire personnalisé.</li>
                <li>Les vidéos proposées ne correspondent pas toutes exactement à chaque repas, mais elles aident à comprendre la
                    préparation des aliments, y compris les plus complexes. Il peut être nécessaire de compléter ces
                    informations par des recherches personnelles plus spécifiques.</li>
                <li>Pour les collations indiquées dans le guide alimentaire, suivez les instructions selon votre niveau
                    d'activité :
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
    <p class="note" style="margin-top: 10px;">Note : Les vidéos ne correspondent pas forcément à 100 % de votre menu
        exact, mais elles sont essentielles pour comprendre les techniques de préparation recommandées par notre
        système.</p>
    </div>
</body>

</html>