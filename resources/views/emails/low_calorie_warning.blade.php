<!DOCTYPE html>
<html>
<head>
    <title>Alerte Nutritionnelle</title>
</head>
<body>
    <p>Bonjour {{ $userName }},</p>
    <p>Nous vous remercions d’avoir utilisé l’application Healing Nutrition et d’avoir renseigné vos informations personnelles ainsi que votre objectif de changement de poids.</p>
    <p>Après analyse de vos données, notre système a identifié que votre apport calorique final calculé pour atteindre votre objectif est inférieur à la limite minimale recommandée pour votre sexe.</p>
    
    <h3>🔎 Détails de l’analyse :</h3>
    <ul>
        <li>Sexe : {{ $data['gender'] }}</li>
        <li>Objectif sélectionné : {{ $data['objectif'] }}</li>
        <li>TDEE (besoins énergétiques totaux) : {{ $data['tdee'] }} kcal/jour</li>
        <li>Déficit calorique choisi : {{ $data['deficit'] }} kcal/jour</li>
        <li>Apport calorique calculé : {{ $data['apport'] }} kcal/jour</li>
    </ul>

    <h3>⚠️ Seuil minimal recommandé :</h3>
    <ul>
        <li>Femme : 1200 kcal/jour</li>
        <li>Homme : 1500 kcal/jour</li>
    </ul>

    <p>D’après ces données, votre apport calorique est inférieur à {{ $threshold }} kcal/jour, ce qui pourrait compromettre votre santé et votre sécurité nutritionnelle.</p>

    <h3>✅ Action recommandée :</h3>
    <p>Pour garantir un suivi sécuritaire et efficace, nous vous recommandons de revoir votre déficit calorique choisi dans l’application par sélection d’un autre déficit.</p>
    <p>Une fois cette correction effectuée, notre système pourra recalculer automatiquement votre plan nutritionnel et générer un apport calorique adapté à votre profil et à vos objectifs.</p>
    
    <p>Nous vous remercions pour votre compréhension et restons à votre disposition pour toute information complémentaire.</p>
    <p>Cordialement,<br>
    L’équipe Healing Nutrition</p>
</body>
</html>
