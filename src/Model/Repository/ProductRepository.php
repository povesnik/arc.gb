<?php

declare(strict_types=1);

namespace Model\Repository;

use Model\Entity\Product;

class ProductRepository
{
    /**
     * @var array
     */
    private $productList = [];

    public function __construct(){
        foreach ($this->getDataFromSource() as $item) {
            $this->productList[] = new Product(
                $item['id'],
                $item['name'],
                $item['price']
            );
        }
    }
    /**
     * Поиск продуктов по массиву id
     * @param int[] $ids
     * @return ProductRepository[]
     */
    public function search(array $ids = []): array
    {
        if (!count($ids)) {
            return [];
        }

        $productSearch = [];
        foreach ($this->productList as $item) {
            if (in_array($item('id'), $ids)) {
                $productSearch[] = clone $item;
            }
        }

        return $productSearch;
    }

    /**
     * Получаем все продукты
     * @return ProductRepository[]
     */
    public function fetchAll(): array
    {
        return $this->productList;
    }

    /**
     * Получаем продукты из источника данных
     * @param array $search
     * @return array
     */
    private function getDataFromSource(array $search = []): array
    {
        $dataSource = [
            [
                'id' => 1,
                'name' => 'PHP',
                'price' => 15300,
            ],
            [
                'id' => 2,
                'name' => 'Python',
                'price' => 20400,
            ],
            [
                'id' => 3,
                'name' => 'C#',
                'price' => 30100,
            ],
            [
                'id' => 4,
                'name' => 'Java',
                'price' => 30600,
            ],
            [
                'id' => 5,
                'name' => 'Ruby',
                'price' => 18600,
            ],
            [
                'id' => 8,
                'name' => 'Delphi',
                'price' => 8400,
            ],
            [
                'id' => 9,
                'name' => 'C++',
                'price' => 19300,
            ],
            [
                'id' => 10,
                'name' => 'C',
                'price' => 12800,
            ],
            [
                'id' => 11,
                'name' => 'Lua',
                'price' => 5000,
            ],
        ];

        if (!count($search)) {
            return $dataSource;
        }

        $productFilter = function (array $dataSource) use ($search): bool {
            return in_array($dataSource[key($search)], current($search), true);
        };

        return array_filter($dataSource, $productFilter);
    }
}
