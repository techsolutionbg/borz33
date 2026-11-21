<?php

declare(strict_types=1);

namespace App\Services\Products;

use App\Models\Category;

final class ChildSizeCatalog
{
    /** @return list<string> */
    public static function valuesForCategoryId(?int $categoryId): array
    {
        if ($categoryId === null) {
            return [];
        }

        $category = Category::query()->find($categoryId);
        $visited = [];

        while ($category !== null && !isset($visited[$category->id])) {
            $visited[$category->id] = true;

            if ($category->slug === 'bebeta') {
                return ['50', '56', '62', '68', '74', '80', '86', '92', '98'];
            }

            if ($category->slug === 'momicheta') {
                return ['92', '98', '104', '110', '116', '122', '128', '134', '140', '146', '152', '158', '164', '170', '176'];
            }

            if ($category->slug === 'momcheta') {
                return ['98', '104', '110', '116', '122', '128', '134', '140', '146', '152', '158', '164', '170', '176'];
            }

            if ($category->slug === 'deca') {
                return ['92', '98', '104', '110', '116', '122', '128', '134', '140', '146', '152', '158', '164', '170', '176'];
            }

            $category = $category->parent;
        }

        return [];
    }

    public static function isSizeOption(string $name, string $slug): bool
    {
        return strtolower(trim($slug)) === 'size'
            || str_contains(mb_strtolower(trim($name), 'UTF-8'), 'размер');
    }
}
