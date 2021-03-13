<?php

namespace App\Entity;

use App\Repository\PalestranteRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PalestranteRepository::class)
 */
class Palestrante
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
    private $nome;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $especialidade;

    /**
     * @ORM\Column(type="text")
     */
    private $descricao;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNome(): ?string
    {
        return $this->nome;
    }

    public function setNome(string $nome): self
    {
        $this->nome = $nome;

        return $this;
    }

    public function getEspecialidade(): ?string
    {
        return $this->especialidade;
    }

    public function setEspecialidade(string $especialidade): self
    {
        $this->especialidade = $especialidade;

        return $this;
    }

    public function getDescricao(): ?string
    {
        return $this->descricao;
    }

    public function setDescricao(string $descricao): self
    {
        $this->descricao = $descricao;

        return $this;
    }
}
