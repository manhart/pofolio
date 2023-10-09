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

class UpgradesDowngrades extends PofolioDAO
{
    protected static ?string $tableName = 'UpgradesDowngrades';

    protected array $pk = [
        'idUpgradesDowngrades'
    ];

    protected array $columns = [
        'idUpgradesDowngrades',
        'idStock',
        'publishedDate',
        'newsURL',
        'newsTitle',
        'newsBaseURL',
        'newsPublisher',
        'newGrade',
        'previousGrade',
        'gradingCompany',
        'action',
        'priceWhenPosted',
        'updated',
        'created',
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