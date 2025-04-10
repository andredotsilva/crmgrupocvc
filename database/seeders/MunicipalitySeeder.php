<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MunicipalitySeeder extends Seeder
{
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('municipalities')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        DB::table('municipalities')->insert([
            ['id' => 1, 'code' => '1', 'title' => 'AGUEDA                        ', 'district_id' => 1],
            ['id' => 12, 'code' => '2', 'title' => 'ALBERGARIA-A-VELHA            ', 'district_id' => 1],
            ['id' => 18, 'code' => '3', 'title' => 'ANADIA                        ', 'district_id' => 1],
            ['id' => 28, 'code' => '4', 'title' => 'AROUCA                        ', 'district_id' => 1],
            ['id' => 44, 'code' => '5', 'title' => 'AVEIRO                        ', 'district_id' => 1],
            ['id' => 54, 'code' => '6', 'title' => 'CASTELO DE PAIVA              ', 'district_id' => 1],
            ['id' => 60, 'code' => '7', 'title' => 'ESPINHO                       ', 'district_id' => 1],
            ['id' => 64, 'code' => '8', 'title' => 'ESTARREJA                     ', 'district_id' => 1],
            ['id' => 69, 'code' => '9', 'title' => 'SANTA MARIA DA FEIRA          ', 'district_id' => 1],
            ['id' => 90, 'code' => '10', 'title' => 'ILHAVO                        ', 'district_id' => 1],
        ]);
        DB::table('municipalities')->insert([
            ['id' => 94, 'code' => '11', 'title' => 'MEALHADA                      ', 'district_id' => 1],
            ['id' => 100, 'code' => '12', 'title' => 'MURTOSA                       ', 'district_id' => 1],
            ['id' => 104, 'code' => '13', 'title' => 'OLIVEIRA DE AZEMEIS           ', 'district_id' => 1],
            ['id' => 116, 'code' => '14', 'title' => 'OLIVEIRA DO BAIRRO            ', 'district_id' => 1],
            ['id' => 120, 'code' => '15', 'title' => 'OVAR                          ', 'district_id' => 1],
            ['id' => 125, 'code' => '16', 'title' => 'S. JOÃO DA MADEIRA            ', 'district_id' => 1],
            ['id' => 126, 'code' => '17', 'title' => 'SEVER DO VOUGA                ', 'district_id' => 1],
            ['id' => 133, 'code' => '18', 'title' => 'VAGOS                         ', 'district_id' => 1],
            ['id' => 141, 'code' => '19', 'title' => 'VALE DE CAMBRA                ', 'district_id' => 1],
            ['id' => 148, 'code' => '1', 'title' => 'ALJUSTREL                     ', 'district_id' => 148],
        ]);
        DB::table('municipalities')->insert([
            ['id' => 152, 'code' => '2', 'title' => 'ALMODOVAR                     ', 'district_id' => 148],
            ['id' => 158, 'code' => '3', 'title' => 'ALVITO                        ', 'district_id' => 148],
            ['id' => 160, 'code' => '4', 'title' => 'BARRANCOS                     ', 'district_id' => 148],
            ['id' => 161, 'code' => '5', 'title' => 'BEJA                          ', 'district_id' => 148],
            ['id' => 173, 'code' => '6', 'title' => 'CASTRO VERDE                  ', 'district_id' => 148],
            ['id' => 177, 'code' => '7', 'title' => 'CUBA                          ', 'district_id' => 148],
            ['id' => 181, 'code' => '8', 'title' => 'FERREIRA DO ALENTEJO          ', 'district_id' => 148],
            ['id' => 185, 'code' => '9', 'title' => 'MERTOLA                       ', 'district_id' => 148],
            ['id' => 192, 'code' => '10', 'title' => 'MOURA                         ', 'district_id' => 148],
            ['id' => 197, 'code' => '11', 'title' => 'ODEMIRA                       ', 'district_id' => 148],
        ]);
        
        DB::table('municipalities')->insert([
            ['id' => 210, 'code' => '12', 'title' => 'OURIQUE                       ', 'district_id' => 148],
            ['id' => 214, 'code' => '13', 'title' => 'SERPA                         ', 'district_id' => 148],
            ['id' => 219, 'code' => '14', 'title' => 'VIDIGUEIRA                    ', 'district_id' => 148],
            ['id' => 223, 'code' => '1', 'title' => 'AMARES                        ', 'district_id' => 223],
            ['id' => 239, 'code' => '2', 'title' => 'BARCELOS                      ', 'district_id' => 223],
            ['id' => 300, 'code' => '3', 'title' => 'BRAGA                         ', 'district_id' => 223],
            ['id' => 337, 'code' => '4', 'title' => 'CABECEIRAS DE BASTO           ', 'district_id' => 223],
            ['id' => 349, 'code' => '5', 'title' => 'CELORICO DE BASTO             ', 'district_id' => 223],
            ['id' => 364, 'code' => '6', 'title' => 'ESPOSENDE                     ', 'district_id' => 223],
            ['id' => 373, 'code' => '7', 'title' => 'FAFE                          ', 'district_id' => 223],
        ]);
        DB::table('municipalities')->insert([
            ['id' => 398, 'code' => '8', 'title' => 'GUIMARÃES                     ', 'district_id' => 223],
            ['id' => 446, 'code' => '9', 'title' => 'POVOA DE LANHOSO              ', 'district_id' => 223],
            ['id' => 468, 'code' => '10', 'title' => 'TERRAS DE BOURO               ', 'district_id' => 223],
            ['id' => 482, 'code' => '11', 'title' => 'VIEIRA DO MINHO               ', 'district_id' => 223],
            ['id' => 498, 'code' => '12', 'title' => 'VILA NOVA DE FAMALICÃO        ', 'district_id' => 223],
            ['id' => 532, 'code' => '13', 'title' => 'VILA VERDE                    ', 'district_id' => 223],
            ['id' => 565, 'code' => '14', 'title' => 'VIZELA                        ', 'district_id' => 223],
            ['id' => 570, 'code' => '1', 'title' => 'ALFANDEGA DA FE               ', 'district_id' => 570],
            ['id' => 582, 'code' => '2', 'title' => 'BRAGANÇA                      ', 'district_id' => 570],
            ['id' => 621, 'code' => '3', 'title' => 'CARRAZEDA DE ANSIÃES          ', 'district_id' => 570],
        ]);
        DB::table('municipalities')->insert([
            ['id' => 635, 'code' => '4', 'title' => 'FREIXO DE ESPADA A CINTA      ', 'district_id' => 570],
            ['id' => 639, 'code' => '5', 'title' => 'MACEDO DE CAVALEIROS          ', 'district_id' => 570],
            ['id' => 669, 'code' => '6', 'title' => 'MIRANDA DO DOURO              ', 'district_id' => 570],
            ['id' => 682, 'code' => '7', 'title' => 'MIRANDELA                     ', 'district_id' => 570],
            ['id' => 712, 'code' => '8', 'title' => 'MOGADOURO                     ', 'district_id' => 570],
            ['id' => 733, 'code' => '9', 'title' => 'TORRE DE MONCORVO             ', 'district_id' => 570],
            ['id' => 746, 'code' => '10', 'title' => 'VILA FLOR                     ', 'district_id' => 570],
            ['id' => 760, 'code' => '11', 'title' => 'VIMIOSO                       ', 'district_id' => 570],
            ['id' => 770, 'code' => '12', 'title' => 'VINHAIS                       ', 'district_id' => 570],
            ['id' => 796, 'code' => '1', 'title' => 'BELMONTE                      ', 'district_id' => 796],
        ]);
        DB::table('municipalities')->insert([
            ['id' => 800, 'code' => '2', 'title' => 'CASTELO BRANCO                ', 'district_id' => 796],
            ['id' => 819, 'code' => '3', 'title' => 'COVILHÃ                       ', 'district_id' => 796],
            ['id' => 840, 'code' => '4', 'title' => 'FUNDÃO                        ', 'district_id' => 796],
            ['id' => 863, 'code' => '5', 'title' => 'IDANHA-A-NOVA                 ', 'district_id' => 796],
            ['id' => 876, 'code' => '6', 'title' => 'OLEIROS                       ', 'district_id' => 796],
            ['id' => 886, 'code' => '7', 'title' => 'PENAMACOR                     ', 'district_id' => 796],
            ['id' => 895, 'code' => '8', 'title' => 'PROENÇA-A-NOVA                ', 'district_id' => 796],
            ['id' => 899, 'code' => '9', 'title' => 'SERTÃ                         ', 'district_id' => 796],
            ['id' => 909, 'code' => '10', 'title' => 'VILA DE REI                   ', 'district_id' => 796],
            ['id' => 912, 'code' => '11', 'title' => 'VILA VELHA DE RODÃO           ', 'district_id' => 796],
        ]);
        DB::table('municipalities')->insert([
            ['id' => 916, 'code' => '1', 'title' => 'ARGANIL                       ', 'district_id' => 916],
            ['id' => 930, 'code' => '2', 'title' => 'CANTANHEDE                    ', 'district_id' => 916],
            ['id' => 944, 'code' => '3', 'title' => 'COIMBRA                       ', 'district_id' => 916],
            ['id' => 962, 'code' => '4', 'title' => 'CONDEIXA-A-NOVA               ', 'district_id' => 916],
            ['id' => 969, 'code' => '5', 'title' => 'FIGUEIRA DA FOZ               ', 'district_id' => 916],
            ['id' => 983, 'code' => '6', 'title' => 'GOIS                          ', 'district_id' => 916],
            ['id' => 987, 'code' => '7', 'title' => 'LOUSÃ                         ', 'district_id' => 916],
            ['id' => 991, 'code' => '8', 'title' => 'MIRA                          ', 'district_id' => 916],
            ['id' => 995, 'code' => '9', 'title' => 'MIRANDA DO CORVO              ', 'district_id' => 916],
            ['id' => 999, 'code' => '10', 'title' => 'MONTEMOR-O-VELHO              ', 'district_id' => 916],
        ]);
        DB::table('municipalities')->insert([
            ['id' => 1084, 'code' => '4', 'title' => 'ESTREMOZ                      ', 'district_id' => 1071],
            ['id' => 1093, 'code' => '5', 'title' => 'EVORA                         ', 'district_id' => 1071],
            ['id' => 1105, 'code' => '6', 'title' => 'MONTEMOR-O-NOVO               ', 'district_id' => 1071],
            ['id' => 1112, 'code' => '7', 'title' => 'MORA                          ', 'district_id' => 1071],
            ['id' => 1116, 'code' => '8', 'title' => 'MOURÃO                        ', 'district_id' => 1071],
            ['id' => 1119, 'code' => '9', 'title' => 'PORTEL                        ', 'district_id' => 1071],
            ['id' => 1125, 'code' => '10', 'title' => 'REDONDO                       ', 'district_id' => 1071],
            ['id' => 1127, 'code' => '11', 'title' => 'REGUENGOS DE MONSARAZ         ', 'district_id' => 1071],
            ['id' => 1131, 'code' => '12', 'title' => 'VENDAS NOVAS                  ', 'district_id' => 1071],
            ['id' => 1133, 'code' => '13', 'title' => 'VIANA DO ALENTEJO             ', 'district_id' => 1071],
        ]);
        DB::table('municipalities')->insert([
            ['id' => 1136, 'code' => '14', 'title' => 'VILA VIÇOSA                   ', 'district_id' => 1071],
            ['id' => 1140, 'code' => '1', 'title' => 'ALBUFEIRA                     ', 'district_id' => 1140],
            ['id' => 1144, 'code' => '2', 'title' => 'ALCOUTIM                      ', 'district_id' => 1140],
            ['id' => 1148, 'code' => '3', 'title' => 'ALJEZUR                       ', 'district_id' => 1140],
            ['id' => 1152, 'code' => '4', 'title' => 'CASTRO MARIM                  ', 'district_id' => 1140],
            ['id' => 1156, 'code' => '5', 'title' => 'FARO                          ', 'district_id' => 1140],
            ['id' => 1160, 'code' => '6', 'title' => 'LAGOA (ALGARVE)               ', 'district_id' => 1140],
            ['id' => 1164, 'code' => '7', 'title' => 'LAGOS                         ', 'district_id' => 1140],
            ['id' => 1168, 'code' => '8', 'title' => 'LOULE                         ', 'district_id' => 1140],
            ['id' => 1177, 'code' => '9', 'title' => 'MONCHIQUE                     ', 'district_id' => 1140],
        ]);
        DB::table('municipalities')->insert([
            ['id' => 1180, 'code' => '10', 'title' => 'OLHÃO                         ', 'district_id' => 1140],
            ['id' => 1184, 'code' => '11', 'title' => 'PORTIMÃO                      ', 'district_id' => 1140],
            ['id' => 1187, 'code' => '12', 'title' => 'S. BRAS DE ALPORTEL           ', 'district_id' => 1140],
            ['id' => 1188, 'code' => '13', 'title' => 'SILVES                        ', 'district_id' => 1140],
            ['id' => 1194, 'code' => '14', 'title' => 'TAVIRA                        ', 'district_id' => 1140],
            ['id' => 1200, 'code' => '15', 'title' => 'VILA DO BISPO                 ', 'district_id' => 1140],
            ['id' => 1204, 'code' => '16', 'title' => 'VILA REAL DE SANTO ANTONIO    ', 'district_id' => 1140],
            ['id' => 1207, 'code' => '1', 'title' => 'AGUIAR DA BEIRA               ', 'district_id' => 1207],
            ['id' => 1217, 'code' => '2', 'title' => 'ALMEIDA                       ', 'district_id' => 1207],
            ['id' => 1233, 'code' => '3', 'title' => 'CELORICO DA BEIRA             ', 'district_id' => 1207],
        ]);
        DB::table('municipalities')->insert([
            ['id' => 1249, 'code' => '4', 'title' => 'FIGUEIRA DE CASTELO RODRIGO   ', 'district_id' => 1207],
            ['id' => 1259, 'code' => '5', 'title' => 'FORNOS DE ALGODRES            ', 'district_id' => 1207],
            ['id' => 1271, 'code' => '6', 'title' => 'GOUVEIA                       ', 'district_id' => 1207],
            ['id' => 1287, 'code' => '7', 'title' => 'GUARDA                        ', 'district_id' => 1207],
            ['id' => 1330, 'code' => '8', 'title' => 'MANTEIGAS                     ', 'district_id' => 1207],
            ['id' => 1334, 'code' => '9', 'title' => 'MEDA                          ', 'district_id' => 1207],
            ['id' => 1345, 'code' => '10', 'title' => 'PINHEL                        ', 'district_id' => 1207],
            ['id' => 1363, 'code' => '11', 'title' => 'SABUGAL                       ', 'district_id' => 1207],
            ['id' => 1393, 'code' => '12', 'title' => 'SEIA                          ', 'district_id' => 1207],
            ['id' => 1414, 'code' => '13', 'title' => 'TRANCOSO                      ', 'district_id' => 1207],
        ]);
        DB::table('municipalities')->insert([
            ['id' => 1435, 'code' => '14', 'title' => 'VILA NOVA DE FOZ COA          ', 'district_id' => 1207],
            ['id' => 1449, 'code' => '1', 'title' => 'ALCOBAÇA                      ', 'district_id' => 1449],
            ['id' => 1462, 'code' => '2', 'title' => 'ALVAIAZERE                    ', 'district_id' => 1449],
            ['id' => 1467, 'code' => '3', 'title' => 'ANSIÃO                        ', 'district_id' => 1449],
            ['id' => 1473, 'code' => '4', 'title' => 'BATALHA                       ', 'district_id' => 1449],
            ['id' => 1477, 'code' => '5', 'title' => 'BOMBARRAL                     ', 'district_id' => 1449],
            ['id' => 1481, 'code' => '6', 'title' => 'CALDAS DA RAINHA              ', 'district_id' => 1449],
            ['id' => 1493, 'code' => '7', 'title' => 'CASTANHEIRA DE PERA           ', 'district_id' => 1449],
            ['id' => 1494, 'code' => '8', 'title' => 'FIGUEIRO DOS VINHOS           ', 'district_id' => 1449],
            ['id' => 1498, 'code' => '9', 'title' => 'LEIRIA                        ', 'district_id' => 1449],
        ]);
        DB::table('municipalities')->insert([
            ['id' => 1516, 'code' => '10', 'title' => 'MARINHA GRANDE                ', 'district_id' => 1449],
            ['id' => 1519, 'code' => '11', 'title' => 'NAZARE                        ', 'district_id' => 1449],
            ['id' => 1522, 'code' => '12', 'title' => 'OBIDOS                        ', 'district_id' => 1449],
            ['id' => 1529, 'code' => '13', 'title' => 'PEDROGÃO GRANDE               ', 'district_id' => 1449],
            ['id' => 1532, 'code' => '14', 'title' => 'PENICHE                       ', 'district_id' => 1449],
            ['id' => 1536, 'code' => '15', 'title' => 'POMBAL                        ', 'district_id' => 1449],
            ['id' => 1549, 'code' => '16', 'title' => 'PORTO DE MOS                  ', 'district_id' => 1449],
            ['id' => 1559, 'code' => '1', 'title' => 'ALENQUER                      ', 'district_id' => 1559],
            ['id' => 1570, 'code' => '2', 'title' => 'ARRUDA DOS VINHOS             ', 'district_id' => 1559],
            ['id' => 1574, 'code' => '3', 'title' => 'AZAMBUJA                      ', 'district_id' => 1559],
        ]);
        DB::table('municipalities')->insert([
            ['id' => 1581, 'code' => '4', 'title' => 'CADAVAL                       ', 'district_id' => 1559],
            ['id' => 1588, 'code' => '5', 'title' => 'CASCAIS                       ', 'district_id' => 1559],
            ['id' => 1592, 'code' => '6', 'title' => 'LISBOA                        ', 'district_id' => 1559],
            ['id' => 1616, 'code' => '7', 'title' => 'LOURES                        ', 'district_id' => 1559],
            ['id' => 1626, 'code' => '8', 'title' => 'LOURINHÃ                      ', 'district_id' => 1559],
            ['id' => 1634, 'code' => '9', 'title' => 'MAFRA                         ', 'district_id' => 1559],
            ['id' => 1645, 'code' => '10', 'title' => 'OEIRAS                        ', 'district_id' => 1559],
            ['id' => 1650, 'code' => '11', 'title' => 'SINTRA                        ', 'district_id' => 1559],
            ['id' => 1661, 'code' => '12', 'title' => 'SOBRAL DE MONTE AGRAÇO        ', 'district_id' => 1559],
            ['id' => 1664, 'code' => '13', 'title' => 'TORRES VEDRAS                 ', 'district_id' => 1559],
        ]);
        DB::table('municipalities')->insert([
            ['id' => 1677, 'code' => '14', 'title' => 'VILA FRANCA DE XIRA           ', 'district_id' => 1559],
            ['id' => 1683, 'code' => '15', 'title' => 'AMADORA                       ', 'district_id' => 1559],
            ['id' => 1689, 'code' => '16', 'title' => 'ODIVELAS                      ', 'district_id' => 1559],
            ['id' => 1693, 'code' => '1', 'title' => 'ALTER DO CHÃO                 ', 'district_id' => 1693],
            ['id' => 1697, 'code' => '2', 'title' => 'ARRONCHES                     ', 'district_id' => 1693],
            ['id' => 1700, 'code' => '3', 'title' => 'AVIS                          ', 'district_id' => 1693],
            ['id' => 1706, 'code' => '4', 'title' => 'CAMPO MAIOR                   ', 'district_id' => 1693],
            ['id' => 1709, 'code' => '5', 'title' => 'CASTELO DE VIDE               ', 'district_id' => 1693],
            ['id' => 1713, 'code' => '6', 'title' => 'CRATO                         ', 'district_id' => 1693],
            ['id' => 1717, 'code' => '7', 'title' => 'ELVAS                         ', 'district_id' => 1693],
        ]);
        DB::table('municipalities')->insert([
            ['id' => 1724, 'code' => '8', 'title' => 'FRONTEIRA                     ', 'district_id' => 1693],
            ['id' => 1727, 'code' => '9', 'title' => 'GAVIÃO                        ', 'district_id' => 1693],
            ['id' => 1731, 'code' => '10', 'title' => 'MARVÃO                        ', 'district_id' => 1693],
            ['id' => 1735, 'code' => '11', 'title' => 'MONFORTE                      ', 'district_id' => 1693],
            ['id' => 1739, 'code' => '12', 'title' => 'NISA                          ', 'district_id' => 1693],
            ['id' => 1746, 'code' => '13', 'title' => 'PONTE DE SOR                  ', 'district_id' => 1693],
            ['id' => 1751, 'code' => '14', 'title' => 'PORTALEGRE                    ', 'district_id' => 1693],
            ['id' => 1758, 'code' => '15', 'title' => 'SOUSEL                        ', 'district_id' => 1693],
            ['id' => 1762, 'code' => '1', 'title' => 'AMARANTE                      ', 'district_id' => 1762],
            ['id' => 1788, 'code' => '2', 'title' => 'BAIÃO                         ', 'district_id' => 1762],
        ]);
        DB::table('municipalities')->insert([
            ['id' => 1802, 'code' => '3', 'title' => 'FELGUEIRAS                    ', 'district_id' => 1762],
            ['id' => 1822, 'code' => '4', 'title' => 'GONDOMAR                      ', 'district_id' => 1762],
            ['id' => 1829, 'code' => '5', 'title' => 'LOUSADA                       ', 'district_id' => 1762],
            ['id' => 1844, 'code' => '6', 'title' => 'MAIA                          ', 'district_id' => 1762],
            ['id' => 1854, 'code' => '7', 'title' => 'MARCO DE CANAVESES            ', 'district_id' => 1762],
            ['id' => 1870, 'code' => '8', 'title' => 'MATOSINHOS                    ', 'district_id' => 1762],
            ['id' => 1874, 'code' => '9', 'title' => 'PAÇOS DE FERREIRA             ', 'district_id' => 1762],
            ['id' => 1886, 'code' => '10', 'title' => 'PAREDES                       ', 'district_id' => 1762],
            ['id' => 1904, 'code' => '11', 'title' => 'PENAFIEL                      ', 'district_id' => 1762],
            ['id' => 1932, 'code' => '12', 'title' => 'PORTO                         ', 'district_id' => 1762],
        ]);
        DB::table('municipalities')->insert([
            ['id' => 1939, 'code' => '13', 'title' => 'POVOA DE VARZIM               ', 'district_id' => 1762],
            ['id' => 1946, 'code' => '14', 'title' => 'SANTO TIRSO                   ', 'district_id' => 1762],
            ['id' => 1960, 'code' => '15', 'title' => 'VALONGO                       ', 'district_id' => 1762],
            ['id' => 1964, 'code' => '16', 'title' => 'VILA DO CONDE                 ', 'district_id' => 1762],
            ['id' => 1985, 'code' => '17', 'title' => 'VILA NOVA DE GAIA             ', 'district_id' => 1762],
            ['id' => 2000, 'code' => '18', 'title' => 'TROFA                         ', 'district_id' => 1762],
            ['id' => 2005, 'code' => '1', 'title' => 'ABRANTES                      ', 'district_id' => 2005],
            ['id' => 2018, 'code' => '2', 'title' => 'ALCANENA                      ', 'district_id' => 2005],
            ['id' => 2025, 'code' => '3', 'title' => 'ALMEIRIM                      ', 'district_id' => 2005],
            ['id' => 2029, 'code' => '4', 'title' => 'ALPIARÇA                      ', 'district_id' => 2005],
        ]);
        DB::table('municipalities')->insert([
            ['id' => 2030, 'code' => '5', 'title' => 'BENAVENTE                     ', 'district_id' => 2005],
            ['id' => 2034, 'code' => '6', 'title' => 'CARTAXO                       ', 'district_id' => 2005],
            ['id' => 2040, 'code' => '7', 'title' => 'CHAMUSCA                      ', 'district_id' => 2005],
            ['id' => 2045, 'code' => '8', 'title' => 'CONSTANCIA                    ', 'district_id' => 2005],
            ['id' => 2048, 'code' => '9', 'title' => 'CORUCHE                       ', 'district_id' => 2005],
            ['id' => 2054, 'code' => '10', 'title' => 'ENTRONCAMENTO                 ', 'district_id' => 2005],
            ['id' => 2056, 'code' => '11', 'title' => 'FERREIRA DO ZEZERE            ', 'district_id' => 2005],
            ['id' => 2063, 'code' => '12', 'title' => 'GOLEGÃ                        ', 'district_id' => 2005],
            ['id' => 2066, 'code' => '13', 'title' => 'MAÇÃO                         ', 'district_id' => 2005],
            ['id' => 2072, 'code' => '14', 'title' => 'RIO MAIOR                     ', 'district_id' => 2005],
        ]);
        DB::table('municipalities')->insert([
            ['id' => 2082, 'code' => '15', 'title' => 'SALVATERRA DE MAGOS           ', 'district_id' => 2005],
            ['id' => 2086, 'code' => '16', 'title' => 'SANTAREM                      ', 'district_id' => 2005],
            ['id' => 2104, 'code' => '17', 'title' => 'SARDOAL                       ', 'district_id' => 2005],
            ['id' => 2108, 'code' => '18', 'title' => 'TOMAR                         ', 'district_id' => 2005],
            ['id' => 2119, 'code' => '19', 'title' => 'TORRES NOVAS                  ', 'district_id' => 2005],
            ['id' => 2129, 'code' => '20', 'title' => 'VILA NOVA DA BARQUINHA        ', 'district_id' => 2005],
            ['id' => 2133, 'code' => '21', 'title' => 'OUREM                         ', 'district_id' => 2005],
            ['id' => 2146, 'code' => '1', 'title' => 'ALCACER DO SAL                ', 'district_id' => 2146],
            ['id' => 2150, 'code' => '2', 'title' => 'ALCOCHETE                     ', 'district_id' => 2146],
            ['id' => 2153, 'code' => '3', 'title' => 'ALMADA                        ', 'district_id' => 2146],
        ]);
        DB::table('municipalities')->insert([
            ['id' => 2158, 'code' => '4', 'title' => 'BARREIRO                      ', 'district_id' => 2146],
            ['id' => 2162, 'code' => '5', 'title' => 'GRANDOLA                      ', 'district_id' => 2146],
            ['id' => 2166, 'code' => '6', 'title' => 'MOITA                         ', 'district_id' => 2146],
            ['id' => 2170, 'code' => '7', 'title' => 'MONTIJO                       ', 'district_id' => 2146],
            ['id' => 2175, 'code' => '8', 'title' => 'PALMELA                       ', 'district_id' => 2146],
            ['id' => 2179, 'code' => '9', 'title' => 'SANTIAGO DO CACEM             ', 'district_id' => 2146],
            ['id' => 2187, 'code' => '10', 'title' => 'SEIXAL                        ', 'district_id' => 2146],
            ['id' => 2191, 'code' => '11', 'title' => 'SESIMBRA                      ', 'district_id' => 2146],
            ['id' => 2194, 'code' => '12', 'title' => 'SETUBAL                       ', 'district_id' => 2146],
            ['id' => 2199, 'code' => '13', 'title' => 'SINES                         ', 'district_id' => 2146],
        ]);
        DB::table('municipalities')->insert([
            ['id' => 2201, 'code' => '1', 'title' => 'ARCOS DE VALDEVEZ             ', 'district_id' => 2201],
            ['id' => 2237, 'code' => '2', 'title' => 'CAMINHA                       ', 'district_id' => 2201],
            ['id' => 2251, 'code' => '3', 'title' => 'MELGAÇO                       ', 'district_id' => 2201],
            ['id' => 2264, 'code' => '4', 'title' => 'MONÇÃO                        ', 'district_id' => 2201],
            ['id' => 2288, 'code' => '5', 'title' => 'PAREDES DE COURA              ', 'district_id' => 2201],
            ['id' => 2304, 'code' => '6', 'title' => 'PONTE DA BARCA                ', 'district_id' => 2201],
            ['id' => 2321, 'code' => '7', 'title' => 'PONTE DE LIMA                 ', 'district_id' => 2201],
            ['id' => 2360, 'code' => '8', 'title' => 'VALENÇA                       ', 'district_id' => 2201],
            ['id' => 2371, 'code' => '9', 'title' => 'VIANA DO CASTELO              ', 'district_id' => 2201],
            ['id' => 2398, 'code' => '10', 'title' => 'VILA NOVA DE CERVEIRA         ', 'district_id' => 2201],
        ]);
        DB::table('municipalities')->insert([
            ['id' => 2409, 'code' => '1', 'title' => 'ALIJO                         ', 'district_id' => 2409],
            ['id' => 2423, 'code' => '2', 'title' => 'BOTICAS                       ', 'district_id' => 2409],
            ['id' => 2433, 'code' => '3', 'title' => 'CHAVES                        ', 'district_id' => 2409],
            ['id' => 2472, 'code' => '4', 'title' => 'MESÃO FRIO                    ', 'district_id' => 2409],
            ['id' => 2477, 'code' => '5', 'title' => 'MONDIM DE BASTO               ', 'district_id' => 2409],
            ['id' => 2483, 'code' => '6', 'title' => 'MONTALEGRE                    ', 'district_id' => 2409],
            ['id' => 2508, 'code' => '7', 'title' => 'MURÇA                         ', 'district_id' => 2409],
            ['id' => 2515, 'code' => '8', 'title' => 'PESO DA REGUA                 ', 'district_id' => 2409],
            ['id' => 2523, 'code' => '9', 'title' => 'RIBEIRA DE PENA               ', 'district_id' => 2409],
            ['id' => 2528, 'code' => '10', 'title' => 'SABROSA                       ', 'district_id' => 2409],
        ]);
        DB::table('municipalities')->insert([
            ['id' => 2540, 'code' => '11', 'title' => 'SANTA MARTA DE PENAGUIÃO      ', 'district_id' => 2409],
            ['id' => 2547, 'code' => '12', 'title' => 'VALPAÇOS                      ', 'district_id' => 2409],
            ['id' => 2572, 'code' => '13', 'title' => 'VILA POUCA DE AGUIAR          ', 'district_id' => 2409],
            ['id' => 2586, 'code' => '14', 'title' => 'VILA REAL                     ', 'district_id' => 2409],
            ['id' => 2606, 'code' => '1', 'title' => 'ARMAMAR                       ', 'district_id' => 2606],
            ['id' => 2620, 'code' => '2', 'title' => 'CARREGAL DO SAL               ', 'district_id' => 2606],
            ['id' => 2625, 'code' => '3', 'title' => 'CASTRO DAIRE                  ', 'district_id' => 2606],
            ['id' => 2641, 'code' => '4', 'title' => 'CINFÃES                       ', 'district_id' => 2606],
            ['id' => 2655, 'code' => '5', 'title' => 'LAMEGO                        ', 'district_id' => 2606],
            ['id' => 2673, 'code' => '6', 'title' => 'MANGUALDE                     ', 'district_id' => 2606],
        ]);
        DB::table('municipalities')->insert([
            ['id' => 2685, 'code' => '7', 'title' => 'MOIMENTA DA BEIRA             ', 'district_id' => 2606],
            ['id' => 2701, 'code' => '8', 'title' => 'MORTAGUA                      ', 'district_id' => 2606],
            ['id' => 2708, 'code' => '9', 'title' => 'NELAS                         ', 'district_id' => 2606],
            ['id' => 2715, 'code' => '10', 'title' => 'OLIVEIRA DE FRADES            ', 'district_id' => 2606],
            ['id' => 2723, 'code' => '11', 'title' => 'PENALVA DO CASTELO            ', 'district_id' => 2606],
            ['id' => 2734, 'code' => '12', 'title' => 'PENEDONO                      ', 'district_id' => 2606],
            ['id' => 2741, 'code' => '13', 'title' => 'RESENDE                       ', 'district_id' => 2606],
            ['id' => 2752, 'code' => '14', 'title' => 'SANTA COMBA DÃO               ', 'district_id' => 2606],
            ['id' => 2758, 'code' => '15', 'title' => 'S. JOÃO DA PESQUEIRA          ', 'district_id' => 2606],
            ['id' => 2769, 'code' => '16', 'title' => 'S. PEDRO DO SUL               ', 'district_id' => 2606],
        ]);
        DB::table('municipalities')->insert([
            ['id' => 2783, 'code' => '17', 'title' => 'SATÃO                         ', 'district_id' => 2606],
            ['id' => 2792, 'code' => '18', 'title' => 'SERNANCELHE                   ', 'district_id' => 2606],
            ['id' => 2805, 'code' => '19', 'title' => 'TABUAÇO                       ', 'district_id' => 2606],
            ['id' => 2818, 'code' => '20', 'title' => 'TAROUCA                       ', 'district_id' => 2606],
            ['id' => 2825, 'code' => '21', 'title' => 'TONDELA                       ', 'district_id' => 2606],
            ['id' => 2844, 'code' => '22', 'title' => 'VILA NOVA DE PAIVA            ', 'district_id' => 2606],
            ['id' => 2849, 'code' => '23', 'title' => 'VISEU                         ', 'district_id' => 2606],
            ['id' => 2874, 'code' => '24', 'title' => 'VOUZELA                       ', 'district_id' => 2606],
            ['id' => 2883, 'code' => '1', 'title' => 'ANGRA DO HEROISMO             ', 'district_id' => 2883],
            ['id' => 2902, 'code' => '2', 'title' => 'CALHETA (AÇORES)              ', 'district_id' => 2883],
        ]);
        DB::table('municipalities')->insert([
            ['id' => 2907, 'code' => '3', 'title' => 'SANTA CRUZ DA GRACIOSA        ', 'district_id' => 2883],
            ['id' => 2911, 'code' => '4', 'title' => 'VELAS                         ', 'district_id' => 2883],
            ['id' => 2917, 'code' => '5', 'title' => 'VILA PRAIA DA VITORIA         ', 'district_id' => 2883],
            ['id' => 2928, 'code' => '1', 'title' => 'CORVO                         ', 'district_id' => 2928],
            ['id' => 2929, 'code' => '2', 'title' => 'HORTA                         ', 'district_id' => 2928],
            ['id' => 2942, 'code' => '3', 'title' => 'LAJES DAS FLORES              ', 'district_id' => 2928],
            ['id' => 2949, 'code' => '4', 'title' => 'LAJES DO PICO                 ', 'district_id' => 2928],
            ['id' => 2955, 'code' => '5', 'title' => 'MADALENA                      ', 'district_id' => 2928],
            ['id' => 2961, 'code' => '6', 'title' => 'SANTA CRUZ DAS FLORES         ', 'district_id' => 2928],
            ['id' => 2965, 'code' => '7', 'title' => 'S. ROQUE DO PICO              ', 'district_id' => 2928],
        ]);
        DB::table('municipalities')->insert([
            ['id' => 2970, 'code' => '1', 'title' => 'LAGOA (AÇORES)                ', 'district_id' => 2970],
            ['id' => 2975, 'code' => '2', 'title' => 'NORDESTE                      ', 'district_id' => 2970],
            ['id' => 2984, 'code' => '3', 'title' => 'PONTA DELGADA                 ', 'district_id' => 2970],
            ['id' => 3008, 'code' => '4', 'title' => 'POVOAÇÃO                      ', 'district_id' => 2970],
            ['id' => 3014, 'code' => '5', 'title' => 'RIBEIRA GRANDE                ', 'district_id' => 2970],
            ['id' => 3028, 'code' => '6', 'title' => 'VILA FRANCA DO CAMPO          ', 'district_id' => 2970],
            ['id' => 3034, 'code' => '7', 'title' => 'VILA DO PORTO                 ', 'district_id' => 2970],
            ['id' => 3039, 'code' => '1', 'title' => 'CALHETA (MADEIRA)             ', 'district_id' => 3039],
            ['id' => 3047, 'code' => '2', 'title' => 'CAMARA DE LOBOS               ', 'district_id' => 3039],
            ['id' => 3052, 'code' => '3', 'title' => 'FUNCHAL                       ', 'district_id' => 3039],
        ]);
        DB::table('municipalities')->insert([
            ['id' => 3062, 'code' => '4', 'title' => 'MACHICO                       ', 'district_id' => 3039],
            ['id' => 3067, 'code' => '5', 'title' => 'PONTA DO SOL                  ', 'district_id' => 3039],
            ['id' => 3070, 'code' => '6', 'title' => 'PORTO MONIZ                   ', 'district_id' => 3039],
            ['id' => 3074, 'code' => '7', 'title' => 'PORTO SANTO                   ', 'district_id' => 3039],
            ['id' => 3075, 'code' => '8', 'title' => 'RIBEIRA BRAVA                 ', 'district_id' => 3039],
            ['id' => 3079, 'code' => '9', 'title' => 'SANTA CRUZ                    ', 'district_id' => 3039],
            ['id' => 3084, 'code' => '10', 'title' => 'SANTANA                       ', 'district_id' => 3039],
            ['id' => 3090, 'code' => '11', 'title' => 'S. VICENTE                    ', 'district_id' => 3039],
        ]);
        
        
        
    }
}
