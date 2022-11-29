<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Country;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Country::create([
            'IEBStaatNr' => '93081',
            'Bezeichnung' => 'Österreich',
            'Bezeichnung_en' => 'Austria',
            'ISO' => 'AUT',
            'iban' =>'AT',
            'EU' =>'1',
            'Arbeitserlaubnis' =>'1',
            'Aufenthaltserlaubnis' =>'1',
        ]);
        Country::create([
            'IEBStaatNr' => '94225',
            'Bezeichnung' => 'Keine Angabe',
            'Bezeichnung_en' => 'not specified',
            'ISO' => 'dd',
            'iban' =>'dd',
            'EU' =>'0',
            'Arbeitserlaubnis' =>'0',
            'Aufenthaltserlaubnis' =>'0',
        ]);

        Country::create([
            'IEBStaatNr' => '94881',
            'Bezeichnung' => 'Afghanistan',
            'Bezeichnung_en' => 'Afghanistan',
            'ISO' => 'AFG',
            'iban' =>'',
            'EU' =>'0',
            'Arbeitserlaubnis' =>'0',
            'Aufenthaltserlaubnis' =>'0',
        ]);
        Country::create([
            'IEBStaatNr' => '94882',
            'Bezeichnung' => 'Ägypten',
            'Bezeichnung_en' => 'Egypt',
            'ISO' => 'EGY',
            'iban' =>'',
            'EU' =>'0',
            'Arbeitserlaubnis' =>'0',
            'Aufenthaltserlaubnis' =>'0',
        ]);
        Country::create([
            'IEBStaatNr' => '94883',
            'Bezeichnung' => 'Albanien',
            'Bezeichnung_en' => 'Albania',
            'ISO' => 'ALB',
            'iban' =>'AL',
            'EU' =>'0',
            'Arbeitserlaubnis' =>'0',
            'Aufenthaltserlaubnis' =>'0',
        ]);
            Country::create([
            'IEBStaatNr' => '94884',
            'Bezeichnung' => 'Algerien',
            'Bezeichnung_en' => 'Algeria',
            'ISO' => 'DZA',
            'iban' =>'',
            'EU' =>'0',
            'Arbeitserlaubnis' =>'0',
            'Aufenthaltserlaubnis' =>'0',
        ]);
        Country::create([
            'IEBStaatNr' => '94885',
            'Bezeichnung' => 'Andorra',
            'Bezeichnung_en' => 'Andorra',
            'ISO' => 'AND',
            'iban' =>'',
            'EU' =>'0',
            'Arbeitserlaubnis' =>'0',
            'Aufenthaltserlaubnis' =>'0',
        ]);
         Country::create([
            'IEBStaatNr' => '94886',
            'Bezeichnung' => 'Angola',
            'Bezeichnung_en' => 'Angola',
            'ISO' => 'AGO',
            'iban' =>'',
            'EU' =>'0',
            'Arbeitserlaubnis' =>'0',
            'Aufenthaltserlaubnis' =>'0',
        ]);
         Country::create([
            'IEBStaatNr' => '94887',
            'Bezeichnung' => 'Antigua und Barbuda',
            'Bezeichnung_en' => 'Antigua and Barbuda',
            'ISO' => 'ATG',
            'iban' =>'',
            'EU' =>'0',
            'Arbeitserlaubnis' =>'0',
            'Aufenthaltserlaubnis' =>'0',
        ]);
         Country::create([
            'IEBStaatNr' => '94888',
            'Bezeichnung' => 'Äquatorialguinea',
            'Bezeichnung_en' => 'Equatorial Guinea',
            'ISO' => 'GNQ',
            'iban' =>'',
            'EU' =>'0',
            'Arbeitserlaubnis' =>'0',
            'Aufenthaltserlaubnis' =>'0',
        ]);
        Country::create([
            'IEBStaatNr' => '94889',
            'Bezeichnung' => 'Argentinien',
            'Bezeichnung_en' => 'Argentina',
            'ISO' => 'ARG',
            'iban' =>'AR',
            'EU' =>'0',
            'Arbeitserlaubnis' =>'0',
            'Aufenthaltserlaubnis' =>'0',
        ]);
        Country::create([
            'IEBStaatNr' => '94890',
            'Bezeichnung' => 'Armenien',
            'Bezeichnung_en' => 'Armenia',
            'ISO' => 'ARM',
            'iban' =>'',
            'EU' =>'0',
            'Arbeitserlaubnis' =>'0',
            'Aufenthaltserlaubnis' =>'0',
        ]);
        Country::create([
            'IEBStaatNr' => '94891',
            'Bezeichnung' => 'Aserbaidschan',
            'Bezeichnung_en' => 'Azerbaijan',
            'ISO' => 'AZE',
            'iban' =>'',
            'EU' =>'0',
            'Arbeitserlaubnis' =>'0',
            'Aufenthaltserlaubnis' =>'0',
        ]);
         Country::create([
            'IEBStaatNr' => '94892',
            'Bezeichnung' => 'Äthiopien',
            'Bezeichnung_en' => 'Ethiopia',
            'ISO' => 'ATH',
            'iban' =>'',
            'EU' =>'0',
            'Arbeitserlaubnis' =>'0',
            'Aufenthaltserlaubnis' =>'0',
        ]);
        Country::create([
            'IEBStaatNr' => '94893',
            'Bezeichnung' => 'Australien',
            'Bezeichnung_en' => 'Australia',
            'ISO' => 'AUS',
            'iban' =>'AU',
            'EU' =>'0',
            'Arbeitserlaubnis' =>'0',
            'Aufenthaltserlaubnis' =>'0',
        ]);
         Country::create([
            'IEBStaatNr' => '94894',
            'Bezeichnung' => 'Bahamas',
            'Bezeichnung_en' => 'Bahamas',
            'ISO' => 'BHS',
            'iban' =>'',
            'EU' =>'0',
            'Arbeitserlaubnis' =>'0',
            'Aufenthaltserlaubnis' =>'0',
        ]);
        Country::create([
            'IEBStaatNr' => '94895',
            'Bezeichnung' => 'Bahrain',
            'Bezeichnung_en' => 'Bahrain',
            'ISO' => 'BHR',
            'iban' =>'BH',
            'EU' =>'0',
            'Arbeitserlaubnis' =>'0',
            'Aufenthaltserlaubnis' =>'0',
        ]);
        Country::create([
            'IEBStaatNr' => '94896',
            'Bezeichnung' => 'Bangladesch',
            'Bezeichnung_en' => 'Bangladesh',
            'ISO' => 'BGD',
            'iban' =>'',
            'EU' =>'0',
            'Arbeitserlaubnis' =>'0',
            'Aufenthaltserlaubnis' =>'0',
        ]);
        Country::create([
            'IEBStaatNr' => '94897',
            'Bezeichnung' => 'Barbados',
            'Bezeichnung_en' => 'Barbados',
            'ISO' => 'BRB',
            'iban' =>'',
            'EU' =>'0',
            'Arbeitserlaubnis' =>'0',
            'Aufenthaltserlaubnis' =>'0',
        ]);
        Country::create([
            'IEBStaatNr' => '94898',
            'Bezeichnung' => 'Weißrussland (Belarus)',
            'Bezeichnung_en' => 'Belarus',
            'ISO' => 'BLR',
            'iban' =>'BY',
            'EU' =>'0',
            'Arbeitserlaubnis' =>'0',
            'Aufenthaltserlaubnis' =>'0',
        ]);
         Country::create([
            'IEBStaatNr' => '94899',
            'Bezeichnung' => 'Belgien',
            'Bezeichnung_en' => 'Belgium',
            'ISO' => 'BEL',
            'iban' =>'BE',
            'EU' =>'1',
            'Arbeitserlaubnis' =>'1',
            'Aufenthaltserlaubnis' =>'1',
        ]);
         Country::create([
            'IEBStaatNr' => '94900',
            'Bezeichnung' => 'Belize',
            'Bezeichnung_en' => 'Belize',
            'ISO' => 'BLZ',
            'iban' =>'',
            'EU' =>'0',
            'Arbeitserlaubnis' =>'0',
            'Aufenthaltserlaubnis' =>'0',
        ]);
        Country::create([
            'IEBStaatNr' => '94901',
            'Bezeichnung' => 'Benin',
            'Bezeichnung_en' => 'Benin',
            'ISO' => 'BEN',
            'iban' =>'',
            'EU' =>'0',
            'Arbeitserlaubnis' =>'0',
            'Aufenthaltserlaubnis' =>'0',
        ]);
        Country::create([
            'IEBStaatNr' => '94902',
            'Bezeichnung' => 'Bhutan',
            'Bezeichnung_en' => 'Bhutan',
            'ISO' => 'BTN',
            'iban' =>'',
            'EU' =>'0',
            'Arbeitserlaubnis' =>'0',
            'Aufenthaltserlaubnis' =>'0',
        ]);
         Country::create([
            'IEBStaatNr' => '94903',
            'Bezeichnung' => 'Bolivien',
            'Bezeichnung_en' => 'Bolivia',
            'ISO' => 'BOL',
            'iban' =>'BO',
            'EU' =>'0',
            'Arbeitserlaubnis' =>'0',
            'Aufenthaltserlaubnis' =>'0',
        ]);
         Country::create([
            'IEBStaatNr' => '94904',
            'Bezeichnung' => 'Bosnien und Herzegowina',
            'Bezeichnung_en' => 'Bosnia and Herzegovina',
            'ISO' => 'BIH',
            'iban' =>'BA',
            'EU' =>'0',
            'Arbeitserlaubnis' =>'0',
            'Aufenthaltserlaubnis' =>'0',
        ]);
        Country::create([
            'IEBStaatNr' => '94905',
            'Bezeichnung' => 'Botswana (Botsuana)',
            'Bezeichnung_en' => 'Botswana',
            'ISO' => 'BWA',
            'iban' =>'',
            'EU' =>'0',
            'Arbeitserlaubnis' =>'0',
            'Aufenthaltserlaubnis' =>'0',
        ]);
        Country::create([
            'IEBStaatNr' => '94906',
            'Bezeichnung' => 'Brasilien',
            'Bezeichnung_en' => 'Brazil',
            'ISO' => 'BRA',
            'iban' =>'BR',
            'EU' =>'0',
            'Arbeitserlaubnis' =>'0',
            'Aufenthaltserlaubnis' =>'0',
        ]);
        Country::create([
            'IEBStaatNr' => '94907',
            'Bezeichnung' => 'Brunei Darussalam',
            'Bezeichnung_en' => 'Brunei Darussalam',
            'ISO' => 'BRN',
            'iban' =>'',
            'EU' =>'0',
            'Arbeitserlaubnis' =>'0',
            'Aufenthaltserlaubnis' =>'0',
        ]);
        Country::create([
            'IEBStaatNr' => '94908',
            'Bezeichnung' => 'Bulgarien',
            'Bezeichnung_en' => 'Bulgaria',
            'ISO' => 'BGR',
            'iban' =>'BG',
            'EU' =>'1',
            'Arbeitserlaubnis' =>'1',
            'Aufenthaltserlaubnis' =>'1',
        ]);
        Country::create([
            'IEBStaatNr' => '94909',
            'Bezeichnung' => 'Burkina Faso',
            'Bezeichnung_en' => 'Burkina Faso',
            'ISO' => 'BFA',
            'iban' =>'',
            'EU' =>'0',
            'Arbeitserlaubnis' =>'0',
            'Aufenthaltserlaubnis' =>'0',
        ]);
        Country::create([
            'IEBStaatNr' => '94910',
            'Bezeichnung' => 'Burundi',
            'Bezeichnung_en' => 'Burundi',
            'ISO' => 'BDI',
            'iban' =>'',
            'EU' =>'0',
            'Arbeitserlaubnis' =>'0',
            'Aufenthaltserlaubnis' =>'0',
        ]);
        Country::create([
            'IEBStaatNr' => '94911',
            'Bezeichnung' => 'Chile',
            'Bezeichnung_en' => 'Chile',
            'ISO' => 'CHL',
            'iban' =>'CL',
            'EU' =>'0',
            'Arbeitserlaubnis' =>'0',
            'Aufenthaltserlaubnis' =>'0',
        ]);
        Country::create([
            'IEBStaatNr' => '94912',
            'Bezeichnung' => 'China',
            'Bezeichnung_en' => 'China',
            'ISO' => 'CHN',
            'iban' =>'',
            'EU' =>'0',
            'Arbeitserlaubnis' =>'0',
            'Aufenthaltserlaubnis' =>'0',
        ]);
        Country::create([
            'IEBStaatNr' => '94913',
            'Bezeichnung' => 'Costa Rica',
            'Bezeichnung_en' => 'Costa Rica',
            'ISO' => 'CRI',
            'iban' =>'CR',
            'EU' =>'0',
            'Arbeitserlaubnis' =>'0',
            'Aufenthaltserlaubnis' =>'0',
        ]);
        Country::create([
            'IEBStaatNr' => '94914',
            'Bezeichnung' => 'Elfenbeinküste (Côte d´Ivoire)',
            'Bezeichnung_en' => 'Ivory Coast (Côte d´Ivoire)',
            'ISO' => 'CIV',
            'iban' =>'',
            'EU' =>'0',
            'Arbeitserlaubnis' =>'0',
            'Aufenthaltserlaubnis' =>'0',
        ]);
        Country::create([
            'IEBStaatNr' => '94915',
            'Bezeichnung' => 'Dänemark',
            'Bezeichnung_en' => 'Denmark',
            'ISO' => 'DNK',
            'iban' =>'DK',
            'EU' =>'1',
            'Arbeitserlaubnis' =>'1',
            'Aufenthaltserlaubnis' =>'1',
        ]);
        Country::create([
            'IEBStaatNr' => '94916',
            'Bezeichnung' => 'Deutschland',
            'Bezeichnung_en' => 'Germany',
            'ISO' => 'DEU',
            'iban' =>'DE',
            'EU' =>'1',
            'Arbeitserlaubnis' =>'1',
            'Aufenthaltserlaubnis' =>'1',
        ]);
        Country::create([
            'IEBStaatNr' => '94917',
            'Bezeichnung' => '',
            'Bezeichnung_en' => '',
            'ISO' => '',
            'iban' =>'',
            'EU' =>'0',
            'Arbeitserlaubnis' =>'0',
            'Aufenthaltserlaubnis' =>'0',
        ]);
        Country::create([
            'IEBStaatNr' => '94903',
            'Bezeichnung' => 'Dominica',
            'Bezeichnung_en' => 'Dominica',
            'ISO' => 'DME',
            'iban' =>'',
            'EU' =>'0',
            'Arbeitserlaubnis' =>'0',
            'Aufenthaltserlaubnis' =>'0',
        ]);
        Country::create([
            'IEBStaatNr' => '94918',
            'Bezeichnung' => 'Dominikanische Republik',
            'Bezeichnung_en' => 'Dominican Republic',
            'ISO' => 'DOM',
            'iban' =>'DO',
            'EU' =>'0',
            'Arbeitserlaubnis' =>'0',
            'Aufenthaltserlaubnis' =>'0',
        ]);
        Country::create([
            'IEBStaatNr' => '94919',
            'Bezeichnung' => 'Dschibuti',
            'Bezeichnung_en' => 'Djibouti',
            'ISO' => 'DJI',
            'iban' =>'',
            'EU' =>'0',
            'Arbeitserlaubnis' =>'0',
            'Aufenthaltserlaubnis' =>'0',
        ]);
        Country::create([
            'IEBStaatNr' => '94920',
            'Bezeichnung' => 'Ecuador',
            'Bezeichnung_en' => 'Ecuador',
            'ISO' => 'ECU',
            'iban' =>'EC',
            'EU' =>'0',
            'Arbeitserlaubnis' =>'0',
            'Aufenthaltserlaubnis' =>'0',
        ]);
        Country::create([
            'IEBStaatNr' => '94921',
            'Bezeichnung' => 'El Salvador',
            'Bezeichnung_en' => 'El Salvador',
            'ISO' => 'SLV',
            'iban' =>'SL',
            'EU' =>'0',
            'Arbeitserlaubnis' =>'0',
            'Aufenthaltserlaubnis' =>'0',
        ]);
        Country::create([
            'IEBStaatNr' => '94922',
            'Bezeichnung' => 'Eritrea',
            'Bezeichnung_en' => 'Eritrea',
            'ISO' => 'ERI',
            'iban' =>'',
            'EU' =>'0',
            'Arbeitserlaubnis' =>'0',
            'Aufenthaltserlaubnis' =>'0',
        ]);
        Country::create([
            'IEBStaatNr' => '94923',
            'Bezeichnung' => 'Estland',
            'Bezeichnung_en' => 'Estonia',
            'ISO' => 'EST',
            'iban' =>'EE',
            'EU' =>'1',
            'Arbeitserlaubnis' =>'1',
            'Aufenthaltserlaubnis' =>'1',
        ]);
        Country::create([
            'IEBStaatNr' => '94924',
            'Bezeichnung' => 'Fidschi',
            'Bezeichnung_en' => 'Fiji',
            'ISO' => 'FJI',
            'iban' =>'',
            'EU' =>'0',
            'Arbeitserlaubnis' =>'0',
            'Aufenthaltserlaubnis' =>'0',
        ]);
        Country::create([
            'IEBStaatNr' => '94925',
            'Bezeichnung' => 'Finnland',
            'Bezeichnung_en' => 'Finland',
            'ISO' => 'FIN',
            'iban' =>'FI',
            'EU' =>'1',
            'Arbeitserlaubnis' =>'1',
            'Aufenthaltserlaubnis' =>'1',
        ]);
        Country::create([
            'IEBStaatNr' => '94926',
            'Bezeichnung' => 'Frankreich',
            'Bezeichnung_en' => 'France',
            'ISO' => 'FRA',
            'iban' =>'FR',
            'EU' =>'1',
            'Arbeitserlaubnis' =>'1',
            'Aufenthaltserlaubnis' =>'1',
        ]);
        Country::create([
            'IEBStaatNr' => '94927',
            'Bezeichnung' => 'Gabun',
            'Bezeichnung_en' => 'Gabon',
            'ISO' => 'GAB',
            'iban' =>'',
            'EU' =>'0',
            'Arbeitserlaubnis' =>'0',
            'Aufenthaltserlaubnis' =>'0',
        ]);
        Country::create([
            'IEBStaatNr' => '94928',
            'Bezeichnung' => 'Gambia',
            'Bezeichnung_en' => 'Gambia',
            'ISO' => 'GMB',
            'iban' =>'',
            'EU' =>'0',
            'Arbeitserlaubnis' =>'0',
            'Aufenthaltserlaubnis' =>'0',
        ]);
        Country::create([
            'IEBStaatNr' => '94929',
            'Bezeichnung' => 'Georgien',
            'Bezeichnung_en' => 'Georgia',
            'ISO' => 'GEO',
            'iban' =>'GE',
            'EU' =>'0',
            'Arbeitserlaubnis' =>'0',
            'Aufenthaltserlaubnis' =>'0',
        ]);
        Country::create([
            'IEBStaatNr' => '94930',
            'Bezeichnung' => 'Ghana',
            'Bezeichnung_en' => 'Ghana',
            'ISO' => 'GHA',
            'iban' =>'',
            'EU' =>'0',
            'Arbeitserlaubnis' =>'0',
            'Aufenthaltserlaubnis' =>'0',
        ]);
        Country::create([
            'IEBStaatNr' => '94931',
            'Bezeichnung' => 'Grenada',
            'Bezeichnung_en' => 'Grenada',
            'ISO' => 'GRD',
            'iban' =>'',
            'EU' =>'0',
            'Arbeitserlaubnis' =>'0',
            'Aufenthaltserlaubnis' =>'0',
        ]);
        Country::create([
            'IEBStaatNr' => '94932',
            'Bezeichnung' => 'Griechenland',
            'Bezeichnung_en' => 'Greece',
            'ISO' => 'GRC',
            'iban' =>'EL',
            'EU' =>'1',
            'Arbeitserlaubnis' =>'1',
            'Aufenthaltserlaubnis' =>'1',
        ]);
        Country::create([
            'IEBStaatNr' => '94933',
            'Bezeichnung' => 'Guatemala',
            'Bezeichnung_en' => 'Guatemala',
            'ISO' => 'GTM',
            'iban' =>'GL',
            'EU' =>'0',
            'Arbeitserlaubnis' =>'0',
            'Aufenthaltserlaubnis' =>'0',
        ]);Country::create([
            'IEBStaatNr' => '94934',
            'Bezeichnung' => 'Guinea',
            'Bezeichnung_en' => 'Guinea',
            'ISO' => 'GIN',
            'iban' =>'',
            'EU' =>'0',
            'Arbeitserlaubnis' =>'0',
            'Aufenthaltserlaubnis' =>'0',
        ]);
        Country::create([
            'IEBStaatNr' => '94935',
            'Bezeichnung' => 'Guinea-Bissau',
            'Bezeichnung_en' => 'Guinea-Bissau',
            'ISO' => 'GNB',
            'iban' =>'',
            'EU' =>'0',
            'Arbeitserlaubnis' =>'0',
            'Aufenthaltserlaubnis' =>'0',
        ]);
        Country::create([
            'IEBStaatNr' => '94936',
            'Bezeichnung' => 'Guyana',
            'Bezeichnung_en' => 'Guyana',
            'ISO' => 'GUY',
            'iban' =>'',
            'EU' =>'0',
            'Arbeitserlaubnis' =>'0',
            'Aufenthaltserlaubnis' =>'0',
        ]);
        Country::create([
            'IEBStaatNr' => '94937',
            'Bezeichnung' => 'Haiti',
            'Bezeichnung_en' => 'Haiti',
            'ISO' => 'HTI',
            'iban' =>'',
            'EU' =>'0',
            'Arbeitserlaubnis' =>'0',
            'Aufenthaltserlaubnis' =>'0',
        ]);Country::create([
            'IEBStaatNr' => '94938',
            'Bezeichnung' => 'Honduras',
            'Bezeichnung_en' => 'Honduras',
            'ISO' => 'HND',
            'iban' =>'HN',
            'EU' =>'0',
            'Arbeitserlaubnis' =>'0',
            'Aufenthaltserlaubnis' =>'0',
        ]);
        Country::create([
            'IEBStaatNr' => '94939',
            'Bezeichnung' => 'Indien',
            'Bezeichnung_en' => 'India',
            'ISO' => 'IND',
            'iban' =>'IN',
            'EU' =>'0',
            'Arbeitserlaubnis' =>'0',
            'Aufenthaltserlaubnis' =>'0',
        ]);
        Country::create([
            'IEBStaatNr' => '94940',
            'Bezeichnung' => 'Indonesien',
            'Bezeichnung_en' => 'Indonesia',
            'ISO' => 'IND',
            'iban' =>'ID',
            'EU' =>'0',
            'Arbeitserlaubnis' =>'0',
            'Aufenthaltserlaubnis' =>'0',
        ]);
        Country::create([
            'IEBStaatNr' => '94941',
            'Bezeichnung' => 'Irak',
            'Bezeichnung_en' => 'Iraq',
            'ISO' => 'IRQ',
            'iban' =>'',
            'EU' =>'0',
            'Arbeitserlaubnis' =>'0',
            'Aufenthaltserlaubnis' =>'0',
        ]);
        Country::create([
            'IEBStaatNr' => '94942',
            'Bezeichnung' => 'Iran - Islamische Republik',
            'Bezeichnung_en' => 'Iran - Islamic Republic',
            'ISO' => 'IRN',
            'iban' =>'',
            'EU' =>'0',
            'Arbeitserlaubnis' =>'0',
            'Aufenthaltserlaubnis' =>'0',
        ]);
        Country::create([
            'IEBStaatNr' => '94943',
            'Bezeichnung' => 'Irland',
            'Bezeichnung_en' => 'Ireland',
            'ISO' => 'IRL',
            'iban' =>'IE',
            'EU' =>'1',
            'Arbeitserlaubnis' =>'1',
            'Aufenthaltserlaubnis' =>'1',
        ]);
        Country::create([
            'IEBStaatNr' => '94944',
            'Bezeichnung' => 'Island',
            'Bezeichnung_en' => 'Iceland',
            'ISO' => 'ISL',
            'iban' =>'IS',
            'EU' =>'0',
            'Arbeitserlaubnis' =>'1',
            'Aufenthaltserlaubnis' =>'1',
        ]);
        Country::create([
            'IEBStaatNr' => '94945',
            'Bezeichnung' => 'Israel',
            'Bezeichnung_en' => 'Israel',
            'ISO' => 'ISR',
            'iban' =>'IL',
            'EU' =>'0',
            'Arbeitserlaubnis' =>'0',
            'Aufenthaltserlaubnis' =>'0',
        ]);
        Country::create([
            'IEBStaatNr' => '94946',
            'Bezeichnung' => 'Italien',
            'Bezeichnung_en' => 'Italy',
            'ISO' => 'ITA',
            'iban' =>'IT',
            'EU' =>'1',
            'Arbeitserlaubnis' =>'1',
            'Aufenthaltserlaubnis' =>'1',
        ]);
        Country::create([
            'IEBStaatNr' => '94947',
            'Bezeichnung' => 'Jamaika',
            'Bezeichnung_en' => 'Jamaica',
            'ISO' => 'JAM',
            'iban' =>'',
            'EU' =>'0',
            'Arbeitserlaubnis' =>'0',
            'Aufenthaltserlaubnis' =>'0',
        ]);
        Country::create([
            'IEBStaatNr' => '94948',
            'Bezeichnung' => 'Japan',
            'Bezeichnung_en' => 'Japan',
            'ISO' => 'JPN',
            'iban' =>'',
            'EU' =>'0',
            'Arbeitserlaubnis' =>'0',
            'Aufenthaltserlaubnis' =>'0',
        ]);
        Country::create([
            'IEBStaatNr' => '94949',
            'Bezeichnung' => 'Jemen',
            'Bezeichnung_en' => 'Yemen',
            'ISO' => 'YEM',
            'iban' =>'',
            'EU' =>'0',
            'Arbeitserlaubnis' =>'0',
            'Aufenthaltserlaubnis' =>'0',
        ]);
        Country::create([
            'IEBStaatNr' => '94950',
            'Bezeichnung' => 'Jordanien',
            'Bezeichnung_en' => 'Jordan',
            'ISO' => 'JOR',
            'iban' =>'JO',
            'EU' =>'0',
            'Arbeitserlaubnis' =>'0',
            'Aufenthaltserlaubnis' =>'0',
        ]);
        Country::create([
            'IEBStaatNr' => '94951',
            'Bezeichnung' => 'Kambodscha',
            'Bezeichnung_en' => 'Cambodia',
            'ISO' => 'KHM',
            'iban' =>'',
            'EU' =>'0',
            'Arbeitserlaubnis' =>'0',
            'Aufenthaltserlaubnis' =>'0',
        ]);
        Country::create([
            'IEBStaatNr' => '94952',
            'Bezeichnung' => 'Kamerun',
            'Bezeichnung_en' => 'Cameroon',
            'ISO' => 'CMR',
            'iban' =>'',
            'EU' =>'0',
            'Arbeitserlaubnis' =>'0',
            'Aufenthaltserlaubnis' =>'0',
        ]);
        Country::create([
            'IEBStaatNr' => '94953',
            'Bezeichnung' => 'Kanada',
            'Bezeichnung_en' => 'Canada',
            'ISO' => 'CNA',
            'iban' =>'CA',
            'EU' =>'0',
            'Arbeitserlaubnis' =>'0',
            'Aufenthaltserlaubnis' =>'0',
        ]);
        Country::create([
            'IEBStaatNr' => '94954',
            'Bezeichnung' => 'Kap Verde',
            'Bezeichnung_en' => 'Cape Verde',
            'ISO' => 'CPV',
            'iban' =>'',
            'EU' =>'0',
            'Arbeitserlaubnis' =>'0',
            'Aufenthaltserlaubnis' =>'0',
        ]);
        Country::create([
            'IEBStaatNr' => '94955',
            'Bezeichnung' => 'Kasachstan',
            'Bezeichnung_en' => 'Kazakhstan',
            'ISO' => 'KAZ',
            'iban' =>'KZ',
            'EU' =>'0',
            'Arbeitserlaubnis' =>'0',
            'Aufenthaltserlaubnis' =>'0',
        ]);
        Country::create([
            'IEBStaatNr' => '94956',
            'Bezeichnung' => 'Katar',
            'Bezeichnung_en' => 'Qatar',
            'ISO' => 'QAT',
            'iban' =>'',
            'EU' =>'0',
            'Arbeitserlaubnis' =>'0',
            'Aufenthaltserlaubnis' =>'0',
        ]);
        Country::create([
            'IEBStaatNr' => '94957',
            'Bezeichnung' => 'Kenia',
            'Bezeichnung_en' => 'Kenya',
            'ISO' => 'KEN',
            'iban' =>'',
            'EU' =>'0',
            'Arbeitserlaubnis' =>'0',
            'Aufenthaltserlaubnis' =>'0',
        ]);
        Country::create([
            'IEBStaatNr' => '94958',
            'Bezeichnung' => 'Kirgisistan',
            'Bezeichnung_en' => 'Kyrgyzstan',
            'ISO' => 'KGZ',
            'iban' =>'',
            'EU' =>'0',
            'Arbeitserlaubnis' =>'0',
            'Aufenthaltserlaubnis' =>'0',
        ]);
        Country::create([
            'IEBStaatNr' => '94959',
            'Bezeichnung' => 'Kiribati',
            'Bezeichnung_en' => 'Kiribati',
            'ISO' => 'KIR',
            'iban' =>'',
            'EU' =>'0',
            'Arbeitserlaubnis' =>'0',
            'Aufenthaltserlaubnis' =>'0',
        ]);
        Country::create([
            'IEBStaatNr' => '94960',
            'Bezeichnung' => 'Kolumbien',
            'Bezeichnung_en' => 'Colombia',
            'ISO' => 'COL',
            'iban' =>'',
            'EU' =>'0',
            'Arbeitserlaubnis' =>'0',
            'Aufenthaltserlaubnis' =>'0',
        ]);
        Country::create([
            'IEBStaatNr' => '94961',
            'Bezeichnung' => 'Komoren',
            'Bezeichnung_en' => 'Comoros',
            'ISO' => 'COM',
            'iban' =>'',
            'EU' =>'0',
            'Arbeitserlaubnis' =>'0',
            'Aufenthaltserlaubnis' =>'0',
        ]);
        Country::create([
            'IEBStaatNr' => '94962',
            'Bezeichnung' => 'Kongo',
            'Bezeichnung_en' => 'Congo',
            'ISO' => 'COG',
            'iban' =>'',
            'EU' =>'0',
            'Arbeitserlaubnis' =>'0',
            'Aufenthaltserlaubnis' =>'0',
        ]);Country::create([
            'IEBStaatNr' => '94963',
            'Bezeichnung' => 'Kongo - Demokratische Republik',
            'Bezeichnung_en' => 'Democratic Republic of the Congo',
            'ISO' => 'COD',
            'iban' =>'',
            'EU' =>'0',
            'Arbeitserlaubnis' =>'0',
            'Aufenthaltserlaubnis' =>'0',
        ]);
        Country::create([
            'IEBStaatNr' => '94964',
            'Bezeichnung' => 'Korea (Nord)- Demokratische Volksrepublik',
            'Bezeichnung_en' => 'Democratic Peoples Republic of Korea',
            'ISO' => 'PRK',
            'iban' =>'',
            'EU' =>'0',
            'Arbeitserlaubnis' =>'0',
            'Aufenthaltserlaubnis' =>'0',
        ]);
        Country::create([
            'IEBStaatNr' => '94965',
            'Bezeichnung' => 'Korea (Süd) - Republik',
            'Bezeichnung_en' => 'Republic of Korea',
            'ISO' => 'KOR',
            'iban' =>'',
            'EU' =>'0',
            'Arbeitserlaubnis' =>'0',
            'Aufenthaltserlaubnis' =>'0',
        ]);
        Country::create([
            'IEBStaatNr' => '94966',
            'Bezeichnung' => 'Kosovo',
            'Bezeichnung_en' => 'Kosovo',
            'ISO' => 'XKX',
            'iban' =>'XK',
            'EU' =>'0',
            'Arbeitserlaubnis' =>'0',
            'Aufenthaltserlaubnis' =>'0',
        ]);
        Country::create([
            'IEBStaatNr' => '94967',
            'Bezeichnung' => 'Kroatien',
            'Bezeichnung_en' => 'Croatia',
            'ISO' => 'HRV',
            'iban' =>'HR',
            'EU' =>'1',
            'Arbeitserlaubnis' =>'0',
            'Aufenthaltserlaubnis' =>'0',
        ]);
        Country::create([
            'IEBStaatNr' => '94968',
            'Bezeichnung' => 'Kuba',
            'Bezeichnung_en' => 'Cuba',
            'ISO' => 'CUB',
            'iban' =>'',
            'EU' =>'0',
            'Arbeitserlaubnis' =>'0',
            'Aufenthaltserlaubnis' =>'0',
        ]);Country::create([
            'IEBStaatNr' => '94969',
            'Bezeichnung' => 'Kuwait',
            'Bezeichnung_en' => 'Kuwait',
            'ISO' => 'KWT',
            'iban' =>'KW',
            'EU' =>'0',
            'Arbeitserlaubnis' =>'0',
            'Aufenthaltserlaubnis' =>'0',
        ]);
        Country::create([
            'IEBStaatNr' => '94970',
            'Bezeichnung' => 'Laos - Demokratische Volksrepublik',
            'Bezeichnung_en' => 'Lao People s Democratic Republic',
            'ISO' => 'LAO',
            'iban' =>'',
            'EU' =>'0',
            'Arbeitserlaubnis' =>'0',
            'Aufenthaltserlaubnis' =>'0',
        ]);
        Country::create([
            'IEBStaatNr' => '94971',
            'Bezeichnung' => 'Lesotho',
            'Bezeichnung_en' => 'Lesotho',
            'ISO' => 'LSO',
            'iban' =>'',
            'EU' =>'0',
            'Arbeitserlaubnis' =>'0',
            'Aufenthaltserlaubnis' =>'0',
        ]);
        Country::create([
            'IEBStaatNr' => '94972',
            'Bezeichnung' => 'Lettland',
            'Bezeichnung_en' => 'Latvia',
            'ISO' => 'LVA',
            'iban' =>'LV',
            'EU' =>'1',
            'Arbeitserlaubnis' =>'1',
            'Aufenthaltserlaubnis' =>'1',
        ]);
        Country::create([
            'IEBStaatNr' => '94973',
            'Bezeichnung' => 'Libanon',
            'Bezeichnung_en' => 'Lebanon',
            'ISO' => 'LBN',
            'iban' =>'LB',
            'EU' =>'0',
            'Arbeitserlaubnis' =>'0',
            'Aufenthaltserlaubnis' =>'0',
        ]);
        Country::create([
            'IEBStaatNr' => '94974',
            'Bezeichnung' => 'Liberia',
            'Bezeichnung_en' => 'Liberia',
            'ISO' => 'LBR',
            'iban' =>'',
            'EU' =>'0',
            'Arbeitserlaubnis' =>'0',
            'Aufenthaltserlaubnis' =>'0',
        ]);
        Country::create([
            'IEBStaatNr' => '94975',
            'Bezeichnung' => 'Libyen',
            'Bezeichnung_en' => 'Libya',
            'ISO' => 'LBY',
            'iban' =>'',
            'EU' =>'0',
            'Arbeitserlaubnis' =>'0',
            'Aufenthaltserlaubnis' =>'0',
        ]);
        Country::create([
            'IEBStaatNr' => '94976',
            'Bezeichnung' => 'Liechtenstein',
            'Bezeichnung_en' => 'Liechtenstein',
            'ISO' => 'LIE',
            'iban' =>'LI',
            'EU' =>'0',
            'Arbeitserlaubnis' =>'1',
            'Aufenthaltserlaubnis' =>'1',
        ]);
        Country::create([
            'IEBStaatNr' => '94977',
            'Bezeichnung' => 'Litauen',
            'Bezeichnung_en' => 'Lithuania',
            'ISO' => 'LTU',
            'iban' =>'LT',
            'EU' =>'1',
            'Arbeitserlaubnis' =>'1',
            'Aufenthaltserlaubnis' =>'1',
        ]);
        Country::create([
            'IEBStaatNr' => '94978',
            'Bezeichnung' => 'Luxemburg',
            'Bezeichnung_en' => 'Luxembourg',
            'ISO' => 'LUX',
            'iban' =>'LU',
            'EU' =>'1',
            'Arbeitserlaubnis' =>'1',
            'Aufenthaltserlaubnis' =>'1',
        ]);
        Country::create([
            'IEBStaatNr' => '94979',
            'Bezeichnung' => 'Madagaskar',
            'Bezeichnung_en' => 'Madagascar',
            'ISO' => 'MDG',
            'iban' =>'',
            'EU' =>'0',
            'Arbeitserlaubnis' =>'0',
            'Aufenthaltserlaubnis' =>'0',
        ]);
        Country::create([
            'IEBStaatNr' => '94980',
            'Bezeichnung' => 'Malawi',
            'Bezeichnung_en' => 'Malawi',
            'ISO' => 'MWI',
            'iban' =>'',
            'EU' =>'0',
            'Arbeitserlaubnis' =>'0',
            'Aufenthaltserlaubnis' =>'0',
        ]);
        Country::create([
            'IEBStaatNr' => '94981',
            'Bezeichnung' => 'Malaysia',
            'Bezeichnung_en' => 'Malaysia',
            'ISO' => 'MYS',
            'iban' =>'',
            'EU' =>'0',
            'Arbeitserlaubnis' =>'0',
            'Aufenthaltserlaubnis' =>'0',
        ]);
        Country::create([
            'IEBStaatNr' => '94903',
            'Bezeichnung' => '',
            'Bezeichnung_en' => '',
            'ISO' => '',
            'iban' =>'',
            'EU' =>'0',
            'Arbeitserlaubnis' =>'0',
            'Aufenthaltserlaubnis' =>'0',
        ]);Country::create([
            'IEBStaatNr' => '94982',
            'Bezeichnung' => 'Malediven',
            'Bezeichnung_en' => 'Meldives',
            'ISO' => 'MDV',
            'iban' =>'',
            'EU' =>'0',
            'Arbeitserlaubnis' =>'0',
            'Aufenthaltserlaubnis' =>'0',
        ]);
        Country::create([
            'IEBStaatNr' => '94983',
            'Bezeichnung' => 'Mali',
            'Bezeichnung_en' => 'Mali',
            'ISO' => 'MLI',
            'iban' =>'',
            'EU' =>'0',
            'Arbeitserlaubnis' =>'0',
            'Aufenthaltserlaubnis' =>'0',
        ]);
        Country::create([
            'IEBStaatNr' => '94984',
            'Bezeichnung' => 'Malta',
            'Bezeichnung_en' => 'Malta',
            'ISO' => 'MLT',
            'iban' =>'ML',
            'EU' =>'1',
            'Arbeitserlaubnis' =>'1',
            'Aufenthaltserlaubnis' =>'1',
        ]);
        Country::create([
            'IEBStaatNr' => '94985',
            'Bezeichnung' => 'Marokko',
            'Bezeichnung_en' => 'Morocco',
            'ISO' => 'MAR',
            'iban' =>'',
            'EU' =>'0',
            'Arbeitserlaubnis' =>'0',
            'Aufenthaltserlaubnis' =>'0',
        ]);
        Country::create([
            'IEBStaatNr' => '94986',
            'Bezeichnung' => 'Marshallinseln',
            'Bezeichnung_en' => 'Marshall Islands',
            'ISO' => 'MHL',
            'iban' =>'',
            'EU' =>'0',
            'Arbeitserlaubnis' =>'0',
            'Aufenthaltserlaubnis' =>'0',
        ]);
        Country::create([
            'IEBStaatNr' => '94987',
            'Bezeichnung' => 'Mauretanien',
            'Bezeichnung_en' => 'Mauritania',
            'ISO' => 'MRT',
            'iban' =>'MR',
            'EU' =>'0',
            'Arbeitserlaubnis' =>'0',
            'Aufenthaltserlaubnis' =>'0',
        ]);
        Country::create([
            'IEBStaatNr' => '94988',
            'Bezeichnung' => 'Mauritius',
            'Bezeichnung_en' => 'Mauritius',
            'ISO' => 'MSU',
            'iban' =>'MU',
            'EU' =>'0',
            'Arbeitserlaubnis' =>'0',
            'Aufenthaltserlaubnis' =>'0',
        ]);
        Country::create([
            'IEBStaatNr' => '94989',
            'Bezeichnung' => 'Mazedonien',
            'Bezeichnung_en' => 'Macedonia',
            'ISO' => 'MKD',
            'iban' =>'MK',
            'EU' =>'0',
            'Arbeitserlaubnis' =>'0',
            'Aufenthaltserlaubnis' =>'0',
        ]);
        Country::create([
            'IEBStaatNr' => '94990',
            'Bezeichnung' => 'Mexiko',
            'Bezeichnung_en' => 'Mexico',
            'ISO' => 'MEX',
            'iban' =>'MX',
            'EU' =>'0',
            'Arbeitserlaubnis' =>'0',
            'Aufenthaltserlaubnis' =>'0',
        ]);
        Country::create([
            'IEBStaatNr' => '94991',
            'Bezeichnung' => 'Mikronesien - Föderierte Staaten von',
            'Bezeichnung_en' => 'Federated States of Micronesia',
            'ISO' => 'FSM',
            'iban' =>'',
            'EU' =>'0',
            'Arbeitserlaubnis' =>'0',
            'Aufenthaltserlaubnis' =>'0',
        ]);
        Country::create([
            'IEBStaatNr' => '94992',
            'Bezeichnung' => 'Moldawien (Rep. Moldau)',
            'Bezeichnung_en' => 'Republic of Moldova',
            'ISO' => 'MDA',
            'iban' =>'',
            'EU' =>'0',
            'Arbeitserlaubnis' =>'0',
            'Aufenthaltserlaubnis' =>'0',
        ]);
        Country::create([
            'IEBStaatNr' => '94993',
            'Bezeichnung' => 'Monaco',
            'Bezeichnung_en' => 'Monaco',
            'ISO' => 'MCO',
            'iban' =>'MC',
            'EU' =>'0',
            'Arbeitserlaubnis' =>'0',
            'Aufenthaltserlaubnis' =>'0',
        ]);
        Country::create([
            'IEBStaatNr' => '94994',
            'Bezeichnung' => 'Mongolei',
            'Bezeichnung_en' => 'Mongolia',
            'ISO' => 'MNG',
            'iban' =>'',
            'EU' =>'0',
            'Arbeitserlaubnis' =>'0',
            'Aufenthaltserlaubnis' =>'0',
        ]);
        Country::create([
            'IEBStaatNr' => '94995',
            'Bezeichnung' => 'Montenegro',
            'Bezeichnung_en' => 'Montenegro',
            'ISO' => 'MNE',
            'iban' =>'ME',
            'EU' =>'0',
            'Arbeitserlaubnis' =>'0',
            'Aufenthaltserlaubnis' =>'0',
        ]);
        Country::create([
            'IEBStaatNr' => '94996',
            'Bezeichnung' => 'Mosambik',
            'Bezeichnung_en' => 'Mozambique',
            'ISO' => 'MOZ',
            'iban' =>'',
            'EU' =>'0',
            'Arbeitserlaubnis' =>'0',
            'Aufenthaltserlaubnis' =>'0',
        ]);
        Country::create([
            'IEBStaatNr' => '94997',
            'Bezeichnung' => 'Myanmar (Birma)',
            'Bezeichnung_en' => 'Myanmar',
            'ISO' => 'MMR',
            'iban' =>'',
            'EU' =>'0',
            'Arbeitserlaubnis' =>'0',
            'Aufenthaltserlaubnis' =>'0',
        ]);
        Country::create([
            'IEBStaatNr' => '94998',
            'Bezeichnung' => 'Namibia',
            'Bezeichnung_en' => 'Namibia',
            'ISO' => 'NAM',
            'iban' =>'',
            'EU' =>'0',
            'Arbeitserlaubnis' =>'0',
            'Aufenthaltserlaubnis' =>'0',
        ]);
        Country::create([
            'IEBStaatNr' => '94999',
            'Bezeichnung' => 'Nauru',
            'Bezeichnung_en' => 'Nauru',
            'ISO' => 'NRU',
            'iban' =>'',
            'EU' =>'0',
            'Arbeitserlaubnis' =>'0',
            'Aufenthaltserlaubnis' =>'0',
        ]);Country::create([
            'IEBStaatNr' => '95000',
            'Bezeichnung' => 'Nepal',
            'Bezeichnung_en' => 'Nepal',
            'ISO' => 'NPL',
            'iban' =>'',
            'EU' =>'0',
            'Arbeitserlaubnis' =>'0',
            'Aufenthaltserlaubnis' =>'0',
        ]);
        Country::create([
            'IEBStaatNr' => '95001',
            'Bezeichnung' => 'Neuseeland',
            'Bezeichnung_en' => 'New Zealand',
            'ISO' => 'NZL',
            'iban' =>'NZ',
            'EU' =>'0',
            'Arbeitserlaubnis' =>'0',
            'Aufenthaltserlaubnis' =>'0',
        ]);
        Country::create([
            'IEBStaatNr' => '95002',
            'Bezeichnung' => 'Nicaragua',
            'Bezeichnung_en' => 'Nicaragua',
            'ISO' => 'NIC',
            'iban' =>'NI',
            'EU' =>'0',
            'Arbeitserlaubnis' =>'0',
            'Aufenthaltserlaubnis' =>'0',
        ]);
       Country::create([
            'IEBStaatNr' => '95003',
            'Bezeichnung' => 'Niederlande',
            'Bezeichnung_en' => 'Netherlands',
            'ISO' => 'NLD',
            'iban' =>'NL',
            'EU' =>'1',
            'Arbeitserlaubnis' =>'1',
            'Aufenthaltserlaubnis' =>'1',
        ]);
        Country::create([
            'IEBStaatNr' => '95004',
            'Bezeichnung' => 'Niger',
            'Bezeichnung_en' => 'Niger',
            'ISO' => 'NER',
            'iban' =>'',
            'EU' =>'0',
            'Arbeitserlaubnis' =>'0',
            'Aufenthaltserlaubnis' =>'0',
        ]);
        Country::create([
            'IEBStaatNr' => '95005',
            'Bezeichnung' => 'Nigeria',
            'Bezeichnung_en' => 'Nigeria',
            'ISO' => 'NGA',
            'iban' =>'NG',
            'EU' =>'0',
            'Arbeitserlaubnis' =>'0',
            'Aufenthaltserlaubnis' =>'0',
        ]);
        Country::create([
            'IEBStaatNr' => '95006',
            'Bezeichnung' => 'Norwegen',
            'Bezeichnung_en' => 'Norway',
            'ISO' => 'NOR',
            'iban' =>'NO',
            'EU' =>'0',
            'Arbeitserlaubnis' =>'1',
            'Aufenthaltserlaubnis' =>'1',
        ]);
        Country::create([
            'IEBStaatNr' => '95007',
            'Bezeichnung' => 'Oman',
            'Bezeichnung_en' => 'Oman',
            'ISO' => 'OMN',
            'iban' =>'',
            'EU' =>'0',
            'Arbeitserlaubnis' =>'0',
            'Aufenthaltserlaubnis' =>'0',
        ]);
        Country::create([
            'IEBStaatNr' => '95009',
            'Bezeichnung' => 'Pakistan',
            'Bezeichnung_en' => 'Pakistan',
            'ISO' => 'PAK',
            'iban' =>'PK',
            'EU' =>'0',
            'Arbeitserlaubnis' =>'0',
            'Aufenthaltserlaubnis' =>'0',
        ]);
        Country::create([
            'IEBStaatNr' => '95010',
            'Bezeichnung' => 'Palau',
            'Bezeichnung_en' => 'Palau',
            'ISO' => 'PLW',
            'iban' =>'',
            'EU' =>'0',
            'Arbeitserlaubnis' =>'0',
            'Aufenthaltserlaubnis' =>'0',
        ]);
        Country::create([
            'IEBStaatNr' => '95011',
            'Bezeichnung' => 'Panama',
            'Bezeichnung_en' => 'Panama',
            'ISO' => 'PAN',
            'iban' =>'PA',
            'EU' =>'0',
            'Arbeitserlaubnis' =>'0',
            'Aufenthaltserlaubnis' =>'0',
        ]);
        Country::create([
            'IEBStaatNr' => '95012',
            'Bezeichnung' => 'Papua-Neuguinea',
            'Bezeichnung_en' => 'Papua New-Guinea',
            'ISO' => 'PNG',
            'iban' =>'',
            'EU' =>'0',
            'Arbeitserlaubnis' =>'0',
            'Aufenthaltserlaubnis' =>'0',
        ]);
        Country::create([
            'IEBStaatNr' => '95013',
            'Bezeichnung' => 'Paraguay',
            'Bezeichnung_en' => 'Paraguay',
            'ISO' => 'PRY',
            'iban' =>'PY',
            'EU' =>'0',
            'Arbeitserlaubnis' =>'0',
            'Aufenthaltserlaubnis' =>'0',
        ]);
        Country::create([
            'IEBStaatNr' => '95014',
            'Bezeichnung' => 'Peru',
            'Bezeichnung_en' => 'Peru',
            'ISO' => 'PER',
            'iban' =>'PE',
            'EU' =>'0',
            'Arbeitserlaubnis' =>'0',
            'Aufenthaltserlaubnis' =>'0',
        ]);
        Country::create([
            'IEBStaatNr' => '94015',
            'Bezeichnung' => 'Philippinen',
            'Bezeichnung_en' => 'Philippines',
            'ISO' => 'PHL',
            'iban' =>'PH',
            'EU' =>'0',
            'Arbeitserlaubnis' =>'0',
            'Aufenthaltserlaubnis' =>'0',
        ]);
        Country::create([
            'IEBStaatNr' => '95016',
            'Bezeichnung' => 'Polen',
            'Bezeichnung_en' => 'Poland',
            'ISO' => 'POL',
            'iban' =>'PL',
            'EU' =>'1',
            'Arbeitserlaubnis' =>'1',
            'Aufenthaltserlaubnis' =>'1',
        ]);
               Country::create([
            'IEBStaatNr' => '95017',
            'Bezeichnung' => 'Portugal',
            'Bezeichnung_en' => 'Portugal',
            'ISO' => 'PRT',
            'iban' =>'PT',
            'EU' =>'1',
            'Arbeitserlaubnis' =>'1',
            'Aufenthaltserlaubnis' =>'1',
        ]);
        Country::create([
            'IEBStaatNr' => '95018',
            'Bezeichnung' => 'Ruanda',
            'Bezeichnung_en' => 'Rwanda',
            'ISO' => 'RWA',
            'iban' =>'',
            'EU' =>'0',
            'Arbeitserlaubnis' =>'0',
            'Aufenthaltserlaubnis' =>'0',
        ]);
        Country::create([
            'IEBStaatNr' => '95019',
            'Bezeichnung' => 'Rumänien',
            'Bezeichnung_en' => 'Romania',
            'ISO' => 'ROU',
            'iban' =>'RO',
            'EU' =>'1',
            'Arbeitserlaubnis' =>'1',
            'Aufenthaltserlaubnis' =>'1',
        ]);
        Country::create([
            'IEBStaatNr' => '95020',
            'Bezeichnung' => 'Russische Föderation',
            'Bezeichnung_en' => 'Russian Federation',
            'ISO' => 'RUS',
            'iban' =>'RU',
            'EU' =>'0',
            'Arbeitserlaubnis' =>'0',
            'Aufenthaltserlaubnis' =>'0',
        ]);
        Country::create([
            'IEBStaatNr' => '95021',
            'Bezeichnung' => 'Salomonen',
            'Bezeichnung_en' => 'Solomon Islands',
            'ISO' => 'SLB',
            'iban' =>'',
            'EU' =>'0',
            'Arbeitserlaubnis' =>'0',
            'Aufenthaltserlaubnis' =>'0',
        ]);
        Country::create([
            'IEBStaatNr' => '95022',
            'Bezeichnung' => 'Sambia',
            'Bezeichnung_en' => 'Zambia',
            'ISO' => 'ZMB',
            'iban' =>'',
            'EU' =>'0',
            'Arbeitserlaubnis' =>'0',
            'Aufenthaltserlaubnis' =>'0',
        ]);
        Country::create([
            'IEBStaatNr' => '95023',
            'Bezeichnung' => 'Samoa',
            'Bezeichnung_en' => 'Samoa',
            'ISO' => 'WSM',
            'iban' =>'',
            'EU' =>'0',
            'Arbeitserlaubnis' =>'0',
            'Aufenthaltserlaubnis' =>'0',
        ]);
        Country::create([
            'IEBStaatNr' => '95024',
            'Bezeichnung' => 'San Marino',
            'Bezeichnung_en' => 'San Marino',
            'ISO' => 'SMR',
            'iban' =>'SM',
            'EU' =>'0',
            'Arbeitserlaubnis' =>'0',
            'Aufenthaltserlaubnis' =>'0',
        ]);
        Country::create([
            'IEBStaatNr' => '95025',
            'Bezeichnung' => 'São Tomé und Príncipe',
            'Bezeichnung_en' => 'São Tomé and Príncipe',
            'ISO' => 'STP',
            'iban' =>'ST',
            'EU' =>'0',
            'Arbeitserlaubnis' =>'0',
            'Aufenthaltserlaubnis' =>'0',
        ]);
        Country::create([
            'IEBStaatNr' => '95026',
            'Bezeichnung' => 'Saudi-Arabien',
            'Bezeichnung_en' => 'Saudi-Arabien',
            'ISO' => 'SAU',
            'iban' =>'SA',
            'EU' =>'0',
            'Arbeitserlaubnis' =>'0',
            'Aufenthaltserlaubnis' =>'0',
        ]);
        Country::create([
            'IEBStaatNr' => '95027',
            'Bezeichnung' => 'Schweden',
            'Bezeichnung_en' => 'Sweden',
            'ISO' => 'SWE',
            'iban' =>'SE',
            'EU' =>'1',
            'Arbeitserlaubnis' =>'1',
            'Aufenthaltserlaubnis' =>'1',
        ]);
        Country::create([
            'IEBStaatNr' => '95028',
            'Bezeichnung' => 'Schweiz',
            'Bezeichnung_en' => 'Switzerland',
            'ISO' => 'CHE',
            'iban' =>'CH',
            'EU' =>'0',
            'Arbeitserlaubnis' =>'1',
            'Aufenthaltserlaubnis' =>'1',
        ]);
         Country::create([
            'IEBStaatNr' => '95029',
            'Bezeichnung' => 'Senegal',
            'Bezeichnung_en' => 'Senegal',
            'ISO' => 'SEN',
            'iban' =>'',
            'EU' =>'0',
            'Arbeitserlaubnis' =>'0',
            'Aufenthaltserlaubnis' =>'0',
        ]);
        Country::create([
            'IEBStaatNr' => '95030',
            'Bezeichnung' => 'Serbien',
            'Bezeichnung_en' => 'Serbia',
            'ISO' => 'SRB',
            'iban' =>'RS',
            'EU' =>'0',
            'Arbeitserlaubnis' =>'0',
            'Aufenthaltserlaubnis' =>'0',
        ]);
        Country::create([
            'IEBStaatNr' => '95031',
            'Bezeichnung' => 'Seychellen',
            'Bezeichnung_en' => 'Seychelles',
            'ISO' => 'SYC',
            'iban' =>'',
            'EU' =>'0',
            'Arbeitserlaubnis' =>'0',
            'Aufenthaltserlaubnis' =>'0',
        ]);
         Country::create([
            'IEBStaatNr' => '95032',
            'Bezeichnung' => 'Sierra Leone',
            'Bezeichnung_en' => 'Sierra Leone',
            'ISO' => 'SLE',
            'iban' =>'',
            'EU' =>'0',
            'Arbeitserlaubnis' =>'0',
            'Aufenthaltserlaubnis' =>'0',
        ]);
        Country::create([
            'IEBStaatNr' => '95033',
            'Bezeichnung' => 'Simbabwe (Zimbabwe)',
            'Bezeichnung_en' => 'Zimbabwe',
            'ISO' => 'ZWE',
            'iban' =>'',
            'EU' =>'0',
            'Arbeitserlaubnis' =>'0',
            'Aufenthaltserlaubnis' =>'0',
        ]);
         Country::create([
            'IEBStaatNr' => '95034',
            'Bezeichnung' => 'Singapur',
            'Bezeichnung_en' => 'Singapore',
            'ISO' => 'SGP',
            'iban' =>'',
            'EU' =>'0',
            'Arbeitserlaubnis' =>'0',
            'Aufenthaltserlaubnis' =>'0',
        ]);
        Country::create([
            'IEBStaatNr' => '95035',
            'Bezeichnung' => 'Slowakei',
            'Bezeichnung_en' => 'Slovakia',
            'ISO' => 'SVK',
            'iban' =>'SV',
            'EU' =>'1',
            'Arbeitserlaubnis' =>'1',
            'Aufenthaltserlaubnis' =>'1',
        ]);
         Country::create([
            'IEBStaatNr' => '95036',
            'Bezeichnung' => 'Slowenien',
            'Bezeichnung_en' => 'Slovenia',
            'ISO' => 'SVN',
            'iban' =>'SI',
            'EU' =>'1',
            'Arbeitserlaubnis' =>'1',
            'Aufenthaltserlaubnis' =>'1',
        ]);
        Country::create([
            'IEBStaatNr' => '95037',
            'Bezeichnung' => 'Somalia',
            'Bezeichnung_en' => 'Somalia',
            'ISO' => 'SOM',
            'iban' =>'',
            'EU' =>'0',
            'Arbeitserlaubnis' =>'0',
            'Aufenthaltserlaubnis' =>'0',
        ]);
         Country::create([
            'IEBStaatNr' => '95038',
            'Bezeichnung' => 'Spanien',
            'Bezeichnung_en' => 'Spain',
            'ISO' => 'ESP',
            'iban' =>'ES',
            'EU' =>'1',
            'Arbeitserlaubnis' =>'1',
            'Aufenthaltserlaubnis' =>'1',
        ]);
         Country::create([
            'IEBStaatNr' => '95039',
            'Bezeichnung' => 'Sri Lanka',
            'Bezeichnung_en' => 'Sri Lanka',
            'ISO' => 'LKA',
            'iban' =>'',
            'EU' =>'0',
            'Arbeitserlaubnis' =>'0',
            'Aufenthaltserlaubnis' =>'0',
        ]);
         Country::create([
            'IEBStaatNr' => '95040',
            'Bezeichnung' => 'St. Kitts und Nevis',
            'Bezeichnung_en' => 'Saint Kitts and Nevis',
            'ISO' => 'KNA',
            'iban' =>'',
            'EU' =>'0',
            'Arbeitserlaubnis' =>'0',
            'Aufenthaltserlaubnis' =>'0',
        ]);
        Country::create([
            'IEBStaatNr' => '95041',
            'Bezeichnung' => 'St. Lucia',
            'Bezeichnung_en' => 'Saint Lucia',
            'ISO' => 'LCA',
            'iban' =>'LC',
            'EU' =>'0',
            'Arbeitserlaubnis' =>'0',
            'Aufenthaltserlaubnis' =>'0',
        ]);
        Country::create([
            'IEBStaatNr' => '95042',
            'Bezeichnung' => 'St. Vincent und die Grenadinen',
            'Bezeichnung_en' => 'Saint Vincent and the Grenadines',
            'ISO' => 'VCT',
            'iban' =>'',
            'EU' =>'0',
            'Arbeitserlaubnis' =>'0',
            'Aufenthaltserlaubnis' =>'0',
        ]);
        Country::create([
            'IEBStaatNr' => '95043',
            'Bezeichnung' => 'Südafrika',
            'Bezeichnung_en' => 'South Africa',
            'ISO' => 'ZAF',
            'iban' =>'',
            'EU' =>'0',
            'Arbeitserlaubnis' =>'0',
            'Aufenthaltserlaubnis' =>'0',
        ]);
         Country::create([
            'IEBStaatNr' => '95044',
            'Bezeichnung' => 'Suriname',
            'Bezeichnung_en' => 'Suriname',
            'ISO' => 'SUP',
            'iban' =>'',
            'EU' =>'0',
            'Arbeitserlaubnis' =>'0',
            'Aufenthaltserlaubnis' =>'0',
        ]);
        Country::create([
            'IEBStaatNr' => '95045',
            'Bezeichnung' => 'Swasiland',
            'Bezeichnung_en' => 'Swaziland',
            'ISO' => 'SWZ',
            'iban' =>'',
            'EU' =>'0',
            'Arbeitserlaubnis' =>'0',
            'Aufenthaltserlaubnis' =>'0',
        ]);
        Country::create([
            'IEBStaatNr' => '95046',
            'Bezeichnung' => 'Syrien - Arabische Republik',
            'Bezeichnung_en' => 'Syria - Arab Republic',
            'ISO' => 'SYR',
            'iban' =>'',
            'EU' =>'0',
            'Arbeitserlaubnis' =>'0',
            'Aufenthaltserlaubnis' =>'0',
        ]);
         Country::create([
            'IEBStaatNr' => '95047',
            'Bezeichnung' => 'Tadschikistan',
            'Bezeichnung_en' => 'Tajikistan',
            'ISO' => 'TJK',
            'iban' =>'',
            'EU' =>'0',
            'Arbeitserlaubnis' =>'0',
            'Aufenthaltserlaubnis' =>'0',
        ]);
        Country::create([
            'IEBStaatNr' => '95048',
            'Bezeichnung' => 'Tansania - Vereinigte Republik',
            'Bezeichnung_en' => 'United Republic of Tanzania',
            'ISO' => 'TZA',
            'iban' =>'',
            'EU' =>'0',
            'Arbeitserlaubnis' =>'0',
            'Aufenthaltserlaubnis' =>'0',
        ]); Country::create([
            'IEBStaatNr' => '95049',
            'Bezeichnung' => 'Thailand',
            'Bezeichnung_en' => 'Thailand',
            'ISO' => 'THA',
            'iban' =>'',
            'EU' =>'0',
            'Arbeitserlaubnis' =>'0',
            'Aufenthaltserlaubnis' =>'0',
        ]);
        Country::create([
            'IEBStaatNr' => '95050',
            'Bezeichnung' => 'Timor-Leste (Osttimor)',
            'Bezeichnung_en' => 'Timor-Leste',
            'ISO' => 'TLS',
            'iban' =>'TL',
            'EU' =>'0',
            'Arbeitserlaubnis' =>'0',
            'Aufenthaltserlaubnis' =>'0',
        ]);
        Country::create([
            'IEBStaatNr' => '95051',
            'Bezeichnung' => 'Togo',
            'Bezeichnung_en' => 'Togo',
            'ISO' => 'TGO',
            'iban' =>'',
            'EU' =>'0',
            'Arbeitserlaubnis' =>'0',
            'Aufenthaltserlaubnis' =>'0',
        ]);
        Country::create([
            'IEBStaatNr' => '95052',
            'Bezeichnung' => 'Tonga',
            'Bezeichnung_en' => 'Tonga',
            'ISO' => 'TON',
            'iban' =>'',
            'EU' =>'0',
            'Arbeitserlaubnis' =>'0',
            'Aufenthaltserlaubnis' =>'0',
        ]);
        Country::create([
            'IEBStaatNr' => '95053',
            'Bezeichnung' => 'Trinidad und Tobago',
            'Bezeichnung_en' => 'Trinidad and Tobago',
            'ISO' => 'TTO',
            'iban' =>'',
            'EU' =>'0',
            'Arbeitserlaubnis' =>'0',
            'Aufenthaltserlaubnis' =>'0',
        ]);
        Country::create([
            'IEBStaatNr' => '95054',
            'Bezeichnung' => 'Tschad',
            'Bezeichnung_en' => 'Chad',
            'ISO' => 'TCD',
            'iban' =>'',
            'EU' =>'0',
            'Arbeitserlaubnis' =>'0',
            'Aufenthaltserlaubnis' =>'0',
        ]);
        Country::create([
            'IEBStaatNr' => '95055',
            'Bezeichnung' => 'Tschechische Republik',
            'Bezeichnung_en' => 'Czech Republic',
            'ISO' => 'CZE',
            'iban' =>'CZ',
            'EU' =>'1',
            'Arbeitserlaubnis' =>'1',
            'Aufenthaltserlaubnis' =>'1',
        ]);
        Country::create([
            'IEBStaatNr' => '95056',
            'Bezeichnung' => 'Tunesien',
            'Bezeichnung_en' => 'Tunisia',
            'ISO' => 'TUN',
            'iban' =>'TN',
            'EU' =>'0',
            'Arbeitserlaubnis' =>'0',
            'Aufenthaltserlaubnis' =>'0',
        ]);
        Country::create([
            'IEBStaatNr' => '95057',
            'Bezeichnung' => 'Türkei',
            'Bezeichnung_en' => 'Turkey',
            'ISO' => 'TUR',
            'iban' =>'TR',
            'EU' =>'0',
            'Arbeitserlaubnis' =>'0',
            'Aufenthaltserlaubnis' =>'0',
        ]);
        Country::create([
            'IEBStaatNr' => '95058',
            'Bezeichnung' => 'Turkmenistan',
            'Bezeichnung_en' => 'Turkmenistan',
            'ISO' => 'TKM',
            'iban' =>'',
            'EU' =>'0',
            'Arbeitserlaubnis' =>'0',
            'Aufenthaltserlaubnis' =>'0',
        ]);
        Country::create([
            'IEBStaatNr' => '95059',
            'Bezeichnung' => 'Tuvalu',
            'Bezeichnung_en' => 'Tuvalu',
            'ISO' => 'TUV',
            'iban' =>'',
            'EU' =>'0',
            'Arbeitserlaubnis' =>'0',
            'Aufenthaltserlaubnis' =>'0',
        ]);
        Country::create([
            'IEBStaatNr' => '95060',
            'Bezeichnung' => 'Uganda',
            'Bezeichnung_en' => 'Uganda',
            'ISO' => 'UGA',
            'iban' =>'',
            'EU' =>'0',
            'Arbeitserlaubnis' =>'0',
            'Aufenthaltserlaubnis' =>'0',
        ]);
        Country::create([
            'IEBStaatNr' => '95061',
            'Bezeichnung' => 'Ukraine',
            'Bezeichnung_en' => 'Ukraine',
            'ISO' => 'UKR',
            'iban' =>'UA',
            'EU' =>'0',
            'Arbeitserlaubnis' =>'0',
            'Aufenthaltserlaubnis' =>'0',
        ]);
        Country::create([
            'IEBStaatNr' => '95062',
            'Bezeichnung' => 'Ungarn',
            'Bezeichnung_en' => 'Hungary',
            'ISO' => 'HUN',
            'iban' =>'HU',
            'EU' =>'1',
            'Arbeitserlaubnis' =>'1',
            'Aufenthaltserlaubnis' =>'1',
        ]);
        Country::create([
            'IEBStaatNr' => '95063',
            'Bezeichnung' => 'Uruguay',
            'Bezeichnung_en' => 'Uruguay',
            'ISO' => 'URY',
            'iban' =>'UY',
            'EU' =>'0',
            'Arbeitserlaubnis' =>'0',
            'Aufenthaltserlaubnis' =>'0',
        ]);
        Country::create([
            'IEBStaatNr' => '95064',
            'Bezeichnung' => 'Usbekistan',
            'Bezeichnung_en' => 'Uzbekistan',
            'ISO' => 'UZB',
            'iban' =>'UZ',
            'EU' =>'0',
            'Arbeitserlaubnis' =>'0',
            'Aufenthaltserlaubnis' =>'0',
        ]);
        Country::create([
            'IEBStaatNr' => '95065',
            'Bezeichnung' => 'Vanuatu',
            'Bezeichnung_en' => 'Vanuatu',
            'ISO' => 'VUT',
            'iban' =>'',
            'EU' =>'0',
            'Arbeitserlaubnis' =>'0',
            'Aufenthaltserlaubnis' =>'0',
        ]);
        Country::create([
            'IEBStaatNr' => '95066',
            'Bezeichnung' => 'Vatikan',
            'Bezeichnung_en' => 'Vatican',
            'ISO' => 'VAT',
            'iban' =>'',
            'EU' =>'0',
            'Arbeitserlaubnis' =>'0',
            'Aufenthaltserlaubnis' =>'0',
        ]);
        Country::create([
            'IEBStaatNr' => '95067',
            'Bezeichnung' => 'Venezuela',
            'Bezeichnung_en' => 'Venezuela',
            'ISO' => 'VEN',
            'iban' =>'VE',
            'EU' =>'0',
            'Arbeitserlaubnis' =>'0',
            'Aufenthaltserlaubnis' =>'0',
        ]);
        Country::create([
            'IEBStaatNr' => '95068',
            'Bezeichnung' => 'Vereinigte Arabische Emirate',
            'Bezeichnung_en' => 'United Arab Emirates',
            'ISO' => 'ARE',
            'iban' =>'AE',
            'EU' =>'0',
            'Arbeitserlaubnis' =>'0',
            'Aufenthaltserlaubnis' =>'0',
        ]);
         Country::create([
            'IEBStaatNr' => '95069',
            'Bezeichnung' => 'Vereinigte Staaten',
            'Bezeichnung_en' => 'United States',
            'ISO' => 'USA',
            'iban' =>'',
            'EU' =>'0',
            'Arbeitserlaubnis' =>'0',
            'Aufenthaltserlaubnis' =>'0',
        ]);
        Country::create([
            'IEBStaatNr' => '95070',
            'Bezeichnung' => 'Vereinigtes Königreich Großbritannien',
            'Bezeichnung_en' => 'United Kingdom of Great Britain',
            'ISO' => 'GBR',
            'iban' =>'GB',
            'EU' =>'0',
            'Arbeitserlaubnis' =>'1',
            'Aufenthaltserlaubnis' =>'1',
        ]);
        Country::create([
            'IEBStaatNr' => '95071',
            'Bezeichnung' => 'Vietnam',
            'Bezeichnung_en' => 'Vietnam',
            'ISO' => 'VNM',
            'iban' =>'',
            'EU' =>'0',
            'Arbeitserlaubnis' =>'0',
            'Aufenthaltserlaubnis' =>'0',
        ]);
        Country::create([
            'IEBStaatNr' => '95072',
            'Bezeichnung' => 'Zentralafrikanische Republik',
            'Bezeichnung_en' => 'Central African Republic',
            'ISO' => 'CAF',
            'iban' =>'',
            'EU' =>'0',
            'Arbeitserlaubnis' =>'0',
            'Aufenthaltserlaubnis' =>'0',
        ]);
        Country::create([
            'IEBStaatNr' => '95073',
            'Bezeichnung' => 'Zypern',
            'Bezeichnung_en' => 'Cyprus',
            'ISO' => 'CYP',
            'iban' =>'CY',
            'EU' =>'1',
            'Arbeitserlaubnis' =>'1',
            'Aufenthaltserlaubnis' =>'1',
        ]);
        Country::create([
            'IEBStaatNr' => '95074',
            'Bezeichnung' => 'Staatenlos',
            'Bezeichnung_en' => 'stateless',
            'ISO' => '',
            'iban' =>'',
            'EU' =>'0',
            'Arbeitserlaubnis' =>'0',
            'Aufenthaltserlaubnis' =>'0',
        ]);
        Country::create([
            'IEBStaatNr' => '95075',
            'Bezeichnung' => 'Unbekannt',
            'Bezeichnung_en' => 'unknown',
            'ISO' => '',
            'iban' =>'',
            'EU' =>'0',
            'Arbeitserlaubnis' =>'0',
            'Aufenthaltserlaubnis' =>'0',
        ]);
        Country::create([
            'IEBStaatNr' => '95075',
            'Bezeichnung' => 'Ungeklärt',
            'Bezeichnung_en' => 'uncertain',
            'ISO' => '',
            'iban' =>'',
            'EU' =>'0',
            'Arbeitserlaubnis' =>'0',
            'Aufenthaltserlaubnis' =>'0',
        ]);
        Country::create([
            'IEBStaatNr' => '95077',
            'Bezeichnung' => 'Südsudan',
            'Bezeichnung_en' => 'South Sudan',
            'ISO' => 'SSD',
            'iban' =>'',
            'EU' =>'0',
            'Arbeitserlaubnis' =>'0',
            'Aufenthaltserlaubnis' =>'0',
        ]);
        Country::create([
            'IEBStaatNr' => '95078',
            'Bezeichnung' => 'Sudan',
            'Bezeichnung_en' => 'Sudan',
            'ISO' => 'SDN',
            'iban' =>'',
            'EU' =>'0',
            'Arbeitserlaubnis' =>'0',
            'Aufenthaltserlaubnis' =>'0',
        ]);
        Country::create([
            'IEBStaatNr' => '95079',
            'Bezeichnung' => 'Cook Inseln ',
            'Bezeichnung_en' => 'Cook Islands',
            'ISO' => 'COK',
            'iban' =>'',
            'EU' =>'0',
            'Arbeitserlaubnis' =>'0',
            'Aufenthaltserlaubnis' =>'0',
        ]);
        Country::create([
            'IEBStaatNr' => '94912',
            'Bezeichnung' => 'Taiwan (Rep. China)',
            'Bezeichnung_en' => 'Taiwan',
            'ISO' => 'TWN',
            'iban' =>'',
            'EU' =>'0',
            'Arbeitserlaubnis' =>'0',
            'Aufenthaltserlaubnis' =>'0',
        ]);
        Country::create([
            'IEBStaatNr' => '94985',
            'Bezeichnung' => 'Westsahara ',
            'Bezeichnung_en' => 'Western Sahara',
            'ISO' => 'ESH',
            'iban' =>'',
            'EU' =>'0',
            'Arbeitserlaubnis' =>'0',
            'Aufenthaltserlaubnis' =>'0',
        ]);

    }
}
