<?php
/*
 * This file is part of the pofolio project.
 *
 * @copyright Copyright (c) 2023 Alexander Manhart IT
 * @authors Alexander Manhart
 *
 * HistoricalPrice.php created on 09.10.23, 17:01.
 */

namespace pofolio\dao\mysql\pofolio;

use pofolio\classes\PofolioDAO;

class HistoricalPrice extends PofolioDAO
{
    protected static ?string $tableName = 'HistoricalPrice';

    protected array $pk = [
        'idHistoricalPrice'
    ];

    protected array $columns = [
        'idHistoricalPrice',
        'idStock',
        'date',
        'open',
        'high',
        'close',
        'adjClose',
        'volume',
        'unadjustedVolume',
        'change',
        'changePercent',
        'vwap',
        'changeOverTime',
    ];

    public function exists(int $idStock, \DateTimeInterface $date): bool
    {
        $filter = [
            ['idStock', 'equal', $idStock],
            ['date', 'equal', $date],
        ];
        return $this->getCount(filter: $filter)->getValueAsBool('count');
    }
}