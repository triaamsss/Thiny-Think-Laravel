<?php

namespace App\Data;

class HijaiyahData
{
    public static function basicLetters(): array
    {
        return [
            ['index' => 1,  'name' => 'Alif',  'arabic' => 'ا',  'audio' => 'hijaiyah/alif.mp3',  'image' => 'hijaiyah/huruf/1.png'],
            ['index' => 2,  'name' => 'Ba',    'arabic' => 'ب',    'audio' => 'hijaiyah/ba.mp3',    'image' => 'hijaiyah/huruf/2.png'],
            ['index' => 3,  'name' => 'Ta',    'arabic' => 'ت',    'audio' => 'hijaiyah/ta.mp3',    'image' => 'hijaiyah/huruf/3.png'],
            ['index' => 4,  'name' => 'Tsa',   'arabic' => 'ث',   'audio' => 'hijaiyah/tsa.mp3',   'image' => 'hijaiyah/huruf/4.png'],
            ['index' => 5,  'name' => 'Jim',   'arabic' => 'ج',   'audio' => 'hijaiyah/jim.mp3',   'image' => 'hijaiyah/huruf/5.png'],
            ['index' => 6,  'name' => 'Ha',    'arabic' => 'ح',    'audio' => 'hijaiyah/ha.mp3',    'image' => 'hijaiyah/huruf/6.png'],
            ['index' => 7,  'name' => 'Kha',   'arabic' => 'خ',   'audio' => 'hijaiyah/kha.mp3',   'image' => 'hijaiyah/huruf/7.png'],
            ['index' => 8,  'name' => 'Dal',   'arabic' => 'د',   'audio' => 'hijaiyah/dal.mp3',   'image' => 'hijaiyah/huruf/8.png'],
            ['index' => 9,  'name' => 'Dzal',  'arabic' => 'ذ',  'audio' => 'hijaiyah/dzal.mp3',  'image' => 'hijaiyah/huruf/9.png'],
            ['index' => 10, 'name' => 'Ra',    'arabic' => 'ر',    'audio' => 'hijaiyah/ra.mp3',    'image' => 'hijaiyah/huruf/10.png'],
            ['index' => 11, 'name' => 'Zai',   'arabic' => 'ز',   'audio' => 'hijaiyah/zai.mp3',   'image' => 'hijaiyah/huruf/11.png'],
            ['index' => 12, 'name' => 'Sin',   'arabic' => 'س',   'audio' => 'hijaiyah/sin.mp3',   'image' => 'hijaiyah/huruf/12.png'],
            ['index' => 13, 'name' => 'Syin',  'arabic' => 'ش',  'audio' => 'hijaiyah/syin.mp3',  'image' => 'hijaiyah/huruf/13.png'],
            ['index' => 14, 'name' => 'Shad',  'arabic' => 'ص',  'audio' => 'hijaiyah/shad.mp3',  'image' => 'hijaiyah/huruf/14.png'],
            ['index' => 15, 'name' => 'Dhad',  'arabic' => 'ض',  'audio' => 'hijaiyah/dhad.mp3',  'image' => 'hijaiyah/huruf/15.png'],
            ['index' => 16, 'name' => 'Tha',   'arabic' => 'ط',   'audio' => 'hijaiyah/tha.mp3',   'image' => 'hijaiyah/huruf/16.png'],
            ['index' => 17, 'name' => 'Zha',   'arabic' => 'ظ',   'audio' => 'hijaiyah/zha.mp3',   'image' => 'hijaiyah/huruf/17.png'],
            ['index' => 18, 'name' => 'Ain',   'arabic' => 'ع',   'audio' => 'hijaiyah/ain.mp3',   'image' => 'hijaiyah/huruf/18.png'],
            ['index' => 19, 'name' => 'Ghain', 'arabic' => 'غ', 'audio' => 'hijaiyah/ghain.mp3', 'image' => 'hijaiyah/huruf/19.png'],
            ['index' => 20, 'name' => 'Fa',    'arabic' => 'ف',    'audio' => 'hijaiyah/fa.mp3',    'image' => 'hijaiyah/huruf/20.png'],
            ['index' => 21, 'name' => 'Qaf',   'arabic' => 'ق',   'audio' => 'hijaiyah/qaf.mp3',   'image' => 'hijaiyah/huruf/21.png'],
            ['index' => 22, 'name' => 'Kaf',   'arabic' => 'ك',   'audio' => 'hijaiyah/kaf.mp3',   'image' => 'hijaiyah/huruf/22.png'],
            ['index' => 23, 'name' => 'Lam',   'arabic' => 'ل',   'audio' => 'hijaiyah/lam.mp3',   'image' => 'hijaiyah/huruf/23.png'],
            ['index' => 24, 'name' => 'Mim',   'arabic' => 'م',   'audio' => 'hijaiyah/mim.mp3',   'image' => 'hijaiyah/huruf/24.png'],
            ['index' => 25, 'name' => 'Nun',   'arabic' => 'ن',   'audio' => 'hijaiyah/nun.mp3',   'image' => 'hijaiyah/huruf/25.png'],
            ['index' => 26, 'name' => 'Waw',   'arabic' => 'و',   'audio' => 'hijaiyah/waw.mp3',   'image' => 'hijaiyah/huruf/26.png'],
            ['index' => 27, 'name' => "Ha'",   'arabic' => 'ه',   'audio' => 'hijaiyah/ha2.mp3',   'image' => 'hijaiyah/huruf/27.png'],
            ['index' => 28, 'name' => 'Ya',    'arabic' => 'ي',    'audio' => 'hijaiyah/ya.mp3',    'image' => 'hijaiyah/huruf/28.png'],
        ];
    }

