<?php
namespace App\Entities;
class User{
     private ?int $id;
     private string $email;
     private string $passwordHash;
     private string $name;
     private int $totalPoints;
     private string $createdAt;
     public function __construct(int $id,string $email,string $passwordHash,string $name,int $totalPoints=0,string $createdAt=null){
        $this->id= $id;
        $this->email= $email;
        $this->passwordHash= $passwordHash;
        $this->name= $name;
        $this->totalPoints= $totalPoints;
        $this->createdAt= $createdAt ?? date('Y-m-d H:i:s');
     }

    public function getId(): ?int{
        return $this->id;
     }
    public function getEmail(): string{
        return $this->email;
    }
    public function getPasswordHash(): string{
        return $this->passwordHash;
    }
    public function getName(): ?string{
        return $this->name;
    }
    public function getTotalPoints(): int{
        return $this->totalPoints;
    }
    public function getCreatedAt(): string{
        return $this->createdAt;
    }
    public function setId(?int $id){
        $this->id = $id;
    }
    public function setEmail(string $e): void{
        $this->email = $e;
    }

    public function setPasswordHash(string $p): void{
        $this->passwordHash = $p;
    }

    public function setName(?string $n): void{
        $this->name = $n;
    }

    public function setTotalPoints(int $tp): void{
        $this->totalPoints = $tp;
    }

  
}