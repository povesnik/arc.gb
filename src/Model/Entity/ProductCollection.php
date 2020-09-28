<?php


namespace Model\Entity;


class ProductCollection
{
public function sort (IComparator $comparator, array $productList): array{
    //логика
    return $comparator->compare($productList);
}
}