<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('jobs', function (Blueprint $table) {
            $table->string('experience')->nullable()->after('salary');
            $table->string('age_limit')->nullable()->after('experience');
            $table->text('responsibilities')->nullable()->after('age_limit');
            $table->text('other_qualifications')->nullable()->after('responsibilities');
            $table->string('expiry_date')->nullable()->after('other_qualifications');
            // $table->enum('salary_type', ['weekly', 'monthly'])->nullable()->after('other_qualifications');
        });
    }

    public function down()
    {
        Schema::table('jobs', function (Blueprint $table) {
            $table->dropColumn([
                'experience',
                'age_limit',
                'responsibilities',
                'other_qualifications',
                'expiry_date',

            ]);
        });
    }
};