    public static function fatahLetters(): array
    {
        return [
            ['index' => 1,  'name' => 'Alif',  'arabic' => 'اَ', 'sound' => 'A',    'audio' => 'harakat/a.mp3'],
            ['index' => 2,  'name' => 'Ba',    'arabic' => 'بَ', 'sound' => 'Ba',   'audio' => 'harakat/ba.mp3'],
            ['index' => 3,  'name' => 'Ta',    'arabic' => 'تَ', 'sound' => 'Ta',   'audio' => 'harakat/ta.mp3'],
            ['index' => 4,  'name' => 'Tsa',   'arabic' => 'ثَ', 'sound' => 'Tsa',  'audio' => 'harakat/tsa.mp3'],
            ['index' => 5,  'name' => 'Jim',   'arabic' => 'جَ', 'sound' => 'Ja',   'audio' => 'harakat/ja.mp3'],
            ['index' => 6,  'name' => 'Ha',    'arabic' => 'حَ', 'sound' => 'Ha',   'audio' => 'harakat/ha.mp3'],
            ['index' => 7,  'name' => 'Kha',   'arabic' => 'خَ', 'sound' => 'Kha',  'audio' => 'harakat/kha.mp3'],
            ['index' => 8,  'name' => 'Dal',   'arabic' => 'دَ', 'sound' => 'Da',   'audio' => 'harakat/da.mp3'],
            ['index' => 9,  'name' => 'Dzal',  'arabic' => 'ذَ', 'sound' => 'Dza',  'audio' => 'harakat/dza.mp3'],
            ['index' => 10, 'name' => 'Ra',    'arabic' => 'رَ', 'sound' => 'Ra',   'audio' => 'harakat/ra.mp3'],
            ['index' => 11, 'name' => 'Zai',   'arabic' => 'زَ', 'sound' => 'Za',   'audio' => 'harakat/za.mp3'],
            ['index' => 12, 'name' => 'Sin',   'arabic' => 'سَ', 'sound' => 'Sa',   'audio' => 'harakat/sa.mp3'],
            ['index' => 13, 'name' => 'Syin',  'arabic' => 'شَ', 'sound' => 'Sya',  'audio' => 'harakat/sya.mp3'],
            ['index' => 14, 'name' => 'Shad',  'arabic' => 'صَ', 'sound' => 'Sha',  'audio' => 'harakat/sha.mp3'],
            ['index' => 15, 'name' => 'Dhad',  'arabic' => 'ضَ', 'sound' => 'Dha',  'audio' => 'harakat/dha.mp3'],
            ['index' => 16, 'name' => 'Tha',   'arabic' => 'طَ', 'sound' => 'Tha',  'audio' => 'harakat/tha.mp3'],
            ['index' => 17, 'name' => 'Zha',   'arabic' => 'ظَ', 'sound' => 'Zha',  'audio' => 'harakat/zha.mp3'],
            ['index' => 18, 'name' => 'Ain',   'arabic' => 'عَ', 'sound' => '\'A',  'audio' => 'harakat/ain.mp3'],
            ['index' => 19, 'name' => 'Ghain', 'arabic' => 'غَ', 'sound' => 'Gha',  'audio' => 'harakat/gha.mp3'],
            ['index' => 20, 'name' => 'Fa',    'arabic' => 'فَ', 'sound' => 'Fa',   'audio' => 'harakat/fa.mp3'],
            ['index' => 21, 'name' => 'Qaf',   'arabic' => 'قَ', 'sound' => 'Qa',   'audio' => 'harakat/qa.mp3'],
            ['index' => 22, 'name' => 'Kaf',   'arabic' => 'كَ', 'sound' => 'Ka',   'audio' => 'harakat/ka.mp3'],
            ['index' => 23, 'name' => 'Lam',   'arabic' => 'لَ', 'sound' => 'La',   'audio' => 'harakat/la.mp3'],
            ['index' => 24, 'name' => 'Mim',   'arabic' => 'مَ', 'sound' => 'Ma',   'audio' => 'harakat/ma.mp3'],
            ['index' => 25, 'name' => 'Nun',   'arabic' => 'نَ', 'sound' => 'Na',   'audio' => 'harakat/na.mp3'],
            ['index' => 26, 'name' => 'Waw',   'arabic' => 'وَ', 'sound' => 'Wa',   'audio' => 'harakat/wa.mp3'],
            ['index' => 27, 'name' => "Ha'",   'arabic' => 'هَ', 'sound' => "Ha'",  'audio' => 'harakat/ha2.mp3'],
            ['index' => 28, 'name' => 'Ya',    'arabic' => 'يَ', 'sound' => 'Ya',   'audio' => 'harakat/ya.mp3'],
        ];
    }
}