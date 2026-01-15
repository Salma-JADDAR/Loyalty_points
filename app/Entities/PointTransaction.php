<?php

namespace App\Entities;

class PointsTransaction{
    private ?int $id;
    private int $userId;
    private string $type; 
    private int $amount;
    private string $description;
    private int $balanceAfter;
    private string $createdAt;

    public function __construct(?int $id,int $userId,string $type,int $amount,string $description,int $balanceAfter,?string $createdAt = null) {
        $this->id = $id;
        $this->userId = $userId;
        $this->type = $type;
        $this->amount = $amount;
        $this->description = $description;
        $this->balanceAfter = $balanceAfter;
        $this->createdAt = $createdAt ?? date('Y-m-d H:i:s');
    }

  

    public function getId(): ?int{
        return $this->id;
    }

    public function getUserId(): int{
        return $this->userId;
    }

    public function getType(): string{
        return $this->type;
    }

    public function getAmount(): int{
        return $this->amount;
    }

    public function getDescription(): string{
        return $this->description;
    }

    public function getBalanceAfter(): int{
        return $this->balanceAfter;
    }

    public function getCreatedAt(): string{
        return $this->createdAt;
    }

   

    public function isEarned(): bool{
        return $this->type === 'earned';
    }

    public function isRedeemed(): bool{
        return $this->type === 'redeemed';
    }

    public function isExpired(): bool{
        return $this->type === 'expired';
    }
}
