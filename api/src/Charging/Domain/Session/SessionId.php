<?php

namespace App\Charging\Domain\Session;

use Assert\Assert;
use Symfony\Component\Uid\Uuid;

final readonly class SessionId
{
    private function  __construct(
        private string $reference,
    )
    {}

    public static function createRandom(): self
    {
        return new self(Uuid::v7()->toString());
    }

    public static function fromString(string $reference): self
    {
        Assert::uuid($reference);

        return new self($reference);
    }

    public function equals(self $other): bool
    {
        return strcmp($this->reference, $other->reference) === 0;
    }

    public function toString(): string
    {
        return $this->reference;
    }
}
