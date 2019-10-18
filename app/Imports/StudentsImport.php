<?php
namespace App\Imports;

use App\Student;
use Maatwebsite\Excel\Concerns\ToModel;

class StudentsImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Student([
        'matric_number' => $row[0],
        'first_name' => $row[1],
        'middle_name' => $row[2],
        'last_name' => $row[3],
        'level_id' => $row[4],
        'department_id' => $row[5],
        ]);
    }

}