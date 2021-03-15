<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%application}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%car}}`
 */
class m210315_232159_create_application_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%application}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'phone' => $this->string(),
            'email' => $this->string(),
            'created_at' => $this->timestamp(),
            'car_id' => $this->integer(),
        ]);

        // creates index for column `car_id`
        $this->createIndex(
            '{{%idx-application-car_id}}',
            '{{%application}}',
            'car_id'
        );

        // add foreign key for table `{{%car}}`
        $this->addForeignKey(
            '{{%fk-application-car_id}}',
            '{{%application}}',
            'car_id',
            '{{%car}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%car}}`
        $this->dropForeignKey(
            '{{%fk-application-car_id}}',
            '{{%application}}'
        );

        // drops index for column `car_id`
        $this->dropIndex(
            '{{%idx-application-car_id}}',
            '{{%application}}'
        );

        $this->dropTable('{{%application}}');
    }
}
