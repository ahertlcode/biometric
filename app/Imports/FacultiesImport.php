<?php
namespace App\Imports;

use App\Faculty;
use Maatwebsite\Excel\Concerns\ToModel;

class FacultiesImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Faculty([
        'faculty' => $row[0],
        ]);
    }

}