<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeniorCitizensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('senior_citizens', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('name')->charset('utf8')->collation('utf8_unicode_ci');
            $table->string('locality')->charset('utf8')->collation('utf8_unicode_ci');
            $table->enum('state', ['प्रदेश १', 'प्रदेश २', 'बागमती प्रदेश', 'गण्डकी प्रदेश', 'प्रदेश ५', 'कर्नाली प्रदेश', 'सुदुरपस्चिम प्रदेश'])->charset('utf8')->collation('utf8_unicode_ci');
            $table->string('district')->charset('utf8')->collation('utf8_unicode_ci');
            $table->string('local_level')->charset('utf8')->collation('utf8_unicode_ci');
            $table->integer('ward_no');
            $table->string('dob_nepali');
            $table->date('dob_english');
            $table->enum('gender', ['male', 'female', 'other']);
            $table->integer('age');
            $table->enum('blood_group', ['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-']);
            $table->string('citizenship_no');
            $table->string('citizenship_issued_district')->charset('utf8')->collation('utf8_unicode_ci');
            $table->string('citizenship_issued_date_nepali');
            $table->date('citizenship_issued_date_english');
            $table->string('spouse_name')->charset('utf8')->collation('utf8_unicode_ci')->nullable();
            $table->string('facilities')->charset('utf8')->collation('utf8_unicode_ci')->nullable();
            $table->string('contact_person_name')->charset('utf8')->collation('utf8_unicode_ci');
            $table->string('contact_person_address')->charset('utf8')->collation('utf8_unicode_ci');
            $table->string('certificate_no')->charset('utf8')->collation('utf8_unicode_ci')->nullable();
            $table->string('home_care_name')->charset('utf8')->collation('utf8_unicode_ci')->nullable();
            $table->string('disease')->charset('utf8')->collation('utf8_unicode_ci')->nullable();
            $table->string('medicine')->charset('utf8')->collation('utf8_unicode_ci')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('senior_citizens');
    }
}
