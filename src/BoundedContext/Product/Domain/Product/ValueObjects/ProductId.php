<?php

declare(strict_types=1);

namespace Src\BoundedContext\Product\Domain\Product\ValueObjects;

use InvalidArgumentException;

final class ProductId
{
    private $value;

    /**
     * ProductId constructor.
     * @param int $id
     * @throws InvalidArgumentException
     */
    public function __construct(int $id)
    {
        $this->validate($id);
        $this->value = $id;
    }

    public function validate(int $id): void
    {
        $options = array(
            'options' => array(
                'min_range' => 1,
            )
        );

        if (!filter_var($id, FILTER_VALIDATE_INT, $options))
            throw new \http\Exception\InvalidArgumentException(
                sprintf('<%s> does not allow the value <%s>.', static::class, $id)
            );
    }

    public function value(): int
    {
        return $this->value;
    }
}
