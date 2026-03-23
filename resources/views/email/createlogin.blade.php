<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenue sur Notre Plateforme</title>
    <!-- Styles inline directement dans les balises -->
</head>
<body style="margin:0; padding:0; background:linear-gradient(135deg, #eef2ff, #ffffff, #fdf4ff); font-family: Arial, sans-serif;">

    <!-- Conteneur principal -->
    <table width="100%" cellpadding="0" cellspacing="0" border="0">
        <tr>
            <td align="center" style="padding: 40px 20px;">

                <!-- Logo et en-tête -->
                <table width="600" cellpadding="0" cellspacing="0" border="0" style="max-width:600px; width:100%; background:#ffffff; border-radius:16px; box-shadow:0 20px 40px rgba(0,0,0,0.1);">
                    <tr>
                        <td style="padding: 40px 30px;">

                            <!-- Message de bienvenue -->
                            <div style="text-align:center; margin-bottom:30px;">
                                <span style="background:#dcfce7; color:#16a34a; padding:8px 16px; border-radius:50px; font-size:14px; font-weight:600;">
                                    ✓ Inscription réussie !
                                </span>

                                <h1 style="font-size:36px; color:#1f2937; margin:20px 0;">
                                    Bienvenue,
                                    <span style="color:#4f46e5;">{{ $userData['name'] ?? 'cher utilisateur' }}</span>
                                </h1>

                                <p style="font-size:18px; color:#6b7280; line-height:1.6;">
                                    Nous sommes ravis de vous compter parmi nous. Votre aventure commence maintenant !
                                </p>
                            </div>

                            <!-- Informations utilisateur -->
                            <table width="100%" cellpadding="0" cellspacing="0" border="0" style="margin:30px 0;">
                                <tr>
                                    <td width="33%" style="padding:10px;">
                                        <div style="background:#eff6ff; border-radius:12px; padding:20px; text-align:center;">
                                            <div style="background:#3b82f6; width:50px; height:50px; border-radius:50%; margin:0 auto 15px; display:flex; align-items:center; justify-content:center;">
                                                <span style="color:white; font-size:24px;">📅</span>
                                            </div>
                                            <p style="color:#6b7280; font-size:14px; margin:0;">Jours membre</p>
                                            <p style="color:#1f2937; font-size:24px; font-weight:bold; margin:5px 0 0;">1</p>
                                        </div>
                                    </td>
                                    <td width="33%" style="padding:10px;">
                                        <div style="background:#f0fdf4; border-radius:12px; padding:20px; text-align:center;">
                                            <div style="background:#22c55e; width:50px; height:50px; border-radius:50%; margin:0 auto 15px; display:flex; align-items:center; justify-content:center;">
                                                <span style="color:white; font-size:24px;">🔑</span>
                                            </div>
                                            <p style="color:#6b7280; font-size:14px; margin:0;">Connexions</p>
                                            <p style="color:#1f2937; font-size:24px; font-weight:bold; margin:5px 0 0;">1</p>
                                        </div>
                                    </td>
                                    <td width="33%" style="padding:10px;">
                                        <div style="background:#fef3c7; border-radius:12px; padding:20px; text-align:center;">
                                            <div style="background:#eab308; width:50px; height:50px; border-radius:50%; margin:0 auto 15px; display:flex; align-items:center; justify-content:center;">
                                                <span style="color:white; font-size:24px;">💎</span>
                                            </div>
                                            <p style="color:#6b7280; font-size:14px; margin:0;">Points</p>
                                            <p style="color:#1f2937; font-size:24px; font-weight:bold; margin:5px 0 0;">Ilimité</p>
                                        </div>
                                    </td>
                                </tr>
                            </table>

                            <!-- Call to Action -->
                            <div style="background:linear-gradient(135deg, #4f46e5, #9333ea); border-radius:16px; padding:40px; text-align:center; margin:30px 0;">
                                <h2 style="color:white; font-size:28px; margin:0 0 15px;">Prêt à commencer ?</h2>
                                <p style="color:rgba(255,255,255,0.9); font-size:18px; margin:0 0 25px;">
                                    Explorez toutes les fonctionnalités qui vous attendent
                                </p>
                                <a href="{{ url('/') }}" style="background:white; color:#4f46e5; padding:15px 40px; border-radius:50px; text-decoration:none; font-weight:bold; display:inline-block;">
                                    Explorer le tableau de bord →
                                </a>
                            </div>

                            <!-- Footer -->
                            <div style="text-align:center; color:#9ca3af; font-size:14px; margin-top:30px;">
                                <p>© {{ date('Y') }} {{ config('app.name') }}. Tous droits réservés.</p>
                                <p style="margin-top:10px;">
                                    <a href="{{ url('/conditions') }}" style="color:#6b7280; text-decoration:underline;">Conditions</a>
                                    <span style="margin:0 8px;">•</span>
                                    <a href="{{ url('/confidentialite') }}" style="color:#6b7280; text-decoration:underline;">Confidentialité</a>
                                </p>
                            </div>

                        </td>
                    </tr>
                </table>

            </td>
        </tr>
    </table>

</body>
</html>
