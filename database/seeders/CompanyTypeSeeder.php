<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CompanyTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('company_types')->insert([
            'companyType' => 'Institutional',
            'Information' => 'Local Organization, Educational Institution; Government Institution',
            'legal_documents' => 'Business License (SIUP), Tax certificate (NPWP), Financial Audited Statement;  TDP, Domicilie, Akta Pendirian, Akta Notaris, account bank statment',
            'created_at' => now(),
            'updated_at' => now(),
            'created_by' => 1,
            'updated_by' => 1,
        ]);
        DB::table('company_types')->insert([
            'companyType' => 'Koperasi',
            'Information' => 'A cooperative is a business entity that is owned and operated by its members to meet common needs in the economic, social, and cultural fields. Meanwhile, the more formal definition of cooperative is by Law no. 17 of 2012 article 1',
            'legal_documents' => 'Cooperation Business License (SIUP Koperasi), Tax certificate (NPWP), Financial Audited Statement;  TDP, Domicilie, Akta Pendirian, Akta Notaris, account bank statment',
            'created_at' => now(),
            'updated_at' => now(),
            'created_by' => 1,
            'updated_by' => 1,
        ]);
        DB::table('company_types')->insert([
            'companyType' => 'Personal',
            'Information' => 'Daily worker',
            'legal_documents' => 'ID Card',
            'created_at' => now(),
            'updated_at' => now(),
            'created_by' => 1,
            'updated_by' => 1,
        ]);
        DB::table('company_types')->insert([
            'companyType' => 'Private',
            'Information' => 'Translator and or Consultant',
            'legal_documents' => 'ID Card; Personal NPWP (Tax); Domicile letter from RT / RW (if the Office is at Home/Shophouse); Bank Account',
            'created_at' => now(),
            'updated_at' => now(),
            'created_by' => 1,
            'updated_by' => 1,
        ]);
        DB::table('company_types')->insert([
            'companyType' => 'PD (Perusahaan Dagang)',
            'Information' => 'A Trading Company whose activities are to buy, store, resell merchandise and do not add value to them. The added value of the event is like processing and changing the nature or form of the original goods in such a way that the goods have a high selling value',
            'legal_documents' => 'ID Card; Personal NPWP (Tax); Domicile letter from RT / RW (if the Office is at Home/Shophouse); Bank Account',
            'created_at' => now(),
            'updated_at' => now(),
            'created_by' => 1,
            'updated_by' => 1,
        ]);
        DB::table('company_types')->insert([
            'companyType' => 'Toko',
            'Information' => 'Personal own Shop',
            'legal_documents' => 'ID Card; Personal NPWP (Tax); Domicile letter from RT / RW (if the Office is at Home/Shophouse); Bank Account',
            'created_at' => now(),
            'updated_at' => now(),
            'created_by' => 1,
            'updated_by' => 1,
        ]);
        DB::table('company_types')->insert([
            'companyType' => 'UD (Usaha Dagang)',
            'Information' => 'UD is The business with the main activity is to buy goods and sell them back with the aim of making a profit without changing the condition of the goods being sold ',
            'legal_documents' => 'ID Card; Personal NPWP (Tax); Domicile letter from RT / RW (if the Office is at Home/Shophouse); Bank Account',
            'created_at' => now(),
            'updated_at' => now(),
            'created_by' => 1,
            'updated_by' => 1,
        ]);
        DB::table('company_types')->insert([
            'companyType' => 'CV',
            'Information' => 'CV is a civil alliance, there are two types of allies, passive allies, and active allies.',
            'legal_documents' => 'Business License (SIUP), Tax certificate (NPWP), Financial Audited Statement;  TDP, Domicilie, Akta Pendirian, Akta Notaris, account bank statment',
            'created_at' => now(),
            'updated_at' => now(),
            'created_by' => 1,
            'updated_by' => 1,
        ]);
        DB::table('company_types')->insert([
            'companyType' => 'PT (Perseroan Terbatas)',
            'Information' => 'PT is a type of business entity protected by law with a capital consisting of shares. In running a limited liability company, the share capital owned can be sold to other parties.',
            'legal_documents' => 'Business License (SIUP), Tax certificate (NPWP), Financial Audited Statement;  TDP, Domicilie, Akta Pendirian, Akta Notaris, account bank statment',
            'created_at' => now(),
            'updated_at' => now(),
            'created_by' => 1,
            'updated_by' => 1,
        ]);

    }
}
