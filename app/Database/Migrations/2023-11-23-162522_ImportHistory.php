<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateImportHistoryTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'file_name' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'import_date' => [
                'type' => 'TIMESTAMP',
                'default' => 'CURRENT_TIMESTAMP',
            ],
            'imported_stock' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('import_history');
    }

    public function down()
    {
        $this->forge->dropTable('import_history');
    }
}

