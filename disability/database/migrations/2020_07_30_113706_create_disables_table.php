<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDisablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('disables', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('nep_name')->charset('utf8')->collation('utf8_unicode_ci');
            $table->string('eng_name');
            $table->enum('state', ['प्रदेश १', 'प्रदेश २', 'बागमती प्रदेश', 'गण्डकी प्रदेश', 'प्रदेश ५', 'कर्नाली प्रदेश', 'सुदुरपस्चिम प्रदेश'])->charset('utf8')->collation('utf8_unicode_ci');
            $table->string('district')->charset('utf8')->collation('utf8_unicode_ci');
            $table->string('local_level')->charset('utf8')->collation('utf8_unicode_ci');
            $table->integer('ward_no');
            $table->string('dob_nepali');
            $table->date('dob_english');
            $table->enum('gender', ['male', 'female', 'other']);
            $table->integer('age');
            $table->enum('blood_group', ['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-']);
            $table->string('guardian_nep_name');
            $table->string('guardian_eng_name');
            $table->string('citizenship_no')->nullable();
            $table->string('citizenship_issued_district')->charset('utf8')->collation('utf8_unicode_ci')->nullable();
            $table->string('citizenship_issued_date_nepali')->nullable();
            $table->date('citizenship_issued_date_english')->nullable();
            $table->string('disability_category')->charset('utf8')->collation('utf8_unicode_ci');
            $table->string('disability_severity')->charset('utf8')->collation('utf8_unicode_ci');
            $table->string('image')->nullable();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('disables');
    }
}
