<?php
namespace App\Imports;

use App\Admin;
use Maatwebsite\Excel\Concerns\ToModel;

class AdminsImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Admin([
        'staff_number' => $row[0],
        'name' => $row[1],
        'designation' => $row[2],
        'section_id' => $row[3],
        ]);
    }

}