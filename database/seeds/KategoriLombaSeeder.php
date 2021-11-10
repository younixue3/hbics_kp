<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriLombaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kategori_lomba')->insert([
            ['kategori' => 'Desain Grafis', "photo" => 'images/kategori/h-desain.png', 'desc' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus sollicitudin gravida nunc vitae rhoncus. Sed rutrum velit non neque ultrices, et tristique mi semper. Proin egestas sed sem ac ultrices. Sed blandit pharetra nulla, ut accumsan lacus sodales sed. Curabitur sit amet rutrum metus, consectetur dignissim lorem. Donec ut sem convallis, venenatis odio non, pulvinar tortor. Pellentesque velit lectus, dignissim sit amet commodo sit amet, volutpat sed est. Donec rutrum mauris id rhoncus interdum. Integer ac consectetur metus. Nulla facilisi. Curabitur ac est commodo tellus ultricies posuere. Pellentesque tempus ut metus aliquet blandit.'],
            ['kategori' => 'Aplikasi & Game', "photo" => 'images/kategori/h-aplikasi.png', 'desc' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus sollicitudin gravida nunc vitae rhoncus. Sed rutrum velit non neque ultrices, et tristique mi semper. Proin egestas sed sem ac ultrices. Sed blandit pharetra nulla, ut accumsan lacus sodales sed. Curabitur sit amet rutrum metus, consectetur dignissim lorem. Donec ut sem convallis, venenatis odio non, pulvinar tortor. Pellentesque velit lectus, dignissim sit amet commodo sit amet, volutpat sed est. Donec rutrum mauris id rhoncus interdum. Integer ac consectetur metus. Nulla facilisi. Curabitur ac est commodo tellus ultricies posuere. Pellentesque tempus ut metus aliquet blandit.'],
            ['kategori' => 'Food & Beverage', "photo" => 'images/kategori/h-fnb.png', 'desc' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus sollicitudin gravida nunc vitae rhoncus. Sed rutrum velit non neque ultrices, et tristique mi semper. Proin egestas sed sem ac ultrices. Sed blandit pharetra nulla, ut accumsan lacus sodales sed. Curabitur sit amet rutrum metus, consectetur dignissim lorem. Donec ut sem convallis, venenatis odio non, pulvinar tortor. Pellentesque velit lectus, dignissim sit amet commodo sit amet, volutpat sed est. Donec rutrum mauris id rhoncus interdum. Integer ac consectetur metus. Nulla facilisi. Curabitur ac est commodo tellus ultricies posuere. Pellentesque tempus ut metus aliquet blandit.'],
            ['kategori' => 'Fashion', "photo" => 'images/kategori/h-fashion.png', 'desc' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus sollicitudin gravida nunc vitae rhoncus. Sed rutrum velit non neque ultrices, et tristique mi semper. Proin egestas sed sem ac ultrices. Sed blandit pharetra nulla, ut accumsan lacus sodales sed. Curabitur sit amet rutrum metus, consectetur dignissim lorem. Donec ut sem convallis, venenatis odio non, pulvinar tortor. Pellentesque velit lectus, dignissim sit amet commodo sit amet, volutpat sed est. Donec rutrum mauris id rhoncus interdum. Integer ac consectetur metus. Nulla facilisi. Curabitur ac est commodo tellus ultricies posuere. Pellentesque tempus ut metus aliquet blandit.'],
            ['kategori' => 'Kriya', "photo" => 'images/kategori/h-kriya.png', 'desc' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus sollicitudin gravida nunc vitae rhoncus. Sed rutrum velit non neque ultrices, et tristique mi semper. Proin egestas sed sem ac ultrices. Sed blandit pharetra nulla, ut accumsan lacus sodales sed. Curabitur sit amet rutrum metus, consectetur dignissim lorem. Donec ut sem convallis, venenatis odio non, pulvinar tortor. Pellentesque velit lectus, dignissim sit amet commodo sit amet, volutpat sed est. Donec rutrum mauris id rhoncus interdum. Integer ac consectetur metus. Nulla facilisi. Curabitur ac est commodo tellus ultricies posuere. Pellentesque tempus ut metus aliquet blandit.'],
        ]);
    }
}
