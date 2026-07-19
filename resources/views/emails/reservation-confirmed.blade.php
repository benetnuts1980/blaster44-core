<!DOCTYPE html>
<html>
<body>

<h2>Bonjour {{ $reservation->customer_name }},</h2>

<p>
Votre réservation Blaster44 est maintenant confirmée.
</p>

<ul>
    <li>📅 Date : {{ $reservation->reservation_date->format('d/m/Y') }}</li>
    <li>🕒 Heure : {{ substr($reservation->start_time, 0, 5) }}</li>
    <li>🎯 Formule : {{ $reservation->formula->name }}</li>
    <li>👥 Joueurs : {{ $reservation->players_count }}</li>
</ul>

<p>
📍 Adresse :
<br>
Rue de la Gazéification
<br>
7350 Thulin
</p>

<p>
À bientôt 🔫
<br>
L'équipe Blaster44
</p>

</body>
</html>