<?php
declare(strict_types=1);

namespace Pmigut\GtinValidator;


abstract class GtinAbstract
{
    public const GS1_PREFIXES = [
        ['001', '019'], // GS1 US
//      ['020', '029'], // Used to issue Restricted Circulation Numbers within a geographic region (MO defined)
        ['030', '039'], // GS1 US
//      ['040', '049'], // Used to issue GS1 Restricted Circulation Numbers within a company
//      ['050', '059'], // GS1 US reserved for future use
        ['060', '139'], // GS1 US
//      ['200', '299'], // Used to issue Restricted Circulation Numbers within a geographic region (MO defined)
        ['300', '379'], // GS1 France
        ['380', '380'], // GS1 Bulgaria
        ['383', '383'], // GS1 Slovenija
        ['385', '385'], // GS1 Croatia
        ['387', '387'], // GS1 BIH (Bosnia-Herzegovina)
        ['389', '389'], // GS1 Montenegro
        ['400', '440'], // GS1 Germany
        ['450', '459'], // GS1 Japan
        ['460', '469'], // GS1 Russia
        ['470', '470'], // GS1 Kyrgyzstan
        ['471', '471'], // GS1 Chinese Taipei
        ['474', '474'], // GS1 Estonia
        ['475', '475'], // GS1 Latvia
        ['476', '476'], // GS1 Azerbaijan
        ['477', '477'], // GS1 Lithuania
        ['478', '478'], // GS1 Uzbekistan
        ['479', '479'], // GS1 Sri Lanka
        ['480', '480'], // GS1 Philippines
        ['481', '481'], // GS1 Belarus
        ['482', '482'], // GS1 Ukraine
        ['483', '483'], // GS1 Turkmenistan
        ['484', '484'], // GS1 Moldova
        ['485', '485'], // GS1 Armenia
        ['486', '486'], // GS1 Georgia
        ['487', '487'], // GS1 Kazakstan
        ['488', '488'], // GS1 Tajikistan
        ['489', '489'], // GS1 Hong Kong, China
        ['490', '499'], // GS1 Japan
        ['500', '509'], // GS1 UK
        ['520', '521'], // GS1 Association Greece
        ['528', '528'], // GS1 Lebanon
        ['529', '529'], // GS1 Cyprus
        ['530', '530'], // GS1 Albania
        ['531', '531'], // GS1 Macedonia
        ['535', '535'], // GS1 Malta
        ['539', '539'], // GS1 Ireland
        ['540', '549'], // GS1 Belgium & Luxembourg
        ['560', '560'], // GS1 Portugal
        ['569', '569'], // GS1 Iceland
        ['570', '579'], // GS1 Denmark
        ['590', '590'], // GS1 Poland
        ['594', '594'], // GS1 Romania
        ['599', '599'], // GS1 Hungary
        ['600', '601'], // GS1 South Africa
        ['603', '603'], // GS1 Ghana
        ['604', '604'], // GS1 Senegal
        ['605', '605'], // GS1 Uganda
        ['606', '606'], // GS1 Angola
        ['607', '607'], // GS1 Oman
        ['608', '608'], // GS1 Bahrain
        ['609', '609'], // GS1 Mauritius
//      ['610', '610'], // Managed by GS1 Global Office for future MO
        ['611', '611'], // GS1 Morocco
        ['613', '613'], // GS1 Algeria
//      ['614', '614'], // Managed by GS1 Global Office for future MO
        ['615', '615'], // GS1 Nigeria
        ['616', '616'], // GS1 Kenya
        ['617', '617'], // GS1 Cameroon
        ['618', '618'], // GS1 Côte d'Ivoire
        ['619', '619'], // GS1 Tunisia
        ['620', '620'], // GS1 Tanzania
        ['621', '621'], // GS1 Syria
        ['622', '622'], // GS1 Egypt
//      ['623', '623'], // Managed by GS1 Global Office for future MO
        ['624', '624'], // GS1 Libya
        ['625', '625'], // GS1 Jordan
        ['626', '626'], // GS1 Iran
        ['627', '627'], // GS1 Kuwait
        ['628', '628'], // GS1 Saudi Arabia
        ['629', '629'], // GS1 Emirates
        ['630', '630'], // GS1 Qatar
        ['631', '631'], // GS1 Namibia
        ['632', '632'], // GS1 Rwanda
        ['640', '649'], // GS1 Finland
        ['680', '681'], // GS1 China
        ['690', '699'], // GS1 China
        ['700', '709'], // GS1 Norway
        ['729', '729'], // GS1 Israel
        ['730', '739'], // GS1 Sweden
        ['740', '740'], // GS1 Guatemala
        ['741', '741'], // GS1 El Salvador
        ['742', '742'], // GS1 Honduras
        ['743', '743'], // GS1 Nicaragua
        ['744', '744'], // GS1 Costa Rica
        ['745', '745'], // GS1 Panama
        ['746', '746'], // GS1 Republica Dominicana
        ['750', '750'], // GS1 Mexico
        ['754', '755'], // GS1 Canada
//      ['758', '758'], // Managed by GS1 Global Office for future MO
        ['759', '759'], // GS1 Venezuela
        ['760', '769'], // GS1 Switzerland
        ['770', '771'], // GS1 Colombia
        ['773', '773'], // GS1 Uruguay
        ['775', '775'], // GS1 Peru
        ['777', '777'], // GS1 Bolivia
        ['778', '779'], // GS1 Argentina
        ['780', '780'], // GS1 Chile
        ['784', '784'], // GS1 Paraguay
        ['786', '786'], // GS1 Ecuador
        ['789', '790'], // GS1 Brasil
        ['800', '839'], // GS1 Italy
        ['840', '849'], // GS1 Spain
        ['850', '850'], // GS1 Cuba
        ['858', '858'], // GS1 Slovakia
        ['859', '859'], // GS1 Czech
        ['860', '860'], // GS1 Serbia
        ['865', '865'], // GS1 Mongolia
        ['867', '867'], // GS1 North Korea
        ['868', '869'], // GS1 Türkiye
        ['870', '879'], // GS1 Netherlands
        ['880', '881'], // GS1 South Korea
        ['883', '883'], // GS1 Myanmar
        ['884', '884'], // GS1 Cambodia
        ['885', '885'], // GS1 Thailand
        ['888', '888'], // GS1 Singapore
        ['890', '890'], // GS1 India
        ['893', '893'], // GS1 Vietnam
//      ['894', '894'], // Managed by GS1 Global Office for future MO
        ['896', '896'], // GS1 Pakistan
        ['899', '899'], // GS1 Indonesia
        ['900', '919'], // GS1 Austria
        ['930', '939'], // GS1 Australia
        ['940', '949'], // GS1 New Zealand
//      ['950', '950'], // GS1 Global Office
//      ['951', '951'], // Global Office - General Manager Number
//      ['952', '952'], // Used for demonstrations and examples of the GS1 system
        ['955', '955'], // GS1 Malaysia
        ['958', '958'], // GS1 Macau, China
//      ['960', '969'], // Global Office - GTIN-8
//      ['977', '977'], // Serial publications (ISSN)
//      ['978', '979'], // Bookland (ISBN)
//      ['980', '980'], // Refund receipts
//      ['981', '983'], // GS1 coupon identification for common currency areas
//      ['990', '999'], // GS1 coupon identification
    ];

