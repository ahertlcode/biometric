<?php
namespace App\Imports;

use App\Course;
use Maatwebsite\Excel\Concerns\ToModel;

class CoursesImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Course([
        'course' => $row[0],
        'course_title' => $row[1],
        ]);
    }

}