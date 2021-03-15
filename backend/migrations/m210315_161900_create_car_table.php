<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%car}}`.
 */
class m210315_161900_create_car_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%car}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'price' => $this->integer(),
            'picture' => $this->string(),
            'quantity' => $this->integer(),
        ]);

        $this->insert("{{%car}}", ['name' => 'BMW 228 Gran Coupe', 'price' => 3570000, 'picture' => 'BMW 228 Gran Coupe.png', 'quantity' => 11]);
        $this->insert("{{%car}}", ['name' => 'BMW 230', 'price' => 3590000, 'picture' => 'BMW 230.png', 'quantity' => 17]);
        $this->insert("{{%car}}", ['name' => 'BMW 330', 'price' => 4125000, 'picture' => 'BMW 330.png', 'quantity' => 1]);
        $this->insert("{{%car}}", ['name' => 'BMW 330e', 'price' => 4455000, 'picture' => 'BMW 330e.png', 'quantity' => 7]);
        $this->insert("{{%car}}", ['name' => 'BMW 430', 'price' => 4560000, 'picture' => 'BMW 430', 'quantity' => 32]);
        $this->insert("{{%car}}", ['name' => 'BMW 430 Gran Coupe', 'price' => 4475000, 'picture' => 'BMW 430 Gran Coupe.png', 'quantity' => 4]);
        $this->insert("{{%car}}", ['name' => 'BMW 440', 'price' => 5135000, 'picture' => 'BMW 440.png', 'quantity' => 21]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%car}}');
    }
}
