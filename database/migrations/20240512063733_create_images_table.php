<?php

use app\models\migrations\Migration;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;

class CreateImagesTable extends Migration {

	/**
	 *
	 */
    public function up() {

		/**
		 * Don't forget to replace TABLENAME with your actual name!
		 */
		$this->schema->create('images', function (Blueprint $table) {

            $table->increments('id');
            $table->string('uuid');
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at');

		});

	}

	/**
	 *
	 */
	public function down() {

		/**
		 * Don't forget to replace TABLENAME with your actual name!
		 */
		$this->schema->drop('images');

	}
}
