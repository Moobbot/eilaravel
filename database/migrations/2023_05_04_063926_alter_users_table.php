<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('users', function (Blueprint $table) {
            $table->foreignId('departments_id')->constrained('departments'); //<Tên bảng>_id
            $table->foreignId('status_id')->constrained('user_status'); //<Tên bảng>_id
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign('users_departments_id_foreign');
            $table->dropForeign('users_status_id_foreign');

            $table->dropColumn(['departments_id', 'status_id']);
        });
    }
};
