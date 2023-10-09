<?php
/*
 * This file is part of the pofolio project.
 *
 * @copyright Copyright (c) 2023 Alexander Manhart IT
 * @authors Alexander Manhart
 *
 * Stock.php created on 26.09.23, 00:15.
 */

namespace pofolio\dao\mysql\pofolio;

use pofolio\classes\PofolioDAO;

class Currency extends PofolioDAO
{
    protected static ?string $tableName = 'Currency';

    protected array $pk = [
        'idCurrency'
    ];

    protected array $columns = [
        'idCurrency',
        'currency',
    ];

    public function exists(string $currency): bool
    {
        $filter = [
            ['currency', 'equal', $currency]
        ];
        return $this->getCount(filter_rules: $filter)->getValueAsBool('count');
    }
}