    public const GS1_000_PREFIXES = [
        ['000000', '000000'], // GS1 US
//      ['000001', '000009'], // Unused to avoid collision with GTIN-8
        ['000010', '000999'], // GS1 US
        ['000100', '009999'], // GS1 US
    ];

    public const GS1_8_PREFIXES = [
//      ['000', '099'], // Restricted use
        ['100', '199'],
//      ['200', '299'], // Restricted use
        ['300', '951'],
//      ['952', '952'], // Used for demonstrations and examples of the GS1 system
        ['953', '976'],
//      ['977', '999'], // Reserved for future use
    ];

    public static function isValidFormat(string $gtin, int $length): bool
    {
        if (!ctype_digit($gtin)) {
            return false;
        }

        if ($gtin == 0) {
            return false;
        }

        return strlen($gtin) === $length;
    }

    public static function isInRanges(string $value, array $ranges): bool
    {
        foreach ($ranges as [$start, $end]) {
            if ($start <= $value && $value <= $end) {
                return true;
            }
        }

        return false;
    }

    public static function isValidGtin8Prefix(string $gtin)
    {
        $prefix = substr($gtin, 0, 3);

        return static::isInRanges($prefix, static::GS1_8_PREFIXES);
    }

    public static function isValidGtin13Prefix(string $gtin)
    {
        $prefix = substr($gtin, 0, 3);

        // Additional check for codes beginning with 000
        if ($prefix === '000') {
            return static::isInRanges(substr($gtin, 0, 6), static::GS1_000_PREFIXES);
        }

        return static::isInRanges($prefix, static::GS1_PREFIXES);
    }

    public static function isValidChecksum(string $gtin): bool
    {
        $digits = str_split($gtin);
        $checkDigit = array_pop($digits);
        $sum = 0;

        foreach (array_reverse($digits) as $i => $digit) {
            // calculate sum of even digits and odd digits multiplied by 3
            $sum += $i & 1 ? $digit : $digit * 3;
        }

        return $checkDigit == (10 - ($sum % 10 ?: 10));
    }
}