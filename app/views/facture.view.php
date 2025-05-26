<?php
require('fpdf/fpdf.php');

class PDF extends FPDF {
    function Header() {
        // Titre principal
        $this->SetFont('Arial','B',20);
        $this->SetTextColor(0, 191, 255); // bleu clair
        $this->Cell(0, 15, utf8_decode('Bon de commande'), 0, 1, 'C');
        $this->Ln(5);
    }

    function Footer() {
        $this->SetY(-30);
        $this->SetFont('Arial','',8);
        $this->SetTextColor(100, 100, 100);
        $this->MultiCell(0, 4, utf8_decode("Siège social : 22, Avenue Voltaire - 13000 Marseille\nN° Siret : xxxxxDEVIS n°123 - TVA intra : FRXX999999999\nwww.macompagnie.fr | pierre@macompagnie.fr | Tél : +33 4 92 99 99 99"), 0, 'L');
    }
}

// Création du document
$pdf = new PDF();
$pdf->AddPage();

// Données entreprise
$pdf->SetFont('Arial','B',10);
$pdf->Cell(100, 6, 'Mon Entreprise', 0, 1);
$pdf->SetFont('Arial','',10);
$pdf->MultiCell(100, 5, utf8_decode("22, Avenue Voltaire\n13000 Marseille, France\nTéléphone : +33 4 92 99 99 99"));

// Données destinataire
$pdf->SetXY(130, 40);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(60, 6, utf8_decode('Destinataire'), 0, 1);
$pdf->SetFont('Arial','',10);
$pdf->SetX(130);
$pdf->MultiCell(70, 5, utf8_decode("Acheteur SA\nMichel Acheteur\n31, rue de la Forêt\n13100 Aix-en-Provence\nFrance"));

// Détails commande
$pdf->Ln(10);
$pdf->SetFont('Arial','',10);
$pdf->SetFillColor(240,240,240);
$pdf->Cell(60, 6, utf8_decode('Date : 4.8.2020'), 0, 0, 'L', true);
$pdf->Cell(60, 6, utf8_decode('Bon de commande N° : 123'), 0, 1, 'L', true);
$pdf->Cell(60, 6, utf8_decode('Numéro de client : 456'), 0, 0, 'L', true);
$pdf->Cell(60, 6, utf8_decode('Paiement : 30 jours - CB / Chèque'), 0, 1, 'L', true);
$pdf->Cell(60, 6, utf8_decode('Émis par : Pierre Fournisseur'), 0, 0, 'L', true);
$pdf->Cell(60, 6, utf8_decode('Contact : Michael Acheteur'), 0, 1, 'L', true);

// Table des produits
$pdf->Ln(8);
$pdf->SetFont('Arial','B',10);
$pdf->SetFillColor(220,220,220);
$pdf->Cell(30,8,'Réf.',1,0,'C', true);
$pdf->Cell(40,8,'Description',1,0,'C', true);
$pdf->Cell(20,8,'Qté',1,0,'C', true);
$pdf->Cell(20,8,'Unité',1,0,'C', true);
$pdf->Cell(30,8,'Prix HT',1,0,'C', true);
$pdf->Cell(20,8,'% TVA',1,0,'C', true);
$pdf->Cell(30,8,'Total TTC',1,1,'C', true);

$pdf->SetFont('Arial','',10);
$pdf->Cell(30,8,'1234567895',1);
$pdf->Cell(40,8,utf8_decode('Main-d’œuvre'),1);
$pdf->Cell(20,8,'5',1,0,'C');
$pdf->Cell(20,8,'h',1,0,'C');
$pdf->Cell(30,8,'60,00 €',1,0,'R');
$pdf->Cell(20,8,'20%',1,0,'C');
$pdf->Cell(30,8,'360,00 €',1,1,'R');

$pdf->Cell(30,8,'9876543218',1);
$pdf->Cell(40,8,'Produit',1);
$pdf->Cell(20,8,'10',1,0,'C');
$pdf->Cell(20,8,'pcs',1,0,'C');
$pdf->Cell(30,8,'105,00 €',1,0,'R');
$pdf->Cell(20,8,'20%',1,0,'C');
$pdf->Cell(30,8,'1 260,00 €',1,1,'R');

// Totaux
$pdf->Ln(5);
$pdf->SetX(110);
$pdf->Cell(50, 6, 'Total HT :', 0, 0, 'R');
$pdf->Cell(30, 6, '1 350,00 €', 0, 1, 'R');

$pdf->SetX(110);
$pdf->Cell(50, 6, 'Total TVA :', 0, 0, 'R');
$pdf->Cell(30, 6, '270,00 €', 0, 1, 'R');

