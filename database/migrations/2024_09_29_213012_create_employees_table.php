<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  public string $table = 'employees';

  /**
   * Run the migrations.
   */
  public function up(): void
  {
    Schema::create($this->table, function (Blueprint $table) {
      $table->uuid('id')->nullable()->index();
      $table->uuid('enterprise_id')->nullable()->index();
      $table->foreign('enterprise_id')->references('id')->on('enterprises');
      $table->uuid('branch_id')->nullable()->index();
      $table->foreign('branch_id')->references('id')->on('branches');
      $table->uuid('user_id')->index();
      $table->foreign('user_id')->references('id')->on('users');
      $table->boolean('is_active')->default(true)->comment('Indica se o funcionário está ativo');
      $table->date('admission_date')->nullable()->comment('Data de admissão');
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists($this->table);
  }
};
