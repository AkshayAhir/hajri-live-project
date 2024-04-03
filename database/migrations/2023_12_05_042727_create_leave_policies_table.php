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
        Schema::create('leave_policies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('template_name', 255);
            $table->integer('business_id')->unsigned();
            $table->string('leave_policy_cycle', 255);
            $table->string('leave_start_period', 255)->nullable()->default(null);
            $table->string('leave_end_period', 255)->nullable()->default(null);
            $table->string('accrual_type', 255);
            $table->integer('number_of_leaves');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
            $table->softDeletes();
            $table->foreign('business_id')->references('id')->on('businesses')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leave_policies');
    }
};
