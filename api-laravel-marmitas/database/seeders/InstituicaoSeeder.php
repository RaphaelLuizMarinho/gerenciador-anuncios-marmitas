<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Instituicao;

class InstituicaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = \Faker\Factory::create('pt_BR');
        for ($i=0; $i <2 ; $i++) {
            Instituicao::Create([
                'cnpj' => $faker->cnpj,
                'nome' => $faker->company,
                'telefone' => $faker->cellphone,
                'cep' => $faker->postcode,
                'logradouro' => $faker->streetName,
                'complemento' => $faker->secondaryAddress,
                'bairro' => $faker->citySuffix,
                'cidade' => $faker->city,
                'uf' => $faker->stateAbbr,
                'crn_responsavel' => $faker->ean13,
                'status_recebimento' => 'Ativo',

            ]);
        }
    }
}
