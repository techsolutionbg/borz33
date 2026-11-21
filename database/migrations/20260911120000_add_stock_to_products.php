<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class AddStockToProducts extends AbstractMigration
{
    public function up(): void
    {
        $this->table('products')->addColumn('stock', 'integer', ['signed' => false, 'null' => false, 'default' => 0, 'after' => 'compare_at_price'])->update();
    }

    public function down(): void
    {
        $this->table('products')->removeColumn('stock')->update();
    }
}
