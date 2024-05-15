<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class LocalGovernmentsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('local_govts')->delete();
        
        \DB::table('local_govts')->insert(array (
            0 => 
            array (
                'id' => 1,
                'state_id' => 1,
                'name' => 'Aba North',
            ),
            1 => 
            array (
                'id' => 2,
                'state_id' => 1,
                'name' => 'Aba South',
            ),
            2 => 
            array (
                'id' => 3,
                'state_id' => 1,
                'name' => 'Arochukwu',
            ),
            3 => 
            array (
                'id' => 4,
                'state_id' => 1,
                'name' => 'Bende',
            ),
            4 => 
            array (
                'id' => 5,
                'state_id' => 1,
                'name' => 'Ikwuano',
            ),
            5 => 
            array (
                'id' => 6,
                'state_id' => 1,
                'name' => 'Isiala Ngwa North',
            ),
            6 => 
            array (
                'id' => 7,
                'state_id' => 1,
                'name' => 'Isiala Ngwa South',
            ),
            7 => 
            array (
                'id' => 8,
                'state_id' => 1,
                'name' => 'Isuikwuato',
            ),
            8 => 
            array (
                'id' => 9,
                'state_id' => 1,
                'name' => 'Obi Ngwa',
            ),
            9 => 
            array (
                'id' => 10,
                'state_id' => 1,
                'name' => 'Ohafia',
            ),
            10 => 
            array (
                'id' => 11,
                'state_id' => 1,
                'name' => 'Osisioma',
            ),
            11 => 
            array (
                'id' => 12,
                'state_id' => 1,
                'name' => 'Ugwunagbo',
            ),
            12 => 
            array (
                'id' => 13,
                'state_id' => 1,
                'name' => 'Ukwa East',
            ),
            13 => 
            array (
                'id' => 14,
                'state_id' => 1,
                'name' => 'Ukwa West',
            ),
            14 => 
            array (
                'id' => 15,
                'state_id' => 1,
                'name' => 'Umuahia North',
            ),
            15 => 
            array (
                'id' => 16,
                'state_id' => 1,
                'name' => 'Umuahia South',
            ),
            16 => 
            array (
                'id' => 17,
                'state_id' => 1,
                'name' => 'Umu Nneochi',
            ),
            17 => 
            array (
                'id' => 18,
                'state_id' => 2,
                'name' => 'Demsa',
            ),
            18 => 
            array (
                'id' => 19,
                'state_id' => 2,
                'name' => 'Fufure',
            ),
            19 => 
            array (
                'id' => 20,
                'state_id' => 2,
                'name' => 'Ganye',
            ),
            20 => 
            array (
                'id' => 21,
                'state_id' => 2,
                'name' => 'Gayuk',
            ),
            21 => 
            array (
                'id' => 22,
                'state_id' => 2,
                'name' => 'Gombi',
            ),
            22 => 
            array (
                'id' => 23,
                'state_id' => 2,
                'name' => 'Grie',
            ),
            23 => 
            array (
                'id' => 24,
                'state_id' => 2,
                'name' => 'Hong',
            ),
            24 => 
            array (
                'id' => 25,
                'state_id' => 2,
                'name' => 'Jada',
            ),
            25 => 
            array (
                'id' => 26,
                'state_id' => 2,
                'name' => 'Larmurde',
            ),
            26 => 
            array (
                'id' => 27,
                'state_id' => 2,
                'name' => 'Madagali',
            ),
            27 => 
            array (
                'id' => 28,
                'state_id' => 2,
                'name' => 'Maiha',
            ),
            28 => 
            array (
                'id' => 29,
                'state_id' => 2,
                'name' => 'Mayo Belwa',
            ),
            29 => 
            array (
                'id' => 30,
                'state_id' => 2,
                'name' => 'Michika',
            ),
            30 => 
            array (
                'id' => 31,
                'state_id' => 2,
                'name' => 'Mubi North',
            ),
            31 => 
            array (
                'id' => 32,
                'state_id' => 2,
                'name' => 'Mubi South',
            ),
            32 => 
            array (
                'id' => 33,
                'state_id' => 2,
                'name' => 'Numan',
            ),
            33 => 
            array (
                'id' => 34,
                'state_id' => 2,
                'name' => 'Shelleng',
            ),
            34 => 
            array (
                'id' => 35,
                'state_id' => 2,
                'name' => 'Song',
            ),
            35 => 
            array (
                'id' => 36,
                'state_id' => 2,
                'name' => 'Toungo',
            ),
            36 => 
            array (
                'id' => 37,
                'state_id' => 2,
                'name' => 'Yola North',
            ),
            37 => 
            array (
                'id' => 38,
                'state_id' => 2,
                'name' => 'Yola South',
            ),
            38 => 
            array (
                'id' => 39,
                'state_id' => 3,
                'name' => 'Abak',
            ),
            39 => 
            array (
                'id' => 40,
                'state_id' => 3,
                'name' => 'Eastern Obolo',
            ),
            40 => 
            array (
                'id' => 41,
                'state_id' => 3,
                'name' => 'Eket',
            ),
            41 => 
            array (
                'id' => 42,
                'state_id' => 3,
                'name' => 'Esit Eket',
            ),
            42 => 
            array (
                'id' => 43,
                'state_id' => 3,
                'name' => 'Essien Udim',
            ),
            43 => 
            array (
                'id' => 44,
                'state_id' => 3,
                'name' => 'Etim Ekpo',
            ),
            44 => 
            array (
                'id' => 45,
                'state_id' => 3,
                'name' => 'Etinan',
            ),
            45 => 
            array (
                'id' => 46,
                'state_id' => 3,
                'name' => 'Ibeno',
            ),
            46 => 
            array (
                'id' => 47,
                'state_id' => 3,
                'name' => 'Ibesikpo Asutan',
            ),
            47 => 
            array (
                'id' => 48,
                'state_id' => 3,
                'name' => 'Ibiono-Ibom',
            ),
            48 => 
            array (
                'id' => 49,
                'state_id' => 3,
                'name' => 'Ika',
            ),
            49 => 
            array (
                'id' => 50,
                'state_id' => 3,
                'name' => 'Ikono',
            ),
            50 => 
            array (
                'id' => 51,
                'state_id' => 3,
                'name' => 'Ikot Abasi',
            ),
            51 => 
            array (
                'id' => 52,
                'state_id' => 3,
                'name' => 'Ikot Ekpene',
            ),
            52 => 
            array (
                'id' => 53,
                'state_id' => 3,
                'name' => 'Ini',
            ),
            53 => 
            array (
                'id' => 54,
                'state_id' => 3,
                'name' => 'Itu',
            ),
            54 => 
            array (
                'id' => 55,
                'state_id' => 3,
                'name' => 'Mbo',
            ),
            55 => 
            array (
                'id' => 56,
                'state_id' => 3,
                'name' => 'Mkpat-Enin',
            ),
            56 => 
            array (
                'id' => 57,
                'state_id' => 3,
                'name' => 'Nsit-Atai',
            ),
            57 => 
            array (
                'id' => 58,
                'state_id' => 3,
                'name' => 'Nsit-Ibom',
            ),
            58 => 
            array (
                'id' => 59,
                'state_id' => 3,
                'name' => 'Nsit-Ubium',
            ),
            59 => 
            array (
                'id' => 60,
                'state_id' => 3,
                'name' => 'Obot Akara',
            ),
            60 => 
            array (
                'id' => 61,
                'state_id' => 3,
                'name' => 'Okobo',
            ),
            61 => 
            array (
                'id' => 62,
                'state_id' => 3,
                'name' => 'Onna',
            ),
            62 => 
            array (
                'id' => 63,
                'state_id' => 3,
                'name' => 'Oron',
            ),
            63 => 
            array (
                'id' => 64,
                'state_id' => 3,
                'name' => 'Oruk Anam',
            ),
            64 => 
            array (
                'id' => 65,
                'state_id' => 3,
                'name' => 'Udung-Uko',
            ),
            65 => 
            array (
                'id' => 66,
                'state_id' => 3,
                'name' => 'Ukanafun',
            ),
            66 => 
            array (
                'id' => 67,
                'state_id' => 3,
                'name' => 'Uruan',
            ),
            67 => 
            array (
                'id' => 68,
                'state_id' => 3,
                'name' => 'Urue-Offong/Oruko',
            ),
            68 => 
            array (
                'id' => 69,
                'state_id' => 3,
                'name' => 'Uyo',
            ),
            69 => 
            array (
                'id' => 70,
                'state_id' => 4,
                'name' => 'Aguata',
            ),
            70 => 
            array (
                'id' => 71,
                'state_id' => 4,
                'name' => 'Anambra East',
            ),
            71 => 
            array (
                'id' => 72,
                'state_id' => 4,
                'name' => 'Anambra West',
            ),
            72 => 
            array (
                'id' => 73,
                'state_id' => 4,
                'name' => 'Anaocha',
            ),
            73 => 
            array (
                'id' => 74,
                'state_id' => 4,
                'name' => 'Awka North',
            ),
            74 => 
            array (
                'id' => 75,
                'state_id' => 4,
                'name' => 'Awka South',
            ),
            75 => 
            array (
                'id' => 76,
                'state_id' => 4,
                'name' => 'Ayamelum',
            ),
            76 => 
            array (
                'id' => 77,
                'state_id' => 4,
                'name' => 'Dunukofia',
            ),
            77 => 
            array (
                'id' => 78,
                'state_id' => 4,
                'name' => 'Ekwusigo',
            ),
            78 => 
            array (
                'id' => 79,
                'state_id' => 4,
                'name' => 'Idemili North',
            ),
            79 => 
            array (
                'id' => 80,
                'state_id' => 4,
                'name' => 'Idemili South',
            ),
            80 => 
            array (
                'id' => 81,
                'state_id' => 4,
                'name' => 'Ihiala',
            ),
            81 => 
            array (
                'id' => 82,
                'state_id' => 4,
                'name' => 'Njikoka',
            ),
            82 => 
            array (
                'id' => 83,
                'state_id' => 4,
                'name' => 'Nnewi North',
            ),
            83 => 
            array (
                'id' => 84,
                'state_id' => 4,
                'name' => 'Nnewi South',
            ),
            84 => 
            array (
                'id' => 85,
                'state_id' => 4,
                'name' => 'Ogbaru',
            ),
            85 => 
            array (
                'id' => 86,
                'state_id' => 4,
                'name' => 'Onitsha North',
            ),
            86 => 
            array (
                'id' => 87,
                'state_id' => 4,
                'name' => 'Onitsha South',
            ),
            87 => 
            array (
                'id' => 88,
                'state_id' => 4,
                'name' => 'Orumba North',
            ),
            88 => 
            array (
                'id' => 89,
                'state_id' => 4,
                'name' => 'Orumba South',
            ),
            89 => 
            array (
                'id' => 90,
                'state_id' => 4,
                'name' => 'Oyi',
            ),
            90 => 
            array (
                'id' => 91,
                'state_id' => 5,
                'name' => 'Alkaleri',
            ),
            91 => 
            array (
                'id' => 92,
                'state_id' => 5,
                'name' => 'Bauchi',
            ),
            92 => 
            array (
                'id' => 93,
                'state_id' => 5,
                'name' => 'Bogoro',
            ),
            93 => 
            array (
                'id' => 94,
                'state_id' => 5,
                'name' => 'Damban',
            ),
            94 => 
            array (
                'id' => 95,
                'state_id' => 5,
                'name' => 'Darazo',
            ),
            95 => 
            array (
                'id' => 96,
                'state_id' => 5,
                'name' => 'Dass',
            ),
            96 => 
            array (
                'id' => 97,
                'state_id' => 5,
                'name' => 'Gamawa',
            ),
            97 => 
            array (
                'id' => 98,
                'state_id' => 5,
                'name' => 'Ganjuwa',
            ),
            98 => 
            array (
                'id' => 99,
                'state_id' => 5,
                'name' => 'Giade',
            ),
            99 => 
            array (
                'id' => 100,
                'state_id' => 5,
                'name' => 'Itas/Gadau',
            ),
            100 => 
            array (
                'id' => 101,
                'state_id' => 5,
                'name' => 'Jama\'are',
            ),
            101 => 
            array (
                'id' => 102,
                'state_id' => 5,
                'name' => 'Katagum',
            ),
            102 => 
            array (
                'id' => 103,
                'state_id' => 5,
                'name' => 'Kirfi',
            ),
            103 => 
            array (
                'id' => 104,
                'state_id' => 5,
                'name' => 'Misau',
            ),
            104 => 
            array (
                'id' => 105,
                'state_id' => 5,
                'name' => 'Ningi',
            ),
            105 => 
            array (
                'id' => 106,
                'state_id' => 5,
                'name' => 'Shira',
            ),
            106 => 
            array (
                'id' => 107,
                'state_id' => 5,
                'name' => 'Tafawa Balewa',
            ),
            107 => 
            array (
                'id' => 108,
                'state_id' => 5,
                'name' => 'Toro',
            ),
            108 => 
            array (
                'id' => 109,
                'state_id' => 5,
                'name' => 'Warji',
            ),
            109 => 
            array (
                'id' => 110,
                'state_id' => 5,
                'name' => 'Zaki',
            ),
            110 => 
            array (
                'id' => 111,
                'state_id' => 6,
                'name' => 'Brass',
            ),
            111 => 
            array (
                'id' => 112,
                'state_id' => 6,
                'name' => 'Ekeremor',
            ),
            112 => 
            array (
                'id' => 113,
                'state_id' => 6,
                'name' => 'Kolokuma/Opokuma',
            ),
            113 => 
            array (
                'id' => 114,
                'state_id' => 6,
                'name' => 'Nembe',
            ),
            114 => 
            array (
                'id' => 115,
                'state_id' => 6,
                'name' => 'Ogbia',
            ),
            115 => 
            array (
                'id' => 116,
                'state_id' => 6,
                'name' => 'Sagbama',
            ),
            116 => 
            array (
                'id' => 117,
                'state_id' => 6,
                'name' => 'Southern Ijaw',
            ),
            117 => 
            array (
                'id' => 118,
                'state_id' => 6,
                'name' => 'Yenagoa',
            ),
            118 => 
            array (
                'id' => 119,
                'state_id' => 7,
                'name' => 'Agatu',
            ),
            119 => 
            array (
                'id' => 120,
                'state_id' => 7,
                'name' => 'Apa',
            ),
            120 => 
            array (
                'id' => 121,
                'state_id' => 7,
                'name' => 'Ado',
            ),
            121 => 
            array (
                'id' => 122,
                'state_id' => 7,
                'name' => 'Buruku',
            ),
            122 => 
            array (
                'id' => 123,
                'state_id' => 7,
                'name' => 'Gboko',
            ),
            123 => 
            array (
                'id' => 124,
                'state_id' => 7,
                'name' => 'Guma',
            ),
            124 => 
            array (
                'id' => 125,
                'state_id' => 7,
                'name' => 'Gwer East',
            ),
            125 => 
            array (
                'id' => 126,
                'state_id' => 7,
                'name' => 'Gwer West',
            ),
            126 => 
            array (
                'id' => 127,
                'state_id' => 7,
                'name' => 'Katsina-Ala',
            ),
            127 => 
            array (
                'id' => 128,
                'state_id' => 7,
                'name' => 'Konshisha',
            ),
            128 => 
            array (
                'id' => 129,
                'state_id' => 7,
                'name' => 'Kwande',
            ),
            129 => 
            array (
                'id' => 130,
                'state_id' => 7,
                'name' => 'Logo',
            ),
            130 => 
            array (
                'id' => 131,
                'state_id' => 7,
                'name' => 'Makurdi',
            ),
            131 => 
            array (
                'id' => 132,
                'state_id' => 7,
                'name' => 'Obi',
            ),
            132 => 
            array (
                'id' => 133,
                'state_id' => 7,
                'name' => 'Ogbadibo',
            ),
            133 => 
            array (
                'id' => 134,
                'state_id' => 7,
                'name' => 'Ohimini',
            ),
            134 => 
            array (
                'id' => 135,
                'state_id' => 7,
                'name' => 'Oju',
            ),
            135 => 
            array (
                'id' => 136,
                'state_id' => 7,
                'name' => 'Okpokwu',
            ),
            136 => 
            array (
                'id' => 137,
                'state_id' => 7,
                'name' => 'Oturkpo',
            ),
            137 => 
            array (
                'id' => 138,
                'state_id' => 7,
                'name' => 'Tarka',
            ),
            138 => 
            array (
                'id' => 139,
                'state_id' => 7,
                'name' => 'Ukum',
            ),
            139 => 
            array (
                'id' => 140,
                'state_id' => 7,
                'name' => 'Ushongo',
            ),
            140 => 
            array (
                'id' => 141,
                'state_id' => 7,
                'name' => 'Vandeikya',
            ),
            141 => 
            array (
                'id' => 142,
                'state_id' => 8,
                'name' => 'Abadam',
            ),
            142 => 
            array (
                'id' => 143,
                'state_id' => 8,
                'name' => 'Askira/Uba',
            ),
            143 => 
            array (
                'id' => 144,
                'state_id' => 8,
                'name' => 'Bama',
            ),
            144 => 
            array (
                'id' => 145,
                'state_id' => 8,
                'name' => 'Bayo',
            ),
            145 => 
            array (
                'id' => 146,
                'state_id' => 8,
                'name' => 'Biu',
            ),
            146 => 
            array (
                'id' => 147,
                'state_id' => 8,
                'name' => 'Chibok',
            ),
            147 => 
            array (
                'id' => 148,
                'state_id' => 8,
                'name' => 'Damboa',
            ),
            148 => 
            array (
                'id' => 149,
                'state_id' => 8,
                'name' => 'Dikwa',
            ),
            149 => 
            array (
                'id' => 150,
                'state_id' => 8,
                'name' => 'Gubio',
            ),
            150 => 
            array (
                'id' => 151,
                'state_id' => 8,
                'name' => 'Guzamala',
            ),
            151 => 
            array (
                'id' => 152,
                'state_id' => 8,
                'name' => 'Gwoza',
            ),
            152 => 
            array (
                'id' => 153,
                'state_id' => 8,
                'name' => 'Hawul',
            ),
            153 => 
            array (
                'id' => 154,
                'state_id' => 8,
                'name' => 'Jere',
            ),
            154 => 
            array (
                'id' => 155,
                'state_id' => 8,
                'name' => 'Kaga',
            ),
            155 => 
            array (
                'id' => 156,
                'state_id' => 8,
                'name' => 'Kala/Balge',
            ),
            156 => 
            array (
                'id' => 157,
                'state_id' => 8,
                'name' => 'Konduga',
            ),
            157 => 
            array (
                'id' => 158,
                'state_id' => 8,
                'name' => 'Kukawa',
            ),
            158 => 
            array (
                'id' => 159,
                'state_id' => 8,
                'name' => 'Kwaya Kusar',
            ),
            159 => 
            array (
                'id' => 160,
                'state_id' => 8,
                'name' => 'Mafa',
            ),
            160 => 
            array (
                'id' => 161,
                'state_id' => 8,
                'name' => 'Magumeri',
            ),
            161 => 
            array (
                'id' => 162,
                'state_id' => 8,
                'name' => 'Maiduguri',
            ),
            162 => 
            array (
                'id' => 163,
                'state_id' => 8,
                'name' => 'Marte',
            ),
            163 => 
            array (
                'id' => 164,
                'state_id' => 8,
                'name' => 'Mobbar',
            ),
            164 => 
            array (
                'id' => 165,
                'state_id' => 8,
                'name' => 'Monguno',
            ),
            165 => 
            array (
                'id' => 166,
                'state_id' => 8,
                'name' => 'Ngala',
            ),
            166 => 
            array (
                'id' => 167,
                'state_id' => 8,
                'name' => 'Nganzai',
            ),
            167 => 
            array (
                'id' => 168,
                'state_id' => 8,
                'name' => 'Shani',
            ),
            168 => 
            array (
                'id' => 169,
                'state_id' => 9,
                'name' => 'Abi',
            ),
            169 => 
            array (
                'id' => 170,
                'state_id' => 9,
                'name' => 'Akamkpa',
            ),
            170 => 
            array (
                'id' => 171,
                'state_id' => 9,
                'name' => 'Akpabuyo',
            ),
            171 => 
            array (
                'id' => 172,
                'state_id' => 9,
                'name' => 'Bakassi',
            ),
            172 => 
            array (
                'id' => 173,
                'state_id' => 9,
                'name' => 'Bekwarra',
            ),
            173 => 
            array (
                'id' => 174,
                'state_id' => 9,
                'name' => 'Biase',
            ),
            174 => 
            array (
                'id' => 175,
                'state_id' => 9,
                'name' => 'Boki',
            ),
            175 => 
            array (
                'id' => 176,
                'state_id' => 9,
                'name' => 'Calabar Municipal',
            ),
            176 => 
            array (
                'id' => 177,
                'state_id' => 9,
                'name' => 'Calabar South',
            ),
            177 => 
            array (
                'id' => 178,
                'state_id' => 9,
                'name' => 'Etung',
            ),
            178 => 
            array (
                'id' => 179,
                'state_id' => 9,
                'name' => 'Ikom',
            ),
            179 => 
            array (
                'id' => 180,
                'state_id' => 9,
                'name' => 'Obanliku',
            ),
            180 => 
            array (
                'id' => 181,
                'state_id' => 9,
                'name' => 'Obubra',
            ),
            181 => 
            array (
                'id' => 182,
                'state_id' => 9,
                'name' => 'Obudu',
            ),
            182 => 
            array (
                'id' => 183,
                'state_id' => 9,
                'name' => 'Odukpani',
            ),
            183 => 
            array (
                'id' => 184,
                'state_id' => 9,
                'name' => 'Ogoja',
            ),
            184 => 
            array (
                'id' => 185,
                'state_id' => 9,
                'name' => 'Yakuur',
            ),
            185 => 
            array (
                'id' => 186,
                'state_id' => 9,
                'name' => 'Yala',
            ),
            186 => 
            array (
                'id' => 187,
                'state_id' => 10,
                'name' => 'Aniocha North',
            ),
            187 => 
            array (
                'id' => 188,
                'state_id' => 10,
                'name' => 'Aniocha South',
            ),
            188 => 
            array (
                'id' => 189,
                'state_id' => 10,
                'name' => 'Bomadi',
            ),
            189 => 
            array (
                'id' => 190,
                'state_id' => 10,
                'name' => 'Burutu',
            ),
            190 => 
            array (
                'id' => 191,
                'state_id' => 10,
                'name' => 'Ethiope East',
            ),
            191 => 
            array (
                'id' => 192,
                'state_id' => 10,
                'name' => 'Ethiope West',
            ),
            192 => 
            array (
                'id' => 193,
                'state_id' => 10,
                'name' => 'Ika North East',
            ),
            193 => 
            array (
                'id' => 194,
                'state_id' => 10,
                'name' => 'Ika South',
            ),
            194 => 
            array (
                'id' => 195,
                'state_id' => 10,
                'name' => 'Isoko North',
            ),
            195 => 
            array (
                'id' => 196,
                'state_id' => 10,
                'name' => 'Isoko South',
            ),
            196 => 
            array (
                'id' => 197,
                'state_id' => 10,
                'name' => 'Ndokwa East',
            ),
            197 => 
            array (
                'id' => 198,
                'state_id' => 10,
                'name' => 'Ndokwa West',
            ),
            198 => 
            array (
                'id' => 199,
                'state_id' => 10,
                'name' => 'Okpe',
            ),
            199 => 
            array (
                'id' => 200,
                'state_id' => 10,
                'name' => 'Oshimili North',
            ),
            200 => 
            array (
                'id' => 201,
                'state_id' => 10,
                'name' => 'Oshimili South',
            ),
            201 => 
            array (
                'id' => 202,
                'state_id' => 10,
                'name' => 'Patani',
            ),
            202 => 
            array (
                'id' => 203,
                'state_id' => 10,
                'name' => 'Sapele, Delta',
            ),
            203 => 
            array (
                'id' => 204,
                'state_id' => 10,
                'name' => 'Udu',
            ),
            204 => 
            array (
                'id' => 205,
                'state_id' => 10,
                'name' => 'Ughelli North',
            ),
            205 => 
            array (
                'id' => 206,
                'state_id' => 10,
                'name' => 'Ughelli South',
            ),
            206 => 
            array (
                'id' => 207,
                'state_id' => 10,
                'name' => 'Ukwuani',
            ),
            207 => 
            array (
                'id' => 208,
                'state_id' => 10,
                'name' => 'Uvwie',
            ),
            208 => 
            array (
                'id' => 209,
                'state_id' => 10,
                'name' => 'Warri North',
            ),
            209 => 
            array (
                'id' => 210,
                'state_id' => 10,
                'name' => 'Warri South',
            ),
            210 => 
            array (
                'id' => 211,
                'state_id' => 10,
                'name' => 'Warri South West',
            ),
            211 => 
            array (
                'id' => 212,
                'state_id' => 11,
                'name' => 'Abakaliki',
            ),
            212 => 
            array (
                'id' => 213,
                'state_id' => 11,
                'name' => 'Afikpo North',
            ),
            213 => 
            array (
                'id' => 214,
                'state_id' => 11,
                'name' => 'Afikpo South',
            ),
            214 => 
            array (
                'id' => 215,
                'state_id' => 11,
                'name' => 'Ebonyi',
            ),
            215 => 
            array (
                'id' => 216,
                'state_id' => 11,
                'name' => 'Ezza North',
            ),
            216 => 
            array (
                'id' => 217,
                'state_id' => 11,
                'name' => 'Ezza South',
            ),
            217 => 
            array (
                'id' => 218,
                'state_id' => 11,
                'name' => 'Ikwo',
            ),
            218 => 
            array (
                'id' => 219,
                'state_id' => 11,
                'name' => 'Ishielu',
            ),
            219 => 
            array (
                'id' => 220,
                'state_id' => 11,
                'name' => 'Ivo',
            ),
            220 => 
            array (
                'id' => 221,
                'state_id' => 11,
                'name' => 'Izzi',
            ),
            221 => 
            array (
                'id' => 222,
                'state_id' => 11,
                'name' => 'Ohaozara',
            ),
            222 => 
            array (
                'id' => 223,
                'state_id' => 11,
                'name' => 'Ohaukwu',
            ),
            223 => 
            array (
                'id' => 224,
                'state_id' => 11,
                'name' => 'Onicha',
            ),
            224 => 
            array (
                'id' => 225,
                'state_id' => 12,
                'name' => 'Akoko-Edo',
            ),
            225 => 
            array (
                'id' => 226,
                'state_id' => 12,
                'name' => 'Egor',
            ),
            226 => 
            array (
                'id' => 227,
                'state_id' => 12,
                'name' => 'Esan Central',
            ),
            227 => 
            array (
                'id' => 228,
                'state_id' => 12,
                'name' => 'Esan North-East',
            ),
            228 => 
            array (
                'id' => 229,
                'state_id' => 12,
                'name' => 'Esan South-East',
            ),
            229 => 
            array (
                'id' => 230,
                'state_id' => 12,
                'name' => 'Esan West',
            ),
            230 => 
            array (
                'id' => 231,
                'state_id' => 12,
                'name' => 'Etsako Central',
            ),
            231 => 
            array (
                'id' => 232,
                'state_id' => 12,
                'name' => 'Etsako East',
            ),
            232 => 
            array (
                'id' => 233,
                'state_id' => 12,
                'name' => 'Etsako West',
            ),
            233 => 
            array (
                'id' => 234,
                'state_id' => 12,
                'name' => 'Igueben',
            ),
            234 => 
            array (
                'id' => 235,
                'state_id' => 12,
                'name' => 'Ikpoba Okha',
            ),
            235 => 
            array (
                'id' => 236,
                'state_id' => 12,
                'name' => 'Orhionmwon',
            ),
            236 => 
            array (
                'id' => 237,
                'state_id' => 12,
                'name' => 'Oredo',
            ),
            237 => 
            array (
                'id' => 238,
                'state_id' => 12,
                'name' => 'Ovia North-East',
            ),
            238 => 
            array (
                'id' => 239,
                'state_id' => 12,
                'name' => 'Ovia South-West',
            ),
            239 => 
            array (
                'id' => 240,
                'state_id' => 12,
                'name' => 'Owan East',
            ),
            240 => 
            array (
                'id' => 241,
                'state_id' => 12,
                'name' => 'Owan West',
            ),
            241 => 
            array (
                'id' => 242,
                'state_id' => 12,
                'name' => 'Uhunmwonde',
            ),
            242 => 
            array (
                'id' => 243,
                'state_id' => 13,
                'name' => 'Ado Ekiti',
            ),
            243 => 
            array (
                'id' => 244,
                'state_id' => 13,
                'name' => 'Efon',
            ),
            244 => 
            array (
                'id' => 245,
                'state_id' => 13,
                'name' => 'Ekiti East',
            ),
            245 => 
            array (
                'id' => 246,
                'state_id' => 13,
                'name' => 'Ekiti South-West',
            ),
            246 => 
            array (
                'id' => 247,
                'state_id' => 13,
                'name' => 'Ekiti West',
            ),
            247 => 
            array (
                'id' => 248,
                'state_id' => 13,
                'name' => 'Emure',
            ),
            248 => 
            array (
                'id' => 249,
                'state_id' => 13,
                'name' => 'Gbonyin',
            ),
            249 => 
            array (
                'id' => 250,
                'state_id' => 13,
                'name' => 'Ido Osi',
            ),
            250 => 
            array (
                'id' => 251,
                'state_id' => 13,
                'name' => 'Ijero',
            ),
            251 => 
            array (
                'id' => 252,
                'state_id' => 13,
                'name' => 'Ikere',
            ),
            252 => 
            array (
                'id' => 253,
                'state_id' => 13,
                'name' => 'Ikole',
            ),
            253 => 
            array (
                'id' => 254,
                'state_id' => 13,
                'name' => 'Ilejemeje',
            ),
            254 => 
            array (
                'id' => 255,
                'state_id' => 13,
                'name' => 'Irepodun/Ifelodun',
            ),
            255 => 
            array (
                'id' => 256,
                'state_id' => 13,
                'name' => 'Ise/Orun',
            ),
            256 => 
            array (
                'id' => 257,
                'state_id' => 13,
                'name' => 'Moba',
            ),
            257 => 
            array (
                'id' => 258,
                'state_id' => 13,
                'name' => 'Oye',
            ),
            258 => 
            array (
                'id' => 259,
                'state_id' => 14,
                'name' => 'Aninri',
            ),
            259 => 
            array (
                'id' => 260,
                'state_id' => 14,
                'name' => 'Awgu',
            ),
            260 => 
            array (
                'id' => 261,
                'state_id' => 14,
                'name' => 'Enugu East',
            ),
            261 => 
            array (
                'id' => 262,
                'state_id' => 14,
                'name' => 'Enugu North',
            ),
            262 => 
            array (
                'id' => 263,
                'state_id' => 14,
                'name' => 'Enugu South',
            ),
            263 => 
            array (
                'id' => 264,
                'state_id' => 14,
                'name' => 'Ezeagu',
            ),
            264 => 
            array (
                'id' => 265,
                'state_id' => 14,
                'name' => 'Igbo Etiti',
            ),
            265 => 
            array (
                'id' => 266,
                'state_id' => 14,
                'name' => 'Igbo Eze North',
            ),
            266 => 
            array (
                'id' => 267,
                'state_id' => 14,
                'name' => 'Igbo Eze South',
            ),
            267 => 
            array (
                'id' => 268,
                'state_id' => 14,
                'name' => 'Isi Uzo',
            ),
            268 => 
            array (
                'id' => 269,
                'state_id' => 14,
                'name' => 'Nkanu East',
            ),
            269 => 
            array (
                'id' => 270,
                'state_id' => 14,
                'name' => 'Nkanu West',
            ),
            270 => 
            array (
                'id' => 271,
                'state_id' => 14,
                'name' => 'Nsukka',
            ),
            271 => 
            array (
                'id' => 272,
                'state_id' => 14,
                'name' => 'Oji River',
            ),
            272 => 
            array (
                'id' => 273,
                'state_id' => 14,
                'name' => 'Udenu',
            ),
            273 => 
            array (
                'id' => 274,
                'state_id' => 14,
                'name' => 'Udi',
            ),
            274 => 
            array (
                'id' => 275,
                'state_id' => 14,
                'name' => 'Uzo Uwani',
            ),
            275 => 
            array (
                'id' => 276,
                'state_id' => 15,
                'name' => 'Abaji',
            ),
            276 => 
            array (
                'id' => 277,
                'state_id' => 15,
                'name' => 'Bwari',
            ),
            277 => 
            array (
                'id' => 278,
                'state_id' => 15,
                'name' => 'Gwagwalada',
            ),
            278 => 
            array (
                'id' => 279,
                'state_id' => 15,
                'name' => 'Kuje',
            ),
            279 => 
            array (
                'id' => 280,
                'state_id' => 15,
                'name' => 'Kwali',
            ),
            280 => 
            array (
                'id' => 281,
                'state_id' => 15,
                'name' => 'Municipal Area Council',
            ),
            281 => 
            array (
                'id' => 282,
                'state_id' => 16,
                'name' => 'Akko',
            ),
            282 => 
            array (
                'id' => 283,
                'state_id' => 16,
                'name' => 'Balanga',
            ),
            283 => 
            array (
                'id' => 284,
                'state_id' => 16,
                'name' => 'Billiri',
            ),
            284 => 
            array (
                'id' => 285,
                'state_id' => 16,
                'name' => 'Dukku',
            ),
            285 => 
            array (
                'id' => 286,
                'state_id' => 16,
                'name' => 'Funakaye',
            ),
            286 => 
            array (
                'id' => 287,
                'state_id' => 16,
                'name' => 'Gombe',
            ),
            287 => 
            array (
                'id' => 288,
                'state_id' => 16,
                'name' => 'Kaltungo',
            ),
            288 => 
            array (
                'id' => 289,
                'state_id' => 16,
                'name' => 'Kwami',
            ),
            289 => 
            array (
                'id' => 290,
                'state_id' => 16,
                'name' => 'Nafada',
            ),
            290 => 
            array (
                'id' => 291,
                'state_id' => 16,
                'name' => 'Shongom',
            ),
            291 => 
            array (
                'id' => 292,
                'state_id' => 16,
                'name' => 'Yamaltu/Deba',
            ),
            292 => 
            array (
                'id' => 293,
                'state_id' => 17,
                'name' => 'Aboh Mbaise',
            ),
            293 => 
            array (
                'id' => 294,
                'state_id' => 17,
                'name' => 'Ahiazu Mbaise',
            ),
            294 => 
            array (
                'id' => 295,
                'state_id' => 17,
                'name' => 'Ehime Mbano',
            ),
            295 => 
            array (
                'id' => 296,
                'state_id' => 17,
                'name' => 'Ezinihitte',
            ),
            296 => 
            array (
                'id' => 297,
                'state_id' => 17,
                'name' => 'Ideato North',
            ),
            297 => 
            array (
                'id' => 298,
                'state_id' => 17,
                'name' => 'Ideato South',
            ),
            298 => 
            array (
                'id' => 299,
                'state_id' => 17,
                'name' => 'Ihitte/Uboma',
            ),
            299 => 
            array (
                'id' => 300,
                'state_id' => 17,
                'name' => 'Ikeduru',
            ),
            300 => 
            array (
                'id' => 301,
                'state_id' => 17,
                'name' => 'Isiala Mbano',
            ),
            301 => 
            array (
                'id' => 302,
                'state_id' => 17,
                'name' => 'Isu',
            ),
            302 => 
            array (
                'id' => 303,
                'state_id' => 17,
                'name' => 'Mbaitoli',
            ),
            303 => 
            array (
                'id' => 304,
                'state_id' => 17,
                'name' => 'Ngor Okpala',
            ),
            304 => 
            array (
                'id' => 305,
                'state_id' => 17,
                'name' => 'Njaba',
            ),
            305 => 
            array (
                'id' => 306,
                'state_id' => 17,
                'name' => 'Nkwerre',
            ),
            306 => 
            array (
                'id' => 307,
                'state_id' => 17,
                'name' => 'Nwangele',
            ),
            307 => 
            array (
                'id' => 308,
                'state_id' => 17,
                'name' => 'Obowo',
            ),
            308 => 
            array (
                'id' => 309,
                'state_id' => 17,
                'name' => 'Oguta',
            ),
            309 => 
            array (
                'id' => 310,
                'state_id' => 17,
                'name' => 'Ohaji/Egbema',
            ),
            310 => 
            array (
                'id' => 311,
                'state_id' => 17,
                'name' => 'Okigwe',
            ),
            311 => 
            array (
                'id' => 312,
                'state_id' => 17,
                'name' => 'Orlu',
            ),
            312 => 
            array (
                'id' => 313,
                'state_id' => 17,
                'name' => 'Orsu',
            ),
            313 => 
            array (
                'id' => 314,
                'state_id' => 17,
                'name' => 'Oru East',
            ),
            314 => 
            array (
                'id' => 315,
                'state_id' => 17,
                'name' => 'Oru West',
            ),
            315 => 
            array (
                'id' => 316,
                'state_id' => 17,
                'name' => 'Owerri Municipal',
            ),
            316 => 
            array (
                'id' => 317,
                'state_id' => 17,
                'name' => 'Owerri North',
            ),
            317 => 
            array (
                'id' => 318,
                'state_id' => 17,
                'name' => 'Owerri West',
            ),
            318 => 
            array (
                'id' => 319,
                'state_id' => 17,
                'name' => 'Unuimo',
            ),
            319 => 
            array (
                'id' => 320,
                'state_id' => 18,
                'name' => 'Auyo',
            ),
            320 => 
            array (
                'id' => 321,
                'state_id' => 18,
                'name' => 'Babura',
            ),
            321 => 
            array (
                'id' => 322,
                'state_id' => 18,
                'name' => 'Biriniwa',
            ),
            322 => 
            array (
                'id' => 323,
                'state_id' => 18,
                'name' => 'Birnin Kudu',
            ),
            323 => 
            array (
                'id' => 324,
                'state_id' => 18,
                'name' => 'Buji',
            ),
            324 => 
            array (
                'id' => 325,
                'state_id' => 18,
                'name' => 'Dutse',
            ),
            325 => 
            array (
                'id' => 326,
                'state_id' => 18,
                'name' => 'Gagarawa',
            ),
            326 => 
            array (
                'id' => 327,
                'state_id' => 18,
                'name' => 'Garki',
            ),
            327 => 
            array (
                'id' => 328,
                'state_id' => 18,
                'name' => 'Gumel',
            ),
            328 => 
            array (
                'id' => 329,
                'state_id' => 18,
                'name' => 'Guri',
            ),
            329 => 
            array (
                'id' => 330,
                'state_id' => 18,
                'name' => 'Gwaram',
            ),
            330 => 
            array (
                'id' => 331,
                'state_id' => 18,
                'name' => 'Gwiwa',
            ),
            331 => 
            array (
                'id' => 332,
                'state_id' => 18,
                'name' => 'Hadejia',
            ),
            332 => 
            array (
                'id' => 333,
                'state_id' => 18,
                'name' => 'Jahun',
            ),
            333 => 
            array (
                'id' => 334,
                'state_id' => 18,
                'name' => 'Kafin Hausa',
            ),
            334 => 
            array (
                'id' => 335,
                'state_id' => 18,
                'name' => 'Kazaure',
            ),
            335 => 
            array (
                'id' => 336,
                'state_id' => 18,
                'name' => 'Kiri Kasama',
            ),
            336 => 
            array (
                'id' => 337,
                'state_id' => 18,
                'name' => 'Kiyawa',
            ),
            337 => 
            array (
                'id' => 338,
                'state_id' => 18,
                'name' => 'Kaugama',
            ),
            338 => 
            array (
                'id' => 339,
                'state_id' => 18,
                'name' => 'Maigatari',
            ),
            339 => 
            array (
                'id' => 340,
                'state_id' => 18,
                'name' => 'Malam Madori',
            ),
            340 => 
            array (
                'id' => 341,
                'state_id' => 18,
                'name' => 'Miga',
            ),
            341 => 
            array (
                'id' => 342,
                'state_id' => 18,
                'name' => 'Ringim',
            ),
            342 => 
            array (
                'id' => 343,
                'state_id' => 18,
                'name' => 'Roni',
            ),
            343 => 
            array (
                'id' => 344,
                'state_id' => 18,
                'name' => 'Sule Tankarkar',
            ),
            344 => 
            array (
                'id' => 345,
                'state_id' => 18,
                'name' => 'Taura',
            ),
            345 => 
            array (
                'id' => 346,
                'state_id' => 18,
                'name' => 'Yankwashi',
            ),
            346 => 
            array (
                'id' => 347,
                'state_id' => 19,
                'name' => 'Birnin Gwari',
            ),
            347 => 
            array (
                'id' => 348,
                'state_id' => 19,
                'name' => 'Chikun',
            ),
            348 => 
            array (
                'id' => 349,
                'state_id' => 19,
                'name' => 'Giwa',
            ),
            349 => 
            array (
                'id' => 350,
                'state_id' => 19,
                'name' => 'Igabi',
            ),
            350 => 
            array (
                'id' => 351,
                'state_id' => 19,
                'name' => 'Ikara',
            ),
            351 => 
            array (
                'id' => 352,
                'state_id' => 19,
                'name' => 'Jaba',
            ),
            352 => 
            array (
                'id' => 353,
                'state_id' => 19,
                'name' => 'Jema\'a',
            ),
            353 => 
            array (
                'id' => 354,
                'state_id' => 19,
                'name' => 'Kachia',
            ),
            354 => 
            array (
                'id' => 355,
                'state_id' => 19,
                'name' => 'Kaduna North',
            ),
            355 => 
            array (
                'id' => 356,
                'state_id' => 19,
                'name' => 'Kaduna South',
            ),
            356 => 
            array (
                'id' => 357,
                'state_id' => 19,
                'name' => 'Kagarko',
            ),
            357 => 
            array (
                'id' => 358,
                'state_id' => 19,
                'name' => 'Kajuru',
            ),
            358 => 
            array (
                'id' => 359,
                'state_id' => 19,
                'name' => 'Kaura',
            ),
            359 => 
            array (
                'id' => 360,
                'state_id' => 19,
                'name' => 'Kauru',
            ),
            360 => 
            array (
                'id' => 361,
                'state_id' => 19,
                'name' => 'Kubau',
            ),
            361 => 
            array (
                'id' => 362,
                'state_id' => 19,
                'name' => 'Kudan',
            ),
            362 => 
            array (
                'id' => 363,
                'state_id' => 19,
                'name' => 'Lere',
            ),
            363 => 
            array (
                'id' => 364,
                'state_id' => 19,
                'name' => 'Makarfi',
            ),
            364 => 
            array (
                'id' => 365,
                'state_id' => 19,
                'name' => 'Sabon Gari',
            ),
            365 => 
            array (
                'id' => 366,
                'state_id' => 19,
                'name' => 'Sanga',
            ),
            366 => 
            array (
                'id' => 367,
                'state_id' => 19,
                'name' => 'Soba',
            ),
            367 => 
            array (
                'id' => 368,
                'state_id' => 19,
                'name' => 'Zangon Kataf',
            ),
            368 => 
            array (
                'id' => 369,
                'state_id' => 19,
                'name' => 'Zaria',
            ),
            369 => 
            array (
                'id' => 370,
                'state_id' => 20,
                'name' => 'Ajingi',
            ),
            370 => 
            array (
                'id' => 371,
                'state_id' => 20,
                'name' => 'Albasu',
            ),
            371 => 
            array (
                'id' => 372,
                'state_id' => 20,
                'name' => 'Bagwai',
            ),
            372 => 
            array (
                'id' => 373,
                'state_id' => 20,
                'name' => 'Bebeji',
            ),
            373 => 
            array (
                'id' => 374,
                'state_id' => 20,
                'name' => 'Bichi',
            ),
            374 => 
            array (
                'id' => 375,
                'state_id' => 20,
                'name' => 'Bunkure',
            ),
            375 => 
            array (
                'id' => 376,
                'state_id' => 20,
                'name' => 'Dala',
            ),
            376 => 
            array (
                'id' => 377,
                'state_id' => 20,
                'name' => 'Dambatta',
            ),
            377 => 
            array (
                'id' => 378,
                'state_id' => 20,
                'name' => 'Dawakin Kudu',
            ),
            378 => 
            array (
                'id' => 379,
                'state_id' => 20,
                'name' => 'Dawakin Tofa',
            ),
            379 => 
            array (
                'id' => 380,
                'state_id' => 20,
                'name' => 'Doguwa',
            ),
            380 => 
            array (
                'id' => 381,
                'state_id' => 20,
                'name' => 'Fagge',
            ),
            381 => 
            array (
                'id' => 382,
                'state_id' => 20,
                'name' => 'Gabasawa',
            ),
            382 => 
            array (
                'id' => 383,
                'state_id' => 20,
                'name' => 'Garko',
            ),
            383 => 
            array (
                'id' => 384,
                'state_id' => 20,
                'name' => 'Garun Mallam',
            ),
            384 => 
            array (
                'id' => 385,
                'state_id' => 20,
                'name' => 'Gaya',
            ),
            385 => 
            array (
                'id' => 386,
                'state_id' => 20,
                'name' => 'Gezawa',
            ),
            386 => 
            array (
                'id' => 387,
                'state_id' => 20,
                'name' => 'Gwale',
            ),
            387 => 
            array (
                'id' => 388,
                'state_id' => 20,
                'name' => 'Gwarzo',
            ),
            388 => 
            array (
                'id' => 389,
                'state_id' => 20,
                'name' => 'Kabo',
            ),
            389 => 
            array (
                'id' => 390,
                'state_id' => 20,
                'name' => 'Kano Municipal',
            ),
            390 => 
            array (
                'id' => 391,
                'state_id' => 20,
                'name' => 'Karaye',
            ),
            391 => 
            array (
                'id' => 392,
                'state_id' => 20,
                'name' => 'Kibiya',
            ),
            392 => 
            array (
                'id' => 393,
                'state_id' => 20,
                'name' => 'Kiru',
            ),
            393 => 
            array (
                'id' => 394,
                'state_id' => 20,
                'name' => 'Kumbotso',
            ),
            394 => 
            array (
                'id' => 395,
                'state_id' => 20,
                'name' => 'Kunchi',
            ),
            395 => 
            array (
                'id' => 396,
                'state_id' => 20,
                'name' => 'Kura',
            ),
            396 => 
            array (
                'id' => 397,
                'state_id' => 20,
                'name' => 'Madobi',
            ),
            397 => 
            array (
                'id' => 398,
                'state_id' => 20,
                'name' => 'Makoda',
            ),
            398 => 
            array (
                'id' => 399,
                'state_id' => 20,
                'name' => 'Minjibir',
            ),
            399 => 
            array (
                'id' => 400,
                'state_id' => 20,
                'name' => 'Nasarawa',
            ),
            400 => 
            array (
                'id' => 401,
                'state_id' => 20,
                'name' => 'Rano',
            ),
            401 => 
            array (
                'id' => 402,
                'state_id' => 20,
                'name' => 'Rimin Gado',
            ),
            402 => 
            array (
                'id' => 403,
                'state_id' => 20,
                'name' => 'Rogo',
            ),
            403 => 
            array (
                'id' => 404,
                'state_id' => 20,
                'name' => 'Shanono',
            ),
            404 => 
            array (
                'id' => 405,
                'state_id' => 20,
                'name' => 'Sumaila',
            ),
            405 => 
            array (
                'id' => 406,
                'state_id' => 20,
                'name' => 'Takai',
            ),
            406 => 
            array (
                'id' => 407,
                'state_id' => 20,
                'name' => 'Tarauni',
            ),
            407 => 
            array (
                'id' => 408,
                'state_id' => 20,
                'name' => 'Tofa',
            ),
            408 => 
            array (
                'id' => 409,
                'state_id' => 20,
                'name' => 'Tsanyawa',
            ),
            409 => 
            array (
                'id' => 410,
                'state_id' => 20,
                'name' => 'Tudun Wada',
            ),
            410 => 
            array (
                'id' => 411,
                'state_id' => 20,
                'name' => 'Ungogo',
            ),
            411 => 
            array (
                'id' => 412,
                'state_id' => 20,
                'name' => 'Warawa',
            ),
            412 => 
            array (
                'id' => 413,
                'state_id' => 20,
                'name' => 'Wudil',
            ),
            413 => 
            array (
                'id' => 414,
                'state_id' => 21,
                'name' => 'Bakori',
            ),
            414 => 
            array (
                'id' => 415,
                'state_id' => 21,
                'name' => 'Batagarawa',
            ),
            415 => 
            array (
                'id' => 416,
                'state_id' => 21,
                'name' => 'Batsari',
            ),
            416 => 
            array (
                'id' => 417,
                'state_id' => 21,
                'name' => 'Baure',
            ),
            417 => 
            array (
                'id' => 418,
                'state_id' => 21,
                'name' => 'Bindawa',
            ),
            418 => 
            array (
                'id' => 419,
                'state_id' => 21,
                'name' => 'Charanchi',
            ),
            419 => 
            array (
                'id' => 420,
                'state_id' => 21,
                'name' => 'Dandume',
            ),
            420 => 
            array (
                'id' => 421,
                'state_id' => 21,
                'name' => 'Danja',
            ),
            421 => 
            array (
                'id' => 422,
                'state_id' => 21,
                'name' => 'Dan Musa',
            ),
            422 => 
            array (
                'id' => 423,
                'state_id' => 21,
                'name' => 'Daura',
            ),
            423 => 
            array (
                'id' => 424,
                'state_id' => 21,
                'name' => 'Dutsi',
            ),
            424 => 
            array (
                'id' => 425,
                'state_id' => 21,
                'name' => 'Dutsin Ma',
            ),
            425 => 
            array (
                'id' => 426,
                'state_id' => 21,
                'name' => 'Faskari',
            ),
            426 => 
            array (
                'id' => 427,
                'state_id' => 21,
                'name' => 'Funtua',
            ),
            427 => 
            array (
                'id' => 428,
                'state_id' => 21,
                'name' => 'Ingawa',
            ),
            428 => 
            array (
                'id' => 429,
                'state_id' => 21,
                'name' => 'Jibia',
            ),
            429 => 
            array (
                'id' => 430,
                'state_id' => 21,
                'name' => 'Kafur',
            ),
            430 => 
            array (
                'id' => 431,
                'state_id' => 21,
                'name' => 'Kaita',
            ),
            431 => 
            array (
                'id' => 432,
                'state_id' => 21,
                'name' => 'Kankara',
            ),
            432 => 
            array (
                'id' => 433,
                'state_id' => 21,
                'name' => 'Kankia',
            ),
            433 => 
            array (
                'id' => 434,
                'state_id' => 21,
                'name' => 'Katsina',
            ),
            434 => 
            array (
                'id' => 435,
                'state_id' => 21,
                'name' => 'Kurfi',
            ),
            435 => 
            array (
                'id' => 436,
                'state_id' => 21,
                'name' => 'Kusada',
            ),
            436 => 
            array (
                'id' => 437,
                'state_id' => 21,
                'name' => 'Mai\'Adua',
            ),
            437 => 
            array (
                'id' => 438,
                'state_id' => 21,
                'name' => 'Malumfashi',
            ),
            438 => 
            array (
                'id' => 439,
                'state_id' => 21,
                'name' => 'Mani',
            ),
            439 => 
            array (
                'id' => 440,
                'state_id' => 21,
                'name' => 'Mashi',
            ),
            440 => 
            array (
                'id' => 441,
                'state_id' => 21,
                'name' => 'Matazu',
            ),
            441 => 
            array (
                'id' => 442,
                'state_id' => 21,
                'name' => 'Musawa',
            ),
            442 => 
            array (
                'id' => 443,
                'state_id' => 21,
                'name' => 'Rimi',
            ),
            443 => 
            array (
                'id' => 444,
                'state_id' => 21,
                'name' => 'Sabuwa',
            ),
            444 => 
            array (
                'id' => 445,
                'state_id' => 21,
                'name' => 'Safana',
            ),
            445 => 
            array (
                'id' => 446,
                'state_id' => 21,
                'name' => 'Sandamu',
            ),
            446 => 
            array (
                'id' => 447,
                'state_id' => 21,
                'name' => 'Zango',
            ),
            447 => 
            array (
                'id' => 448,
                'state_id' => 22,
                'name' => 'Aleiro',
            ),
            448 => 
            array (
                'id' => 449,
                'state_id' => 22,
                'name' => 'Arewa Dandi',
            ),
            449 => 
            array (
                'id' => 450,
                'state_id' => 22,
                'name' => 'Argungu',
            ),
            450 => 
            array (
                'id' => 451,
                'state_id' => 22,
                'name' => 'Augie',
            ),
            451 => 
            array (
                'id' => 452,
                'state_id' => 22,
                'name' => 'Bagudo',
            ),
            452 => 
            array (
                'id' => 453,
                'state_id' => 22,
                'name' => 'Birnin Kebbi',
            ),
            453 => 
            array (
                'id' => 454,
                'state_id' => 22,
                'name' => 'Bunza',
            ),
            454 => 
            array (
                'id' => 455,
                'state_id' => 22,
                'name' => 'Dandi',
            ),
            455 => 
            array (
                'id' => 456,
                'state_id' => 22,
                'name' => 'Fakai',
            ),
            456 => 
            array (
                'id' => 457,
                'state_id' => 22,
                'name' => 'Gwandu',
            ),
            457 => 
            array (
                'id' => 458,
                'state_id' => 22,
                'name' => 'Jega',
            ),
            458 => 
            array (
                'id' => 459,
                'state_id' => 22,
                'name' => 'Kalgo',
            ),
            459 => 
            array (
                'id' => 460,
                'state_id' => 22,
                'name' => 'Koko/Besse',
            ),
            460 => 
            array (
                'id' => 461,
                'state_id' => 22,
                'name' => 'Maiyama',
            ),
            461 => 
            array (
                'id' => 462,
                'state_id' => 22,
                'name' => 'Ngaski',
            ),
            462 => 
            array (
                'id' => 463,
                'state_id' => 22,
                'name' => 'Sakaba',
            ),
            463 => 
            array (
                'id' => 464,
                'state_id' => 22,
                'name' => 'Shanga',
            ),
            464 => 
            array (
                'id' => 465,
                'state_id' => 22,
                'name' => 'Suru',
            ),
            465 => 
            array (
                'id' => 466,
                'state_id' => 22,
                'name' => 'Wasagu/Danko',
            ),
            466 => 
            array (
                'id' => 467,
                'state_id' => 22,
                'name' => 'Yauri',
            ),
            467 => 
            array (
                'id' => 468,
                'state_id' => 22,
                'name' => 'Zuru',
            ),
            468 => 
            array (
                'id' => 469,
                'state_id' => 23,
                'name' => 'Adavi',
            ),
            469 => 
            array (
                'id' => 470,
                'state_id' => 23,
                'name' => 'Ajaokuta',
            ),
            470 => 
            array (
                'id' => 471,
                'state_id' => 23,
                'name' => 'Ankpa',
            ),
            471 => 
            array (
                'id' => 472,
                'state_id' => 23,
                'name' => 'Bassa',
            ),
            472 => 
            array (
                'id' => 473,
                'state_id' => 23,
                'name' => 'Dekina',
            ),
            473 => 
            array (
                'id' => 474,
                'state_id' => 23,
                'name' => 'Ibaji',
            ),
            474 => 
            array (
                'id' => 475,
                'state_id' => 23,
                'name' => 'Idah',
            ),
            475 => 
            array (
                'id' => 476,
                'state_id' => 23,
                'name' => 'Igalamela Odolu',
            ),
            476 => 
            array (
                'id' => 477,
                'state_id' => 23,
                'name' => 'Ijumu',
            ),
            477 => 
            array (
                'id' => 478,
                'state_id' => 23,
                'name' => 'Kabba/Bunu',
            ),
            478 => 
            array (
                'id' => 479,
                'state_id' => 23,
                'name' => 'Kogi',
            ),
            479 => 
            array (
                'id' => 480,
                'state_id' => 23,
                'name' => 'Lokoja',
            ),
            480 => 
            array (
                'id' => 481,
                'state_id' => 23,
                'name' => 'Mopa Muro',
            ),
            481 => 
            array (
                'id' => 482,
                'state_id' => 23,
                'name' => 'Ofu',
            ),
            482 => 
            array (
                'id' => 483,
                'state_id' => 23,
                'name' => 'Ogori/Magongo',
            ),
            483 => 
            array (
                'id' => 484,
                'state_id' => 23,
                'name' => 'Okehi',
            ),
            484 => 
            array (
                'id' => 485,
                'state_id' => 23,
                'name' => 'Okene',
            ),
            485 => 
            array (
                'id' => 486,
                'state_id' => 23,
                'name' => 'Olamaboro',
            ),
            486 => 
            array (
                'id' => 487,
                'state_id' => 23,
                'name' => 'Omala',
            ),
            487 => 
            array (
                'id' => 488,
                'state_id' => 23,
                'name' => 'Yagba East',
            ),
            488 => 
            array (
                'id' => 489,
                'state_id' => 23,
                'name' => 'Yagba West',
            ),
            489 => 
            array (
                'id' => 490,
                'state_id' => 24,
                'name' => 'Asa',
            ),
            490 => 
            array (
                'id' => 491,
                'state_id' => 24,
                'name' => 'Baruten',
            ),
            491 => 
            array (
                'id' => 492,
                'state_id' => 24,
                'name' => 'Edu',
            ),
            492 => 
            array (
                'id' => 493,
                'state_id' => 24,
                'name' => 'Ekiti, Kwara State',
            ),
            493 => 
            array (
                'id' => 494,
                'state_id' => 24,
                'name' => 'Ifelodun',
            ),
            494 => 
            array (
                'id' => 495,
                'state_id' => 24,
                'name' => 'Ilorin East',
            ),
            495 => 
            array (
                'id' => 496,
                'state_id' => 24,
                'name' => 'Ilorin South',
            ),
            496 => 
            array (
                'id' => 497,
                'state_id' => 24,
                'name' => 'Ilorin West',
            ),
            497 => 
            array (
                'id' => 498,
                'state_id' => 24,
                'name' => 'Irepodun',
            ),
            498 => 
            array (
                'id' => 499,
                'state_id' => 24,
                'name' => 'Isin',
            ),
            499 => 
            array (
                'id' => 500,
                'state_id' => 24,
                'name' => 'Kaiama',
            ),
        ));
        \DB::table('local_govts')->insert(array (
            0 => 
            array (
                'id' => 501,
                'state_id' => 24,
                'name' => 'Moro',
            ),
            1 => 
            array (
                'id' => 502,
                'state_id' => 24,
                'name' => 'Offa',
            ),
            2 => 
            array (
                'id' => 503,
                'state_id' => 24,
                'name' => 'Oke Ero',
            ),
            3 => 
            array (
                'id' => 504,
                'state_id' => 24,
                'name' => 'Oyun',
            ),
            4 => 
            array (
                'id' => 505,
                'state_id' => 24,
                'name' => 'Pategi',
            ),
            5 => 
            array (
                'id' => 506,
                'state_id' => 25,
                'name' => 'Agege',
            ),
            6 => 
            array (
                'id' => 507,
                'state_id' => 25,
                'name' => 'Ajeromi-Ifelodun',
            ),
            7 => 
            array (
                'id' => 508,
                'state_id' => 25,
                'name' => 'Alimosho',
            ),
            8 => 
            array (
                'id' => 509,
                'state_id' => 25,
                'name' => 'Amuwo-Odofin',
            ),
            9 => 
            array (
                'id' => 510,
                'state_id' => 25,
                'name' => 'Apapa',
            ),
            10 => 
            array (
                'id' => 511,
                'state_id' => 25,
                'name' => 'Badagry',
            ),
            11 => 
            array (
                'id' => 512,
                'state_id' => 25,
                'name' => 'Epe',
            ),
            12 => 
            array (
                'id' => 513,
                'state_id' => 25,
                'name' => 'Eti Osa',
            ),
            13 => 
            array (
                'id' => 514,
                'state_id' => 25,
                'name' => 'Ibeju-Lekki',
            ),
            14 => 
            array (
                'id' => 515,
                'state_id' => 25,
                'name' => 'Ifako-Ijaiye',
            ),
            15 => 
            array (
                'id' => 516,
                'state_id' => 25,
                'name' => 'Ikeja',
            ),
            16 => 
            array (
                'id' => 517,
                'state_id' => 25,
                'name' => 'Ikorodu',
            ),
            17 => 
            array (
                'id' => 518,
                'state_id' => 25,
                'name' => 'Kosofe',
            ),
            18 => 
            array (
                'id' => 519,
                'state_id' => 25,
                'name' => 'Lagos Island',
            ),
            19 => 
            array (
                'id' => 520,
                'state_id' => 25,
                'name' => 'Lagos Mainland',
            ),
            20 => 
            array (
                'id' => 521,
                'state_id' => 25,
                'name' => 'Mushin',
            ),
            21 => 
            array (
                'id' => 522,
                'state_id' => 25,
                'name' => 'Ojo',
            ),
            22 => 
            array (
                'id' => 523,
                'state_id' => 25,
                'name' => 'Oshodi-Isolo',
            ),
            23 => 
            array (
                'id' => 524,
                'state_id' => 25,
                'name' => 'Shomolu',
            ),
            24 => 
            array (
                'id' => 525,
                'state_id' => 25,
                'name' => 'Surulere, Lagos State',
            ),
            25 => 
            array (
                'id' => 526,
                'state_id' => 26,
                'name' => 'Akwanga',
            ),
            26 => 
            array (
                'id' => 527,
                'state_id' => 26,
                'name' => 'Awe',
            ),
            27 => 
            array (
                'id' => 528,
                'state_id' => 26,
                'name' => 'Doma',
            ),
            28 => 
            array (
                'id' => 529,
                'state_id' => 26,
                'name' => 'Karu',
            ),
            29 => 
            array (
                'id' => 530,
                'state_id' => 26,
                'name' => 'Keana',
            ),
            30 => 
            array (
                'id' => 531,
                'state_id' => 26,
                'name' => 'Keffi',
            ),
            31 => 
            array (
                'id' => 532,
                'state_id' => 26,
                'name' => 'Kokona',
            ),
            32 => 
            array (
                'id' => 533,
                'state_id' => 26,
                'name' => 'Lafia',
            ),
            33 => 
            array (
                'id' => 534,
                'state_id' => 26,
                'name' => 'Nasarawa',
            ),
            34 => 
            array (
                'id' => 535,
                'state_id' => 26,
                'name' => 'Nasarawa Egon',
            ),
            35 => 
            array (
                'id' => 536,
                'state_id' => 26,
                'name' => 'Obi',
            ),
            36 => 
            array (
                'id' => 537,
                'state_id' => 26,
                'name' => 'Toto',
            ),
            37 => 
            array (
                'id' => 538,
                'state_id' => 26,
                'name' => 'Wamba',
            ),
            38 => 
            array (
                'id' => 539,
                'state_id' => 27,
                'name' => 'Agaie',
            ),
            39 => 
            array (
                'id' => 540,
                'state_id' => 27,
                'name' => 'Agwara',
            ),
            40 => 
            array (
                'id' => 541,
                'state_id' => 27,
                'name' => 'Bida',
            ),
            41 => 
            array (
                'id' => 542,
                'state_id' => 27,
                'name' => 'Borgu',
            ),
            42 => 
            array (
                'id' => 543,
                'state_id' => 27,
                'name' => 'Bosso',
            ),
            43 => 
            array (
                'id' => 544,
                'state_id' => 27,
                'name' => 'Chanchaga',
            ),
            44 => 
            array (
                'id' => 545,
                'state_id' => 27,
                'name' => 'Edati',
            ),
            45 => 
            array (
                'id' => 546,
                'state_id' => 27,
                'name' => 'Gbako',
            ),
            46 => 
            array (
                'id' => 547,
                'state_id' => 27,
                'name' => 'Gurara',
            ),
            47 => 
            array (
                'id' => 548,
                'state_id' => 27,
                'name' => 'Katcha',
            ),
            48 => 
            array (
                'id' => 549,
                'state_id' => 27,
                'name' => 'Kontagora',
            ),
            49 => 
            array (
                'id' => 550,
                'state_id' => 27,
                'name' => 'Lapai',
            ),
            50 => 
            array (
                'id' => 551,
                'state_id' => 27,
                'name' => 'Lavun',
            ),
            51 => 
            array (
                'id' => 552,
                'state_id' => 27,
                'name' => 'Magama',
            ),
            52 => 
            array (
                'id' => 553,
                'state_id' => 27,
                'name' => 'Mariga',
            ),
            53 => 
            array (
                'id' => 554,
                'state_id' => 27,
                'name' => 'Mashegu',
            ),
            54 => 
            array (
                'id' => 555,
                'state_id' => 27,
                'name' => 'Mokwa',
            ),
            55 => 
            array (
                'id' => 556,
                'state_id' => 27,
                'name' => 'Moya',
            ),
            56 => 
            array (
                'id' => 557,
                'state_id' => 27,
                'name' => 'Paikoro',
            ),
            57 => 
            array (
                'id' => 558,
                'state_id' => 27,
                'name' => 'Rafi',
            ),
            58 => 
            array (
                'id' => 559,
                'state_id' => 27,
                'name' => 'Rijau',
            ),
            59 => 
            array (
                'id' => 560,
                'state_id' => 27,
                'name' => 'Shiroro',
            ),
            60 => 
            array (
                'id' => 561,
                'state_id' => 27,
                'name' => 'Suleja',
            ),
            61 => 
            array (
                'id' => 562,
                'state_id' => 27,
                'name' => 'Tafa',
            ),
            62 => 
            array (
                'id' => 563,
                'state_id' => 27,
                'name' => 'Wushishi',
            ),
            63 => 
            array (
                'id' => 564,
                'state_id' => 28,
                'name' => 'Abeokuta North',
            ),
            64 => 
            array (
                'id' => 565,
                'state_id' => 28,
                'name' => 'Abeokuta South',
            ),
            65 => 
            array (
                'id' => 566,
                'state_id' => 28,
                'name' => 'Ado-Odo/Ota',
            ),
            66 => 
            array (
                'id' => 567,
                'state_id' => 28,
                'name' => 'Egbado North',
            ),
            67 => 
            array (
                'id' => 568,
                'state_id' => 28,
                'name' => 'Egbado South',
            ),
            68 => 
            array (
                'id' => 569,
                'state_id' => 28,
                'name' => 'Ewekoro',
            ),
            69 => 
            array (
                'id' => 570,
                'state_id' => 28,
                'name' => 'Ifo',
            ),
            70 => 
            array (
                'id' => 571,
                'state_id' => 28,
                'name' => 'Ijebu East',
            ),
            71 => 
            array (
                'id' => 572,
                'state_id' => 28,
                'name' => 'Ijebu North',
            ),
            72 => 
            array (
                'id' => 573,
                'state_id' => 28,
                'name' => 'Ijebu North East',
            ),
            73 => 
            array (
                'id' => 574,
                'state_id' => 28,
                'name' => 'Ijebu Ode',
            ),
            74 => 
            array (
                'id' => 575,
                'state_id' => 28,
                'name' => 'Ikenne',
            ),
            75 => 
            array (
                'id' => 576,
                'state_id' => 28,
                'name' => 'Imeko Afon',
            ),
            76 => 
            array (
                'id' => 577,
                'state_id' => 28,
                'name' => 'Ipokia',
            ),
            77 => 
            array (
                'id' => 578,
                'state_id' => 28,
                'name' => 'Obafemi Owode',
            ),
            78 => 
            array (
                'id' => 579,
                'state_id' => 28,
                'name' => 'Odeda',
            ),
            79 => 
            array (
                'id' => 580,
                'state_id' => 28,
                'name' => 'Odogbolu',
            ),
            80 => 
            array (
                'id' => 581,
                'state_id' => 28,
                'name' => 'Ogun Waterside',
            ),
            81 => 
            array (
                'id' => 582,
                'state_id' => 28,
                'name' => 'Remo North',
            ),
            82 => 
            array (
                'id' => 583,
                'state_id' => 28,
                'name' => 'Shagamu',
            ),
            83 => 
            array (
                'id' => 584,
                'state_id' => 29,
                'name' => 'Akoko North-East',
            ),
            84 => 
            array (
                'id' => 585,
                'state_id' => 29,
                'name' => 'Akoko North-West',
            ),
            85 => 
            array (
                'id' => 586,
                'state_id' => 29,
                'name' => 'Akoko South-West',
            ),
            86 => 
            array (
                'id' => 587,
                'state_id' => 29,
                'name' => 'Akoko South-East',
            ),
            87 => 
            array (
                'id' => 588,
                'state_id' => 29,
                'name' => 'Akure North',
            ),
            88 => 
            array (
                'id' => 589,
                'state_id' => 29,
                'name' => 'Akure South',
            ),
            89 => 
            array (
                'id' => 590,
                'state_id' => 29,
                'name' => 'Ese Odo',
            ),
            90 => 
            array (
                'id' => 591,
                'state_id' => 29,
                'name' => 'Idanre',
            ),
            91 => 
            array (
                'id' => 592,
                'state_id' => 29,
                'name' => 'Ifedore',
            ),
            92 => 
            array (
                'id' => 593,
                'state_id' => 29,
                'name' => 'Ilaje',
            ),
            93 => 
            array (
                'id' => 594,
                'state_id' => 29,
                'name' => 'Ile Oluji/Okeigbo',
            ),
            94 => 
            array (
                'id' => 595,
                'state_id' => 29,
                'name' => 'Irele',
            ),
            95 => 
            array (
                'id' => 596,
                'state_id' => 29,
                'name' => 'Odigbo',
            ),
            96 => 
            array (
                'id' => 597,
                'state_id' => 29,
                'name' => 'Okitipupa',
            ),
            97 => 
            array (
                'id' => 598,
                'state_id' => 29,
                'name' => 'Ondo East',
            ),
            98 => 
            array (
                'id' => 599,
                'state_id' => 29,
                'name' => 'Ondo West',
            ),
            99 => 
            array (
                'id' => 600,
                'state_id' => 29,
                'name' => 'Ose',
            ),
            100 => 
            array (
                'id' => 601,
                'state_id' => 29,
                'name' => 'Owo',
            ),
            101 => 
            array (
                'id' => 602,
                'state_id' => 30,
                'name' => 'Atakunmosa East',
            ),
            102 => 
            array (
                'id' => 603,
                'state_id' => 30,
                'name' => 'Atakunmosa West',
            ),
            103 => 
            array (
                'id' => 604,
                'state_id' => 30,
                'name' => 'Aiyedaade',
            ),
            104 => 
            array (
                'id' => 605,
                'state_id' => 30,
                'name' => 'Aiyedire',
            ),
            105 => 
            array (
                'id' => 606,
                'state_id' => 30,
                'name' => 'Boluwaduro',
            ),
            106 => 
            array (
                'id' => 607,
                'state_id' => 30,
                'name' => 'Boripe',
            ),
            107 => 
            array (
                'id' => 608,
                'state_id' => 30,
                'name' => 'Ede North',
            ),
            108 => 
            array (
                'id' => 609,
                'state_id' => 30,
                'name' => 'Ede South',
            ),
            109 => 
            array (
                'id' => 610,
                'state_id' => 30,
                'name' => 'Ife Central',
            ),
            110 => 
            array (
                'id' => 611,
                'state_id' => 30,
                'name' => 'Ife East',
            ),
            111 => 
            array (
                'id' => 612,
                'state_id' => 30,
                'name' => 'Ife North',
            ),
            112 => 
            array (
                'id' => 613,
                'state_id' => 30,
                'name' => 'Ife South',
            ),
            113 => 
            array (
                'id' => 614,
                'state_id' => 30,
                'name' => 'Egbedore',
            ),
            114 => 
            array (
                'id' => 615,
                'state_id' => 30,
                'name' => 'Ejigbo',
            ),
            115 => 
            array (
                'id' => 616,
                'state_id' => 30,
                'name' => 'Ifedayo',
            ),
            116 => 
            array (
                'id' => 617,
                'state_id' => 30,
                'name' => 'Ifelodun',
            ),
            117 => 
            array (
                'id' => 618,
                'state_id' => 30,
                'name' => 'Ila',
            ),
            118 => 
            array (
                'id' => 619,
                'state_id' => 30,
                'name' => 'Ilesa East',
            ),
            119 => 
            array (
                'id' => 620,
                'state_id' => 30,
                'name' => 'Ilesa West',
            ),
            120 => 
            array (
                'id' => 621,
                'state_id' => 30,
                'name' => 'Irepodun',
            ),
            121 => 
            array (
                'id' => 622,
                'state_id' => 30,
                'name' => 'Irewole',
            ),
            122 => 
            array (
                'id' => 623,
                'state_id' => 30,
                'name' => 'Isokan',
            ),
            123 => 
            array (
                'id' => 624,
                'state_id' => 30,
                'name' => 'Iwo',
            ),
            124 => 
            array (
                'id' => 625,
                'state_id' => 30,
                'name' => 'Obokun',
            ),
            125 => 
            array (
                'id' => 626,
                'state_id' => 30,
                'name' => 'Odo Otin',
            ),
            126 => 
            array (
                'id' => 627,
                'state_id' => 30,
                'name' => 'Ola Oluwa',
            ),
            127 => 
            array (
                'id' => 628,
                'state_id' => 30,
                'name' => 'Olorunda',
            ),
            128 => 
            array (
                'id' => 629,
                'state_id' => 30,
                'name' => 'Oriade',
            ),
            129 => 
            array (
                'id' => 630,
                'state_id' => 30,
                'name' => 'Orolu',
            ),
            130 => 
            array (
                'id' => 631,
                'state_id' => 30,
                'name' => 'Osogbo',
            ),
            131 => 
            array (
                'id' => 632,
                'state_id' => 31,
                'name' => 'Afijio',
            ),
            132 => 
            array (
                'id' => 633,
                'state_id' => 31,
                'name' => 'Akinyele',
            ),
            133 => 
            array (
                'id' => 634,
                'state_id' => 31,
                'name' => 'Atiba',
            ),
            134 => 
            array (
                'id' => 635,
                'state_id' => 31,
                'name' => 'Atisbo',
            ),
            135 => 
            array (
                'id' => 636,
                'state_id' => 31,
                'name' => 'Egbeda',
            ),
            136 => 
            array (
                'id' => 637,
                'state_id' => 31,
                'name' => 'Ibadan North',
            ),
            137 => 
            array (
                'id' => 638,
                'state_id' => 31,
                'name' => 'Ibadan North-East',
            ),
            138 => 
            array (
                'id' => 639,
                'state_id' => 31,
                'name' => 'Ibadan North-West',
            ),
            139 => 
            array (
                'id' => 640,
                'state_id' => 31,
                'name' => 'Ibadan South-East',
            ),
            140 => 
            array (
                'id' => 641,
                'state_id' => 31,
                'name' => 'Ibadan South-West',
            ),
            141 => 
            array (
                'id' => 642,
                'state_id' => 31,
                'name' => 'Ibarapa Central',
            ),
            142 => 
            array (
                'id' => 643,
                'state_id' => 31,
                'name' => 'Ibarapa East',
            ),
            143 => 
            array (
                'id' => 644,
                'state_id' => 31,
                'name' => 'Ibarapa North',
            ),
            144 => 
            array (
                'id' => 645,
                'state_id' => 31,
                'name' => 'Ido',
            ),
            145 => 
            array (
                'id' => 646,
                'state_id' => 31,
                'name' => 'Irepo',
            ),
            146 => 
            array (
                'id' => 647,
                'state_id' => 31,
                'name' => 'Iseyin',
            ),
            147 => 
            array (
                'id' => 648,
                'state_id' => 31,
                'name' => 'Itesiwaju',
            ),
            148 => 
            array (
                'id' => 649,
                'state_id' => 31,
                'name' => 'Iwajowa',
            ),
            149 => 
            array (
                'id' => 650,
                'state_id' => 31,
                'name' => 'Kajola',
            ),
            150 => 
            array (
                'id' => 651,
                'state_id' => 31,
                'name' => 'Lagelu',
            ),
            151 => 
            array (
                'id' => 652,
                'state_id' => 31,
                'name' => 'Ogbomosho North',
            ),
            152 => 
            array (
                'id' => 653,
                'state_id' => 31,
                'name' => 'Ogbomosho South',
            ),
            153 => 
            array (
                'id' => 654,
                'state_id' => 31,
                'name' => 'Ogo Oluwa',
            ),
            154 => 
            array (
                'id' => 655,
                'state_id' => 31,
                'name' => 'Olorunsogo',
            ),
            155 => 
            array (
                'id' => 656,
                'state_id' => 31,
                'name' => 'Oluyole',
            ),
            156 => 
            array (
                'id' => 657,
                'state_id' => 31,
                'name' => 'Ona Ara',
            ),
            157 => 
            array (
                'id' => 658,
                'state_id' => 31,
                'name' => 'Orelope',
            ),
            158 => 
            array (
                'id' => 659,
                'state_id' => 31,
                'name' => 'Ori Ire',
            ),
            159 => 
            array (
                'id' => 660,
                'state_id' => 31,
                'name' => 'Oyo',
            ),
            160 => 
            array (
                'id' => 661,
                'state_id' => 31,
                'name' => 'Oyo East',
            ),
            161 => 
            array (
                'id' => 662,
                'state_id' => 31,
                'name' => 'Saki East',
            ),
            162 => 
            array (
                'id' => 663,
                'state_id' => 31,
                'name' => 'Saki West',
            ),
            163 => 
            array (
                'id' => 664,
                'state_id' => 31,
                'name' => 'Surulere, Oyo State',
            ),
            164 => 
            array (
                'id' => 665,
                'state_id' => 32,
                'name' => 'Bokkos',
            ),
            165 => 
            array (
                'id' => 666,
                'state_id' => 32,
                'name' => 'Barkin Ladi',
            ),
            166 => 
            array (
                'id' => 667,
                'state_id' => 32,
                'name' => 'Bassa',
            ),
            167 => 
            array (
                'id' => 668,
                'state_id' => 32,
                'name' => 'Jos East',
            ),
            168 => 
            array (
                'id' => 669,
                'state_id' => 32,
                'name' => 'Jos North',
            ),
            169 => 
            array (
                'id' => 670,
                'state_id' => 32,
                'name' => 'Jos South',
            ),
            170 => 
            array (
                'id' => 671,
                'state_id' => 32,
                'name' => 'Kanam',
            ),
            171 => 
            array (
                'id' => 672,
                'state_id' => 32,
                'name' => 'Kanke',
            ),
            172 => 
            array (
                'id' => 673,
                'state_id' => 32,
                'name' => 'Langtang South',
            ),
            173 => 
            array (
                'id' => 674,
                'state_id' => 32,
                'name' => 'Langtang North',
            ),
            174 => 
            array (
                'id' => 675,
                'state_id' => 32,
                'name' => 'Mangu',
            ),
            175 => 
            array (
                'id' => 676,
                'state_id' => 32,
                'name' => 'Mikang',
            ),
            176 => 
            array (
                'id' => 677,
                'state_id' => 32,
                'name' => 'Pankshin',
            ),
            177 => 
            array (
                'id' => 678,
                'state_id' => 32,
                'name' => 'Qua\'an Pan',
            ),
            178 => 
            array (
                'id' => 679,
                'state_id' => 32,
                'name' => 'Riyom',
            ),
            179 => 
            array (
                'id' => 680,
                'state_id' => 32,
                'name' => 'Shendam',
            ),
            180 => 
            array (
                'id' => 681,
                'state_id' => 32,
                'name' => 'Wase',
            ),
            181 => 
            array (
                'id' => 682,
                'state_id' => 33,
                'name' => 'Abua/Odual',
            ),
            182 => 
            array (
                'id' => 683,
                'state_id' => 33,
                'name' => 'Ahoada East',
            ),
            183 => 
            array (
                'id' => 684,
                'state_id' => 33,
                'name' => 'Ahoada West',
            ),
            184 => 
            array (
                'id' => 685,
                'state_id' => 33,
                'name' => 'Akuku-Toru',
            ),
            185 => 
            array (
                'id' => 686,
                'state_id' => 33,
                'name' => 'Andoni',
            ),
            186 => 
            array (
                'id' => 687,
                'state_id' => 33,
                'name' => 'Asari-Toru',
            ),
            187 => 
            array (
                'id' => 688,
                'state_id' => 33,
                'name' => 'Bonny',
            ),
            188 => 
            array (
                'id' => 689,
                'state_id' => 33,
                'name' => 'Degema',
            ),
            189 => 
            array (
                'id' => 690,
                'state_id' => 33,
                'name' => 'Eleme',
            ),
            190 => 
            array (
                'id' => 691,
                'state_id' => 33,
                'name' => 'Emuoha',
            ),
            191 => 
            array (
                'id' => 692,
                'state_id' => 33,
                'name' => 'Etche',
            ),
            192 => 
            array (
                'id' => 693,
                'state_id' => 33,
                'name' => 'Gokana',
            ),
            193 => 
            array (
                'id' => 694,
                'state_id' => 33,
                'name' => 'Ikwerre',
            ),
            194 => 
            array (
                'id' => 695,
                'state_id' => 33,
                'name' => 'Khana',
            ),
            195 => 
            array (
                'id' => 696,
                'state_id' => 33,
                'name' => 'Obio/Akpor',
            ),
            196 => 
            array (
                'id' => 697,
                'state_id' => 33,
                'name' => 'Ogba/Egbema/Ndoni',
            ),
            197 => 
            array (
                'id' => 698,
                'state_id' => 33,
                'name' => 'Ogu/Bolo',
            ),
            198 => 
            array (
                'id' => 699,
                'state_id' => 33,
                'name' => 'Okrika',
            ),
            199 => 
            array (
                'id' => 700,
                'state_id' => 33,
                'name' => 'Omuma',
            ),
            200 => 
            array (
                'id' => 701,
                'state_id' => 33,
                'name' => 'Opobo/Nkoro',
            ),
            201 => 
            array (
                'id' => 702,
                'state_id' => 33,
                'name' => 'Oyigbo',
            ),
            202 => 
            array (
                'id' => 703,
                'state_id' => 33,
                'name' => 'Port Harcourt',
            ),
            203 => 
            array (
                'id' => 704,
                'state_id' => 33,
                'name' => 'Tai',
            ),
            204 => 
            array (
                'id' => 705,
                'state_id' => 34,
                'name' => 'Binji',
            ),
            205 => 
            array (
                'id' => 706,
                'state_id' => 34,
                'name' => 'Bodinga',
            ),
            206 => 
            array (
                'id' => 707,
                'state_id' => 34,
                'name' => 'Dange Shuni',
            ),
            207 => 
            array (
                'id' => 708,
                'state_id' => 34,
                'name' => 'Gada',
            ),
            208 => 
            array (
                'id' => 709,
                'state_id' => 34,
                'name' => 'Goronyo',
            ),
            209 => 
            array (
                'id' => 710,
                'state_id' => 34,
                'name' => 'Gudu',
            ),
            210 => 
            array (
                'id' => 711,
                'state_id' => 34,
                'name' => 'Gwadabawa',
            ),
            211 => 
            array (
                'id' => 712,
                'state_id' => 34,
                'name' => 'Illela',
            ),
            212 => 
            array (
                'id' => 713,
                'state_id' => 34,
                'name' => 'Isa',
            ),
            213 => 
            array (
                'id' => 714,
                'state_id' => 34,
                'name' => 'Kebbe',
            ),
            214 => 
            array (
                'id' => 715,
                'state_id' => 34,
                'name' => 'Kware',
            ),
            215 => 
            array (
                'id' => 716,
                'state_id' => 34,
                'name' => 'Rabah',
            ),
            216 => 
            array (
                'id' => 717,
                'state_id' => 34,
                'name' => 'Sabon Birni',
            ),
            217 => 
            array (
                'id' => 718,
                'state_id' => 34,
                'name' => 'Shagari',
            ),
            218 => 
            array (
                'id' => 719,
                'state_id' => 34,
                'name' => 'Silame',
            ),
            219 => 
            array (
                'id' => 720,
                'state_id' => 34,
                'name' => 'Sokoto North',
            ),
            220 => 
            array (
                'id' => 721,
                'state_id' => 34,
                'name' => 'Sokoto South',
            ),
            221 => 
            array (
                'id' => 722,
                'state_id' => 34,
                'name' => 'Tambuwal',
            ),
            222 => 
            array (
                'id' => 723,
                'state_id' => 34,
                'name' => 'Tangaza',
            ),
            223 => 
            array (
                'id' => 724,
                'state_id' => 34,
                'name' => 'Tureta',
            ),
            224 => 
            array (
                'id' => 725,
                'state_id' => 34,
                'name' => 'Wamako',
            ),
            225 => 
            array (
                'id' => 726,
                'state_id' => 34,
                'name' => 'Wurno',
            ),
            226 => 
            array (
                'id' => 727,
                'state_id' => 34,
                'name' => 'Yabo',
            ),
            227 => 
            array (
                'id' => 728,
                'state_id' => 35,
                'name' => 'Ardo Kola',
            ),
            228 => 
            array (
                'id' => 729,
                'state_id' => 35,
                'name' => 'Bali',
            ),
            229 => 
            array (
                'id' => 730,
                'state_id' => 35,
                'name' => 'Donga',
            ),
            230 => 
            array (
                'id' => 731,
                'state_id' => 35,
                'name' => 'Gashaka',
            ),
            231 => 
            array (
                'id' => 732,
                'state_id' => 35,
                'name' => 'Gassol',
            ),
            232 => 
            array (
                'id' => 733,
                'state_id' => 35,
                'name' => 'Ibi',
            ),
            233 => 
            array (
                'id' => 734,
                'state_id' => 35,
                'name' => 'Jalingo',
            ),
            234 => 
            array (
                'id' => 735,
                'state_id' => 35,
                'name' => 'Karim Lamido',
            ),
            235 => 
            array (
                'id' => 736,
                'state_id' => 35,
                'name' => 'Kumi',
            ),
            236 => 
            array (
                'id' => 737,
                'state_id' => 35,
                'name' => 'Lau',
            ),
            237 => 
            array (
                'id' => 738,
                'state_id' => 35,
                'name' => 'Sardauna',
            ),
            238 => 
            array (
                'id' => 739,
                'state_id' => 35,
                'name' => 'Takum',
            ),
            239 => 
            array (
                'id' => 740,
                'state_id' => 35,
                'name' => 'Ussa',
            ),
            240 => 
            array (
                'id' => 741,
                'state_id' => 35,
                'name' => 'Wukari',
            ),
            241 => 
            array (
                'id' => 742,
                'state_id' => 35,
                'name' => 'Yorro',
            ),
            242 => 
            array (
                'id' => 743,
                'state_id' => 35,
                'name' => 'Zing',
            ),
            243 => 
            array (
                'id' => 744,
                'state_id' => 36,
                'name' => 'Bade',
            ),
            244 => 
            array (
                'id' => 745,
                'state_id' => 36,
                'name' => 'Bursari',
            ),
            245 => 
            array (
                'id' => 746,
                'state_id' => 36,
                'name' => 'Damaturu',
            ),
            246 => 
            array (
                'id' => 747,
                'state_id' => 36,
                'name' => 'Fika',
            ),
            247 => 
            array (
                'id' => 748,
                'state_id' => 36,
                'name' => 'Fune',
            ),
            248 => 
            array (
                'id' => 749,
                'state_id' => 36,
                'name' => 'Geidam',
            ),
            249 => 
            array (
                'id' => 750,
                'state_id' => 36,
                'name' => 'Gujba',
            ),
            250 => 
            array (
                'id' => 751,
                'state_id' => 36,
                'name' => 'Gulani',
            ),
            251 => 
            array (
                'id' => 752,
                'state_id' => 36,
                'name' => 'Jakusko',
            ),
            252 => 
            array (
                'id' => 753,
                'state_id' => 36,
                'name' => 'Karasuwa',
            ),
            253 => 
            array (
                'id' => 754,
                'state_id' => 36,
                'name' => 'Machina',
            ),
            254 => 
            array (
                'id' => 755,
                'state_id' => 36,
                'name' => 'Nangere',
            ),
            255 => 
            array (
                'id' => 756,
                'state_id' => 36,
                'name' => 'Nguru',
            ),
            256 => 
            array (
                'id' => 757,
                'state_id' => 36,
                'name' => 'Potiskum',
            ),
            257 => 
            array (
                'id' => 758,
                'state_id' => 36,
                'name' => 'Tarmuwa',
            ),
            258 => 
            array (
                'id' => 759,
                'state_id' => 36,
                'name' => 'Yunusari',
            ),
            259 => 
            array (
                'id' => 760,
                'state_id' => 36,
                'name' => 'Yusufari',
            ),
            260 => 
            array (
                'id' => 761,
                'state_id' => 37,
                'name' => 'Anka',
            ),
            261 => 
            array (
                'id' => 762,
                'state_id' => 37,
                'name' => 'Bakura',
            ),
            262 => 
            array (
                'id' => 763,
                'state_id' => 37,
                'name' => 'Birnin Magaji/Kiyaw',
            ),
            263 => 
            array (
                'id' => 764,
                'state_id' => 37,
                'name' => 'Bukkuyum',
            ),
            264 => 
            array (
                'id' => 765,
                'state_id' => 37,
                'name' => 'Bungudu',
            ),
            265 => 
            array (
                'id' => 766,
                'state_id' => 37,
                'name' => 'Gummi',
            ),
            266 => 
            array (
                'id' => 767,
                'state_id' => 37,
                'name' => 'Gusau',
            ),
            267 => 
            array (
                'id' => 768,
                'state_id' => 37,
                'name' => 'Kaura Namoda',
            ),
            268 => 
            array (
                'id' => 769,
                'state_id' => 37,
                'name' => 'Maradun',
            ),
            269 => 
            array (
                'id' => 770,
                'state_id' => 37,
                'name' => 'Maru',
            ),
            270 => 
            array (
                'id' => 771,
                'state_id' => 37,
                'name' => 'Shinkafi',
            ),
            271 => 
            array (
                'id' => 772,
                'state_id' => 37,
                'name' => 'Talata Mafara',
            ),
            272 => 
            array (
                'id' => 773,
                'state_id' => 37,
                'name' => 'Chafe',
            ),
            273 => 
            array (
                'id' => 774,
                'state_id' => 37,
                'name' => 'Zurmi',
            ),
        ));
        
        
    }
}