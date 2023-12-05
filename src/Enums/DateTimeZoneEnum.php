<?php

namespace NormanHuth\HelpersLaravel\Enums;

use NormanHuth\HelpersLaravel\Traits\EnumTrait;

enum DateTimeZoneEnum: string
{
    use EnumTrait;

    case UTC = 'UTC';
    case AFRICA_ABIDJAN = 'Africa/Abidjan';
    case AFRICA_ACCRA = 'Africa/Accra';
    case AFRICA_ADDIS_ABABA = 'Africa/Addis Ababa';
    case AFRICA_ALGIERS = 'Africa/Algiers';
    case AFRICA_ASMARA = 'Africa/Asmara';
    case AFRICA_BAMAKO = 'Africa/Bamako';
    case AFRICA_BANGUI = 'Africa/Bangui';
    case AFRICA_BANJUL = 'Africa/Banjul';
    case AFRICA_BISSAU = 'Africa/Bissau';
    case AFRICA_BLANTYRE = 'Africa/Blantyre';
    case AFRICA_BRAZZAVILLE = 'Africa/Brazzaville';
    case AFRICA_BUJUMBURA = 'Africa/Bujumbura';
    case AFRICA_CAIRO = 'Africa/Cairo';
    case AFRICA_CASABLANCA = 'Africa/Casablanca';
    case AFRICA_CEUTA = 'Africa/Ceuta';
    case AFRICA_CONAKRY = 'Africa/Conakry';
    case AFRICA_DAKAR = 'Africa/Dakar';
    case AFRICA_DAR_ES_SALAAM = 'Africa/Dar es Salaam';
    case AFRICA_DJIBOUTI = 'Africa/Djibouti';
    case AFRICA_DOUALA = 'Africa/Douala';
    case AFRICA_EL_AAIUN = 'Africa/El Aaiun';
    case AFRICA_FREETOWN = 'Africa/Freetown';
    case AFRICA_GABORONE = 'Africa/Gaborone';
    case AFRICA_HARARE = 'Africa/Harare';
    case AFRICA_JOHANNESBURG = 'Africa/Johannesburg';
    case AFRICA_JUBA = 'Africa/Juba';
    case AFRICA_KAMPALA = 'Africa/Kampala';
    case AFRICA_KHARTOUM = 'Africa/Khartoum';
    case AFRICA_KIGALI = 'Africa/Kigali';
    case AFRICA_KINSHASA = 'Africa/Kinshasa';
    case AFRICA_LAGOS = 'Africa/Lagos';
    case AFRICA_LIBREVILLE = 'Africa/Libreville';
    case AFRICA_LOME = 'Africa/Lome';
    case AFRICA_LUANDA = 'Africa/Luanda';
    case AFRICA_LUBUMBASHI = 'Africa/Lubumbashi';
    case AFRICA_LUSAKA = 'Africa/Lusaka';
    case AFRICA_MALABO = 'Africa/Malabo';
    case AFRICA_MAPUTO = 'Africa/Maputo';
    case AFRICA_MASERU = 'Africa/Maseru';
    case AFRICA_MBABANE = 'Africa/Mbabane';
    case AFRICA_MOGADISHU = 'Africa/Mogadishu';
    case AFRICA_MONROVIA = 'Africa/Monrovia';
    case AFRICA_NAIROBI = 'Africa/Nairobi';
    case AFRICA_NDJAMENA = 'Africa/Ndjamena';
    case AFRICA_NIAMEY = 'Africa/Niamey';
    case AFRICA_NOUAKCHOTT = 'Africa/Nouakchott';
    case AFRICA_OUAGADOUGOU = 'Africa/Ouagadougou';
    case AFRICA_PORTO_NOVO = 'Africa/Porto-Novo';
    case AFRICA_SAO_TOME = 'Africa/Sao Tome';
    case AFRICA_TRIPOLI = 'Africa/Tripoli';
    case AFRICA_TUNIS = 'Africa/Tunis';
    case AFRICA_WINDHOEK = 'Africa/Windhoek';
    case AMERICA_ADAK = 'America/Adak';
    case AMERICA_ANCHORAGE = 'America/Anchorage';
    case AMERICA_ANGUILLA = 'America/Anguilla';
    case AMERICA_ANTIGUA = 'America/Antigua';
    case AMERICA_ARAGUAINA = 'America/Araguaina';
    case AMERICA_ARGENTINA_BUENOS_AIRES = 'America/Argentina/Buenos Aires';
    case AMERICA_ARGENTINA_CATAMARCA = 'America/Argentina/Catamarca';
    case AMERICA_ARGENTINA_CORDOBA = 'America/Argentina/Cordoba';
    case AMERICA_ARGENTINA_JUJUY = 'America/Argentina/Jujuy';
    case AMERICA_ARGENTINA_LA_RIOJA = 'America/Argentina/La Rioja';
    case AMERICA_ARGENTINA_MENDOZA = 'America/Argentina/Mendoza';
    case AMERICA_ARGENTINA_RIO_GALLEGOS = 'America/Argentina/Rio Gallegos';
    case AMERICA_ARGENTINA_SALTA = 'America/Argentina/Salta';
    case AMERICA_ARGENTINA_SAN_JUAN = 'America/Argentina/San Juan';
    case AMERICA_ARGENTINA_SAN_LUIS = 'America/Argentina/San Luis';
    case AMERICA_ARGENTINA_TUCUMAN = 'America/Argentina/Tucuman';
    case AMERICA_ARGENTINA_USHUAIA = 'America/Argentina/Ushuaia';
    case AMERICA_ARUBA = 'America/Aruba';
    case AMERICA_ASUNCION = 'America/Asuncion';
    case AMERICA_ATIKOKAN = 'America/Atikokan';
    case AMERICA_BAHIA = 'America/Bahia';
    case AMERICA_BAHIA_BANDERAS = 'America/Bahia Banderas';
    case AMERICA_BARBADOS = 'America/Barbados';
    case AMERICA_BELEM = 'America/Belem';
    case AMERICA_BELIZE = 'America/Belize';
    case AMERICA_BLANC_SABLON = 'America/Blanc-Sablon';
    case AMERICA_BOA_VISTA = 'America/Boa Vista';
    case AMERICA_BOGOTA = 'America/Bogota';
    case AMERICA_BOISE = 'America/Boise';
    case AMERICA_CAMBRIDGE_BAY = 'America/Cambridge Bay';
    case AMERICA_CAMPO_GRANDE = 'America/Campo Grande';
    case AMERICA_CANCUN = 'America/Cancun';
    case AMERICA_CARACAS = 'America/Caracas';
    case AMERICA_CAYENNE = 'America/Cayenne';
    case AMERICA_CAYMAN = 'America/Cayman';
    case AMERICA_CHICAGO = 'America/Chicago';
    case AMERICA_CHIHUAHUA = 'America/Chihuahua';
    case AMERICA_CIUDAD_JUAREZ = 'America/Ciudad Juarez';
    case AMERICA_COSTA_RICA = 'America/Costa Rica';
    case AMERICA_CRESTON = 'America/Creston';
    case AMERICA_CUIABA = 'America/Cuiaba';
    case AMERICA_CURACAO = 'America/Curacao';
    case AMERICA_DANMARKSHAVN = 'America/Danmarkshavn';
    case AMERICA_DAWSON = 'America/Dawson';
    case AMERICA_DAWSON_CREEK = 'America/Dawson Creek';
    case AMERICA_DENVER = 'America/Denver';
    case AMERICA_DETROIT = 'America/Detroit';
    case AMERICA_DOMINICA = 'America/Dominica';
    case AMERICA_EDMONTON = 'America/Edmonton';
    case AMERICA_EIRUNEPE = 'America/Eirunepe';
    case AMERICA_EL_SALVADOR = 'America/El Salvador';
    case AMERICA_FORT_NELSON = 'America/Fort Nelson';
    case AMERICA_FORTALEZA = 'America/Fortaleza';
    case AMERICA_GLACE_BAY = 'America/Glace Bay';
    case AMERICA_GOOSE_BAY = 'America/Goose Bay';
    case AMERICA_GRAND_TURK = 'America/Grand Turk';
    case AMERICA_GRENADA = 'America/Grenada';
    case AMERICA_GUADELOUPE = 'America/Guadeloupe';
    case AMERICA_GUATEMALA = 'America/Guatemala';
    case AMERICA_GUAYAQUIL = 'America/Guayaquil';
    case AMERICA_GUYANA = 'America/Guyana';
    case AMERICA_HALIFAX = 'America/Halifax';
    case AMERICA_HAVANA = 'America/Havana';
    case AMERICA_HERMOSILLO = 'America/Hermosillo';
    case AMERICA_INDIANA_INDIANAPOLIS = 'America/Indiana/Indianapolis';
    case AMERICA_INDIANA_KNOX = 'America/Indiana/Knox';
    case AMERICA_INDIANA_MARENGO = 'America/Indiana/Marengo';
    case AMERICA_INDIANA_PETERSBURG = 'America/Indiana/Petersburg';
    case AMERICA_INDIANA_TELL_CITY = 'America/Indiana/Tell City';
    case AMERICA_INDIANA_VEVAY = 'America/Indiana/Vevay';
    case AMERICA_INDIANA_VINCENNES = 'America/Indiana/Vincennes';
    case AMERICA_INDIANA_WINAMAC = 'America/Indiana/Winamac';
    case AMERICA_INUVIK = 'America/Inuvik';
    case AMERICA_IQALUIT = 'America/Iqaluit';
    case AMERICA_JAMAICA = 'America/Jamaica';
    case AMERICA_JUNEAU = 'America/Juneau';
    case AMERICA_KENTUCKY_LOUISVILLE = 'America/Kentucky/Louisville';
    case AMERICA_KENTUCKY_MONTICELLO = 'America/Kentucky/Monticello';
    case AMERICA_KRALENDIJK = 'America/Kralendijk';
    case AMERICA_LA_PAZ = 'America/La Paz';
    case AMERICA_LIMA = 'America/Lima';
    case AMERICA_LOS_ANGELES = 'America/Los Angeles';
    case AMERICA_LOWER_PRINCES = 'America/Lower Princes';
    case AMERICA_MACEIO = 'America/Maceio';
    case AMERICA_MANAGUA = 'America/Managua';
    case AMERICA_MANAUS = 'America/Manaus';
    case AMERICA_MARIGOT = 'America/Marigot';
    case AMERICA_MARTINIQUE = 'America/Martinique';
    case AMERICA_MATAMOROS = 'America/Matamoros';
    case AMERICA_MAZATLAN = 'America/Mazatlan';
    case AMERICA_MENOMINEE = 'America/Menominee';
    case AMERICA_MERIDA = 'America/Merida';
    case AMERICA_METLAKATLA = 'America/Metlakatla';
    case AMERICA_MEXICO_CITY = 'America/Mexico City';
    case AMERICA_MIQUELON = 'America/Miquelon';
    case AMERICA_MONCTON = 'America/Moncton';
    case AMERICA_MONTERREY = 'America/Monterrey';
    case AMERICA_MONTEVIDEO = 'America/Montevideo';
    case AMERICA_MONTSERRAT = 'America/Montserrat';
    case AMERICA_NASSAU = 'America/Nassau';
    case AMERICA_NEW_YORK = 'America/New York';
    case AMERICA_NOME = 'America/Nome';
    case AMERICA_NORONHA = 'America/Noronha';
    case AMERICA_NORTH_DAKOTA_BEULAH = 'America/North Dakota/Beulah';
    case AMERICA_NORTH_DAKOTA_CENTER = 'America/North Dakota/Center';
    case AMERICA_NORTH_DAKOTA_NEW_SALEM = 'America/North Dakota/New Salem';
    case AMERICA_NUUK = 'America/Nuuk';
    case AMERICA_OJINAGA = 'America/Ojinaga';
    case AMERICA_PANAMA = 'America/Panama';
    case AMERICA_PARAMARIBO = 'America/Paramaribo';
    case AMERICA_PHOENIX = 'America/Phoenix';
    case AMERICA_PORT_AU_PRINCE = 'America/Port-au-Prince';
    case AMERICA_PORT_OF_SPAIN = 'America/Port of Spain';
    case AMERICA_PORTO_VELHO = 'America/Porto Velho';
    case AMERICA_PUERTO_RICO = 'America/Puerto Rico';
    case AMERICA_PUNTA_ARENAS = 'America/Punta Arenas';
    case AMERICA_RANKIN_INLET = 'America/Rankin Inlet';
    case AMERICA_RECIFE = 'America/Recife';
    case AMERICA_REGINA = 'America/Regina';
    case AMERICA_RESOLUTE = 'America/Resolute';
    case AMERICA_RIO_BRANCO = 'America/Rio Branco';
    case AMERICA_SANTAREM = 'America/Santarem';
    case AMERICA_SANTIAGO = 'America/Santiago';
    case AMERICA_SANTO_DOMINGO = 'America/Santo Domingo';
    case AMERICA_SAO_PAULO = 'America/Sao Paulo';
    case AMERICA_SCORESBYSUND = 'America/Scoresbysund';
    case AMERICA_SITKA = 'America/Sitka';
    case AMERICA_ST_BARTHELEMY = 'America/St Barthelemy';
    case AMERICA_ST_JOHNS = 'America/St Johns';
    case AMERICA_ST_KITTS = 'America/St Kitts';
    case AMERICA_ST_LUCIA = 'America/St Lucia';
    case AMERICA_ST_THOMAS = 'America/St Thomas';
    case AMERICA_ST_VINCENT = 'America/St Vincent';
    case AMERICA_SWIFT_CURRENT = 'America/Swift Current';
    case AMERICA_TEGUCIGALPA = 'America/Tegucigalpa';
    case AMERICA_THULE = 'America/Thule';
    case AMERICA_TIJUANA = 'America/Tijuana';
    case AMERICA_TORONTO = 'America/Toronto';
    case AMERICA_TORTOLA = 'America/Tortola';
    case AMERICA_VANCOUVER = 'America/Vancouver';
    case AMERICA_WHITEHORSE = 'America/Whitehorse';
    case AMERICA_WINNIPEG = 'America/Winnipeg';
    case AMERICA_YAKUTAT = 'America/Yakutat';
    case AMERICA_YELLOWKNIFE = 'America/Yellowknife';
    case ANTARCTICA_CASEY = 'Antarctica/Casey';
    case ANTARCTICA_DAVIS = 'Antarctica/Davis';
    case ANTARCTICA_DUMONT_D_URVILLE = 'Antarctica/DumontDUrville';
    case ANTARCTICA_MACQUARIE = 'Antarctica/Macquarie';
    case ANTARCTICA_MAWSON = 'Antarctica/Mawson';
    case ANTARCTICA_MC_MURDO = 'Antarctica/McMurdo';
    case ANTARCTICA_PALMER = 'Antarctica/Palmer';
    case ANTARCTICA_ROTHERA = 'Antarctica/Rothera';
    case ANTARCTICA_SYOWA = 'Antarctica/Syowa';
    case ANTARCTICA_TROLL = 'Antarctica/Troll';
    case ANTARCTICA_VOSTOK = 'Antarctica/Vostok';
    case ARCTIC_LONGYEARBYEN = 'Arctic/Longyearbyen';
    case ASIA_ADEN = 'Asia/Aden';
    case ASIA_ALMATY = 'Asia/Almaty';
    case ASIA_AMMAN = 'Asia/Amman';
    case ASIA_ANADYR = 'Asia/Anadyr';
    case ASIA_AQTAU = 'Asia/Aqtau';
    case ASIA_AQTOBE = 'Asia/Aqtobe';
    case ASIA_ASHGABAT = 'Asia/Ashgabat';
    case ASIA_ATYRAU = 'Asia/Atyrau';
    case ASIA_BAGHDAD = 'Asia/Baghdad';
    case ASIA_BAHRAIN = 'Asia/Bahrain';
    case ASIA_BAKU = 'Asia/Baku';
    case ASIA_BANGKOK = 'Asia/Bangkok';
    case ASIA_BARNAUL = 'Asia/Barnaul';
    case ASIA_BEIRUT = 'Asia/Beirut';
    case ASIA_BISHKEK = 'Asia/Bishkek';
    case ASIA_BRUNEI = 'Asia/Brunei';
    case ASIA_CHITA = 'Asia/Chita';
    case ASIA_CHOIBALSAN = 'Asia/Choibalsan';
    case ASIA_COLOMBO = 'Asia/Colombo';
    case ASIA_DAMASCUS = 'Asia/Damascus';
    case ASIA_DHAKA = 'Asia/Dhaka';
    case ASIA_DILI = 'Asia/Dili';
    case ASIA_DUBAI = 'Asia/Dubai';
    case ASIA_DUSHANBE = 'Asia/Dushanbe';
    case ASIA_FAMAGUSTA = 'Asia/Famagusta';
    case ASIA_GAZA = 'Asia/Gaza';
    case ASIA_HEBRON = 'Asia/Hebron';
    case ASIA_HO_CHI_MINH = 'Asia/Ho Chi Minh';
    case ASIA_HONG_KONG = 'Asia/Hong Kong';
    case ASIA_HOVD = 'Asia/Hovd';
    case ASIA_IRKUTSK = 'Asia/Irkutsk';
    case ASIA_JAKARTA = 'Asia/Jakarta';
    case ASIA_JAYAPURA = 'Asia/Jayapura';
    case ASIA_JERUSALEM = 'Asia/Jerusalem';
    case ASIA_KABUL = 'Asia/Kabul';
    case ASIA_KAMCHATKA = 'Asia/Kamchatka';
    case ASIA_KARACHI = 'Asia/Karachi';
    case ASIA_KATHMANDU = 'Asia/Kathmandu';
    case ASIA_KHANDYGA = 'Asia/Khandyga';
    case ASIA_KOLKATA = 'Asia/Kolkata';
    case ASIA_KRASNOYARSK = 'Asia/Krasnoyarsk';
    case ASIA_KUALA_LUMPUR = 'Asia/Kuala Lumpur';
    case ASIA_KUCHING = 'Asia/Kuching';
    case ASIA_KUWAIT = 'Asia/Kuwait';
    case ASIA_MACAU = 'Asia/Macau';
    case ASIA_MAGADAN = 'Asia/Magadan';
    case ASIA_MAKASSAR = 'Asia/Makassar';
    case ASIA_MANILA = 'Asia/Manila';
    case ASIA_MUSCAT = 'Asia/Muscat';
    case ASIA_NICOSIA = 'Asia/Nicosia';
    case ASIA_NOVOKUZNETSK = 'Asia/Novokuznetsk';
    case ASIA_NOVOSIBIRSK = 'Asia/Novosibirsk';
    case ASIA_OMSK = 'Asia/Omsk';
    case ASIA_ORAL = 'Asia/Oral';
    case ASIA_PHNOM_PENH = 'Asia/Phnom Penh';
    case ASIA_PONTIANAK = 'Asia/Pontianak';
    case ASIA_PYONGYANG = 'Asia/Pyongyang';
    case ASIA_QATAR = 'Asia/Qatar';
    case ASIA_QOSTANAY = 'Asia/Qostanay';
    case ASIA_QYZYLORDA = 'Asia/Qyzylorda';
    case ASIA_RIYADH = 'Asia/Riyadh';
    case ASIA_SAKHALIN = 'Asia/Sakhalin';
    case ASIA_SAMARKAND = 'Asia/Samarkand';
    case ASIA_SEOUL = 'Asia/Seoul';
    case ASIA_SHANGHAI = 'Asia/Shanghai';
    case ASIA_SINGAPORE = 'Asia/Singapore';
    case ASIA_SREDNEKOLYMSK = 'Asia/Srednekolymsk';
    case ASIA_TAIPEI = 'Asia/Taipei';
    case ASIA_TASHKENT = 'Asia/Tashkent';
    case ASIA_TBILISI = 'Asia/Tbilisi';
    case ASIA_TEHRAN = 'Asia/Tehran';
    case ASIA_THIMPHU = 'Asia/Thimphu';
    case ASIA_TOKYO = 'Asia/Tokyo';
    case ASIA_TOMSK = 'Asia/Tomsk';
    case ASIA_ULAANBAATAR = 'Asia/Ulaanbaatar';
    case ASIA_URUMQI = 'Asia/Urumqi';
    case ASIA_UST_NERA = 'Asia/Ust-Nera';
    case ASIA_VIENTIANE = 'Asia/Vientiane';
    case ASIA_VLADIVOSTOK = 'Asia/Vladivostok';
    case ASIA_YAKUTSK = 'Asia/Yakutsk';
    case ASIA_YANGON = 'Asia/Yangon';
    case ASIA_YEKATERINBURG = 'Asia/Yekaterinburg';
    case ASIA_YEREVAN = 'Asia/Yerevan';
    case ATLANTIC_AZORES = 'Atlantic/Azores';
    case ATLANTIC_BERMUDA = 'Atlantic/Bermuda';
    case ATLANTIC_CANARY = 'Atlantic/Canary';
    case ATLANTIC_CAPE_VERDE = 'Atlantic/Cape Verde';
    case ATLANTIC_FAROE = 'Atlantic/Faroe';
    case ATLANTIC_MADEIRA = 'Atlantic/Madeira';
    case ATLANTIC_REYKJAVIK = 'Atlantic/Reykjavik';
    case ATLANTIC_SOUTH_GEORGIA = 'Atlantic/South Georgia';
    case ATLANTIC_ST_HELENA = 'Atlantic/St Helena';
    case ATLANTIC_STANLEY = 'Atlantic/Stanley';
    case AUSTRALIA_ADELAIDE = 'Australia/Adelaide';
    case AUSTRALIA_BRISBANE = 'Australia/Brisbane';
    case AUSTRALIA_BROKEN_HILL = 'Australia/Broken Hill';
    case AUSTRALIA_DARWIN = 'Australia/Darwin';
    case AUSTRALIA_EUCLA = 'Australia/Eucla';
    case AUSTRALIA_HOBART = 'Australia/Hobart';
    case AUSTRALIA_LINDEMAN = 'Australia/Lindeman';
    case AUSTRALIA_LORD_HOWE = 'Australia/Lord Howe';
    case AUSTRALIA_MELBOURNE = 'Australia/Melbourne';
    case AUSTRALIA_PERTH = 'Australia/Perth';
    case AUSTRALIA_SYDNEY = 'Australia/Sydney';
    case EUROPE_AMSTERDAM = 'Europe/Amsterdam';
    case EUROPE_ANDORRA = 'Europe/Andorra';
    case EUROPE_ASTRAKHAN = 'Europe/Astrakhan';
    case EUROPE_ATHENS = 'Europe/Athens';
    case EUROPE_BELGRADE = 'Europe/Belgrade';
    case EUROPE_BERLIN = 'Europe/Berlin';
    case EUROPE_BRATISLAVA = 'Europe/Bratislava';
    case EUROPE_BRUSSELS = 'Europe/Brussels';
    case EUROPE_BUCHAREST = 'Europe/Bucharest';
    case EUROPE_BUDAPEST = 'Europe/Budapest';
    case EUROPE_BUSINGEN = 'Europe/Busingen';
    case EUROPE_CHISINAU = 'Europe/Chisinau';
    case EUROPE_COPENHAGEN = 'Europe/Copenhagen';
    case EUROPE_DUBLIN = 'Europe/Dublin';
    case EUROPE_GIBRALTAR = 'Europe/Gibraltar';
    case EUROPE_GUERNSEY = 'Europe/Guernsey';
    case EUROPE_HELSINKI = 'Europe/Helsinki';
    case EUROPE_ISLE_OF_MAN = 'Europe/Isle of Man';
    case EUROPE_ISTANBUL = 'Europe/Istanbul';
    case EUROPE_JERSEY = 'Europe/Jersey';
    case EUROPE_KALININGRAD = 'Europe/Kaliningrad';
    case EUROPE_KIROV = 'Europe/Kirov';
    case EUROPE_KYIV = 'Europe/Kyiv';
    case EUROPE_LISBON = 'Europe/Lisbon';
    case EUROPE_LJUBLJANA = 'Europe/Ljubljana';
    case EUROPE_LONDON = 'Europe/London';
    case EUROPE_LUXEMBOURG = 'Europe/Luxembourg';
    case EUROPE_MADRID = 'Europe/Madrid';
    case EUROPE_MALTA = 'Europe/Malta';
    case EUROPE_MARIEHAMN = 'Europe/Mariehamn';
    case EUROPE_MINSK = 'Europe/Minsk';
    case EUROPE_MONACO = 'Europe/Monaco';
    case EUROPE_MOSCOW = 'Europe/Moscow';
    case EUROPE_OSLO = 'Europe/Oslo';
    case EUROPE_PARIS = 'Europe/Paris';
    case EUROPE_PODGORICA = 'Europe/Podgorica';
    case EUROPE_PRAGUE = 'Europe/Prague';
    case EUROPE_RIGA = 'Europe/Riga';
    case EUROPE_ROME = 'Europe/Rome';
    case EUROPE_SAMARA = 'Europe/Samara';
    case EUROPE_SAN_MARINO = 'Europe/San Marino';
    case EUROPE_SARAJEVO = 'Europe/Sarajevo';
    case EUROPE_SARATOV = 'Europe/Saratov';
    case EUROPE_SIMFEROPOL = 'Europe/Simferopol';
    case EUROPE_SKOPJE = 'Europe/Skopje';
    case EUROPE_SOFIA = 'Europe/Sofia';
    case EUROPE_STOCKHOLM = 'Europe/Stockholm';
    case EUROPE_TALLINN = 'Europe/Tallinn';
    case EUROPE_TIRANE = 'Europe/Tirane';
    case EUROPE_ULYANOVSK = 'Europe/Ulyanovsk';
    case EUROPE_VADUZ = 'Europe/Vaduz';
    case EUROPE_VATICAN = 'Europe/Vatican';
    case EUROPE_VIENNA = 'Europe/Vienna';
    case EUROPE_VILNIUS = 'Europe/Vilnius';
    case EUROPE_VOLGOGRAD = 'Europe/Volgograd';
    case EUROPE_WARSAW = 'Europe/Warsaw';
    case EUROPE_ZAGREB = 'Europe/Zagreb';
    case EUROPE_ZURICH = 'Europe/Zurich';
    case INDIAN_ANTANANARIVO = 'Indian/Antananarivo';
    case INDIAN_CHAGOS = 'Indian/Chagos';
    case INDIAN_CHRISTMAS = 'Indian/Christmas';
    case INDIAN_COCOS = 'Indian/Cocos';
    case INDIAN_COMORO = 'Indian/Comoro';
    case INDIAN_KERGUELEN = 'Indian/Kerguelen';
    case INDIAN_MAHE = 'Indian/Mahe';
    case INDIAN_MALDIVES = 'Indian/Maldives';
    case INDIAN_MAURITIUS = 'Indian/Mauritius';
    case INDIAN_MAYOTTE = 'Indian/Mayotte';
    case INDIAN_REUNION = 'Indian/Reunion';
    case PACIFIC_APIA = 'Pacific/Apia';
    case PACIFIC_AUCKLAND = 'Pacific/Auckland';
    case PACIFIC_BOUGAINVILLE = 'Pacific/Bougainville';
    case PACIFIC_CHATHAM = 'Pacific/Chatham';
    case PACIFIC_CHUUK = 'Pacific/Chuuk';
    case PACIFIC_EASTER = 'Pacific/Easter';
    case PACIFIC_EFATE = 'Pacific/Efate';
    case PACIFIC_FAKAOFO = 'Pacific/Fakaofo';
    case PACIFIC_FIJI = 'Pacific/Fiji';
    case PACIFIC_FUNAFUTI = 'Pacific/Funafuti';
    case PACIFIC_GALAPAGOS = 'Pacific/Galapagos';
    case PACIFIC_GAMBIER = 'Pacific/Gambier';
    case PACIFIC_GUADALCANAL = 'Pacific/Guadalcanal';
    case PACIFIC_GUAM = 'Pacific/Guam';
    case PACIFIC_HONOLULU = 'Pacific/Honolulu';
    case PACIFIC_KANTON = 'Pacific/Kanton';
    case PACIFIC_KIRITIMATI = 'Pacific/Kiritimati';
    case PACIFIC_KOSRAE = 'Pacific/Kosrae';
    case PACIFIC_KWAJALEIN = 'Pacific/Kwajalein';
    case PACIFIC_MAJURO = 'Pacific/Majuro';
    case PACIFIC_MARQUESAS = 'Pacific/Marquesas';
    case PACIFIC_MIDWAY = 'Pacific/Midway';
    case PACIFIC_NAURU = 'Pacific/Nauru';
    case PACIFIC_NIUE = 'Pacific/Niue';
    case PACIFIC_NORFOLK = 'Pacific/Norfolk';
    case PACIFIC_NOUMEA = 'Pacific/Noumea';
    case PACIFIC_PAGO_PAGO = 'Pacific/Pago Pago';
    case PACIFIC_PALAU = 'Pacific/Palau';
    case PACIFIC_PITCAIRN = 'Pacific/Pitcairn';
    case PACIFIC_POHNPEI = 'Pacific/Pohnpei';
    case PACIFIC_PORT_MORESBY = 'Pacific/Port Moresby';
    case PACIFIC_RAROTONGA = 'Pacific/Rarotonga';
    case PACIFIC_SAIPAN = 'Pacific/Saipan';
    case PACIFIC_TAHITI = 'Pacific/Tahiti';
    case PACIFIC_TARAWA = 'Pacific/Tarawa';
    case PACIFIC_TONGATAPU = 'Pacific/Tongatapu';
    case PACIFIC_WAKE = 'Pacific/Wake';
    case PACIFIC_WALLIS = 'Pacific/Wallis';
}
