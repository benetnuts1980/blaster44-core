<!DOCTYPE html>
<html>
<body>

<h2>Bonjour {{ $reservation->customer_name }},</h2>

<p>
Votre demande de réservation a bien été enregistrée.
</p>

<ul>
    <li>Date : {{ $reservation->reservation_date->format('d/m/Y') }}</li>
    <li>Heure : {{ substr($reservation->start_time, 0, 5) }}</li>
    <li>Formule : {{ $reservation->formula->name }}</li>
    <li>Joueurs : {{ $reservation->players_count }}</li>
</ul>

<p>
Nous vous contacterons rapidement pour confirmer votre réservation.
</p>

<p>
À bientôt 🔫<br>
Blaster44
</p>

</body>
</html>