<?php

namespace App\Imports;

use App\Lecturer;
use Maatwebsite\Excel\Concerns\ToModel;

class LecturersImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Lecturer([
            //
        ]);
    }
}
