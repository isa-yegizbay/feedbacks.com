<?php

use yii\db\Migration;

/**
 * Handles the creation of table `feedbacks`.
 * Has foreign keys to the tables:
 *
 * - `users`
 * - `places`
 * - `cities`
 */
class m180711_041927_create_feedbacks_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('feedbacks', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'place_id' => $this->integer()->notNull(),
            'city_id' => $this->integer()->notNull(),
            'title' => $this->string()->notNull(),
            'text' => $this->text()->notNull(),
            'date' => $this->timestamp(),
        ]);

        // creates index for column `user_id`
        $this->createIndex(
            'idx-feedbacks-user_id',
            'feedbacks',
            'user_id'
        );

        // add foreign key for table `users`
        $this->addForeignKey(
            'fk-feedbacks-user_id',
            'feedbacks',
            'user_id',
            'users',
            'id',
            'CASCADE'
        );

        // creates index for column `place_id`
        $this->createIndex(
            'idx-feedbacks-place_id',
            'feedbacks',
            'place_id'
        );

        // add foreign key for table `places`
        $this->addForeignKey(
            'fk-feedbacks-place_id',
            'feedbacks',
            'place_id',
            'places',
            'id',
            'CASCADE'
        );

        // creates index for column `city_id`
        $this->createIndex(
            'idx-feedbacks-city_id',
            'feedbacks',
            'city_id'
        );

        // add foreign key for table `cities`
        $this->addForeignKey(
            'fk-feedbacks-city_id',
            'feedbacks',
            'city_id',
            'cities',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `users`
        $this->dropForeignKey(
            'fk-feedbacks-user_id',
            'feedbacks'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            'idx-feedbacks-user_id',
            'feedbacks'
        );

        // drops foreign key for table `places`
        $this->dropForeignKey(
            'fk-feedbacks-place_id',
            'feedbacks'
        );

        // drops index for column `place_id`
        $this->dropIndex(
            'idx-feedbacks-place_id',
            'feedbacks'
        );

        // drops foreign key for table `cities`
        $this->dropForeignKey(
            'fk-feedbacks-city_id',
            'feedbacks'
        );

        // drops index for column `city_id`
        $this->dropIndex(
            'idx-feedbacks-city_id',
            'feedbacks'
        );

        $this->dropTable('feedbacks');
    }
}
