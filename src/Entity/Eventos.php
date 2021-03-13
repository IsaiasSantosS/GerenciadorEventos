<?php

namespace App\Entity;

use App\Repository\EventosRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EventosRepository::class)
 */
class Eventos
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $titulo;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dt_inicio;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dt_fim;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $descricao;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitulo(): ?string
    {
        return $this->titulo;
    }

    public function setTitulo(string $titulo): self
    {
        $this->titulo = $titulo;

        return $this;
    }

    public function getDtInicio(): ?\DateTimeInterface
    {
        return $this->dt_inicio;
    }

    public function setDtInicio(\DateTimeInterface $dt_inicio): self
    {
        $this->dt_inicio = $dt_inicio;

        return $this;
    }

    public function getDtFim(): ?\DateTimeInterface
    {
        return $this->dt_fim;
    }

    public function setDtFim(\DateTimeInterface $dt_fim): self
    {
        $this->dt_fim = $dt_fim;

        return $this;
    }

    public function getDescricao(): ?string
    {
        return $this->descricao;
    }

    public function setDescricao(?string $descricao): self
    {
        $this->descricao = $descricao;

        return $this;
    }
}
