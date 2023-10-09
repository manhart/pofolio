<?php
/*
 * This file is part of the pofolio project.
 *
 * @copyright Copyright (c) 2023 Alexander Manhart IT
 * @authors Alexander Manhart
 *
 * PriceTarget.php created on 26.09.23, 00:15.
 */

namespace pofolio\dao\mysql\pofolio;

use pofolio\classes\PofolioDAO;

class PriceTarget extends PofolioDAO
{
    protected static ?string $tableName = 'PriceTarget';

    protected array $pk = [
        'idPriceTarget'
    ];

    protected array $columns = [
        'idPriceTarget',
        'idStock',
        'publishedDate',
        'newsUrl',
        'newsTitle',
        'analystName',
        'priceTarget',
        'adjPriceTarget',
        'priceWhenPosted',
        'newsPublisher',
        'newsBaseURL',
        'analystCompany',
    ];

    public function exists(int $idStock, \DateTimeInterface $publishedDate): bool
    {
        $filter = [
            ['idStock', 'equal', $idStock],
            ['publishedDate', 'equal', $publishedDate],
        ];
        return $this->getCount(filter_rules: $filter)->getValueAsBool('count');
    }
}