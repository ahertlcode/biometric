<?php
namespace App\Imports;

use App\Register;
use Maatwebsite\Excel\Concerns\ToModel;

class RegistersImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Register([
        'course_id' => $row[0],
        ]);
    }

}