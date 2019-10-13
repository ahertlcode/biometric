<?php

namespace App\Imports;

use App\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Hash;


class UsersImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new User([
            'user_name' => $row[0],
            'user_type_id' => $row[1],
            'email' => $row[2],
            'phone' => $row[3],
            'password' => Hash::make($row[4])
        ]);
    }
}
