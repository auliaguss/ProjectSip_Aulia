<?php

use Illuminate\Database\Seeder;
use \Illuminate\Support\Facades\DB;

class CrimesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('crimes')->insert([
            [
                'photo' => "images/upload/1611386690.jpg",
                'case_name'    => "Penyelundupan Ganja",
                'location'    => "Medan",
                'user_id'    => 2,
                'start_date'    => \Carbon\Carbon::now('Asia/Jakarta'),
                'status'      => "Unfinished",
                'detail'    => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur hendrerit malesuada felis, sed congue arcu pulvinar ut. Curabitur in rhoncus nibh, a lacinia tortor. Etiam gravida tortor euismod, aliquet tellus eu, interdum ipsum. Nulla ac semper mauris, porta aliquam eros. Donec et pellentesque arcu. Vivamus luctus erat ac ullamcorper finibus. Integer sed odio massa. Donec sit amet mauris lacus.",
            ],
            [
                'photo' => "images/upload/1611386690.jpg",
                'case_name'    => "Penyelundupan Alkohol",
                'location'    => "Sumedang",
                'user_id'    => 2,
                'start_date'    => \Carbon\Carbon::now('Asia/Jakarta'),
                'status'      => "Unfinished",
                'detail'    => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur hendrerit malesuada felis, sed congue arcu pulvinar ut. Curabitur in rhoncus nibh, a lacinia tortor. Etiam gravida tortor euismod, aliquet tellus eu, interdum ipsum. Nulla ac semper mauris, porta aliquam eros. Donec et pellentesque arcu. Vivamus luctus erat ac ullamcorper finibus. Integer sed odio massa. Donec sit amet mauris lacus.",
            ],
            [
                'photo' => "images/upload/1611386690.jpg",
                'case_name'    => "Penyelundupan Hewan",
                'location'    => "Palembang",
                'user_id'    => 7,
                'start_date'    => \Carbon\Carbon::now('Asia/Jakarta'),
                'status'      => "Unfinished",
                'detail'    => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur hendrerit malesuada felis, sed congue arcu pulvinar ut. Curabitur in rhoncus nibh, a lacinia tortor. Etiam gravida tortor euismod, aliquet tellus eu, interdum ipsum. Nulla ac semper mauris, porta aliquam eros. Donec et pellentesque arcu. Vivamus luctus erat ac ullamcorper finibus. Integer sed odio massa. Donec sit amet mauris lacus.",
            ],
            [
                'photo' => "images/upload/1611386690.jpg",
                'case_name'    => "Perdagangan Manusia",
                'location'    => "Bekasi",
                'user_id'    => 9,
                'start_date'    => \Carbon\Carbon::now('Asia/Jakarta'),
                'status'      => "Unfinished",
                'detail'    => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur hendrerit malesuada felis, sed congue arcu pulvinar ut. Curabitur in rhoncus nibh, a lacinia tortor. Etiam gravida tortor euismod, aliquet tellus eu, interdum ipsum. Nulla ac semper mauris, porta aliquam eros. Donec et pellentesque arcu. Vivamus luctus erat ac ullamcorper finibus. Integer sed odio massa. Donec sit amet mauris lacus.",
            ],
            [
                'photo' => "images/upload/1611386690.jpg",
                'case_name'    => "Perdagangan Kosmetik Merkuri",
                'location'    => "Tanggerang",
                'user_id'    => 8,
                'start_date'    => \Carbon\Carbon::now('Asia/Jakarta'),
                'status'      => "Unfinished",
                'detail'    => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur hendrerit malesuada felis, sed congue arcu pulvinar ut. Curabitur in rhoncus nibh, a lacinia tortor. Etiam gravida tortor euismod, aliquet tellus eu, interdum ipsum. Nulla ac semper mauris, porta aliquam eros. Donec et pellentesque arcu. Vivamus luctus erat ac ullamcorper finibus. Integer sed odio massa. Donec sit amet mauris lacus.",
            ],
            [
                'photo' => "images/upload/1611386690.jpg",
                'case_name'    => "Perdagangan Kosmetik Ilegal",
                'location'    => "Bogor",
                'user_id'    => 3,
                'start_date'    => \Carbon\Carbon::now('Asia/Jakarta'),
                'status'      => "Finished",
                'detail'    => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur hendrerit malesuada felis, sed congue arcu pulvinar ut. Curabitur in rhoncus nibh, a lacinia tortor. Etiam gravida tortor euismod, aliquet tellus eu, interdum ipsum. Nulla ac semper mauris, porta aliquam eros. Donec et pellentesque arcu. Vivamus luctus erat ac ullamcorper finibus. Integer sed odio massa. Donec sit amet mauris lacus.",
            ],
            [
                'photo' => "images/upload/1611386690.jpg",
                'case_name'    => "Perdagangan Obat terlarang",
                'location'    => "Pangandaran",
                'user_id'    => 9,
                'start_date'    => \Carbon\Carbon::now('Asia/Jakarta'),
                'status'      => "Finished",
                'detail'    => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur hendrerit malesuada felis, sed congue arcu pulvinar ut. Curabitur in rhoncus nibh, a lacinia tortor. Etiam gravida tortor euismod, aliquet tellus eu, interdum ipsum. Nulla ac semper mauris, porta aliquam eros. Donec et pellentesque arcu. Vivamus luctus erat ac ullamcorper finibus. Integer sed odio massa. Donec sit amet mauris lacus.",
            ],
            [
                'photo' => "images/upload/1611386690.jpg",
                'case_name'    => "Penyelundupan hewan laut",
                'location'    => "Batam",
                'user_id'    => 5,
                'start_date'    => \Carbon\Carbon::now('Asia/Jakarta'),
                'status'      => "Finished",
                'detail'    => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur hendrerit malesuada felis, sed congue arcu pulvinar ut. Curabitur in rhoncus nibh, a lacinia tortor. Etiam gravida tortor euismod, aliquet tellus eu, interdum ipsum. Nulla ac semper mauris, porta aliquam eros. Donec et pellentesque arcu. Vivamus luctus erat ac ullamcorper finibus. Integer sed odio massa. Donec sit amet mauris lacus.",
            ],
            [
                'photo' => "images/upload/1611386690.jpg",
                'case_name'    => "Penyelundupan hewan ",
                'location'    => "Jakarta",
                'user_id'    => 5,
                'start_date'    => \Carbon\Carbon::now('Asia/Jakarta'),
                'status'      => "Finished",
                'detail'    => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur hendrerit malesuada felis, sed congue arcu pulvinar ut. Curabitur in rhoncus nibh, a lacinia tortor. Etiam gravida tortor euismod, aliquet tellus eu, interdum ipsum. Nulla ac semper mauris, porta aliquam eros. Donec et pellentesque arcu. Vivamus luctus erat ac ullamcorper finibus. Integer sed odio massa. Donec sit amet mauris lacus.",
            ],
            [
                'photo' => "images/upload/1611386690.jpg",
                'case_name'    => "Penyelundupan miras",
                'location'    => "Tasik",
                'user_id'    => 2,
                'start_date'    => \Carbon\Carbon::now('Asia/Jakarta'),
                'status'      => "Finished",
                'detail'    => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur hendrerit malesuada felis, sed congue arcu pulvinar ut. Curabitur in rhoncus nibh, a lacinia tortor. Etiam gravida tortor euismod, aliquet tellus eu, interdum ipsum. Nulla ac semper mauris, porta aliquam eros. Donec et pellentesque arcu. Vivamus luctus erat ac ullamcorper finibus. Integer sed odio massa. Donec sit amet mauris lacus.",
            ],
        ]);
    }
}
