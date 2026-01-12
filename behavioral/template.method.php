<?php
/**
 * Template Method
 * The Template Method design pattern is a behavioral pattern 
 * that defines the skeleton of an algorithm in a base (abstract) class, 
 * while deferring specific steps of the algorithm to subclasses.
 */

abstract class ReportGenerator {
    final public function generate() : void
    {
        $this->collectData();
        $this->formatData();
        $this->export();
    }

    protected function collectData() : void
    {
        echo "Collecting Data! <br>";
    }

    abstract protected function formatData() : void;
    abstract protected function export() : void;
}


class PDFReport extends ReportGenerator {
    protected function formatData(): void
    {
        echo "Formatting Data for PDF <br>";
    }

    protected function export(): void
    {
        echo "Export as PDF<br>";
    }
}

class HTMLReport extends ReportGenerator {
    protected function formatData(): void
    {
        echo "Formatting Data for HTML <br>";
    }

    protected function export(): void
    {
        echo "Export as HTML<br>";
    }
}