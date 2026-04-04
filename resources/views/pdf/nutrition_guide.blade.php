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
            <p><strong>Niveau d'engagement :</strong> {{ $goals['niveau_changement'] }}</p>
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
                @if(!empty($item['recommandation']))
                    <div
                        style="margin-left: 15px; margin-top: 6px; padding: 8px 12px; background-color: #f0f7ff; border-left: 3px solid #3498db; border-radius: 3px; font-size: 11px; color: #2c3e50;">
                        <span style="font-weight: bold; color: #2980b9;">Recommandation :</span> {{ $item['recommandation'] }}
                    </div>
                @endif
            </div>
        @endforeach
    </div>

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
</body>

</html>