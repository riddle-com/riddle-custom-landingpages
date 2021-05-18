<?php

use setasign\Fpdi\Fpdi;
use setasign\Fpdi\PdfReader;

class Certificate
{

    /**
     * String; Title of the riddle / test
     */
    private $testTitle;

    /**
     * integers; $score is the score which can be achieved and $abs_score is the number which was solved right;
     * example: $score = 50; $abs_score = 45
     */
    private $score;
    private $abs_score;

    /**
     * Components to draw on the PDF-File
     */
    public $components;

    /**
     * PDF-Object
     */
    public $pdf;

    /**
     * Current font
     */
    private $font;
    
    public function __construct()
    {
        $this->pdf  = new Fpdi();
        $this->components = [];
    }

    public function setScore($score, $abs_score)
    {
        $this->score = $score;
        $this->abs_score = $abs_score;
    }

    /**
     * Add component which will be drawed later
     *
     * @param $component CertificateComponent which should be added
     * @param $center default: false; true, if the component should be centered
     */
    public function addComponent(CertificateComponent $component, $center = false)
    {
        if ($center) {
            $this->       setFontSize($component->fontsize); // To get the real width of the string
            $x = $this->pdf->GetPageWidth() / 2 - $this->pdf->GetStringWidth($component->string) / 2;
            $component->x = $x;
        }

        $this->components[] = $component;
    }

    /**
     * Import PDF
     *
     * @param $filename Filename of the PDF-File (Directory: src/files; just the name without extension)
     */
    public function usePDFFile($filename)
    {
        if (!file_exists("src/files/pdf/" . $filename . ".pdf")) {
            return false;
        }

        $pageCount = $this->pdf->setSourceFile(ROOT . "/src/files/pdf/" . $filename . ".pdf");
        if ($pageCount == 0) {
            die("INVALID PDF");
        }

        $pageId = $this->pdf->importPage(1, PdfReader\PageBoundaries::MEDIA_BOX);
        $this->pdf->addPage();
        $this->pdf->useImportedPage($pageId, 0, 0, $this->pdf->GetPageWidth());
    }

    public function setFont($font)
    {
        $this->font = $font;
        $this->pdf->setFont($font);
        $this->setFontSize(DEFAULT_FONT_SIZE);
    }

    public function setFontSize($size)
    {
        $this->pdf->setFont($this->font, "", $size);
    }

    public function drawComponents()
    {
        foreach ($this->components as $component) {
            $this->pdf->SetTextColor($component->r, $component->g, $component->b); // Change color
            $this->       setFontSize($component->fontsize); // Change font size
            $this->pdf->  SetXY($component->x + $component->offsetX, $component->y); // Change coordinates
            $this->pdf->  Write(0, Toolbox::convertString($component->string)); // Write the string
        }
    }
}
