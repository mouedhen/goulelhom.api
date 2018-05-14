<?php
/**
 * Created by PhpStorm.
 * User: chams
 * Date: 14/05/18
 * Time: 03:08
 */

namespace App\Helpers;


use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;

/**
 * @property Collection $result
 */
class ExportQueryRecords implements FromCollection
{
    public function __construct($result)
    {
        $this->result = $result;
    }

    /**
     * @return Collection
     */
    public function collection()
    {
        return $this->result;
    }
}