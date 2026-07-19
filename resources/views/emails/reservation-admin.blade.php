<!DOCTYPE html>
<html>
<body>

<h2>Nouvelle réservation Blaster44</h2>

<ul>
    <li>Nom : {{ $reservation->customer_name }}</li>
    <li>Téléphone : {{ $reservation->customer_phone }}</li>
    <li>Email : {{ $reservation->customer_email }}</li>
    <li>Date : {{ $reservation->reservation_date->format('d/m/Y') }}</li>
    <li>Heure : {{ substr($reservation->start_time, 0, 5) }}</li>
    <li>Formule : {{ $reservation->formula->name }}</li>
    <li>Joueurs : {{ $reservation->players_count }}</li>
</ul>

</body>
</html>