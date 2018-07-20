<?php

use yii\db\Migration;

/**
 * Handles the creation of table `places`.
 */
class m180711_041506_create_places_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('places', [
            'id' => $this->primaryKey(),
            'place_name' => $this->string()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('places');
    }
}
