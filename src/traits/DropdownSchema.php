<?php

namespace App\Traits;

use App\Models\Other\Status;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

trait DropdownSchema
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->table, function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable(false)->index()->unique();
            $table->unsignedInteger('status_id')->nullable(false);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('status_id')->references('id')->on('statuses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists($this->table);
    }
}
