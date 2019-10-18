<?php
namespace App\Imports;

use App\UserType;
use Maatwebsite\Excel\Concerns\ToModel;

class UserTypesImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new UserType([
        'user_type' => $row[0],
        ]);
    }

}