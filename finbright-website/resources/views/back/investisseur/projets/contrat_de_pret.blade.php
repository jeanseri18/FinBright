<!DOCTYPE html>
<!--
Author: DIGIT'comm - Moussa Fofana
Product Name: Fin'Bright
Website: https://digitcommunication.ci/
Email: 
Contact: 
-->
<html>
<head>
    <meta name="author" content="DIGIT'comm : Moussa Fofana" />
    <title>Contrat de Prêt Financement Participatif</title>
    <style>
        body { font-family: 'Times New Roman', Times, serif; font-size: 12pt; line-height: 1.5; padding: 50px; }
        h1, h2 { color: #2c3e50; border-bottom: 2px solid #3498db; padding-bottom: 5px; }
        .metadata { background-color: #f4f4f4; padding: 15px; border-radius: 5px; margin-bottom: 20px; }
        .signature-area { margin-top: 80px; text-align: center; border-top: 1px dashed #333; padding-top: 10px; }
        .signature-placeholder { height: 40px; }
        .signer-block { width: 45%; display: inline-block; margin: 0 2%; }
    </style>
</head>
<body>

    <h1>CONTRAT DE PRÊT ÉTUDIANT PARTICIPATIF</h1>

    <div class="metadata">
        <p><strong>RÉFÉRENCE PRÊT :</strong> PR-{{ $loanRequest->id }}-INV-{{ $investment->id }}</p>
        <p><strong>DATE DE GÉNÉRATION :</strong> {{ now()->format('d/m/Y') }}</p>
        <p><strong>CAPITAL PRÊTÉ :</strong> {{ number_format($loanRequest->amount, 2, ',', ' ') }} €</p>
        <p><strong>MONTANT INVESTI :</strong> {{ number_format($investment->amount, 2, ',', ' ') }} €</p>
    </div>

    <h2>1. LES PARTIES CONTRACTANTES</h2>

    <h3>1.1. L'Emprunteur (L'Étudiant)</h3>
    <p>
        Nom : <strong>{{ $emprunteur->nom }} {{ $emprunteur->prenom }}</strong><br>
        Email : {{ $emprunteur->email }}
    </p>

    <h3>1.2. L'Investisseur (Le Prêteur)</h3>
    <p>
        Nom : <strong>{{ $investisseur->nom }} {{ $investisseur->prenom }}</strong><br>
        Email : {{ $investisseur->email }}
    </p>

    <h2>2. CONDITIONS DU PRÊT</h2>

    <p>L'Investisseur s'engage à prêter à l'Emprunteur une somme de <strong>{{ number_format($investment->amount, 2, ',', ' ') }} €</strong>, faisant partie du montant total de la requête de prêt n°{{ $loanRequest->id }}.</p>
    
    <!-- Intégrez ici le Tableau d'Amortissement si vous le souhaitez -->
    
    <p>Les conditions de remboursement, incluant le taux d'intérêt de {{ number_format($loanRequest->interest_rate * 100, 2) }} % (simulé), sont détaillées dans le tableau d'amortissement joint.</p>
    
    <!-- Ajoutez ici votre texte contractuel complet, en utilisant des balises HTML pour la mise en forme -->
    
    <div style="page-break-before: always;"></div> 
    
    <h2>5. SIGNATURES</h2>
    
    <p>En signant ce document, les parties reconnaissent avoir lu, compris et accepté l'intégralité des termes et conditions stipulés dans ce contrat.</p>

    <div class="signature-area">
        <div class="signer-block">
            <!-- Balise d'Ancre YouSign pour l'Emprunteur -->
            <div class="signature-placeholder">[[SIGNHERE]]</div> 
            <p><strong>{{ $emprunteur->nom }} {{ $emprunteur->prenom }}</strong><br>
            L'Emprunteur (L'Étudiant)</p>
        </div>
        
        <div class="signer-block">
            <!-- Balise d'Ancre YouSign pour l'Investisseur -->
            <div class="signature-placeholder">[[SIGNHERE]]</div>
            <p><strong>{{ $investisseur->nom }} {{ $investisseur->prenom }}</strong><br>
            L'Investisseur (Le Prêteur)</p>
        </div>
    </div>
    
    <p style="text-align: right; margin-top: 50px;">Fait à Paris, le {{ now()->format('d/m/Y') }}</p>

</body>
</html>
