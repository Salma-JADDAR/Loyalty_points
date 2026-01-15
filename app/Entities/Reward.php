<?php 
namespace App\Entities;
class reward{
    private ?int $id;
    private string $name;
    private int $pointRequire;
    private string $description;
    private int $stock;
    public function __construct(?int $id,string $name,int $pointRequire,string $description){
        $this->id=$id;
        $this->name=$name;
        $this->pointRequire=$pointRequire;
        $this->description=$description;
        $this->stock=-1;
    }
    
    public function getId(): ?int{
        return $this->id;
    }

    public function getName(): string{
        return $this->name;
    }
    public function getPointsRequired(): int{
        return $this->pointRequire;
    }
    public function getDescription(): string{
        return $this->description;
    }
    public function getStock(): int{
        return $this->stock;
    }

}