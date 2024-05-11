<?php

abstract class DocumentProcessor
{
    public readonly string $texto;

    public function __construct(protected readonly string $document)
    {
    }

    // Método de plantilla que define el flujo de procesamiento del documento
    public final function processDocument()
    {
        $this->openDocument();
        $this->parseDocument();
        $this->texto = $this->extractText();
        $this->closeDocument();
    }

    public function enviarCorreo()
    {
        echo "Enviando correo con el documento procesado...\n";
    }

    abstract protected function openDocument();
    abstract protected function parseDocument();
    abstract protected function extractText(): string;
    abstract protected function closeDocument();
}

class PDFProcessor extends DocumentProcessor
{
    protected function openDocument()
    {
        echo "Abriendo el documento PDF: {$this->document}\n";
    }

    protected function parseDocument()
    {
        echo "Analizando el documento PDF...\n";
    }

    protected function extractText(): string
    {
        return "Extrayendo texto del documento PDF...\n";
    }

    protected function closeDocument()
    {
        echo "Cerrando el documento PDF...\n";
    }
}

class WordProcessor extends DocumentProcessor
{
    protected function openDocument()
    {
        echo "Abriendo el documento Word: {$this->document}\n";
    }

    protected function parseDocument()
    {
        echo "Analizando el documento Word...\n";
    }

    protected function extractText(): string
    {
        return "Extrayendo texto del documento Word...\n";
    }

    protected function closeDocument()
    {
        echo "Cerrando el documento Word...\n";
    }
}

// Uso
$pdfProcessor = new PDFProcessor("documento.pdf");
$pdfProcessor->processDocument();

echo "\n";

$wordProcessor = new WordProcessor("documento.docx");
$wordProcessor->processDocument();
