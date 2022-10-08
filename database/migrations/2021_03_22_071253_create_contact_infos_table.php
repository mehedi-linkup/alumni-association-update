<?php

use App\ContactInfo;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact_infos', function (Blueprint $table) {
            $table->id();
            $table->string('school_email');
            $table->string('school_phone');
            $table->string('school_address');
            $table->string('secretary_email');
            $table->string('secretary_phone');
            $table->string('secretary_address');
            $table->string('committee_email');
            $table->string('committee_phone');
            $table->string('committee_address');
            $table->timestamp('program_start_date')->nullable();
            $table->string('info_status')->default('1');
            $table->timestamps();
        });
        $contact = new ContactInfo();
        $contact->school_email="aliazamschoolcollege@gmail.com";
        $contact->school_phone="01703238004";
        $contact->school_address="MunshirHat, Fulgazi, Bangladesh";
        $contact->secretary_email="info@aahcalumni.com";
        $contact->secretary_phone="01511541043";
        $contact->secretary_address="78, Naya palton, shanjari Towre(1st floor), Dhaka-100, Bangladesh.";
        $contact->committee_email="info@aahcalumni.com";
        $contact->committee_phone="01511541043";
        $contact->committee_address="78, Naya palton, shanjari Towre(1st floor), Dhaka-100, Bangladesh.";
        $contact->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contact_infos');
    }
}