$pdf->SetX(110);
$pdf->Cell(50, 6, 'Frais de livraison :', 0, 0, 'R');
$pdf->Cell(30, 6, '39,99 €', 0, 1, 'R');

$pdf->SetFont('Arial','B',10);
$pdf->SetTextColor(0, 191, 255);
$pdf->SetX(110);
$pdf->Cell(50, 8, 'Total TTC :', 0, 0, 'R');
$pdf->Cell(30, 8, '1 659,99 €', 0, 1, 'R');

$pdf->SetTextColor(0,0,0);

// Signature
$pdf->Ln(10);
$pdf->Cell(0, 6, 'Signature :', 0, 1, 'L');

$pdf->Output('bon_commande.pdf', 'I');
?>


<!-- <!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bon de Commande</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container my-4">
  <div class="d-flex justify-content-between align-items-center border-bottom pb-3 mb-4">
    <h2 class="text-primary fw-bold">Bon de commande</h2>
    <div class="bg-warning rounded-circle text-white text-center" style="width: 60px; height: 60px; line-height: 60px; font-weight: bold;">Logo</div>
  </div>

  <div class="row">
    <div class="col-md-6">
      <h6 class="fw-bold">Mon Entreprise</h6>
      <p class="mb-0">22, Avenue Voltaire<br>13000 Marseille, France<br>Téléphone : +33 4 92 99 99 99</p>
    </div>
    <div class="col-md-6">
      <h6 class="fw-bold">Destinataire</h6>
      <p class="mb-0">Acheteur SA<br>Michel Acheteur<br>31, rue de la Forêt<br>13100 Aix-en-Provence<br>France</p>
    </div>
  </div>

  <div class="row my-4">
    <div class="col-md-6">
      <ul class="list-unstyled">
        <li><strong>Date :</strong> 4.8.2020</li>
        <li><strong>Bon de commande N° :</strong> 123</li>
        <li><strong>Numéro de client :</strong> 456</li>
        <li><strong>Modalité de paiement :</strong> 30 jours</li>
        <li><strong>Mode de paiement :</strong> CB / Chèque</li>
        <li><strong>Émis par :</strong> Pierre Fournisseur</li>
        <li><strong>Contact client :</strong> Michael Acheteur</li>
        <li><strong>Téléphone du client :</strong> 04 82 95 35 56</li>
      </ul>
    </div>
  </div>

  <div class="mb-4">
    <p class="fw-bold">Informations additionnelles</p>
    <p class="text-muted mb-0">Merci d'avoir choisi Mon Entreprise pour nos services.<br>Service après-vente - Garantie : 1 an</p>
  </div>

  <div class="table-responsive">
    <table class="table table-bordered">
      <thead class="table-light">
        <tr>
          <th>Réf. produit</th>
          <th>Description</th>
          <th>Quantité</th>
          <th>Unité</th>
          <th>Prix unitaire HT</th>
          <th>% TVA</th>
          <th>Total TVA</th>
          <th>Total TTC</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>1234567895</td>
          <td>Main-d'oeuvre</td>
          <td>5</td>
          <td>h</td>
          <td>60,00 €</td>
          <td>20 %</td>
          <td>60,00 €</td>
          <td>360,00 €</td>
        </tr>
        <tr>
          <td>9876543218</td>
          <td>Produit</td>
          <td>10</td>
          <td>pcs</td>
          <td>105,00 €</td>
          <td>20 %</td>
          <td>105,00 €</td>
          <td>1 260,00 €</td>
        </tr>
      </tbody>
    </table>
  </div>

  <div class="text-end">
    <p><strong>Total HT :</strong> 1 350,00 €</p>
    <p><strong>Total TVA :</strong> 270,00 €</p>
    <p><strong>Frais de livraison :</strong> 39,99 €</p>
    <p class="fw-bold text-primary">Total TTC : 1 659,99 €</p>
  </div>

  <p class="mt-5">Signature :</p>

  <div class="row mt-4">
    <div class="col-md-4">
      <p class="fw-bold">Siège social</p>
      <p>22, Avenue Voltaire<br>13000 Marseille, France<br>N° Siren ou Siret : xxxxxDEVIS n° 123<br>N° TVA intra. : FRXX 999999999</p>
    </div>
    <div class="col-md-4">
      <p class="fw-bold">Coordonnées</p>
      <p>Pierre Fournisseur<br>Phone : +43 30 12345678<br>Email : Pierre@macompanie.fr<br>www.macompanie.fr</p>
    </div>
    <div class="col-md-4">
      <p class="fw-bold">Détails bancaires</p>
      <p>Banque : NP Paribas<br>Code banque : 1000000<br>N° de compte : 12345678<br>IBAN : FR2341124098234<br>SWIFT/BIC : FRHHCXX1001</p>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> -->