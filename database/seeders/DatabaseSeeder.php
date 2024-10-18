<?php

namespace Database\Seeders;

use Database\Seeders\People\PersonDocumentTypeSeeder;
use Database\Seeders\People\PersonSeeder;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   */
  public function run(): void
  {
    $this->call([
      PersonSeeder::class,
      PersonDocumentTypeSeeder::class,
    ]);
  }
}
