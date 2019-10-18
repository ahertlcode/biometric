<?php
namespace App\Imports;

use App\Department;
use Maatwebsite\Excel\Concerns\ToModel;

class DepartmentsImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Department([
        'department' => $row[0],
        'faculty_id' => $row[1],
        ]);
    }

}