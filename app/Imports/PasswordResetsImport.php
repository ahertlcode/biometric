<?php

namespace App\Imports;

use App\PasswordReset;
use Maatwebsite\Excel\Concerns\ToModel;

class PasswordResetsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new PasswordReset([
            //
        ]);
    }
}
