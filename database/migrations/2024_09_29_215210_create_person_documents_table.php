<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  public string $table = 'person_documents';
  /**
   * Run the migrations.
   */
  public function up(): void
  {
    Schema::create($this->table, function (Blueprint $table) {
      $table->uuid('id')->nullable()->index();
      $table->uuid('person_id')->nullable()->index();
      $table->foreign('person_id')->references('id')->on('people')->onDelete('cascade');
      $table->id('document_type_id')->nullable();
      $table->foreign('document_type_id')->references('id')->on('document_types')->onDelete('cascade');
      $table->string('doc_id')->nullable();
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
