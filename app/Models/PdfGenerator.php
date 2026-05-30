<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection; 
use App\Interfaces\IPdfGenerator;
use DateTimeImmutable;
use Fpdf\Fpdf;

class PdfGenerator implements IPdfGenerator
{
    private Collection $dataToUse;
    private Fpdf $pdf;

    private const headers = array("ENTERPRISE", "SOLDED", "LEFT", "TOTAL_SOLD", "TOTAL", "WHEN_SOLD");

    public function __construct(Collection $dataToUse)
    {
        $this->dataToUse = $dataToUse;
        $this->pdf = new Fpdf("P", "mm", "Legal");
    }

    private function addPage(): void
    {
        $this->pdf->AddPage("P", "Legal");
        $this->pdf->SetFont("Arial", "");
    }

    private function tablesHeaders(): void
    {
        $this->pdf->Cell(20, 7, "", 1);

        for($i = 0; $i < count(self::headers); $i++)
        {
            $this->pdf->Cell(30, 7, self::headers[$i], 1);
        }

        $this->pdf->Ln();
    }

    private function tablesData(): void
    {
        foreach($this->dataToUse as $content)
        {
            $this->pdf->Cell(20, 7, $content->SELLER, 1);
            $this->pdf->Cell(30, 7, substr($content->ENTERPRISE, 8), 1);
            $this->pdf->Cell(30, 7, $content->SOLDED, 1);
            $this->pdf->Cell(30, 7, $content->LEFT, 1);
            $this->pdf->Cell(30, 7, $content->TOTAL_SOLD, 1);
            $this->pdf->Cell(30, 7, $content->TOTAL, 1);
            $this->pdf->Cell(
                30, 
                7, 
                date_format(new DateTimeImmutable($content->WHEN_SOLD), "o/m/d"), 
                1
            );

            $this->pdf->Ln();
        }
    }

    private function table(): void
    {
        // table's page
        $this->addPage();
        $this->tablesHeaders();
        $this->tablesData();
    }

    public function generate()
    {
        $this->table();
        return $this->pdf->Output("S", "doc_pdf.pdf");
    }
}
