<?php
/**
 * Created by PhpStorm.
 * User: chams
 * Date: 14/05/18
 * Time: 04:30
 */

namespace App\Exportable;


use App\Helpers\ExportQueryRecords;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExportComplaints extends ExportQueryRecords implements WithHeadings
{
    public function headings(): array
    {
        return [
            '#',
            'Date',
            'Nom & Prénom',
            'Téléphone',
            'E-mail',
            'Adresse',
            'Thème',
            'Municipalité',
            'Titre',
            'Description',
            'Est valide (0: faux, 1: vrai)',
            'Est modérée (0: faux, 1: vrai)',
        ];
    }
}