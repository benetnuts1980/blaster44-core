<!DOCTYPE html>
<html>
<body style="margin:0; padding:0; background:#0A0A0A; font-family:Arial, sans-serif; color:#ffffff;">

<div style="max-width:650px; margin:0 auto; padding:30px 20px;">

    <div style="background:#111111; border-radius:20px; padding:30px;">

        <h1 style="margin-top:0; color:#a3e635;">
            🔫 Blaster44
        </h1>

        <h2 style="color:#ffffff;">
            Bonjour {{ $reservation->customer_name }},
        </h2>

        <p style="color:#cccccc; line-height:1.6;">
            Votre demande de réservation a bien été enregistrée.
        </p>


        {{-- RÉSERVATION --}}
        <div style="background:#000000; border-radius:15px; padding:20px; margin-top:25px;">

            <h3 style="color:#a3e635; margin-top:0;">
                🎯 Votre réservation
            </h3>

            <p>
                📅 <strong>Date :</strong>
                {{ $reservation->reservation_date->format('d/m/Y') }}
            </p>

            <p>
                🕒 <strong>Heure :</strong>
                {{ substr($reservation->start_time, 0, 5) }}
            </p>

            <p>
                🎯 <strong>Formule :</strong>
                {{ $reservation->formula->name }}
            </p>

            <p>
                👥 <strong>Joueurs :</strong>
                {{ $reservation->players_count }}
            </p>

            <p>
                💰 <strong>Total :</strong>
                {{ number_format((float) $reservation->total_price, 2, ',', ' ') }} €
            </p>

        </div>


        {{-- PAIEMENT --}}
        <div style="background:#17200d; border:1px solid #a3e635; border-radius:15px; padding:20px; margin-top:25px;">

            <h3 style="color:#a3e635; margin-top:0;">
                🏦 Paiement par virement bancaire
            </h3>

            <p style="color:#dddddd; line-height:1.6;">
                Afin de confirmer définitivement votre réservation,
                veuillez effectuer le paiement du montant indiqué ci-dessous.
            </p>


            {{-- MONTANT --}}
            <div style="background:#000000; border-radius:15px; padding:20px; margin:20px 0;">

                <p style="margin:0 0 8px; color:#999999;">
                    Montant à payer maintenant
                </p>

                <div style="font-size:32px; font-weight:bold; color:#a3e635;">
                    {{ number_format((float) $reservation->deposit, 2, ',', ' ') }} €
                </div>

                @if($reservation->payment_option === 'deposit_30')

                    <p style="color:#aaaaaa; margin-bottom:0;">
                        Acompte de 30 % sur le montant total.
                    </p>

                    <p style="color:#dddddd;">
                        Solde restant :
                        <strong>
                            {{ number_format(
                                max(
                                    0,
                                    (float) $reservation->total_price -
                                    (float) $reservation->deposit
                                ),
                                2,
                                ',',
                                ' '
                            ) }} €
                        </strong>
                    </p>

                @else

                    <p style="color:#aaaaaa; margin-bottom:0;">
                        Paiement intégral de votre réservation.
                    </p>

                @endif

            </div>


            {{-- COORDONNÉES BANCAIRES --}}
            <p style="margin-bottom:5px; color:#999999;">
                Titulaire du compte
            </p>

            <p style="margin-top:0; font-weight:bold;">
                Julien Maton
            </p>


            <p style="margin-bottom:5px; color:#999999;">
                IBAN
            </p>

            <p style="margin-top:0; font-weight:bold;">
                BE25 3632 7909 2682
            </p>


            <p style="margin-bottom:5px; color:#999999;">
                BIC
            </p>

            <p style="margin-top:0; font-weight:bold;">
                BBRUBEBB
            </p>


            {{-- COMMUNICATION --}}
            <p style="margin-bottom:5px; color:#999999;">
                Communication
            </p>

            <p style="margin-top:0; font-size:22px; font-weight:bold; color:#a3e635;">
                B44-{{ str_pad($reservation->id, 6, '0', STR_PAD_LEFT) }}
            </p>

        </div>


        {{-- AVERTISSEMENT --}}
        <div style="background:#191919; border-radius:12px; padding:15px; margin-top:20px; color:#bbbbbb;">

            ⚠️ Utilisez impérativement la communication
            <strong style="color:#a3e635;">
                B44-{{ str_pad($reservation->id, 6, '0', STR_PAD_LEFT) }}
            </strong>
            lors du virement afin que nous puissions identifier votre paiement.

        </div>


        <p style="color:#aaaaaa; line-height:1.6; margin-top:25px;">
            Votre réservation sera définitivement confirmée
            après vérification de la réception du paiement.
        </p>

        <p style="color:#aaaaaa;">
            À bientôt 🔫<br>
            <strong style="color:#ffffff;">Blaster44</strong>
        </p>

    </div>

</div>

</body>
</html>