<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Events\AfterSheet;
use PHPExcel_Style_Border;
use PHPExcel_Style_Fill;
use PhpOffice\PhpSpreadsheet\Style\Fill;

class ReservationsExport implements FromArray, WithHeadings, ShouldAutoSize, WithEvents
{
    protected $data;

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                $headerStyle = [
                    'font' => [
                        'bold' => true,
                        'size' => 14,
                    ],
                    'fill' => [
                        'type' => PHPExcel_Style_Fill::FILL_SOLID,
                        'startcolor' => [
                            'rgb' => 'C0C0C0',
                        ],
                    ],
                ];

                $headerRange = 'A1:K1';

                $event->sheet->getDelegate()->getStyle('A1:K1')->getFill()
                    ->setFillType(Fill::FILL_SOLID)
                    ->getStartColor()->setRGB('c5d9f1');

                $event->sheet->getDelegate()->getStyle($headerRange)->applyFromArray($headerStyle);

                $dataRange = 'A1:K' . (count($this->data) + 1);
                $event->sheet->getDelegate()->getStyle($dataRange)
                    ->getBorders()->getAllBorders()
                    ->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
            },

        ];
    }

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function array(): array
    {
        return $this->data;
    }

    public function headings(): array
    {
        return array_keys($this->data[0]);
    }
}
