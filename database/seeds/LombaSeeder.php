<?php

use Illuminate\Database\Seeder;

class LombaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kategori_lomba')->insert([
            ['kategori' => 'Story Telling', "photo" => '', 'desc' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus sollicitudin gravida nunc vitae rhoncus. Sed rutrum velit non neque ultrices, et tristique mi semper. Proin egestas sed sem ac ultrices. Sed blandit pharetra nulla, ut accumsan lacus sodales sed. Curabitur sit amet rutrum metus, consectetur dignissim lorem. Donec ut sem convallis, venenatis odio non, pulvinar tortor. Pellentesque velit lectus, dignissim sit amet commodo sit amet, volutpat sed est. Donec rutrum mauris id rhoncus interdum. Integer ac consectetur metus. Nulla facilisi. Curabitur ac est commodo tellus ultricies posuere. Pellentesque tempus ut metus aliquet blandit.', 'event_id' => 2, 'jenjang' => 'sd'],
            ['kategori' => 'STEAM Challenge', "photo" => '', 'desc' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus sollicitudin gravida nunc vitae rhoncus. Sed rutrum velit non neque ultrices, et tristique mi semper. Proin egestas sed sem ac ultrices. Sed blandit pharetra nulla, ut accumsan lacus sodales sed. Curabitur sit amet rutrum metus, consectetur dignissim lorem. Donec ut sem convallis, venenatis odio non, pulvinar tortor. Pellentesque velit lectus, dignissim sit amet commodo sit amet, volutpat sed est. Donec rutrum mauris id rhoncus interdum. Integer ac consectetur metus. Nulla facilisi. Curabitur ac est commodo tellus ultricies posuere. Pellentesque tempus ut metus aliquet blandit.', 'event_id' => 2, 'jenjang' => 'sd'],
            ['kategori' => 'Food Presentation', "photo" => '', 'desc' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus sollicitudin gravida nunc vitae rhoncus. Sed rutrum velit non neque ultrices, et tristique mi semper. Proin egestas sed sem ac ultrices. Sed blandit pharetra nulla, ut accumsan lacus sodales sed. Curabitur sit amet rutrum metus, consectetur dignissim lorem. Donec ut sem convallis, venenatis odio non, pulvinar tortor. Pellentesque velit lectus, dignissim sit amet commodo sit amet, volutpat sed est. Donec rutrum mauris id rhoncus interdum. Integer ac consectetur metus. Nulla facilisi. Curabitur ac est commodo tellus ultricies posuere. Pellentesque tempus ut metus aliquet blandit.', 'event_id' => 2, 'jenjang' => 'sd'],
            ['kategori' => 'KidsWarrior', "photo" => '', 'desc' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus sollicitudin gravida nunc vitae rhoncus. Sed rutrum velit non neque ultrices, et tristique mi semper. Proin egestas sed sem ac ultrices. Sed blandit pharetra nulla, ut accumsan lacus sodales sed. Curabitur sit amet rutrum metus, consectetur dignissim lorem. Donec ut sem convallis, venenatis odio non, pulvinar tortor. Pellentesque velit lectus, dignissim sit amet commodo sit amet, volutpat sed est. Donec rutrum mauris id rhoncus interdum. Integer ac consectetur metus. Nulla facilisi. Curabitur ac est commodo tellus ultricies posuere. Pellentesque tempus ut metus aliquet blandit.', 'event_id' => 2, 'jenjang' => 'sd'],
            ['kategori' => 'Drawing & Coloring Competition', "photo" => '', 'desc' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus sollicitudin gravida nunc vitae rhoncus. Sed rutrum velit non neque ultrices, et tristique mi semper. Proin egestas sed sem ac ultrices. Sed blandit pharetra nulla, ut accumsan lacus sodales sed. Curabitur sit amet rutrum metus, consectetur dignissim lorem. Donec ut sem convallis, venenatis odio non, pulvinar tortor. Pellentesque velit lectus, dignissim sit amet commodo sit amet, volutpat sed est. Donec rutrum mauris id rhoncus interdum. Integer ac consectetur metus. Nulla facilisi. Curabitur ac est commodo tellus ultricies posuere. Pellentesque tempus ut metus aliquet blandit.', 'event_id' => 2, 'jenjang' => 'sd'],
        ]);
    }
}
