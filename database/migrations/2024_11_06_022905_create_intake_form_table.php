<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('intake_forms', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('session_id');

            $table->date('signup_date')->nullable();
            $table->string('email')->nullable();
            $table->string('alternate_contact_name')->nullable();
            $table->string('alternate_contact_phone')->nullable();
            $table->string('emergency_contact_name')->nullable();
            $table->string('emergency_contact_relationship')->nullable();
            $table->string('alternate_contact_phone')->nullable();


            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('address_street_line_1')->nullable();
            $table->string('address_street_line_2')->nullable();
            $table->string('address_city')->nullable();
            $table->string('address_state')->nullable();
            $table->string('address_zipcode')->nullable();

            $table->string('employer')->nullable();
            $table->string('employer_phone')->nullable();

            $table->string('t_shirt_size')->nullable();
            $table->string('home_phone')->nullable();
            $table->string('cell_phone')->nullable();
            $table->string('work_phone')->nullable();
            $table->jsonb('other_work_phone')->nullable();

            $table->string('probation_parole_case_worker')->nullable();
            $table->string('probation_parole_case_worker_phone')->nullable();

            $table->jsonb('children')->nullable();

            $table->boolean('child_contact')->nullable()->default(null);
            $table->boolean('child_custody')->nullable()->default(null);
            $table->boolean('child_visitation')->nullable()->default(null);
            $table->boolean('child_phone_contact')->nullable()->default(null);
            $table->string('marital_status')->nullable();
            $table->string('ethnicity')->nullable();

            $table->timestamps();
        });

        Schema::create('intake_forms_children', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('intake_form_id')->references('id')->on('intake_forms');
            $table->string('name');
            $table->string('age');
            $table->date('date_of_birth');
            $table->integer('display_order')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('intake_forms');
        Schema::dropIfExists('intake_forms_children');
    }
};
